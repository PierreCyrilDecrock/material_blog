<?php

namespace BlogBundle\Resources\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array('label' => 'Titre'))
            ->add('summary', TextType::class, array('label' => 'Résumé'))
            ->add('content', TextType::class, array('label' => 'Contenu'))
            ->add('publishedAt', DateType::class, array('label' => 'Date de publication', 'widget' => 'single_text', 'format' => 'yyyy-MM-dd',))
            ->add('category', EntityType::class, array(
              'class' => 'BlogBundle:Category',
              'choice_label' => 'name',
            ))
            ->add('tags', EntityType::class, array(
              'class' => 'BlogBundle:Tag',
              'choice_label' => 'name',
              'multiple' => 'true',
            ))
            ->add('create', SubmitType::class, array('label' => 'Création'))

        ;
    }
}
