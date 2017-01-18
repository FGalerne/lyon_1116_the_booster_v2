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
                    'Catégorie 1'  => 'Marketing',
                    'Catégorie 2'  => 'Communication',
                    'Catégorie 3'  => 'Développement Commercial',
                    'Catégorie 4'  => 'Gestion financière (finance, comptabilité, …)',
                    'Catégorie 5'  => 'Projet de financement, d’Investissement',
                    'Catégorie 6'  => 'Ressources Humaines',
                    'Catégorie 7'  => 'Digital',
                    'Catégorie 8'  => 'Innovation',
                    'Catégorie 9'  => 'Développement International',
                    'Catégorie 10' => 'Design et Graphisme (logo, marque, …)',
                    'Catégorie 11' => 'Juridique',
                    'Catégorie 12' => 'Numérique (site internet, application, …)',
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
