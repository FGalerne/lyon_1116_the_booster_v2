<?php

namespace BoosterBundle\Repository;


/**
 * Class BoosterRepository
 * @package BoosterBundle\Repository
 */
class BoosterRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * @param $id
     * @return array
     */
    public function getDashboardById($id)
    {
        $req = $this->createQueryBuilder('a')
            ->where('a.id = :id')
            ->setParameter('id', $id)
            ->getQuery();

        return $req->getResult();
    }

}