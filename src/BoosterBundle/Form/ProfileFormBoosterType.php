<?php
	/**
	 * Created by PhpStorm.
	 * User: apprenti
	 * Date: 20/01/17
	 * Time: 11:51
	 */

	namespace BoosterBundle\Form;

	use Symfony\Component\Form\Extension\Core\Type\TextType;

	use Symfony\Component\Form\AbstractType;
	use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
	use Symfony\Component\Form\FormBuilderInterface;


	class ProfileFormBoosterType extends AbstractType
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
						'MR' => "M.",
						'MME' => "Mme",
					),
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