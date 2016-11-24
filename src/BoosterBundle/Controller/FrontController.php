<?php

namespace BoosterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use BoosterBundle\Repository\SendMessageRepository;

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
    public function contactAction()
    {
        return $this->render('BoosterBundle:Front:contact.html.twig');
    }
    public function commentCaMarcheAction()
    {
        return $this->render('BoosterBundle:Front:comment_ca_marche.html.twig');
    }
    public function contactSendMailAction(Request $request)
    {
        $send = "Un problème est survenu lors de l'envoie de votre email";

         if ($request->getMethod() == "POST") {

             $name = $request->get("name");
             $surname = $request->get("surname");

             $To = 'teamthebooster@gmail.com';

             $email = $request->get("email");
             $subject = $request->get("subject");
             $message = $request->get("message");
             $type = $request->get("type");
             $sendMessage = new SendMessageRepository();
             $sendMessage = $sendMessage->contact($name, $surname, $To, $email, $subject, $message, $type);

             $this->get('mailer')->send($sendMessage);
             $send = 'Votre message à été envoyé avec succès.';
            //}
         }

        return $this->redirectToRoute('booster_contact', array('send' => $send));

    }
}
