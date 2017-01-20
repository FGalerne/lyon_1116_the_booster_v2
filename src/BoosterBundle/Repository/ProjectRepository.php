<?php

namespace BoosterBundle\Repository;

/**
 * Class BoosterRepository
 * @package BoosterBundle\Repository
 */

class ProjectRepository extends \Doctrine\ORM\EntityRepository
{

    //function that get the Project By Society in the twig view.

    public function getProjectBySociety($id)
    {
        $req = $this->createQueryBuilder('p')
            ->select('p')   // here the fields we want to get
            ->innerJoin('p.society','s')        // here the join field we want to use
            ->where('p.society = :id')          // :id means (id is a parameter)
            ->setParameter('id', $id)           // declaration of the parameter
            ->getQuery();

        return $req->getResult();
    }

    /**
     * @param $projectId
     * @return mixed
     */
    public function updateProjectStatus($projectId)
    {
        $qb = $this->createQueryBuilder('a')
            ->update()
            ->set('a.status', '?2')
            ->where('a.id = ?1')
            ->setParameter(1, $projectId)
            ->setParameter(2, 'In_progress')
            ->getQuery();

        return $qb->execute();
    }

    public function cancelProject($projectId)
    {
        $qb = $this->createQueryBuilder('a')
            ->update()
            ->set('a.status', '?2')
            ->where('a.id = ?1')
            ->setParameter(1, $projectId)
            ->setParameter(2, 'Open')
            ->getQuery();

        return $qb->execute();
    }

    public function projectDone($projectId)
    {
        $qb = $this->createQueryBuilder('a')
            ->update()
            ->set('a.status', '?2')
            ->where('a.id = ?1')
            ->setParameter(1, $projectId)
            ->setParameter(2, 'Done')
            ->getQuery();

        return $qb->execute();
    }

}