<?php

namespace BoosterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashboardController extends Controller
{
    public function societyAction()
    {
        $em = $this->getDoctrine()->getManager();
        $societies = $em->getRepository('BoosterBundle:Society')->findAll();

        return $this->render('BoosterBundle:Dashboard:dashboard-booste.html.twig', array(
            'societies' => $societies,
        ));
    }

    public function boosterAction()
    {
        return $this->render('BoosterBundle:Dashboard:dashboard-booster.html.twig');
    }
}
