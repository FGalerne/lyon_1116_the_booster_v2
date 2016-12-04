<?php
/**
 * Created by PhpStorm.
 * User: LaurieGandon
 * Date: 04/12/2016
 * Time: 6:31 PM
 */

namespace BoosterBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class SocietyType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('photo')
            ->add('societyName')
            ->add('punchLine')
            ->add('presentation')
            ->add('linkedin')
            ->add('facebook')
            ->add('twitter')
            ->add('youtube')
            ->add('websiteLink')
            ->add('hoursTaken')
            ->add('averageNotation')
            ->add('projectDoneNumber')
        ;
    }




}