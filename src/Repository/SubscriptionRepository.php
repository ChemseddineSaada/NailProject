<?php

namespace App\Repository;

use App\Entity\Subscription;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Subscription|null find($id, $lockMode = null, $lockVersion = null)
 * @method Subscription|null findOneBy(array $criteria, array $orderBy = null)
 * @method Subscription[]    findAll()
 * @method Subscription[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SubscriptionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Subscription::class);
    }

    // /**
    //  * @return Subscription[] Returns an array of Subscription objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Subscription
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findPublished(){
        return $this->createQueryBuilder('c')
                    ->andWhere('c.state = :val')
                    ->setParameter('val', 1)
                    ->getQUery()
                    ->getResult();
    }

    public function findById($id){
        return $this->createQueryBuilder('c')
                    ->andWhere('c.state = :val AND c.id = :id')
                    ->setParameter('val', 1)
                    ->setParameter('id', $id)
                    ->getQUery()
                    ->getResult();
    }

    public function findAllHomeView(){
        return $this->createQueryBuilder('c')
                    ->andWhere('c.state = :val AND c.home_view = :home')
                    ->setParameter('val', 1)
                    ->setParameter('home', 1)
                    ->getQUery()
                    ->getResult();
    }
}
