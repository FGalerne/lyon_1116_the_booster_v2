<?php

namespace BoosterBundle\Controller;

use BoosterBundle\Entity\Project;
use BoosterBundle\Entity\ProjectSubscription;
use BoosterBundle\Form\NotesBoosterType;
use BoosterBundle\Form\NotesSocietyType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Projectsubscription controller.
 *
 */
class ProjectSubscriptionController extends Controller
{
    public function subscriptionAction(Request $request, $boosterId, $societyId, $projectId)
    {
        $projectSubscription = new ProjectSubscription();
        $form = $this->createForm('BoosterBundle\Form\ProjectSubscriptionType', $projectSubscription);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $booster = $em->getRepository('BoosterBundle:Booster')->findOneById($boosterId);
            $project = $em->getRepository('BoosterBundle:Project')->findOneById($projectId);

            $projectSubscription->setStatus('Open');
            $projectSubscription->setCreateTime(new \DateTime('now'));
            $projectSubscription->setBooster($booster);
            $projectSubscription->setProject($project);

            $em->persist($projectSubscription);
            $em->flush();

            return $this->redirectToRoute('public_dashboard', array(
                'id' => $projectSubscription->getProject()->getSociety()->getId())
            );
        }

        return $this->render('BoosterBundle:Dashboard:project-subscription.html.twig', array(
            'projectSubscription' => $projectSubscription,
            'form' => $form->createView(),
            'societyId' => $societyId,
        ));
    }

    /**
     * @param Request $request
     * @param ProjectSubscription $projectId
     * @param $subscriptionId
     * @param $dashboardSlug
     * @param $role
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function notesCommentsAction(Request $request, $projectId, $subscriptionId, $dashboardSlug, $role)
    {
        $em = $this->getDoctrine()->getManager();
        $project = $em->getRepository('BoosterBundle:ProjectSubscription')->find($subscriptionId);
        $subscription = $em->getRepository('BoosterBundle:ProjectSubscription')->findOneById($subscriptionId);

        // Form that allows Society to vote and comment for a Booster at the end of the project
        $form1 = $this->createForm(NotesBoosterType::class, $project);
        $form1->handleRequest($request);
        if ($form1->isSubmitted()) {
            $project = $form1->getData();

            //change the status of project subscription - booster_validation to true
            $subscription->setSocietyValidation(1);

            $em->persist($project);
            $em->flush();

            $booster = $subscription->getBooster();
            $society = $subscription->getProject()->getSociety();

            //validationMatch will be true if both booster and society have validated the project
            $validationMatch = $em->getRepository('BoosterBundle:ProjectSubscription')->validationMatch($subscriptionId);
            if ($validationMatch && $subscription->getStatus() !== "Done")  {

                //Number projects done
                $projectDoneBooster = $booster->getProjectDoneNumber();
                $projectDoneBooster ++ ;
                $booster->setProjectDoneNumber($projectDoneBooster);
                $projectDoneSociety = $society->getProjectDoneNumber();
                $projectDoneSociety ++ ;
                $society->setProjectDoneNumber($projectDoneSociety);

                //Number hours given by Booster (+ number hours taken by Society)
                $hoursGiven = $booster->getHoursGiven();
                $hoursGiven += $subscription->getGivenTime() ;
                $booster->setHoursGiven($hoursGiven);
                $hoursTaken = $society->getHoursTaken();
                $hoursTaken += $subscription->getGivenTime() ;
                $society->setHoursTaken($hoursTaken);

                //Update total notation into average notation for vote for Booster
                $noteBooster = $booster->getAverageNotation();
                $noteBooster += $form1->get('boosterNote')->getData();
                $booster->setAverageNotation($noteBooster);
                //society note
                $noteSociety = $society->getAverageNotation();
                $noteSociety += $subscription->getSocietyNote();
                $society->setAverageNotation($noteSociety);

                //change the status of project and projectSubscription to 'Done'
                $em->getRepository('BoosterBundle:Project')->projectDone($projectId);
                $em->getRepository('BoosterBundle:ProjectSubscription')->projectSubscriptionDone($subscriptionId);
            }

            $em->persist($booster);
            $em->persist($society);

            $em->flush();

            return $this->render('BoosterBundle:Notes:confirmed_note.html.twig');
        }
        // Form that allows Booster to vote and comment for a Society at the end of the project
        $form2 = $this->createForm(NotesSocietyType::class, $project);
        $form2->handleRequest($request);
        if ($form2->isSubmitted() && $form2->isValid()) {
            $project = $form2->getData();

            //change the status of project subscription - society_validation to true
            $subscription->setBoosterValidation(1);

            $em->persist($project);
            $em->flush();

            $society = $subscription->getProject()->getSociety();
            $booster = $subscription->getBooster();

            //validationMatch will be true if both booster and society have validated the project
            $validationMatch = $em->getRepository('BoosterBundle:ProjectSubscription')->validationMatch($subscriptionId);
            if ($validationMatch && $subscription->getStatus() !== "Done")  {

                //Number projects done
                $projectDone = $society->getProjectDoneNumber();
                $projectDone ++ ;
                $society->setProjectDoneNumber($projectDone);

                $projectDoneBooster = $booster->getProjectDoneNumber();
                $projectDoneBooster ++ ;
                $booster->setProjectDoneNumber($projectDoneBooster);

                //Number hours taken by Society (+ number given by Boosters)
                $hoursTaken = $society->getHoursTaken();
                $hoursTaken += $subscription->getGivenTime() ;
                $society->setHoursTaken($hoursTaken);
                $hoursGiven = $booster->getHoursGiven();
                $hoursGiven += $subscription->getGivenTime() ;
                $booster->setHoursGiven($hoursGiven);

                //Update total notation into average notation for vote for Society
                $currentNote = $subscription->getProject()->getSociety()->getAverageNotation();
                $currentNote += $form2->get('societyNote')->getData();
                $society->setAverageNotation($currentNote);
                //booster note
                $noteBooster = $booster->getAverageNotation();
                $noteBooster += $subscription->getBoosterNote();
                $booster->setAverageNotation($noteBooster);

                //change the status of project and projectSubscription to 'Done'
                $em->getRepository('BoosterBundle:Project')->projectDone($projectId);
                $em->getRepository('BoosterBundle:ProjectSubscription')->projectSubscriptionDone($subscriptionId);
            }

            $em->persist($society);
            $em->persist($booster);
            $em->flush();

            return $this->render('BoosterBundle:Notes:confirmed_note.html.twig');
        }

        return $this->render('BoosterBundle:Notes:notes_comments.html.twig', array(
            'projectId' => $projectId,
            'subscriptionId' => $subscriptionId,
            'slug' => $dashboardSlug,
            'role' => $role,
            'societyId' => $subscription->getProject()->getSociety()->getId(),
            'form1' => $form1->createView(),
            'form2' => $form2->createView(),
        ));
    }

    public function subscriptionCancelAction($projectId, $subscriptionId, $role)
    {
        $em = $this->getDoctrine()->getManager();

        //change the status of project subscription to 'Canceled'
        $em->getRepository('BoosterBundle:ProjectSubscription')->cancelProjectSubscription($subscriptionId);
        //change the status of project to 'Open'
        $em->getRepository('BoosterBundle:Project')->cancelProject($projectId);

        $subscription = $em->getRepository('BoosterBundle:ProjectSubscription')->findOneById($subscriptionId);

        //change the name of the title of the message by title - id - (Annulé) to avoid problems
        $title = $subscription->getProject()->getProjectName();
        $boosterId = $subscription->getBooster()->getId();
        $newTitle = $title . ' ' . $boosterId . ' (Annulé)' ;
        $em->getRepository('BoosterBundle:Messenger')->cancelMessages($title, $newTitle);


        if($role == 'booster'){
            return $this->redirectToRoute('dashboard_booster', array(
                    'slug' => $subscription->getBooster()->getSlug(),
                )
            );
        } else{
            return $this->redirectToRoute('dashboard_society', array(
                    'slug' => $subscription->getProject()->getSociety()->getSlug(),
                )
            );

        }

    }
    public function subscriptionDeleteAction($projectId){

        $em = $this->getDoctrine()->getManager();



        //change the  status of project to "Delete"

        $project = $em->getRepository('BoosterBundle:Project')->findOneById($projectId);
        $project->setStatus('Delete');
        $project->setCreationStatus(0);


        $em->persist($project);
        $em->flush();

        return $this->redirectToRoute('dashboard_society', array(
                'slug' => $project->getSociety()->getSlug(),
            )
        );




    }

}
