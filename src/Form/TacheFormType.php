<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use App\Repository\CategorieRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Categorie;


use Symfony\Component\Form\FormBuilderInterface;


class TacheFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle', TextType::class,['label'=>'Votre tâche'])
            ->add('jour',DateType::class,['label'=>'Date'])
            ->add('heure_debut', TimeType::class,['label' => 'Heure du début'])
            ->add('heure_fin', TimeType::class,['label' => 'Heure de fin'])
            ->add ('categorie', EntityType::class, 
                    ['class' => Categorie::class,
                    'query_builder' => function (CategorieRepository $er){return 
                    $er->createQueryBuilder('u')->orderBy('u.nom','DESC');
                    },'choice_label' => function ($x){return ($x->getNom());}])
        ;
    }
    
    

    
}


