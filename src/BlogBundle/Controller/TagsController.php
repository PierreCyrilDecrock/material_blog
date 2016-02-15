<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use BlogBundle\Entity\Tag;
use BlogBundle\Resources\Form\Type\TagType;


class TagsController extends Controller
{
  public function tagsAction(Request $request)
  {
    $repository = $this->getDoctrine()->getRepository('BlogBundle:Category');
    $tags = $repository->findAll();

    return $this->render('BlogBundle:Default:tags.html.twig',['tags'=> $tags]);
  }

  public function newAction(Request $request)
  {

    $tag = new Tag();

    $form = $this->createForm(TagType::class, $tag);

    $form-> handleRequest( $request);

    if($form->isValid()){
      $em = $this-> getDoctrine()->getManager();
      $em->persist($tag);
      $em->flush($tag);

      return $this->redirectToRoute("bundle_newTag");
    }

    return $this->render('BlogBundle:Default:newTag.html.twig',[
      'form' => $form->createView()
    ]);
  }
}
