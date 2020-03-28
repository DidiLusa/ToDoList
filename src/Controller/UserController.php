<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\App\Entity\User;

class UserController extends AbstractController
{

    /**
     * @Route("/user/compte", name="user_compte")
     */
    public function userCompte()
    {
 //on crée un objet de la classe user pour avoir accès à ses getter et setter:
        $user = $this->getUser();
        
        $vars = ['user'=>$user];
        
        
        return $this->render('user/index.html.twig',$vars);
    }
}
