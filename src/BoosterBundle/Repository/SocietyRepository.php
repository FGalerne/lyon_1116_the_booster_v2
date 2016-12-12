<?php
	/**
	 * Created by PhpStorm.
	 * User: apprenti
	 * Date: 06/12/16
	 * Time: 22:55
	 */

	namespace BoosterBundle\Repository;


	use Doctrine\ORM\EntityRepository;
	use Doctrine\ORM\Tools\Pagination\Paginator;
	use InvalidArgumentException;
	use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


	class SocietyRepository extends EntityRepository
	{
		const MAX_RESULT = 12;
		/**
		 * @param int $page
		 * @param int $itemPerPage
		 * @return Paginator
		 */
		public function getByPage($page, $itemPerPage = self::MAX_RESULT)
		{
			if ($page > 0) {
				$offset = ($page - 1) * $itemPerPage;
			} else {
				$offset = 0;
			}
			$query = $this->createQueryBuilder('s')
				->orderBy('s.id', 'DESC')
				->setFirstResult($offset)
				->setMaxResults($itemPerPage)
			;
			return new Paginator($query);
		}

        /**
         * @param $id
         * @return array
         */
        public function getDashboardById($id)
        {
            $req = $this->createQueryBuilder('s')
                ->where('s.id = :id')
                ->setParameter('id', $id)
                ->getQuery();
            return $req->getResult();
        }
	}


