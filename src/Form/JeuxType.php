<?php

namespace App\Form;

use App\Entity\Jeux;
use App\Entity\Genre;
use App\Entity\Plateforme;
use App\Entity\Pegi;
use App\Entity\Marque;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JeuxType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('description')
            ->add('genre', EntityType::class, [
                'class' => Genre::class,
                'choice_label' => 'libGenre',
                'placeholder' => 'Sélectionnez un genre',
                'required' => false,
            ])
            ->add('plateforme', EntityType::class, [
                'class' => Plateforme::class,
                'choice_label' => 'libPlateforme',
                'placeholder' => 'Sélectionnez une plateforme',
                'required' => false,
            ])
            ->add('pegi', EntityType::class, [
                'class' => Pegi::class,
                'choice_label' => 'agePegi',
                'placeholder' => 'Sélectionnez un PEGI',
                'required' => false,
            ])
            ->add('marque', EntityType::class, [
                'class' => Marque::class,
                'choice_label' => 'nomMarque',
                'placeholder' => 'Sélectionnez une marque',
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Jeux::class,
        ]);
    }
}
