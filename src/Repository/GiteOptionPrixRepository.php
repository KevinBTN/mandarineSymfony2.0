<?php

namespace App\Repository;

use App\Entity\GiteOptionPrix;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GiteOptionPrix|null find($id, $lockMode = null, $lockVersion = null)
 * @method GiteOptionPrix|null findOneBy(array $criteria, array $orderBy = null)
 * @method GiteOptionPrix[]    findAll()
 * @method GiteOptionPrix[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GiteOptionPrixRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GiteOptionPrix::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(GiteOptionPrix $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(GiteOptionPrix $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return GiteOptionPrix[] Returns an array of GiteOptionPrix objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GiteOptionPrix
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
