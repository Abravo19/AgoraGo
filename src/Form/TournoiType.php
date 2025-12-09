<?php

namespace App\Form;

use App\Entity\Tournoi;
use App\Entity\CatTournois;
use App\Entity\Participant;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\DateType;

class TournoiType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('libelle')
            ->add('date', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Date du tournoi'
            ])
            ->add('categorie')
            ->add('participants', EntityType::class, [
                'class' => Participant::class,
                'choice_label' => fn (Participant $p) => $p->getPrenom().''.$p->getNom(),
                'multiple' => true,
                'expanded' => false,
                'by_reference' => false,
                'required' => false,
                'label' => 'Participants (optionnel)'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Tournoi::class,
        ]);
    }
}
