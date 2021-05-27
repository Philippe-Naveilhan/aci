<?php

namespace App\Repository;

use App\Entity\HouseCharacteristics;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method HouseCharacteristics|null find($id, $lockMode = null, $lockVersion = null)
 * @method HouseCharacteristics|null findOneBy(array $criteria, array $orderBy = null)
 * @method HouseCharacteristics[]    findAll()
 * @method HouseCharacteristics[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HouseCharacteristicsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HouseCharacteristics::class);
    }

    // /**
    //  * @return HouseCharacteristics[] Returns an array of HouseCharacteristics objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HouseCharacteristics
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
