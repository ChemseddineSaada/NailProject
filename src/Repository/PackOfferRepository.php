<?php

namespace App\Repository;

use App\Entity\PackOffer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method PackOffer|null find($id, $lockMode = null, $lockVersion = null)
 * @method PackOffer|null findOneBy(array $criteria, array $orderBy = null)
 * @method PackOffer[]    findAll()
 * @method PackOffer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PackOfferRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PackOffer::class);
    }

    // /**
    //  * @return PackOffer[] Returns an array of PackOffer objects
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
    public function findOneBySomeField($value): ?PackOffer
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
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
