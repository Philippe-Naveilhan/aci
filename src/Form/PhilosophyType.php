<?php

namespace App\Form;

use App\Entity\Philosophy;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class PhilosophyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('leftPictureFile', VichImageType::class, [
                'required' => false,
                'help'=> 'le fichier ne doit pas dépasser 2Mo',
                'allow_delete' => false,
                'download_uri' => true,
                'download_link' => false,
            ])
            ->add('rightPictureFile', VichImageType::class, [
                'required' => false,
                'help'=> 'le fichier ne doit pas dépasser 2Mo',
                'allow_delete' => false,
                'download_uri' => true,
                'download_link' => false,
            ])
            ->add('text', TextareaType::class, [
                'attr' => ['class'=>'formHeight2 col-12']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Philosophy::class,
        ]);
    }
}
