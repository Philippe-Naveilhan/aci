<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('address')
            ->add('zipcode')
            ->add('city')
            ->add('phone')
            ->add('mail')
            ->add('staff')
            ->add('pictureFile', VichImageType::class, [
                'required' => false,
                'help'=> 'le fichier ne doit pas dépasser 2Mo',
                'allow_delete' => false,
                'download_uri' => true,
                'download_link' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
