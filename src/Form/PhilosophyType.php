<?php

namespace App\Form;

use App\Entity\Philosophy;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PhilosophyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('leftPicture')
            ->add('rightPicture')
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
