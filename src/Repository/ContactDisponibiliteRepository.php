<?php

namespace App\Repository;

use App\Entity\ContactDisponibilite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ContactDisponibilite|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContactDisponibilite|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContactDisponibilite[]    findAll()
 * @method ContactDisponibilite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContactDisponibiliteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContactDisponibilite::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ContactDisponibilite $entity, bool $flush = true): void
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
    public function remove(ContactDisponibilite $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return ContactDisponibilite[] Returns an array of ContactDisponibilite objects
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
    public function findOneBySomeField($value): ?ContactDisponibilite
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
