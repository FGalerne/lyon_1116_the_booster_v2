<?php
/**
 * Created by PhpStorm.
 * User: LaurieGandon
 * Date: 24/11/2016
 * Time: 4:27 PM
 */

namespace BoosterBundle\Form;

use BoosterBundle\Form\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

class ProfileFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder
			->add('last_name', TextType::class,array (
				'required' => true,
			))
			->add('first_name', TextType::class,array (
		'required' => true,))
			->add('title', ChoiceType::class, array(
				'choices' => array(
					'MR' => "Mr",
					'MME' => "Mme",
				),
			))
			->add('professional_function', TextType::class,array (
				'required' => true,))
			->add('phone', new TelType(), array(
				'required' => false,
				'pattern' => "^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$"
			))
			->remove('username')
        	->remove('email')
        	->remove('current_password');

    }



    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\ProfileFormType';
    }

    public function getBlockPrefix()
    {
        return 'app_user_profile';
    }
	protected function buildUserForm(FormBuilderInterface $builder, array $options)
	{
		$builder

			->add('username', null, array('label' => 'form.username', 'translation_domain' => 'FOSUserBundle'))
			->remove('email', LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\EmailType'), array('label' => 'form.email', 'translation_domain' => 'FOSUserBundle'))
		;
	}
}