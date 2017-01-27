<?php

namespace BoosterBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NotesSocietyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //Form to allow Boosters to vote and comment about the Boosté/Society at the end of the project
        //The vote from this form is sent to the table Society
        $builder
            ->add('societyNote', HiddenType::class, array(
                'label' => 'Attribuez une note au Boosté : ',
                'attr' => array(
                    'class' => 'form-control form-group',
                ),
                'required'    => true
            ))

            ->add('societyCommentaries', TextareaType::class, array(
                'label' => "Écrivez un commentaire à propos du Boosté (Attention, ce commentaire sera public) :",
                'attr' => array(
                    'class' => 'form-control form-group',
                    'placeholder' => 'Écrivez votre commentaire'
                ),
                'required'    => true
            ))

            ->add('save', SubmitType::class, array(
                'label' => 'Envoyer',
                'attr' => array('class' => 'form-submit-center form_btn'),
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BoosterBundle\Entity\ProjectSubscription'
        ));
    }

    public function getName()
    {
        return 'booster_bundle_notes_society_type';
    }
}
