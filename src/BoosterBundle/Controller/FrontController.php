<?php

namespace BoosterBundle\Controller;

use BoosterBundle\Entity\Contact;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class FrontController extends Controller
{
    public function indexAction()
    {
        return $this->render('BoosterBundle:Front:index.html.twig');
    }
    public function cgvAction()
    {
        return $this->render('BoosterBundle:Front:cgv.html.twig');
    }
    public function faqAction()
    {
        return $this->render('BoosterBundle:Front:faq.html.twig');
    }
    public function charteAction()
    {
        return $this->render('BoosterBundle:Front:charte.html.twig');
    }
    public function mentionsLegalesAction()
    {
        return $this->render('BoosterBundle:Front:mentions_legales.html.twig');
    }
    public function equipeAction()
    {
        return $this->render('BoosterBundle:Front:equipe.html.twig');
    }
    public function contactAction(Request $request)
    {
        $sendMessage = new Contact();
        $form = $this->createForm('BoosterBundle\Form\ContactType', $sendMessage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $name = $sendMessage->getName();
            $surname = $sendMessage->getSurname();

            $To = 'teamthebooster@gmail.com';

            $email = $sendMessage->getEmail();
            $subject = $sendMessage->getSubject();
            $message = $sendMessage->getMessage();
            $type = $sendMessage->getType();

            $sendMessage = \Swift_Message::newInstance()
                ->setSubject($subject)
                ->setFrom($email)
                ->setTo($To)
                ->setBody(
                    $this->renderView(
                        'BoosterBundle:Emails:contact_email.html.twig',
                        array(
                            'name' => $name,
                            'surname' => $surname,
                            'email' => $email,
                            'subject' => $subject,
                            'message' => $message,
                            'type' => $type
                        )
                    ),
                    'text/html'
                )
            ;

            $this->get('mailer')->send($sendMessage);
            return $this->redirectToRoute('booster_contact', array(
                'send' => 2
            ));
        } else if($form->isSubmitted()) {
            return $this->redirectToRoute('booster_contact', array(
                'send' => 1
            ));
        }

        return $this->render('BoosterBundle:Front:contact.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    public function commentCaMarcheAction()
    {
        return $this->render('BoosterBundle:Front:comment_ca_marche.html.twig');
    }
}
