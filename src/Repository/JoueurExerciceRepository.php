<?php

namespace App\Repository;

use App\Entity\JoueurExercice;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method JoueurExercice|null find($id, $lockMode = null, $lockVersion = null)
 * @method JoueurExercice|null findOneBy(array $criteria, array $orderBy = null)
 * @method JoueurExercice[]    findAll()
 * @method JoueurExercice[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JoueurExerciceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, JoueurExercice::class);
    }

    // /**
    //  * @return JoueurExercice[] Returns an array of JoueurExercice objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?JoueurExercice
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
