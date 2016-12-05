<?php

namespace BoosterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashboardController extends Controller
{
    public function societyAction()
    {
        return $this->render('BoosterBundle:Dashboard:dashboard-booste.html.twig');
    }

    public function boosterAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $boosters = $em->getRepository('BoosterBundle:Booster')->getDashboardById($id);

        return $this->render('BoosterBundle:Dashboard:dashboard-booster.html.twig', array(
            'boosters' => $boosters,
        ));
    }
}
