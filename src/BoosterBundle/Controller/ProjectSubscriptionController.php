<?php

namespace BoosterBundle\Controller;

use BoosterBundle\Entity\ProjectSubscription;
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
}
