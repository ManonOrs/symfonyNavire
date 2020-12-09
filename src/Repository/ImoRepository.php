<?php

namespace App\Repository;

use App\Entity\Imo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Imo|null find($id, $lockMode = null, $lockVersion = null)
 * @method Imo|null findOneBy(array $criteria, array $orderBy = null)
 * @method Imo[]    findAll()
 * @method Imo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Imo::class);
    }

    // /**
    //  * @return Imo[] Returns an array of Imo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Imo
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
