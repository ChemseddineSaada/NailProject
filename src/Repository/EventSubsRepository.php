<?php

namespace App\Repository;

use App\Entity\EventSubs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method EventSubs|null find($id, $lockMode = null, $lockVersion = null)
 * @method EventSubs|null findOneBy(array $criteria, array $orderBy = null)
 * @method EventSubs[]    findAll()
 * @method EventSubs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EventSubsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EventSubs::class);
    }

    // /**
    //  * @return EventSubs[] Returns an array of EventSubs objects
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
    public function findOneBySomeField($value): ?EventSubs
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
