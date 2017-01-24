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
            ->setParameter(2, 'In_progress')
            ->getQuery();

        return $qb->execute();
    }

    public function getProjectsSubscriptionsById($id)
    {
        $req = $this->createQueryBuilder('s')
            ->where('s.id = :id')
            ->setParameter('id', $id)
            ->getQuery();
        return $req->getResult();
    }

    public function cancelProjectSubscription($subscriptionId)
    {
        $qb = $this->createQueryBuilder('a')
            ->update()
            ->set('a.status', '?2')
            ->where('a.id = ?1')
            ->setParameter(1, $subscriptionId)
            ->setParameter(2, 'Canceled')
            ->getQuery();

        return $qb->execute();
    }

    public function validateSubscriptionBooster($subscriptionId)
    {
        $qb = $this->createQueryBuilder('a')
            ->update()
            ->set('a.boosterValidation', '?2')
            ->where('a.id = ?1')
            ->setParameter(1, $subscriptionId)
            ->setParameter(2, True)
            ->getQuery();

        return $qb->execute();
    }

    public function validateSubscriptionSociety($subscriptionId)
    {
        $qb = $this->createQueryBuilder('a')
            ->update()
            ->set('a.societyValidation', '?2')
            ->where('a.id = ?1')
            ->setParameter(1, $subscriptionId)
            ->setParameter(2, True)
            ->getQuery();

        return $qb->execute();
    }

    public function validationMatch($id)
    {
        $req = $this->createQueryBuilder('s')
            ->where('s.id = :id')
            ->andWhere('s.boosterValidation = :true')
            ->andWhere('s.societyValidation = :true')
            ->setParameter('id', $id)
            ->setParameter('true', True)
            ->getQuery();
        return $req->getResult();
    }

    public function projectSubscriptionDone($subscriptionId)
    {
        $qb = $this->createQueryBuilder('a')
            ->update()
            ->set('a.status', '?2')
            ->where('a.id = ?1')
            ->setParameter(1, $subscriptionId)
            ->setParameter(2, 'Done')
            ->getQuery();

        return $qb->execute();
    }

    public function setNoteAndComBooster($subscriptionId, $note, $commentaries)
    {
        $qb = $this->createQueryBuilder('a')
            ->update()
            ->set('a.boosterNote', '?1')
            ->set('a.boosterCommentaries', '?3')
            ->where('a.id = ?2')
            ->setParameter(1, $note)
            ->setParameter(2, $subscriptionId)
            ->setParameter(3, $commentaries)
            ->getQuery();

        return $qb->execute();
    }

    public function setNoteAndComSociety($subscriptionId, $note, $commentaries)
    {
        $qb = $this->createQueryBuilder('a')
            ->update()
            ->set('a.societyNote', '?1')
            ->set('a.societyCommentaries', '?3')
            ->where('a.id = ?2')
            ->setParameter(1, $note)
            ->setParameter(2, $subscriptionId)
            ->setParameter(3, $commentaries)
            ->getQuery();

        return $qb->execute();
    }

}