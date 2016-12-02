<?php

namespace BoosterBundle\Repository;

class DashboardRepository extends \Doctrine\ORM\EntityRepository
{
    public function getDashboardById($id)
    {
        $req = $this->createQueryBuilder('d')
            ->select('d')
            ->from('booster', 'd')
            ->where('d.id = ?1')
            ->setParameter(1, $id)
            ->getQuery();

        return $req->getResult();
    }
}