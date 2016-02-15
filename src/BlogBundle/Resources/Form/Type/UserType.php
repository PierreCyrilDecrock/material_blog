<?php

namespace BlogBundle\Resources\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, array('label' => 'Username'))
            ->add('password', PasswordType::class, array('label' => 'Password'))
            ->add('email', EmailType::class, array('label' => 'Email'))
            ->add('create', SubmitType::class, array('label' => 'Inscription'))
        ;
    }
}
