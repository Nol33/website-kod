<?php

namespace App\Repository;

use App\Entity\Pack;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Pack|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pack|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pack[]    findAll()
 * @method Pack[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PackRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pack::class);
    }

    // /**
    //  * @return Pack[] Returns an array of Pack objects
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
    public function findOneBySomeField($value): ?Pack
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function getByAll($duree = '', $nb_personnes = '')
    {

        //le query builder permet de faire ta requete sql

        $queryBuilder = $this->createQueryBuilder('o');

        $query = $queryBuilder->select('o')
            ->where('o.duree LIKE :duree')
            ->setParameter('duree')
            ->andWhere('o.nb_personnes LIKE :nb_personnes')
            ->setParameter('Nb_personnes');


        $query = $queryBuilder->getQuery();

        $result = $query->getArrayResult();


        return $result;
    }




    public function getByDuree($duree, $titre)
    {

// Récupérer le query builder (car c'est le query builder
// qui permet de faire la requête SQL)
        $queryBuilder = $this->createQueryBuilder('a');

// Construire la requête façon SQL, mais en PHP
// Traduire la requête en véritable requête SQL

        $query = $queryBuilder->select('a')
            ->where('a.duree LIKE :duree')
            ->setParameter('duree', '%'.$duree.'%')
            ->andWhere('a.titre LIKE :titre')
            ->setParameter('titre', '%'.$titre.'%');


        $query = $queryBuilder->getQuery();
// Executer la requête SQL en base de données pour récupérer la durée
        $result = $query->getArrayResult();

        return $result;
    }

}
