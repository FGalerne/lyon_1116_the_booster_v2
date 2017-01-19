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
                    'category_1'  => 'Marketing',
                    'category_2'  => 'Communication',
                    'category_3'  => 'Développement Commercial',
                    'category_4'  => 'Gestion financière (finance, comptabilité, …)',
                    'category_5'  => 'Projet de financement, d’Investissement',
                    'category_6'  => 'Ressources Humaines',
                    'category_7'  => 'Digital',
                    'category_8'  => 'Innovation',
                    'category_9'  => 'Développement International',
                    'category_10' => 'Design et Graphisme (logo, marque, …)',
                    'category_11' => 'Juridique',
                    'category_12' => 'Numérique (site internet, application, …)',
                ),
                'choices_as_values' => true,
                'choice_label' => function ($currentChoiceKey) {
                    return $currentChoiceKey;
                },
            )
        )->add('description', TextareaType::class, array(
                'label' => 'Décrivez votre projet (200 caractères max)', 'label_attr' => array('class' => 'project-label-description'),
                'attr' => array(
                    'class' => 'WYSIWYG form-control form-group',
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
