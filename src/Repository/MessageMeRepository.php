<?php

namespace App\Repository;

use App\Entity\MessageMe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method MessageMe|null find($id, $lockMode = null, $lockVersion = null)
 * @method MessageMe|null findOneBy(array $criteria, array $orderBy = null)
 * @method MessageMe[]    findAll()
 * @method MessageMe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MessageMeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MessageMe::class);
    }

    // /**
    //  * @return MessageMe[] Returns an array of MessageMe objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MessageMe
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
