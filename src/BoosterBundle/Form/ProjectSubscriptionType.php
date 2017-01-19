<?php

namespace BoosterBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjectSubscriptionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('message', TextareaType::class, array(
                'label' => 'Message: (max 200 caractères)  ',
                'attr' => array(
                    'class' => 'WYSIWYG form-control form-group',
                    'placeholder' => "Bonjour, je souhaite vous offrir un coup de boost !"
                ),
                'required'    => false,
                'empty_data'  => "Bonjour, je souhaite vous offrir un coup de boost !"
            ))
            ->add('givenTime', IntegerType::class, array(
                'label' => 'Heures données: ',
                'attr' => array(
                    'class' => 'form-control form-group',
                ),
            ))
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BoosterBundle\Entity\ProjectSubscription'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'boosterbundle_projectsubscription';
    }


}
