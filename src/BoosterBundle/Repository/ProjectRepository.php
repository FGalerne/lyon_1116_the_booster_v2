<?php

namespace BoosterBundle\Repository;

/**
 * Class BoosterRepository
 * @package BoosterBundle\Repository
 */

class ProjectRepository extends \Doctrine\ORM\EntityRepository
{

    //function that get the Project By Society in the twig view.

    public function getProjectBySociety($id)
    {
        $req = $this->createQueryBuilder('p')
            ->select('p')   // here the fields we want to get
            ->innerJoin('p.society','s')        // here the join field we want to use
            ->where('p.society = :id')          // :id means (id is a parameter)
            ->setParameter('id', $id)           // declaration of the parameter
            ->getQuery();

        return $req->getResult();
    }
}