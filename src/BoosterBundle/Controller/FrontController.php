<?php

namespace BoosterBundle\Controller;

use BoosterBundle\Entity\Contact;
use BoosterBundle\Repository\SocietyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class FrontController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $transactions = $em->getRepository('BoosterBundle:Transaction')
            ->homePageSocieties()
        ;
        return $this->render('BoosterBundle:Front:index.html.twig', array(
            'transactions' => $transactions,
        ));
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

            $from = $this->getParameter('mailer_user');
            $to = $this->getParameter('mailer_to');

            $email = $sendMessage->getEmail();
            $subject = $sendMessage->getSubject();
            $message = $sendMessage->getMessage();
            $type = $sendMessage->getType();

            $sendMessage = \Swift_Message::newInstance()
                ->setSubject($subject)
                ->setFrom($from)
                ->setTo($to)
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
                'send' => 'valide'
            ));
        } else if($form->isSubmitted()) {
            return $this->redirectToRoute('booster_contact', array(
                'send' => 'invalide'
            ));
        }

        return $this->render('BoosterBundle:Front:contact.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    public function howItWorksAction()
    {
        return $this->render('BoosterBundle:Front:how_it_works.html.twig');
    }
    public function inscriptionChoixAction()
    {
        return $this->render('BoosterBundle:Front:inscription_choix.html.twig');
    }
	const MAX_PER_PAGE = 12;

    public function listSocietyAction($page = 1)
	{

		$em = $this->getDoctrine()->getManager();
		$repository= $em->getRepository('BoosterBundle:Society');

		$societies = $repository->getByPage($page, self::MAX_PER_PAGE);


		$total = count($societies);
		$maxPage = (int) ($total / SocietyRepository::MAX_RESULT);
		if(($total % SocietyRepository::MAX_RESULT) !== 0) {
			$maxPage++;
		}

		return $this->render('BoosterBundle:Front:liste_de_societe.html.twig', array(
			'maxPage' => $maxPage,
			'societies' => $societies,
			'page' => $page));
	}



}
