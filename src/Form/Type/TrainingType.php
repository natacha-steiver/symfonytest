<?php
// src/Form/Type/TrainingType.php
namespace App\Form\Type;
use App\Entity\User;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class TrainingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
         /*   
               ->add('user', EntityType::class, [
            'class' => User::class,
          
            'query_builder' => function (EntityRepository $er) {
                return $er->createQueryBuilder('u')
                    ->orderBy('u.firstname', 'ASC');
            },
            'choice_label' => 'firstname',
        ])
        */
/*
        ->add('user', EntityType::class, [
            'class' => User::class,
          
            'query_builder' => function (EntityRepository $er) {
                return $er->createQueryBuilder('u')
                    ->orderBy('u.id', 'ASC');
            },
            'choice_label' => 'id',
        ])

     */

            ->add('title', TextType::class)
            ->add('description', TextType::class)
            ->add('video', TextType::class)
            ->add('imageFile', VichImageType::class)
            ->add('save', SubmitType::class)
        ;
    }
}