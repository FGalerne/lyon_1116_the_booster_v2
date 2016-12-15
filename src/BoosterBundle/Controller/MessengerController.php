<?php

namespace BoosterBundle\Controller;

use BoosterBundle\Entity\Booster;
use BoosterBundle\Entity\Messenger;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Messenger controller.
 *
 */
class MessengerController extends Controller
{
    /**
     * Lists all messenger entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $messengers = $em->getRepository('BoosterBundle:Messenger')->findAll();

        return $this->render('messenger/index.html.twig', array(
            'messengers' => $messengers,
        ));
    }

    /**
     * Creates a new messenger entity.
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request)
    {
        $messenger = new Messenger();

        $form = $this->createForm('BoosterBundle\Form\MessengerType', $messenger);
        $form->handleRequest($request);

        $title = $form->getData()->getTitle();
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($messenger);
            $em->flush($messenger);

            $id = $request->query->get('id');

            $username = $request->query->get('username');

            $em->getRepository('BoosterBundle:Messenger')->insertReadOne($username, $title);
            $em->getRepository('BoosterBundle:Messenger')->insertReadTwo($username, $title);

            return $this->redirectToRoute('dashboard_booster',
               array('id' => $id));
        }

        return $this->render('messenger/new.html.twig', array(
            'messenger' => $messenger,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a messenger entity.
     *
     */
    public function showAction(Messenger $messenger)
    {
        $deleteForm = $this->createDeleteForm($messenger);

        return $this->render('messenger/show.html.twig', array(
            'messenger' => $messenger,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing messenger entity.
     *
     */
    public function editAction(Request $request, Messenger $messenger)
    {
        $deleteForm = $this->createDeleteForm($messenger);
        $editForm = $this->createForm('BoosterBundle\Form\MessengerType', $messenger);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('messenger_edit', array('id' => $messenger->getId()));
        }

        return $this->render('messenger/edit.html.twig', array(
            'messenger' => $messenger,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a messenger entity.
     *
     */
    public function deleteAction(Request $request, Messenger $messenger)
    {
        $form = $this->createDeleteForm($messenger);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($messenger);
            $em->flush($messenger);
        }

        return $this->redirectToRoute('messenger_index');
    }

    /**
     * Creates a form to delete a messenger entity.
     *
     * @param messenger $messenger The messenger entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Messenger $messenger)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('messenger_delete', array('id' => $messenger->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
