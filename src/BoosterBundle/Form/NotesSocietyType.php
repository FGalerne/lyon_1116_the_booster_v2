<?php

namespace BoosterBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NotesSocietyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('societyNote', IntegerType::class, array(
                'label' => 'Attribuez une note au Booster : ',
                'attr' => array(
                    'class' => 'form-control form-group',
                ),
                'required'    => true
            ))

            ->add('societyCommentaries', TextareaType::class, array(
                'label' => 'Écrivez un commentaire à propos du Booster : ',
                'attr' => array(
                    'class' => 'form-control form-group',
                    'placeholder' => 'Écrivez votre commentaire'
                ),
                'required'    => true
            ))

            ->add('save', SubmitType::class, array(
                'label' => 'Envoyer',
                'attr' => array('class' => 'form-submit-center'),
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
