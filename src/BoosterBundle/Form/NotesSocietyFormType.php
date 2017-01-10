<?php
/**
 * Created by PhpStorm.
 * User: LaurieGandon
 * Date: 09/01/2017
 * Time: 5:59 PM
 */

namespace BoosterBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NotesSocietyFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('societyNote', IntegerType::class, array(
                'label'     => 'Attribuez une note au Boosté : ',
                'required'  => true,
                'class'     => 'form-control form-group'
            ))
            ->add('societyCommentaries', TextareaType::class, array(
                'label'     => 'Écrivez un commentaire à propos du boosté : ',
                'attr'      => array(
                    'class'         => 'form-control form-group',
                    'placeholder'   => 'Message',
                    'max-lenght'    => 300
                ),
                'required'  => true
            ))
            ->add('save', SubmitType::class, array(
                'label'     => 'Envoyer',
                'attr'      => array('class' => 'form-submit-right')
            ))
        ;
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