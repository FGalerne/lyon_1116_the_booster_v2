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
    public function notesCommentsAction(Request $request, ProjectSubscription $projectId)
    {
        $em = $this->getDoctrine()->getManager();
        $project = $em->getRepository('BoosterBundle:ProjectSubscription')->find($projectId);

        $form1 = $this->createForm(NotesBoosterType::class, $project);
        $form1->handleRequest($request);
        if ($form1->isSubmitted()) {
            $project = $form1->getData();
            $em->persist($project);
            $em->flush();

            return $this->render('BoosterBundle:Notes:confirmed_note.html.twig');
        }

        $form2 = $this->createForm(NotesSocietyType::class, $project);
        $form2->handleRequest($request);
        if ($form2->isSubmitted() && $form2->isValid()) {
            $project = $form2->getData();
            $em->persist($project);
            $em->flush();

            return $this->render('BoosterBundle:Notes:confirmed_note.html.twig');
        }

    return $this->render('BoosterBundle:Notes:notes_comments.html.twig', array(
        'form1' => $form1->createView(),
        'form2' => $form2->createView(),
    ));

    }
}
