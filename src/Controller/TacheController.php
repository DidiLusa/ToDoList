<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Tache;
use App\Entity\User;

class TacheController extends AbstractController
{
    /**
     * @Route("/creer/tache", name="new_tache")
     */
    public function creerTache()
    {
        //methode à la main pour teste le insert
        
        //On récupère le user pour avoir son Id
        $user = $this->getUser();
        $id = $user->getId();
        
        $entityManager = $this->getDoctrine()->getManager();
        
        //créer un objet tache pour accéder à ses setter: 
        $tache = new Tache();
        $tache->setLibelle('manger une glace avec maman');
        $tache->setStatut('1');
        $tache->setJour(05/03/2020);
        $tache->setCreateur($id);
        
        $entityManager->persist($tache);
        $entityManager->flush();
        
        
        return $this->render('tache/index.html.twig');
    }
}
