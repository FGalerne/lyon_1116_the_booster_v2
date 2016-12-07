<?php

namespace BoosterBundle\Controller;

use BoosterBundle\Entity\Booster;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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