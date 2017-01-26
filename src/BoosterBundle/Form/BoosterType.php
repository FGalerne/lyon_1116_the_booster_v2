<?php

namespace BoosterBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
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
                'label'     => 'Avatar (Format portrait)',
                'required'  => false,
                'data_class'=> null,
                'attr'      => array(
                    'class' => 'fieldfoto',
                ),
            ))
            ->add('presentation', TextareaType::class, array(
                'label'     => 'Phrase de présentation (200 caractères max)',
                'required'  => false,
                'attr'      => array(
                    'class' => 'WYSIWYG form-control form-group fieldt',
                ),
            ))
            ->add('zipCode', NumberType::class, array(
                'label' => 'Code Postal',
                'attr'  => array(
                    'placeholder' => 'Code Postal',
                    'class'       => 'form-control form-group',
                ),
            ))
            ->add('city', TextType::class, array(
                'label' => 'Ville',
                'attr'  => array(
                    'placeholder' => 'Ville',
                    'class'       => 'form-control form-group',
                ),
            ))
            ->add('birthDate', BirthdayType::class, array(
                'label' => 'Date de Naissance',
                'years' => range(1950, 2020),
                'format'=> ('D'-'m'-'Y'),
                'attr'  => array(
                    'class' => 'fieldbirthd',
                ),
            ))
            ->add('workStatus', ChoiceType::class, array(
                'label'     => 'Je suis',
                'attr'      => array('class' => 'form-control form-group'),
                'choices'   => array(
                    'student'       =>  'Étudiant',
                    'employee'      =>  'Employé du secteur privé',
                    'unemployed'    =>  'Entre 2 jobs',
                    'public_service'=>  'Fonction publique',
                    'independent'   =>  'Indépendant',
                    'entrepreneur'  =>  'Entrepreneur',
                    'senior'        =>  'Senior',
                ),
                'required'          => true,
                'choices_as_values' => true,
                'choice_label'      => function ($currentChoiceKey) {
                    return $currentChoiceKey;
                },
            ))

            ->add('competence1', ChoiceType::class, array(
                'label'     => 'Compétence principale',
                'attr'      => array('class' => 'form-control form-group'),
                'choices'   => array(
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
                'choice_label'      => function ($currentChoiceKey) {
                    return $currentChoiceKey;
                },
            ))

            ->add('competence2', ChoiceType::class, array(
                'label'     => 'Autre compétence',
                'attr'      => array('class' => 'form-control form-group'),
                'choices'   => array(
                    null          => 'Aucune',
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
                'required'          => false,
                'choices_as_values' => true,
                'choice_label'      => function ($currentChoiceKey) {
                    return $currentChoiceKey;
                },
            ))

            ->add('competence3', ChoiceType::class, array(
                'label'     => 'Autre compétence',
                'attr'      => array('class' => 'form-control form-group'),
                'choices'   => array(
                    null          => 'Aucune',
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
                'required'          => false,
                'choices_as_values' => true,
                'choice_label'      => function ($currentChoiceKey) {
                    return $currentChoiceKey;
                },
            ))

            ->add('competence4', ChoiceType::class, array(
                'label'     => 'Autre compétence',
                'attr'      => array('class' => 'form-control form-group'),
                'choices'   => array(
                    null          => 'Aucune',
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
                'required'          => false,
                'choices_as_values' => true,
                'choice_label'      => function ($currentChoiceKey) {
                    return $currentChoiceKey;
                },
            ))

            ->add('competence5', ChoiceType::class, array(
                'label'     => 'Autre compétence',
                'attr'      => array('class' => 'form-control form-group'),
                'choices'   => array(
                    null          => 'aucune',
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
                'required'          => false,
                'choices_as_values' => true,
                'choice_label'      => function ($currentChoiceKey) {
                    return $currentChoiceKey;
                },
            ))

            ->add('competence6', ChoiceType::class, array(
                'label'     => 'Autre compétence',
                'attr'      => array(
                    'class' => 'form-control form-group',
                ),
                'choices'   => array(
                    null          => 'Aucune',
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
                'required' => false,
                'choices_as_values' => true,
                'choice_label' => function ($currentChoiceKey) {
                    return $currentChoiceKey;
                },
            ))
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
