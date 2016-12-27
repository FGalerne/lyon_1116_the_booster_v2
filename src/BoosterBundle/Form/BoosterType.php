<?php

namespace BoosterBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BoosterType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('photo', FileType::class, array(
                'label' => 'Votre photo ou Avatar',
            ))
            ->add('presentation', TextareaType::class, array(
                'label' => 'Texte de présentation',
                'attr'  => array(
                    'placeholder' => 'Présentez-vous'
                ),
            ))
            ->add('zipCode', NumberType::class, array(
                'label' => 'Code Postal',
                'attr'  => array(
                    'placeholder' => 'Code Postal'
                ),
            ))
            ->add('city', TextType::class, array(
                'label' => 'Ville',
                'attr'  => array(
                    'placeholder' => 'Ville'
                ),
            ))
            ->add('birthDate', DateTimeType::class, array(
                'years' => range(1950, 2020),
                'format' => 'ddMMyyyy',
            ))
            ->add('workStatus')
            ->add('competence1')
            ->add('competence2')
            ->add('competence3')
            ->add('competence4')
            ->add('competence5')
            ->add('competence6')
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BoosterBundle\Entity\Booster'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'boosterbundle_booster';
    }


}
