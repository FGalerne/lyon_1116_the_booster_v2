<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BoosterBundle\Controller;

use FOS\UserBundle\Event\FilterUserResponseEvent;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Form\Factory\FactoryInterface;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Model\UserManagerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\UserBundle\Controller\RegistrationController as BaseController;
use BoosterBundle\Form\BoosterRegistrationType;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class RegistrationController extends BaseController
{
    /**
     * @Route("/enregistrement/booster/", name="booster_user_booster_register")
     *
     */
    public function registerBoosterAction(Request $request)
    {
        /** @var $formFactory FactoryInterface */
        $formFactory = $this->get('form.factory');
        /** @var $userManager UserManagerInterface */
        $userManager = $this->get('fos_user.user_manager');
        /** @var $dispatcher EventDispatcherInterface */
        $dispatcher = $this->get('event_dispatcher');

        $user = $userManager->createUser();
        $user->setEnabled(true);
		$user->addRole("ROLE_BOOSTER");
        $event = new GetResponseUserEvent($user, $request);
        $dispatcher->dispatch(FOSUserEvents::REGISTRATION_INITIALIZE, $event);

        if (null !== $event->getResponse()) {
            return $event->getResponse();
        }

        $form = $formFactory->create(new BoosterRegistrationType($this->container->getParameter("fos_user.model.user.class")));
        $form->setData($user);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {

                $event = new FormEvent($form, $request);
                $dispatcher->dispatch(FOSUserEvents::REGISTRATION_SUCCESS, $event);

                $userManager->updateUser($user);

                if (null === $response = $event->getResponse()) {
                    $url = $this->generateUrl('fos_user_registration_confirmed');
                    $response = new RedirectResponse($url);
                }

                $dispatcher->dispatch(FOSUserEvents::REGISTRATION_COMPLETED, new FilterUserResponseEvent($user, $request, $response));

                return $response;
            }

            $event = new FormEvent($form, $request);
            $dispatcher->dispatch(FOSUserEvents::REGISTRATION_FAILURE, $event);

            if (null !== $response = $event->getResponse()) {
                return $response;
            }
        }

        return $this->render('FOSUserBundle:Registration:register.html.twig', array(
            'form' => $form->createView(),
            'booster' => true,
        ));
    }

	/**
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function registerAction(Request $request)
	{
		/** @var $formFactory FactoryInterface */
		$formFactory = $this->get('fos_user.registration.form.factory');
		/** @var $userManager UserManagerInterface */
		$userManager = $this->get('fos_user.user_manager');
		/** @var $dispatcher EventDispatcherInterface */
		$dispatcher = $this->get('event_dispatcher');

		$user = $userManager->createUser();
		$user->setEnabled(true);
		$user->addRole("ROLE_BOOSTE");

		$event = new GetResponseUserEvent($user, $request);
		$dispatcher->dispatch(FOSUserEvents::REGISTRATION_INITIALIZE, $event);

		if (null !== $event->getResponse()) {
			return $event->getResponse();
		}

		$form = $formFactory->createForm();
		$form->setData($user);
		$form->handleRequest($request);
        $required = false;


		if ($form->isSubmitted() && $form->isValid()) {
            $typeProject = $form["typeproject"]->getData();
            $siret = $form["siretnumber"]->getData();
            $phone = $form["phone"]->getData();
			if (($typeProject == 0 && $siret != null && $phone != null) //Soiety
                || ($typeProject == 1 && $phone != null)                //Project
            ) {
                $event = new FormEvent($form, $request);
                $dispatcher->dispatch(FOSUserEvents::REGISTRATION_SUCCESS, $event);
                $userManager->updateUser($user);

                if (null === $response = $event->getResponse()) {
                    $url = $this->generateUrl('fos_user_registration_confirmed');
                    $response = new RedirectResponse($url);
                }

                $dispatcher->dispatch(FOSUserEvents::REGISTRATION_COMPLETED, new FilterUserResponseEvent($user, $request, $response));

                //envoie d'un mail pour prevenir qu'un nouveau boosté attend une validation
                $title = $form["title"]->getData();
                $name = $form["firstname"]->getData();
                $surname = $form["lastname"]->getData();
                $siret = $form["siretnumber"]->getData();

                $from = $this->getParameter('mailer_user');
                $to = $this->getParameter('mailer_to');

                $projectName = $form["nameproject"]->getData();
                $subject = $projectName.': validation du n° siret';

                $sendMessage = \Swift_Message::newInstance()
                    ->setSubject($subject)
                    ->setFrom($from)
                    ->setTo($to)
                    ->setBody(
                        $this->renderView(
                            'BoosterBundle:Emails:validation_siret_email.html.twig',
                            array(
                                'title' => $title,
                                'name' => $name,
                                'surname' => $surname,
                                'projectName' => $projectName,
                                'siret' => $siret,
                            )
                        ),
                        'text/html'
                    )
                ;
                $this->get('mailer')->send($sendMessage);
                return $response;
            } else{
                if($phone === null) $required = 'phone';
                if($siret === null) $required = 'siret';
            }

			$event = new FormEvent($form, $request);
			$dispatcher->dispatch(FOSUserEvents::REGISTRATION_FAILURE, $event);

			if (null !== $response = $event->getResponse()) {
				return $response;
			}
		}

		return $this->render('FOSUserBundle:Registration:register.html.twig', array(
			'form' => $form->createView(),
            'required' => $required,
            'booster' => false,
		));
	}
}
