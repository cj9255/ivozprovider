<?php

namespace Ivoz\Cgr\Infrastructure\Persistence\Doctrine;

use Doctrine\ORM\EntityRepository;
use Ivoz\Cgr\Domain\Model\TpCdr\TpCdrRepository;
use Ivoz\Core\Infrastructure\Persistence\Doctrine\Model\Helper\CriteriaHelper;


/**
 * TpCdrDoctrineRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TpCdrDoctrineRepository extends EntityRepository implements TpCdrRepository
{
    /**
     * @param string $cgrid
     * @return int
     */
    public function getOneByCgrid(string $cgrid)
    {
        $conditions = [
            ['cgrid', 'eq', $cgrid],
            ['runId', 'eq', '*default']
        ];

        $qb = $this
            ->createQueryBuilder('self')
            ->addCriteria(CriteriaHelper::fromArray($conditions));

        return $qb
            ->getQuery()
            ->getSingleResult();
    }
}