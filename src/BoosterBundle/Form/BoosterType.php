<?php

namespace BoosterBundle\Form;

use Symfony\Component\Form\AbstractType;
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
            ->add('photo')
            ->add('city')
            ->add('zipCode')
            ->add('birthDate', 'date', array(
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
            ->add('presentation')
            ->add('hoursGiven')
            ->add('projectDoneNumber')
            ->add('averageNotation')
            ->add('user')
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
