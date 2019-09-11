<?php

namespace App\Repository;

use App\Entity\EventPassed;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method EventPassed|null find($id, $lockMode = null, $lockVersion = null)
 * @method EventPassed|null findOneBy(array $criteria, array $orderBy = null)
 * @method EventPassed[]    findAll()
 * @method EventPassed[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EventPassedRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EventPassed::class);
    }

    // /**
    //  * @return EventPassed[] Returns an array of EventPassed objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EventPassed
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
