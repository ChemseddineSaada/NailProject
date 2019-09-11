<?php

namespace App\Repository;

use App\Entity\PTypes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method PTypes|null find($id, $lockMode = null, $lockVersion = null)
 * @method PTypes|null findOneBy(array $criteria, array $orderBy = null)
 * @method PTypes[]    findAll()
 * @method PTypes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PTypesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PTypes::class);
    }

    // /**
    //  * @return PTypes[] Returns an array of PTypes objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PTypes
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
