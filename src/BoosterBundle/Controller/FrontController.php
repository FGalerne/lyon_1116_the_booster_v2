<?php

namespace BoosterBundle\Controller;

use BoosterBundle\Entity\SendMessage;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;
use BoosterBundle\Repository\SendMessageRepository;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

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
        $sendMessage = new SendMessage();
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

            $sendMessage = new SendMessageRepository();
            $sendMessage = $sendMessage->contact($name, $surname, $To, $email, $subject, $message, $type);

            $this->get('mailer')->send($sendMessage);
            return $this->redirectToRoute('booster_contact', array(
                'send' => 'Votre message à été envoyé avec succès.'
            ));
        } else if($form->isSubmitted()) {
            return $this->redirectToRoute('booster_contact', array(
                'send' => "Un problème est survenu lors de l'envoie de votre email"
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
