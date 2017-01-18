<?php

namespace BoosterBundle\Form;

use Symfony\Component\Form\AbstractType;
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
                'label' => 'Avatar (format portrait)',
                'required' => false,
                'data_class' => null
                )
            )
            ->add('presentation', TextareaType::class, array(
                'label' => 'Texte de présentation (200 caractères max)',
                'required' => false,
                'attr' => array(
                    'class' => 'WYSIWYG form-control form-group',
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
            ->add('competence1', ChoiceType::class, array(
                'label' => 'competence principale',
                'attr' => array('class' => 'form-control form-group'),
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
                )
            ))
            ->add('competence2', ChoiceType::class, array(
                'label' => 'autre compétence',
                'attr' => array('class' => 'form-control form-group'),
                'choices'  => array(
                    null => 'aucune',
                    'competence1' => 'competence1',
                    'competence2' => 'competence2',
                    'competence3' => 'competence3',
                    'competence4' => 'competence4',
                    'competence5' => 'competence5',
                    'competence6' => 'competence6',
                    'competence7' => 'competence7',
                    'competence8' => 'competence8',
                    'competence9' => 'competence9',
                    'competence10' => 'competence10',
                    'competence11' => 'competence11',
                    'competence12' => 'competence12',
                ),
                'required' => false,
            ))
            ->add('competence3', ChoiceType::class, array(
                'label' => 'autre compétence',
                'attr' => array('class' => 'form-control form-group'),
                'choices'  => array(
                    null => 'aucune',
                    'competence1' => 'competence1',
                    'competence2' => 'competence2',
                    'competence3' => 'competence3',
                    'competence4' => 'competence4',
                    'competence5' => 'competence5',
                    'competence6' => 'competence6',
                    'competence7' => 'competence7',
                    'competence8' => 'competence8',
                    'competence9' => 'competence9',
                    'competence10' => 'competence10',
                    'competence11' => 'competence11',
                    'competence12' => 'competence12',
                ),
                'required' => false,
            ))
            ->add('competence4', ChoiceType::class, array(
                'label' => 'autre compétence',
                'attr' => array('class' => 'form-control form-group'),
                'choices'  => array(
                    null => 'aucune',
                    'competence1' => 'competence1',
                    'competence2' => 'competence2',
                    'competence3' => 'competence3',
                    'competence4' => 'competence4',
                    'competence5' => 'competence5',
                    'competence6' => 'competence6',
                    'competence7' => 'competence7',
                    'competence8' => 'competence8',
                    'competence9' => 'competence9',
                    'competence10' => 'competence10',
                    'competence11' => 'competence11',
                    'competence12' => 'competence12',
                ),
                'required' => false,
            ))
            ->add('competence5', ChoiceType::class, array(
                'label' => 'autre compétence',
                'attr' => array('class' => 'form-control form-group'),
                'choices'  => array(
                    null => 'aucune',
                    'competence1' => 'competence1',
                    'competence2' => 'competence2',
                    'competence3' => 'competence3',
                    'competence4' => 'competence4',
                    'competence5' => 'competence5',
                    'competence6' => 'competence6',
                    'competence7' => 'competence7',
                    'competence8' => 'competence8',
                    'competence9' => 'competence9',
                    'competence10' => 'competence10',
                    'competence11' => 'competence11',
                    'competence12' => 'competence12',
                ),
                'required' => false,
            ))
            ->add('competence6', ChoiceType::class, array(
                'label' => 'autre compétence',
                'attr' => array('class' => 'form-control form-group'),
                'choices'  => array(
                    null => 'aucune',
                    'competence1' => 'competence1',
                    'competence2' => 'competence2',
                    'competence3' => 'competence3',
                    'competence4' => 'competence4',
                    'competence5' => 'competence5',
                    'competence6' => 'competence6',
                    'competence7' => 'competence7',
                    'competence8' => 'competence8',
                    'competence9' => 'competence9',
                    'competence10' => 'competence10',
                    'competence11' => 'competence11',
                    'competence12' => 'competence12',
                ),
                'required' => false,
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
