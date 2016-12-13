<?php

namespace BoosterBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MessengerType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', 'text', array(
                'label' => false,
                'attr'=>array('style'=>'display:none;'),
            ))
            ->add('user1', 'text', array(
                'label' => false,
                'attr'=>array('style'=>'display:none;'),
            ))
            ->add('user2', 'text', array(
                'label' => false,
                'attr'=>array('style'=>'display:none;'),
            ))
            ->add('message')
            ->add('createTime', 'datetime', array(
                'label' => false,
                'attr'=>array('style'=>'display:none;'),
                'data' => new \DateTime()
            ))
            ->add('user1Read', 'text', array(
                'label' => false,
                'attr'=>array('style'=>'display:none;'),
                'data' => 0
            ))
            ->add('user2Read', 'text', array(
                'label' => false,
                'attr'=>array('style'=>'display:none;'),
                'data' => 0
            ))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BoosterBundle\Entity\Messenger'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'boosterbundle_messenger';
    }


}
