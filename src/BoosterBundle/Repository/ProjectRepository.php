<?php

namespace BoosterBundle\Repository;

/**
 * Class BoosterRepository
 * @package BoosterBundle\Repository
 */

class ProjectRepository extends \Doctrine\ORM\EntityRepository
{

    //function that get the Project By Society in the twig view.

    public function getProjectBySociety($id, $status)
    {
        $req = $this->createQueryBuilder('p')
            ->select('p.projectName, p.status, p.givenTime, p.creationStatus, p.category')   // here the fields we want to get
            ->innerJoin('p.society','s')                                                     // here the join field we want to use
            ->where('p.society = :id')                                                       // :id means (id is a parameter)
            ->andWhere('p.status = Accepte')                                                 // need to found it's equals to what
            ->setParameter('id', $id)                                                        // declaration of the parameter
            ->setParameter('status', $status)                                                // declaration of the parameter
            ->getQuery();

        return $req->getResult();
    }
}