<?php

namespace BoosterBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjectType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('projectName', TextType::class, array(
            'label' => 'Titre du projet: ', 'label_attr' => array('class' => 'project-label'),
            'attr' => array('class' => 'form-group project-form')
            )
        )->add('category', ChoiceType::class, array(
            'label' => 'Catégorie: ', 'label_attr' => array('class' => 'project-label'),
            'attr' => array('class' => 'form-group project-form'),
                'choices'  => array(
                    'Catégorie 1' => 'Catégorie 1',
                    'Catégorie 2' => 'Catégorie 2',
                    'Catégorie 3' => 'Catégorie 3',
                    'Catégorie 4' => 'Catégorie 4',
                    'Catégorie 5' => 'Catégorie 5',
                ),
                'choices_as_values' => true,
                'choice_label' => function ($currentChoiceKey) {
                    return $currentChoiceKey;
                },
            )
        )->add('description', TextareaType::class, array(
                'label' => 'Décrivez votre projet en moins de 200 caractères.', 'label_attr' => array('class' => 'project-label-description'),
                'attr' => array(
                    'class' => 'WYSIWYG form-control form-group',
                    'placeholder' => 'Décrivez votre projet en moins de 200 caractères.'
                ),
                'required' => false,
            )
        )->add('save', SubmitType::class, array(
            'label' => 'PUBLIER',
            'attr' => array('class' => 'form-submit-center', 'id' => 'submit'),
        ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BoosterBundle\Entity\Project'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'boosterbundle_project';
    }


}
