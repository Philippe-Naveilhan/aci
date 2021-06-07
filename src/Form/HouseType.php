<?php

namespace App\Form;

use App\Entity\House;
use App\Entity\Characteristic;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class HouseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('zipcode')
            ->add('city')
            ->add('public')
            ->add('description', TextareaType::class, [
                'attr' => ['class'=>'formHeight2 col-12']
            ])
            ->add('price')
            ->add('locality')
            ->add('rooms')
            ->add('surface')
            ->add('connexion')
            ->add('firstPictureFile', VichImageType::class, [
                'required' => false,
                'help'=> 'le fichier ne doit pas dépasser 2Mo',
                'allow_delete' => false,
                'download_uri' => true,
                'download_link' => false,
            ])
            ->add('picturesFiles', FileType::class, [
                'label'=>false,
                'multiple'=>true,
                'mapped'=>false,
                'required' => false
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => House::class,
        ]);
    }
}
