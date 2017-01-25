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
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function notesCommentsAction(Request $request, ProjectSubscription $projectId, $subscriptionId, $dashboardSlug, $role)
    {
        $em = $this->getDoctrine()->getManager();
        $project = $em->getRepository('BoosterBundle:ProjectSubscription')->find($projectId);
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

            //validationMatch will be true if both booster and society have validated the project
            $validationMatch = $em->getRepository('BoosterBundle:ProjectSubscription')->validationMatch($subscriptionId);
            if ($validationMatch) {

            //change the status of project and projectSubscription to 'Done'
            $em->getRepository('BoosterBundle:Project')->projectDone($projectId);
            $em->getRepository('BoosterBundle:ProjectSubscription')->projectSubscriptionDone($subscriptionId);
            }

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

            //validationMatch will be true if both booster and society have validated the project
            $validationMatch = $em->getRepository('BoosterBundle:ProjectSubscription')->validationMatch($subscriptionId);
            if ($validationMatch) {

            //change the status of project and projectSubscription to 'Done'
            $em->getRepository('BoosterBundle:Project')->projectDone($projectId);
            $em->getRepository('BoosterBundle:ProjectSubscription')->projectSubscriptionDone($subscriptionId);
            }

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

        //change the name of the title of the message by title (Annulé)
        $title = $em->getRepository('BoosterBundle:Project')->findOneById($projectId)->getProjectName();
        $em->getRepository('BoosterBundle:Messenger')->cancelMessages($title);

        $subscriber = $em->getRepository('BoosterBundle:ProjectSubscription')->findOneById($subscriptionId);
        if($role == 'booster'){
            return $this->redirectToRoute('dashboard_booster', array(
                    'slug' => $subscriber->getBooster()->getSlug(),
                )
            );
        } else{
            return $this->redirectToRoute('dashboard_society', array(
                    'slug' => $subscriber->getProject()->getSociety()->getSlug(),
                )
            );

        }

    }
}
