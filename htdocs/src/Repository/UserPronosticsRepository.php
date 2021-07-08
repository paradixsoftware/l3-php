<?php

namespace App\Repository;

use App\Entity\UserPronostics;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UserPronostics|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserPronostics|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserPronostics[]    findAll()
 * @method UserPronostics[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserPronosticsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserPronostics::class);
    }

    // /**
    //  * @return UserPronostics[] Returns an array of UserPronostics objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UserPronostics
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
