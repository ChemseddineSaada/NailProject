<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }

    // /**
    //  * @return Article[] Returns an array of Article objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Article
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
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

    public function findEvents(){
        return $this->createQueryBuilder('c')
                    ->andWhere('c.state = :val AND c.event = :event')
                    ->setParameter('val', 1)
                    ->setParameter('event', 1)
                    ->getQUery()
                    ->getResult();
    }

    public function findPosts(){
        return $this->createQueryBuilder('c')
                    ->andWhere('c.state = :val AND c.event = :event')
                    ->setParameter('val', 1)
                    ->setParameter('event', 0)
                    ->getQUery()
                    ->getResult();
    }

}
