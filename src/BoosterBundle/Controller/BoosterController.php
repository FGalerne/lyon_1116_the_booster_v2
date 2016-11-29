<?php

namespace BoosterBundle\Controller;

use BoosterBundle\Entity\Booster;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Booster controller.
 *
 */
class BoosterController extends Controller
{
    /**
     * Lists all booster entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $boosters = $em->getRepository('BoosterBundle:Booster')->findAll();

        return $this->render('booster/index.html.twig', array(
            'boosters' => $boosters,
        ));
    }

    /**
     * Creates a new booster entity.
     *
     */
    public function newAction(Request $request)
    {
        $booster = new Booster();
        $form = $this->createForm('BoosterBundle\Form\BoosterType', $booster);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($booster);
            $em->flush($booster);

            return $this->redirectToRoute('booster_show', array('id' => $booster->getId()));
        }

        return $this->render('booster/new.html.twig', array(
            'booster' => $booster,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a booster entity.
     *
     */
    public function showAction(Booster $booster)
    {
        $deleteForm = $this->createDeleteForm($booster);

        return $this->render('booster/show.html.twig', array(
            'booster' => $booster,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing booster entity.
     *
     */
    public function editAction(Request $request, Booster $booster)
    {
        $deleteForm = $this->createDeleteForm($booster);
        $editForm = $this->createForm('BoosterBundle\Form\BoosterType', $booster);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('booster_edit', array('id' => $booster->getId()));
        }

        return $this->render('booster/edit.html.twig', array(
            'booster' => $booster,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a booster entity.
     *
     */
    public function deleteAction(Request $request, Booster $booster)
    {
        $form = $this->createDeleteForm($booster);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($booster);
            $em->flush($booster);
        }

        return $this->redirectToRoute('booster_index');
    }

    /**
     * Creates a form to delete a booster entity.
     *
     * @param Booster $booster The booster entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Booster $booster)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('booster_delete', array('id' => $booster->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
