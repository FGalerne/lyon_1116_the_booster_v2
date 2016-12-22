<?php

namespace BoosterBundle\Repository;

/**
 * messengerRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MessengerRepository extends \Doctrine\ORM\EntityRepository
{
    function myMessages($userId){
        $req = $this->createQueryBuilder('a')
            ->where('a.user1 = :userId')
            ->orWhere('a.user2 = :userId')
            ->orderBy('a.title')
            ->setParameter('userId', $userId)
            ->getQuery();

        return $req->getResult();
    }
}
