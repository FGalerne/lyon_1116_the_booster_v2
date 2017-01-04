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
            ->set('a.endTime', '?2')
            ->where('a.society = ?3')
            ->setParameter(1, new \DateTime('now'))
            ->setParameter(2, date_modify(new \DateTime('now'), "+24 hour"))
            ->setParameter(3, $id)
            ->getQuery();

        return $qb->execute();
    }
}