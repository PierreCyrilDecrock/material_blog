<?php

namespace BlogBundle\Resources\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array('label' => 'Titre'))
            ->add('summary', TextType::class, array('label' => 'Résumé'))
            ->add('content', TextType::class, array('label' => 'Contenu'))
            ->add('author', TextType::class, array('label' => 'Auteur'))
            ->add('publishedAt', DateType::class, array('label' => 'Date de publication', 'widget' => 'single_text', 'format' => 'yyyy-MM-dd',))
            ->add('category', TextType::class, array('label' => 'Catégorie'))
            ->add('tags', TextType::class, array('label' => 'Tags'))
            ->add('create', SubmitType::class, array('label' => 'Création'))

        ;
    }
}
