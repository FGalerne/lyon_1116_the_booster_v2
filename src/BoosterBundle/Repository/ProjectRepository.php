<?php

namespace BoosterBundle\Repository;

/**
 * Class BoosterRepository
 * @package BoosterBundle\Repository
 */

class ProjectRepository extends \Doctrine\ORM\EntityRepository
{

    //function that get the Project By Society in the twig view.

    public function getProjectBySociety($value)
    {
        $req = $this->createQueryBuilder('p')
            ->select('p.projectName, p.status, p.givenTime')   //ici on renseigne les champs qu'on veut récupérer
            ->innerJoin('p.society','s')
            ->where('p.society = :id')
            ->setParameter('id', $value)
            ->getQuery();

        return $req->getScalarResult();
    }
}