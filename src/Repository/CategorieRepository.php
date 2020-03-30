<?php

namespace App\Repository;

use App\Entity\Categorie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Categorie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Categorie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Categorie[]    findAll()
 * @method Categorie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategorieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Categorie::class);
    }

    // /**
    //  * @return Categorie[] Returns an array of Categorie objects
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
    public function findOneBySomeField($value): ?Categorie
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    
    public function choixCategorie(){
        
        //obtenir doctrine pour insérer dans la db : 
        $db = $this->getEntityManager();
        
        $cat1 = new Categorie();
        $cat1->setNom('Sport');
        $cat2 = new Categorie();
        $cat2->setNom('Boulot');
        $cat3 = new Categorie();
        $cat3->setNom('Formation');
        $cat4 = new Categorie();
        $cat4->setNom('Famille');
        $cat5 = new Categorie();
        $cat5->setNom('Loisir');
        $cat6 = new Categorie();
        $cat6->setNom('Course');
        $cat7 = new Categorie();
        $cat7->setNom('Autre');
        
        $db->persist($cat1);
        $db->persist($cat2);
        $db->persist($cat3);
        $db->persist($cat4);
        $db->persist($cat5);
        $db->persist($cat6);
        $db->persist($cat7);
        
        $db->flush();
    }
}
