<?php
/**
 * Created by PhpStorm.
 * User: LaurieGandon
 * Date: 24/11/2016
 * Time: 9:38 AM
 */

namespace BoosterBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use BoosterBundle\Form\Type\TelType;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder
            ->add('title', ChoiceType::class, array(
                'label'         => 'Civilité ',
                'required'      => true,
                'choices'       => array('Mr'=>'Mr', 'Mme'=>'Mme')
            ))
            ->add('firstname', TextType::class, array(
                'label'         => "Nom",
                'required'      => true,
            ))
            ->add('lastname', TextType::class, array(
                'label'         => "Prénom",
                'required'      => true,
            ))
            ->add('professionalfunction', TextType::class, array(
                'label' => 'Fonction',
                'required'=> true
            ))
            ->add('nameproject', TextType::class, array(
                'label' => 'Nom du projet/société',
                'required'=> true
            ))
            ->add('typeproject', ChoiceType::class, array(
                'label'     => 'Vous êtes :',
                'choices'  => array(1=>'Un porteur de projet', 0 =>'Une société'),
                'expanded' => true,
                'multiple' => false,
                'required' => true
            ))
            ->add('phone', new TelType(), array(
                'label' => 'Téléphone portable',
                'required' => false,
                'pattern' => "^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$"
            ))
            ->add('siretnumber', TextType::class, array(
                'label' => 'Numéro de Siret',
                'pattern' => '[0-9]{14}',
                'required' => false,
            ))
            ->add('createtime', DateTimeType::class, array(
                'label' => false,
                'attr'=>array('style'=>'display:none;'),
                'data' => new \DateTime()
            ))
            ->remove('username');
    }


    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }
}