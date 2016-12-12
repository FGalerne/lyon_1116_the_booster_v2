<?php

namespace BoosterBundle\Controller;


use BoosterBundle\Entity\Society;
use BoosterBundle\Entity\Booster;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DashboardController extends Controller
{
    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function societyAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $societies = $em->getRepository('BoosterBundle:Society')->getDashboardById($id);
        /**
         * @var Society $user
         */
        $user = $this->getUser();
        if ($user != null) {
            if ($user->getId() == $id) {
                return $this->render('BoosterBundle:Dashboard:dashboard-booste.html.twig', array(
                    'societies' => $societies,
                    'user' => $user,
                ));
            }
        }
        return $this->redirectToRoute('booster_charte');
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function societyNewAction(Request $request)
    {
        $society = new Society();
        $form = $this->createForm('BoosterBundle\Form\SocietyType', $society);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($society);
            $em->flush($society);

            return $this->redirectToRoute('dashboard_society', array('id' => $society->getId()));
        }

        return $this->render('@Booster/Dashboard/dashboard-booste-new.html.twig', array(
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
        $editForm = $this->createForm('BoosterBundle\Form\SocietyType', $society);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('dashboard_society',
                array('id' => $society->getId()));
        }

        return $this->render('@Booster/Dashboard/dashboard-booste-edit.html.twig', array(
            'id'    =>  $society->getId(),
            'society' => $society,
            'edit_form' => $editForm->createView(),
        ));
    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function boosterAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $boosters = $em->getRepository('BoosterBundle:Booster')->getDashboardById($id);
        $user = $this->getUser();
        if ($user != null) {
            if ($user->getId() == $id) {
                return $this->render('BoosterBundle:Dashboard:dashboard-booster.html.twig', array(
                    'boosters' => $boosters,
                    'user' => $user,
                ));
            }
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
            $em->persist($booster);
            $em->flush($booster);

            return $this->redirectToRoute('dashboard_booster', array('id' => $booster->getId()));
        }

        return $this->render('@Booster/Dashboard/dashboard-booster-new.html.twig', array(
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
        $editForm = $this->createForm('BoosterBundle\Form\BoosterType', $booster);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('dashboard_booster',
                array('id' => $booster->getId()));
        }

        return $this->render('BoosterBundle:Dashboard:dashboard-booster-edit.html.twig', array(
            'id' => $booster->getId(),
            'booster' => $booster,
            'edit_form' => $editForm->createView(),
        ));
    }

}