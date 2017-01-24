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
    public function newAction(Request $request)
    {
        $messenger = new Messenger();

        $form = $this->createForm('BoosterBundle\Form\MessengerType', $messenger);
        $form->handleRequest($request);

        //$messenger->getMessage() is because wysiwyg bug sometimes with required fields
        if ($form->isSubmitted() && $form->isValid() && $messenger->getMessage()) {

            $em = $this->getDoctrine()->getManager();
            $messenger->setCreateTime(new \DateTime('now'));
            $em->persist($messenger);
            $em->flush();

            //sending a mail to the message receiver
            $to = 'error';
            $name = '';

            $receiver = $messenger->getUser2();
            if(NULL !== $receiver->getBooster()){
                $to = $receiver->getBooster()->getUser()->getEmail();
                $name = $receiver->getBooster()->getUser()->getFirstName();
            } else if(NULL !== $receiver->getSociety()) {
                $to = $receiver->getSociety()->getUser()->getEmail();
                $name = $receiver->getSociety()->getUser()->getFirstName();
            }

            if($to !== 'error'){

                $sendMessage = \Swift_Message::newInstance()
                    ->setSubject('The Booster: Vous avez reçu un nouveau message!')
                    ->setFrom($this->getParameter('mailer_user'))
                    ->setTo($to)
                    ->setBody(
                        $this->renderView(
                            'BoosterBundle:Emails:messenger_new_message.html.twig',
                            array(
                                'name' => $name,
                            )
                        ),
                        'text/html'
                    )
                ;
                $this->get('mailer')->send($sendMessage);
            }
        }

        $slug = $request->query->get('slug');
        $role = $request->query->get('role');
        if($role == 'booster'){
            return $this->redirectToRoute('dashboard_booster',
                array('slug' => $slug));
        }
        else{
            return $this->redirectToRoute('dashboard_society',
                array('slug' => $slug));
        }
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
