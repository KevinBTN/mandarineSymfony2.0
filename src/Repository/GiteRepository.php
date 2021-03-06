<?php

namespace App\Repository;

use App\Entity\Gite;
use App\Entity\PropertySearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;


/**
 * @method Gite|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gite|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gite[]    findAll()
 * @method Gite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 * @method Gite|null findOneByIdJoinedToCategory(int $giteId)
 */
class GiteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Gite::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Gite $entity, bool $flush = true): void
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
    public function remove(Gite $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function findByForSearch($criteria){

        $temp = $this->createQueryBuilder('a');
        if($criteria->getEmplacement() != ""){
            $temp->andWhere('a.emplacement = :emplacement')
            ->setParameter('emplacement', $criteria->getEmplacement());
        }
        if($criteria->getminPrice() != ""){
            $temp->andWhere('a.tarifBasseSaison >= :minVal')
            ->setParameter('minVal', $criteria->getminPrice());
        }
        if($criteria->getmaxPrice() != ""){
            $temp->andWhere('a.tarifBasseSaison <= :maxVal')
            ->setParameter('maxVal', $criteria->getmaxPrice());
        }
        if($criteria->getminSurface() != ""){
            $temp->andWhere('a.surface >= :minVals')
            ->setParameter('minVals', $criteria->getminSurface());
        }
        if($criteria->getmaxSurface() != ""){
            $temp->andWhere('a.surface <= :maxVals')
            ->setParameter('maxVals', $criteria->getmaxSurface());
        }
            return $temp->orderBy('a.id', 'DESC')
            ->getQuery()
            ->getResult();

    }
    
    public function findBytarifBasseSaison($minValue, $maxValue){

        return $this->createQueryBuilder('a')
            ->andWhere('a.tarifBasseSaison >= :minVal')
            ->setParameter('minVal', $minValue)
            ->andWhere('a.tarifBasseSaison <= :maxVal')
            ->setParameter('maxVal', $maxValue)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();

    }

    public function findBySurface($minValue, $maxValue){

        return $this->createQueryBuilder('b')
            ->andWhere('b.surface >= :minVal')
            ->setParameter('minVal', $minValue)
            ->andWhere('b.surface <= :maxVal')
            ->setParameter('maxVal', $maxValue)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();

    }
       /**
     * @return Gite[]
     */
    public function findOneByIdJoinedToContact(int $giteId): ?Gite
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT g, c 
            FROM App\Entity\Gite g
            INNER JOIN g.contactId c
            WHERE g.id = :id'
        )->setParameter('id', $giteId);

        return $query->getOneOrNullResult();
    }

    // /**
    //  * @return Gite[] Returns an array of Gite objects
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
    public function findOneBySomeField($value): ?Gite
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