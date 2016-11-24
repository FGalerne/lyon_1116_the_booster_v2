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
     /*$recaptcha = new ReCaptcha('6LdkigoUAAAAAJrqN9Eyl48CMqbEqWczvPmzDXw8');
     $resp = $recaptcha->verify($request->request->get('g-recaptcha-response'), $request->getClientIp());
     /*if (!$resp->isSuccess()) {
          verified!
     } else {*/

         if ($request->getMethod() == "POST") {

             $name = $request->get("name");
             $surname = $request->get("surname");

             //change mail here ///////////////////////////////////////////
             $To = 'teamthebooster@gmail.com'; //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
             //change mail here ///////////////////////////////////////////

             $email = $request->get("email");
             $subject = $request->get("subject");
             $message = $request->get("message");

             //$mailer = $this->container->get('mailer');
             $sendMessage = \Swift_Message::newInstance()
                 ->setSubject($subject)
                 ->setFrom($email)
                 ->setTo($To)
                 ->setBody('<html>' .
                     '<head></head>' .
                     '<body>' .
                     '<h4>Demande de contact'.
                     '</h4>' .
                     '<p>Nom et prénom : '.$name.' '.$surname .
                     '<br>Mail de contact : '. $email.
                     '<br><br>Sujet : '.$subject.
                     '<br>Message :<br>'.
                     $message.
                     '</body>' .
                     '</html>',
                     'text/html');

             $this->get('mailer')->send($sendMessage);
             return $this->render('BoosterBundle:Front:contact.html.twig');
         //}
         }
    }
}
