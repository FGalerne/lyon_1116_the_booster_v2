<?php

namespace BoosterBundle\Repository;


/**
 * Class BoosterRepository
 * @package BoosterBundle\Repository
 */
class BoosterRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * @param $id
     * @return array
     *
     * The function getDashboardById allowed to get all the dashboards
     */

	public function getDashboardById($id)
    {
        $req = $this->createQueryBuilder('a')
            ->where('a.id = :id')
            ->setParameter('id', $id)
            ->getQuery();

        return $req->getResult();
    }
	public function getDashboardBySlug($slug)
	{
		$req = $this->createQueryBuilder('a')
			->where('a.slug = :slug')
			->setParameter('slug', $slug)
			->getQuery();

		return $req->getResult();
	}


}