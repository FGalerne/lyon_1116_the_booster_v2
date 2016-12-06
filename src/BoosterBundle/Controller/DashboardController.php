<?php

namespace BoosterBundle\Controller;

use BoosterBundle\Entity\Society;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashboardController extends Controller
{
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

    public function boosterAction()
    {
        return $this->render('BoosterBundle:Dashboard:dashboard-booster.html.twig');
    }
}
