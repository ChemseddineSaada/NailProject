<?php

namespace App\Repository;

use App\Entity\CartToProduct;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CartToProduct|null find($id, $lockMode = null, $lockVersion = null)
 * @method CartToProduct|null findOneBy(array $criteria, array $orderBy = null)
 * @method CartToProduct[]    findAll()
 * @method CartToProduct[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CartToProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CartToProduct::class);
    }

    // /**
    //  * @return CartToProduct[] Returns an array of CartToProducts objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CartToProduct
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
