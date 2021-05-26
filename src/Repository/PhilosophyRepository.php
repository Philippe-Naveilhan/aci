<?php

namespace App\Repository;

use App\Entity\Philosophy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Philosophy|null find($id, $lockMode = null, $lockVersion = null)
 * @method Philosophy|null findOneBy(array $criteria, array $orderBy = null)
 * @method Philosophy[]    findAll()
 * @method Philosophy[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PhilosophyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Philosophy::class);
    }

    // /**
    //  * @return Philosophy[] Returns an array of Philosophy objects
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
    public function findOneBySomeField($value): ?Philosophy
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
