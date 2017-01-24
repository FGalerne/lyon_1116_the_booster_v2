<?php

	namespace BoosterBundle\Controller;

	use BoosterBundle\Entity\Society;
	use BoosterBundle\Entity\Booster;
	use BoosterBundle\Entity\Messenger;
	use BoosterBundle\Repository\messengerRepository;
	use Doctrine\ORM\Mapping\Id;
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Symfony\Component\HttpFoundation\File\File;
	use Symfony\Component\HttpFoundation\Request;

	class DashboardController extends Controller
	{
		/**
		 * @param         $slug
		 * @param Request $request
		 * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
		 */
		public function societyAction($slug, Request $request)
		{
			$em = $this->getDoctrine()->getManager();
			$society = $em->getRepository('BoosterBundle:Society')->findOneBySlug($slug);
			if(!isset($society)){
				return $this->redirectToRoute('booster_charte');
			}
			$id = $society->getId();

			$societies = $em->getRepository('BoosterBundle:Society')->getDashboardById($id);
			$projects = $em->getRepository('BoosterBundle:Project')->getProjectBySociety($id);


			if ($slug != null) {
				$user = $this->getUser();
				$userId = $user->getId();

				//messages
				$messenger = new Messenger();
				$form = $this->createForm('BoosterBundle\Form\MessengerType', $messenger);
				$messengers = $em->getRepository('BoosterBundle:Messenger')->myMessages($userId);
				$form->handleRequest($request);

            //testing if a place is avaliable to buy on home page
            $socOnHomePage = $em->getRepository('BoosterBundle:transaction')->actualTransactions();
            $avaliable = true;
            if(count($socOnHomePage) > 15) {
                $avaliable = false;
            }

            return $this->render('BoosterBundle:Dashboard:dashboard-booste.html.twig', array(
                'socOnHomePage' => $socOnHomePage,
                'avaliable' => $avaliable,
                'societies' => $societies,
                'user' => $user,
                'messengers' => $messengers,
                'projects' => $projects,
                'form' => $form->createView(),
            ));
            }

        return $this->redirectToRoute('booster_charte');
        }

		public function societyNewAction(Request $request)
		{
			$society = new Society();
			$form = $this->createForm('BoosterBundle\Form\SocietyType', $society);
			$form->handleRequest($request);


			if ($form->isSubmitted() && $form->isValid()) {
				$em = $this->getDoctrine()->getManager();
				$society->setUser($this->getUser());
				$society->setSlug(md5(uniqid()));

				if ($file = $society->getPhoto()) {
					$tmp = $this->getParameter('photo_tmp');

					$fileName = md5(uniqid()) . '.' . $file->guessExtension();
					$file->move(
						$this->getParameter('photo_tmp'),
						$fileName
					);

					$this->get('util.imageresizer')->resizeImage($tmp . '/' . $fileName, $this->getParameter('photo_society_directory') . '/', $width = 1024);
					unlink($tmp . '/' . $fileName);

					$society->setPhoto($fileName);
				}

				$em->persist($society);
				$em->flush();

				return $this->redirectToRoute('dashboard_society', array(
					'slug' => $society->getSlug(),
				));
			}

			return $this->render('@Booster/Dashboard/dashboard-booste-new.html.twig', array(
				'slug' => $society->getSlug(),
				'society' => $society,
				'form' => $form->createView(),
			));
		}


		/**
		 * @param Request $request
		 * @param Society $society
		 * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
		 */
		public function societyEditAction(Request $request, Society $society)
		{
			$oldSocietyPhoto = $society->getPhoto();
			$editForm = $this->createForm('BoosterBundle\Form\SocietyType', $society);
			$editForm->handleRequest($request);

			if ($editForm->isSubmitted() && $editForm->isValid()) {

				if ($editForm->get('photo')->getData() == null) {
					$society->setPhoto($oldSocietyPhoto);
				} else {
					$tmp = $this->getParameter('photo_tmp');
					$dir = $this->getParameter('photo_society_directory');
					$file = $society->getPhoto();

					$fileName = md5(uniqid()) . '.' . $file->guessExtension();
					$file->move(
						$tmp,
						$fileName
					);
					$this->get('util.imageresizer')->resizeImage($tmp . '/' . $fileName, $dir . '/', $width = 1024);

					if (isset($oldSocietyPhoto) && !empty($oldSocietyPhoto)) {
						unlink($dir . '/' . $oldSocietyPhoto);
					}
					unlink($tmp . '/' . $fileName);
					$society->setPhoto($fileName);

				}
				$this->getDoctrine()->getManager()->flush();

				return $this->redirectToRoute('dashboard_society',
					array('id' => $society->getId()));
			}

			return $this->render('@Booster/Dashboard/dashboard-booste-edit.html.twig', array(
				'id' => $society->getId(),
				'society' => $society,
				'edit_form' => $editForm->createView(),
			));
		}

		/**
		 * @param Request $request
		 * @param         $slug
		 * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
		 */
		public function boosterAction(Request $request, $slug)
		{

			$em = $this->getDoctrine()->getManager();
			$boosters = $em->getRepository('BoosterBundle:Booster')->getDashboardBySlug($slug);
			$user = $this->getUser();


			$userId = $user->getId();

			if ($slug != null ) {

				//messages
				$messenger = new Messenger();
				$form = $this->createForm('BoosterBundle\Form\MessengerType', $messenger);
				$messengers = $em->getRepository('BoosterBundle:Messenger')->myMessages($userId);
				$form->handleRequest($request);

				//if ($user->getId() == $booster->getId()) {
					if ($form->isSubmitted() && $form->isValid()) {
						$em->persist($messengers);
						$em->flush();
					}
				//}
				return $this->render('BoosterBundle:Dashboard:dashboard-booster.html.twig', array(
					'boosters' => $boosters,
					'user' => $user,
					'messengers' => $messengers,
					'form' => $form->createView(),
				));

			}

			return $this->redirectToRoute('booster_charte');
		}


		public function boosterNewAction(Request $request)
		{
			$booster = new Booster();
			$form = $this->createForm('BoosterBundle\Form\BoosterType', $booster);
			$form->handleRequest($request);

			if ($form->isSubmitted() && $form->isValid()) {

				$em = $this->getDoctrine()->getManager();
				$booster->setUser($this->getUser());
				$booster->setSlug(md5(uniqid()));

				if ($file = $booster->getPhoto()) {
					$tmp = $this->getParameter('photo_tmp');
					$dir = $this->getParameter('photo_booster_directory');

					$fileName = md5(uniqid()) . '.' . $file->guessExtension();
					$file->move(
						$tmp,
						$fileName
					);
					$this->get('util.imageresizer')->resizeImage($tmp . '/' . $fileName, $dir . '/', $width = 512);
					unlink($tmp . '/' . $fileName);

					$booster->setPhoto($fileName);
				}

				$em->persist($booster);
				$em->flush($booster);

				return $this->redirectToRoute('dashboard_booster', array(
					'id' => $booster->getId(),
					'slug' => $booster->getSlug()
				));
			}
			var_dump($booster->getSlug());
			return $this->render('@Booster/Dashboard/dashboard-booster-new.html.twig', array(
				'slug' => $booster->getSlug(),
				'booster' => $booster,
				'form' => $form->createView(),
			));
		}


		/**
		 * @param Request $request
		 * @param Booster $booster
		 * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
		 */
		public function boosterEditAction(Request $request, Booster $booster)
		{
			$oldBoosterPhoto = $booster->getPhoto();
			$editForm = $this->createForm('BoosterBundle\Form\BoosterType', $booster);
			$editForm->handleRequest($request);
			$user = $this->getUser();


			if ($editForm->isSubmitted() && $editForm->isValid()) {
				if ($editForm->get('photo')->getData() == null) {
					$booster->setPhoto($oldBoosterPhoto);
				} else {
					$tmp = $this->getParameter('photo_tmp');
					$dir = $this->getParameter('photo_booster_directory');
					$file = $booster->getPhoto();
					$fileName = md5(uniqid()) . '.' . $file->guessExtension();
					$file->move(
						$this->getParameter('photo_tmp'),
						$fileName
					);
					$this->get('util.imageresizer')->resizeImage($tmp . '/' . $fileName, $dir . '/', $width = 512);

					if (isset($oldBoosterPhoto) && !empty($oldBoosterPhoto)) {
						unlink($dir . '/' . $oldBoosterPhoto);
					}
					unlink($tmp . '/' . $fileName);
					$booster->setPhoto($fileName);
				}

				$this->getDoctrine()->getManager()->flush();

				return $this->redirectToRoute('dashboard_booster',
					array('id' => $booster->getId()));
			}

			return $this->render('BoosterBundle:Dashboard:dashboard-booster-edit.html.twig', array(
				'slug' => $booster->getSlug(),
				'id' => $booster->getId(),
				'booster' => $booster,
				'edit_form' => $editForm->createView(),
			));
		}

			public
			function publicDashboardAction($id)
			{
				$em = $this->getDoctrine()->getManager();
				$society = $em->getRepository('BoosterBundle:Society')->findOneById($id);
				//projectNames = Entity Project
				$projects = $society->getProjectNames();

				return $this->render('BoosterBundle:Dashboard:public-dashboard.html.twig', array(
					'society' => $society,
					'projects' => $projects,
				));
			}

	}
