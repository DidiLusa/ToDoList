<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Tache;
use App\Entity\Categorie;
use App\Form\TacheFormType;

class TacheController extends AbstractController
{
    /**
     * @Route("/creer/tache", name="new_tache")
     */
    public function newTache(Request $req)
    {
        //On récupère le user pour avoir son Id
//        $createur = $this->getUser();
//        $entityManager = $this->getDoctrine()->getManager();
//        //créer un objet tache pour accéder à ses setter: 
//            $date = new \DateTime('@'.strtotime('now'));
        $tache = new Tache();
//        $tache->setLibelle('manger une glace avec maman');
//        $tache->setStatut(1);
//        $tache->setJour($date);
//        $tache->setCreateur($createur);
//        
//  
//        $entityManager->persist($tache);
//        $entityManager->persist($createur);
//        $entityManager->flush();
        
       
       
      //creer le formulaire : 
       $form =  $this->createForm(TacheFormType::class, $tache,
               ['action'=>$this->generateUrl("new_tache"),
                'method'=>'POST']);
       $form->handleRequest($req);
       
        //si le formulaire est soumis et valide : 
        if($form->isSubmitted() && $form->isValid()){
            $createur = $this->getUser();
            $entityManager = $this->getDoctrine()->getManager();
            
       //On récupère les données du form: 
            $new_tache = $form->getData();
             //le createur dans la table
            $new_tache->setCreateur($createur);
             //ajouter les nouvelles taches
            $createur->addTachesCree($new_tache);
            
            //le statut est binaire et toujours 1 au départ :
            $new_tache->setStatut(1);
            
            //stocker la nouvelle tache dans la DB:
            $em = $this->getDoctrine()->getManager();
            $em->persist($new_tache);
            $em->persist($createur);
            $em->flush();
            
            return new Response("Nouvelle tache ok");
         
        }
        else{
          $vars = ['form'=>$form->createView()];
//       var_dump($vars);
          return $this->render('/tache/tache_form.html.twig', $vars);  
        }
       
       
       
       
       
       
       
       
    }
    /**
     *@Route("/db/gestion/categorie" ,name="new_cat") 
     */
    public function gestionCategorie(){
        //obtenir doctrine
        $db = $this->getDoctrine()->getManager();
        
        //le repo concerne :
        $rep = $db->getRepository(Categorie::class);
        //la methode du repo : 
        $rep->choixCategorie();
        //envoie d'une réponse une fois que c'est fait : 
        return new Response("Catégories ajoutées");
        
        
    }
}
