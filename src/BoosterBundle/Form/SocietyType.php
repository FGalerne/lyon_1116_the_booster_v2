<?php

namespace BoosterBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SocietyType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('photo', FileType::class, array(
                    'label'     => 'Votre société (format paysage)',
                    'required'  => false,
                    'data_class'=> null,
                    'attr'      =>  array(
                        'class' => 'fieldfoto',
                    ),
                    ))
                ->add('societyName', TextType::class, array(
                    'label' => 'Nom de la société ou du projet',
                    'attr'  => array(
                        'placeholder' => 'Nom de votre société ou de votre projet',
                        'class'       => 'form-control form-group',
                        ),
                    ))
                ->add('websiteLink', TextType::class, array(
                    'label'     => 'URL de votre site internet',
                    'required'  => false,
                    'attr'      => array(
                        'placeholder' => 'Votre site internet',
                        'class'       => 'form-control form-group',
                    ),
                ))
                ->add('punchLine', TextType::class, array(
                    'label'     => "Phrase d'accroche (140 caractères max)",
                    'required'  => false,
                    'attr'      => array(
                        'class' => 'WYSIWYG1 form-control form-group',
                    ),
                ))
                ->add('presentation', TextareaType::class, array(
                    'label'     => 'Texte de présentation de votre société (500 caractères min)',
                    'required'  => false,
                    'attr'      => array(
                        'class' => 'WYSIWYG2 form-control form-group',
                    ),
                ))
                ->add('linkedin', TextType::class, array(
                    'label'     => 'URL page Linkedin',
                    'required'  => false,
                    'attr'      => array(
                        'placeholder' => 'Lien vers votre page Linkedin',
                        'class'       => 'form-control form-group',
                    ),
                ))
                ->add('facebook' , TextType::class, array(
                    'label'     => 'URL page Facebook',
                    'required'  => false,
                    'attr'      => array(
                        'placeholder' => 'Lien vers votre page Facebook',
                        'class'       => 'form-control form-group',
                    ),
                ))
                ->add('twitter', TextType::class, array(
                    'label'     => 'URL profil Twitter',
                    'required'  => false,
                    'attr'      => array(
                        'placeholder' => 'Lien vers votre profil Twitter',
                        'class'       => 'form-control form-group',
                    ),
                ))
                ->add('youtube', TextType::class, array(
                    'label'     => 'URL page Youtube',
                    'required'  => false,
                    'attr'      => array(
                        'placeholder' => 'Lien vers votre page Youtube',
                        'class'       => 'form-control form-group',
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
            'data_class' => 'BoosterBundle\Entity\Society'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'boosterbundle_society';
    }


}
