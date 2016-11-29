<?php

namespace BoosterBundle\Repository;



class BoosterRepository extends \Doctrine\ORM\EntityRepository
{
    public function findById()
    {
        $query = $this->createQueryBuilder('booster')
            ->getQuery();

        return $query->getResult();
    }
}