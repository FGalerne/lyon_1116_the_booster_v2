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
            ->add('firstname', 'text', array(
                'label'         => "Nom",
                'required'      => true,
            ))
            ->add('lastname', 'text', array(
                'label'         => "Prénom",
                'required'      => true,
            ))
            ->add('professionalfunction', 'text', array(
                'label' => 'Fonction',
                'required'=> true
            ))
            ->add('nameproject', 'text', array(
                'label' => 'Nom du projet/société',
                'required'=> true
            ))
            ->add('typeproject', 'choice', array(
                'label'     => 'Vous êtes :',
                'choices'  => array(1=>'Un porteur de projet', 0 =>'Une société'),
                'expanded' => true,
                'multiple' => false,
                'required' => true
            ))
            ->add('phone', new TelType(), array(
                'label' => 'Téléphone portable',
            ))
            ->add('siretnumber', 'text', array(
                'label' => 'Numéro de Siret',
                'pattern' => '[0-9]{14}'
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