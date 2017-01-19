<?php

namespace BoosterBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
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
            ->add('title', TextType::class, array(
                'label' => false,
                'attr'=> array('style'=>'display:none;'),
            ))
            ->add('user1', EntityType::class, array(
                'class' => 'BoosterBundle:User',
                'label' => false,
                'attr'=>array('style'=>'display:none;'),
            ))
            ->add('user2', EntityType::class, array(
                'class' => 'BoosterBundle:User',
                'label' => false,
                'attr'=>array('style'=>'display:none;'),
            ))
            ->add('message', TextType::class, array(
                'label' => false,
                'attr'=>array('style'=>'display:none;'),
            ))
            ->add('createTime', DateTimeType::class, array(
                'label' => false,
                'attr'=>array('style'=>'display:none;'),
            ))
            ->add('user1Read', TextType::class, array(
                'label' => false,
                'attr'=>array('style'=>'display:none;'),
                'data' => 0
            ))
            ->add('user2Read', TextType::class, array(
                'label' => false,
                'attr'=>array('style'=>'display:none;'),
                'data' => 0
            ))
            ->add('save', SubmitType::class, array(
                'label' => 'Répondre',
                'attr'=>array('style'=>'display:none;'),
            ));
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
