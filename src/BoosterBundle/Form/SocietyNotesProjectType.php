<?php
/**
 * Created by PhpStorm.
 * User: LaurieGandon
 * Date: 29/12/2016
 * Time: 11:44 PM
 */

namespace BoosterBundle\Form;


use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NotesProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('societyCommentaries', TextareaType::class, array(
                    'label' => 'Commentaire', 'label_attr' => array('class' => 'project-label-description'),
                    'attr' => array(
                        'class' => 'WYSIWYG form-control form-group',
                        'placeholder' => 'Commentez votre expérience'
                    ),
                    'required' => false,))
            ->add('save', SubmitType::class, array(
                'label' => 'Envoyer',
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