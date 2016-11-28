<?php

namespace BoosterBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use EWZ\Bundle\RecaptchaBundle\Form\Type\EWZRecaptchaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ContactType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
                'label' => 'Nom: ',
                'attr' => array(
                    'class' => 'form-control form-group',
                    'placeholder' => 'Nom'
                ),
            ))
            ->add('surname', TextType::class, array(
                'label' => 'Prénom: ',
                'attr' => array(
                    'class' => 'form-control form-group',
                    'placeholder' => 'Prénom'
                ),
            ))
            ->add('email', EmailType::class, array(
                'label' => 'Email: ',
                'attr' => array(
                    'class' => 'form-control form-group',
                    'placeholder' => 'Email'
                ),
            ))
            ->add('type', ChoiceType::class, array(
                'label' => 'Type de demande: ',
                'attr' => array('class' => 'form-control form-group'),
                'choices'  => array(
                    'Press' => 'Press',
                    'RH' => 'RH',
                    'Infos générales' => 'Infos générales',
                    'Problème de paiement' => 'Problème de paiement',
                    'Problème technique' => 'Problème technique',
                ),
                'choices_as_values' => true,
                'choice_label' => function ($currentChoiceKey) {
                    return $currentChoiceKey;
                },
                ))
            ->add('subject', TextType::class, array(
                'label' => 'Sujet: ',
                'attr' => array(
                    'class' => 'form-control form-group',
                    'placeholder' => 'Sujet'
                ),
            ))
            ->add('message', TextareaType::class, array(
                'label' => 'Message: ',
                'attr' => array(
                    'class' => 'WYSIWYG form-control form-group',
                    'placeholder' => 'Message'
                ),
                'required'    => false,
                'empty_data'  => "L'utilisateur n'a pas laissé de message"
            ))
            ->add('save', SubmitType::class, array(
                'label' => 'Envoyer',
                'attr' => array('class' => 'form-submit-right'),
            ))
            ->add('recaptcha', EWZRecaptchaType::class, array(
                'label' => ' ',
                'attr' => array(
                    'options' => array(
                        'theme' => 'clean',
                        'type'  => 'image',
                        'size'  => 'normal'
                    )
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
            'data_class' => 'BoosterBundle\Entity\Contact'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'contactForm';
    }
}