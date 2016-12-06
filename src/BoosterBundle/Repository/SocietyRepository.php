<?php
/**
 * Created by PhpStorm.
 * User: LaurieGandon
 * Date: 06/12/2016
 * Time: 9:25 AM
 */

namespace BoosterBundle\Repository;


class SocietyRepository extends \Doctrine\ORM\EntityRepository
{
    public function getDashboardById($id)
    {
        $req = $this->createQueryBuilder('s')
            ->where('s.id = :id')
            ->setParameter('id', $id)
            ->getQuery();
        return $req->getResult();
    }
}