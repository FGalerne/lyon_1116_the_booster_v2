<?php
/**
 * Created by PhpStorm.
 * User: LaurieGandon
 * Date: 25/11/2016
 * Time: 3:38 PM
 */

namespace BoosterBundle\Form;

use FOS\UserBundle\Form\Type\RegistrationFormType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

class BoosterRegistrationType extends RegistrationFormType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder
            ->add('title', ChoiceType::class, array(
                'label' => 'Civilité ',
                'required' => true,
                'choices' => array('Mr' => 'Mr', 'Mme' => 'Mme')
            ))
            ->add('firstname', 'text', array(
                'label' => "Nom",
                'required' => true
            ))
            ->add('lastname', 'text', array(
                'label' => "Prénom",
                'required' => true
            ))
            ->remove('username');

    }

    public function getName()
    {
        return "booster_user_booster_registration";
    }

}
