<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    // /**
    //  * @return Product[] Returns an array of Product objects
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
    public function findOneBySomeField($value): ?Product
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

    public function findTopProduct(){
        return $this->createQueryBuilder('c')
                    ->andWhere('c.state = :val AND c.top_product = :top')
                    ->setParameter('val', 1)
                    ->setParameter('top', 1)
                    ->getQUery()
                    ->getResult();
    }



}
