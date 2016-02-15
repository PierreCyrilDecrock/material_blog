<?php

namespace BlogBundle\Resources\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class CommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('author', TextType::class, array('label' => 'Auteur'))
            ->add('content', TextType::class, array('label' => 'Content'))
            ->add('create', SubmitType::class, array('label' => 'Envoyer'))
        ;
    }
}
