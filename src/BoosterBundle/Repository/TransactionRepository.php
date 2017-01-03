<?php

namespace BoosterBundle\Repository;


/**
 * Class BoosterRepository
 * @package BoosterBundle\Repository
 */
class TransactionRepository extends \Doctrine\ORM\EntityRepository
{

    public function homePageSocieties()
    {
        $req = $this->createQueryBuilder('a')
            ->orderBy('a.createTime', 'DESC')
            ->setMaxResults(16)
            ->getQuery();

        return $req->getResult();
    }
    public function updateTransaction($id)
    {
        $qb = $this->createQueryBuilder('a')
            ->update()
            ->set('a.createTime', '?1')
            ->where('a.society = ?2')
            ->setParameter(1, new \DateTime('now'))
            ->setParameter(2, $id)
            ->getQuery();

        return $qb->execute();
    }
}