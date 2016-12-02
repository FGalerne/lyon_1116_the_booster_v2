<?php

namespace BoosterBundle\Repository;

class DashboardRepository extends \Doctrine\ORM\EntityRepository
{
    public function findDashboardById($id)
    {
        $req = $this->createQueryBuilder('d')
            ->select()
            ->join('BoosterBundle\Entity\User', 'd', 'WITH', 'd.id = vc.video' )
            ->where('vc.video = ?1')
            ->setParameter(1, $id)
            ->getQuery();

        return $req->getResult();
    }
}