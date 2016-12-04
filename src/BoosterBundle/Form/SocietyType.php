<?php
/**
 * Created by PhpStorm.
 * User: LaurieGandon
 * Date: 04/12/2016
 * Time: 6:31 PM
 */

namespace BoosterBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SocietyType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('photo')
            ->add('societyName')
            ->add('punchLine')
            ->add('presentation')
            ->add('linkedin')
            ->add('facebook')
            ->add('twitter')
            ->add('youtube')
            ->add('websiteLink')
            ->add('hoursTaken')
            ->add('averageNotation')
            ->add('projectDoneNumber')
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BoosterBundle\Entity\Society'
        ));
    }

    /**
     * @return string
     */
    public function getBlockPrefix()
    {
        return 'boosterbundle_society';
    }

}