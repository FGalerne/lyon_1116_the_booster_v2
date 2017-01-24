<?php

namespace BoosterBundle\Util;

class Random
{
//convert to datetime format
    public function randomDate(){
        $rand_date = rand(strtotime('2016-01-01 00:00:00'), strtotime('2017-01-01 00:00:00'));
        $date =  date('Y-m-d H:i:s', $rand_date);
        $date = new \DateTime($date);
        return $date;
    }
//random functions (CO, CTO...)
    public function randomFunction(){
        $rand = array("CO", "CTO", "Founder", "Business Manager");
        return $rand[rand(0, count($rand) - 1)];
    }
//random workStatus
    public function randomWorkStatus(){
        $rand = array("Etudiant", "Chef d'entreprise", "Maitre du monde", "Stagiaire");
        return $rand[rand(0, count($rand) - 1)];
    }
//random Competences
    public function randomComp(){
        $rand = array("Design", "Web design", "Developpement Web", "Developpement d'application",
            "Creation de logo", "Marketing", "Peinture sur plexi", "Robotique", "ingenieurie BTP", "SEO",
            "Redaction", "Traduction", "Comptabilité", "Marketing digital", "Entreprenariat", "Logistique",
        );
        return $rand[rand(0, count($rand) - 1)];
    }
//random Creation status
    public function randomCreationStatus(){
        $rand = array("En attente", "Validé", "Supprimé");
        return $rand[rand(0, count($rand) - 1)];
    }
//random Project status
    public function randomProjectStatus(){
        $rand = array("Ouvert", "En cours", "Finalisé");
        return $rand[rand(0, count($rand) - 1)];
    }
}
