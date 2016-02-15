<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use BlogBundle\Entity\Category;
use BlogBundle\Resources\Form\Type\CategoryType;


class CategoriesController extends Controller
{
  public function categoriesAction(Request $request)
  {
    $repository = $this->getDoctrine()->getRepository('BlogBundle:Category');
    $categories = $repository->findAll();

    return $this->render('BlogBundle:Default:categories.html.twig',['categories'=> $categories]);
  }

  public function newAction(Request $request)
  {

    $category = new Category();

    $form = $this->createForm(ArticleType::class, $category);

    $form-> handleRequest( $request);

    if($form->isValid()){
      $em = $this-> getDoctrine()->getManager();
      $em->persist($category);
      $em->flush($category);

      return new Response('ok');
    }

    return $this->render('BlogBundle:Default:newCategory.html.twig',[
      'form' => $form->createView()
    ]);
  }
}
