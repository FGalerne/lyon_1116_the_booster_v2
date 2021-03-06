<?php

namespace BoosterBundle\Controller;

use BoosterBundle\Entity\Faq;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Faq controller.
 *
 */
class FaqController extends Controller
{
    /**
     * Lists all faq entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $faqs = $em->getRepository('BoosterBundle:Faq')->findAll();

        return $this->render('faq/index.html.twig', array(
            'faqs' => $faqs,
        ));
    }

    /**
     * Creates a new faq entity.
     *
     */
    public function newAction(Request $request)
    {
        $faq = new Faq();
        $form = $this->createForm('BoosterBundle\Form\FaqType', $faq);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($faq);
            $em->flush($faq);

            return $this->redirectToRoute('faq_show', array('id' => $faq->getId()));
        }

        return $this->render('faq/new.html.twig', array(
            'faq' => $faq,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a faq entity.
     *
     */
    public function showAction(Faq $faq)
    {
        $deleteForm = $this->createDeleteForm($faq);

        return $this->render('faq/show.html.twig', array(
            'faq' => $faq,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing faq entity.
     *
     */
    public function editAction(Request $request, Faq $faq)
    {
        $deleteForm = $this->createDeleteForm($faq);
        $editForm = $this->createForm('BoosterBundle\Form\FaqType', $faq);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('faq_edit', array('id' => $faq->getId()));
        }

        return $this->render('faq/edit.html.twig', array(
            'faq' => $faq,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a faq entity.
     *
     */
    public function deleteAction(Request $request, Faq $faq)
    {
        $form = $this->createDeleteForm($faq);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($faq);
            $em->flush($faq);
        }

        return $this->redirectToRoute('faq_index');
    }

    /**
     * Creates a form to delete a faq entity.
     *
     * @param Faq $faq The faq entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Faq $faq)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('faq_delete', array('id' => $faq->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function faqPageAction()
    {
        $em = $this->getDoctrine()->getManager();

        $faqs = $em->getRepository('BoosterBundle:Faq')->findAll();

        return $this->render('BoosterBundle:Front:faq.html.twig', array(
            'faqs' => $faqs,
        ));
    }
}
