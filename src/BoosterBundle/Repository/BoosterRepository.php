<?php

namespace BoosterBundle\Repository;



class BoosterRepository extends \Doctrine\ORM\EntityRepository
{
    public function getDashboardById($id)
    {
        $req = $this->createQueryBuilder('a')
            ->where('a.id = :id')
            ->setParameter('id', $id)
            ->getQuery();

        return $req->getResult();
    }
}