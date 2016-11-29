<?php

namespace BoosterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashboardController extends Controller
{
    public function societyAction()
    {
        return $this->render('BoosterBundle:Dashboard:dashboard-booste.html.twig');
    }

    public function boosterAction()
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('BoosterBundle:User')->findAll();

        return $this->render('BoosterBundle:Dashboard:dashboard-booster.html.twig' , array(
            'users' => $users,
        ));
    }
}
