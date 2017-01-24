<?php

namespace BoosterBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NotesBoosterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //Form to allow Boostés/Society to vote and comment about the Booster at the end of the project
        //The vote from this form is sent to the table Booster
        $builder
            ->add('boosterCommentaries', TextareaType::class, array(
                'label' => 'Écrivez un commentaire à propos du Booster : ',
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
        return 'booster_bundle_notes_booster_type';
    }
}
