<?php

namespace BoosterBundle\Repository;

/**
 * Class BoosterRepository
 * @package BoosterBundle\Repository
 */

class ProjectSubscriptionRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * @param $subscriptionId
     * @return mixed
     */
    public function chooseProjectSubscriber($subscriptionId)
    {
        $qb = $this->createQueryBuilder('a')
            ->update()
            ->set('a.status', '?2')
            ->where('a.id = ?1')
            ->setParameter(1, $subscriptionId)
            ->setParameter(2, 'en cours')
            ->getQuery();

        return $qb->execute();
    }
}