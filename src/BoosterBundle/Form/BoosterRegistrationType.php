<?php
	/**
	 * Created by PhpStorm.
	 * User: apprenti
	 * Date: 25/11/16
	 * Time: 11:18
	 */

	namespace BoosterBundle\Form;

	use FOS\UserBundle\Form\Type\RegistrationFormType;
	use Symfony\Component\Form\FormBuilderInterface;

	class BoosterRegistrationType extends RegistrationFormType
	{
		public function buildForm(FormBuilderInterface $builder, array $options)
		{
			parent::buildForm($builder, $options);
			$builder
				->add('title', 'text', array(
				'label' => "Civilité"))

				->add('siretnumber', 'text', array(
				'label' => 'Numéro de Siret'
				))
				->add('typeproject', 'checkbox', array(
				'label' => 'Porteur de projet'
				))

				->remove('username');

		}

		public function getName()
		{
			return "booster_user_booster_registration";

		}
	}


