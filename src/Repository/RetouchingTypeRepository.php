<?php

namespace App\Repository;

use App\Entity\RetouchingType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method RetouchingType|null find($id, $lockMode = null, $lockVersion = null)
 * @method RetouchingType|null findOneBy(array $criteria, array $orderBy = null)
 * @method RetouchingType[]    findAll()
 * @method RetouchingType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RetouchingTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RetouchingType::class);
    }

    // /**
    //  * @return RetouchingType[] Returns an array of RetouchingType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RetouchingType
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
