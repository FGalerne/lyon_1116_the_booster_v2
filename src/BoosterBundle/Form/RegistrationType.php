<?php
/**
 * Created by PhpStorm.
 * User: LaurieGandon
 * Date: 24/11/2016
 * Time: 9:38 AM
 */

namespace BoosterBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', 'text', array(
                'label' => "Civilité"
            ))
            ->add('firstname', 'text', array(
                'label' => "Nom"
            ))
            ->add('lastname', 'text', array(
                'label' => "Prénom"
            ))
            ->add('professionalfunction', 'text', array(
                'label' => 'Fonction'
            ))
            ->add('phone', 'text', array(
                'label' => 'Téléphone portable'
            ))
            ->add('siretnumber', 'text', array(
                'label' => 'Numéro de Siret'
            ))
            ->add('typeproject', 'text', array(
                'label' => 'Porteur de projet'
            ))
            ->add('typesociety', 'text', array(
                'label' => 'Société'
            ));

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