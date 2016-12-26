<?php

namespace BoosterBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Routing\Tests\Generator\UrlGeneratorTest;

class SocietyType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('photo')
                ->add('societyName', TextType::class, array(
                    'label' => 'Nom de la société ou du projet',
                    'attr'  => array(
                        'placeholder' => 'Nom de votre société ou de votre projet'
                        ),
                    ))

                ->add('websiteLink', TextType::class, array(
                    'label' => 'Site internet',
                    'attr'  => array(
                        'placeholder' => 'URL du site internet'
                    ),
                ))
                ->add('punchLine', TextType::class, array(
                    'label' => 'Phrase courte de présentation (140 caractères max)',
                    'required' => false,
                    'attr'  => array(
                        'class' => 'WYSIWYG1 form-control form-group',
                    ),
                ))
                ->add('presentation', TextareaType::class, array(
                    'label' => 'Texte de présentation de votre société (500 caractères max)',
                    'required' => false,
                    'attr'  => array(
                        'class' => 'WYSIWYG2 form-control form-group',
                    ),
                ))
                ->add('linkedin', TextType::class, array(
                    'label' => 'Profil Linkedin',
                    'required' => false,
                    'attr'  => array(
                        'placeholder' => 'Lien vers votre profil société Linkedin'
                    ),
                ))
                ->add('facebook' , TextType::class, array(
                    'label' => 'Page Facebook',
                    'required' => false,
                    'attr'  => array(
                        'placeholder' => 'Lien vers votre page Facebook'
                    ),
                ))
                ->add('twitter', TextType::class, array(
                    'label' => 'Profil Twitter',
                    'required' => false,
                    'attr'  => array(
                        'placeholder' => 'Lien vers votre profil Twitter'
                    ),
                ))
                ->add('youtube', TextType::class, array(
                    'label' => 'Profil Youtube',
                    'required' => false,
                    'attr'  => array(
                        'placeholder' => 'Lien vers votre profil Youtube'
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
