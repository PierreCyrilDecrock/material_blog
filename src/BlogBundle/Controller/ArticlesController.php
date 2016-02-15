<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use BlogBundle\Entity\Article;


class ArticlesController extends Controller
{
  public function articlesAction(Request $request)
  {
    $repository = $this->getDoctrine()->getRepository('BlogBundle:Article');
    $articles = $repository->findAll();

    return $this->render('BlogBundle:Default:articles.html.twig',['articles'=> $articles]);
  }

  // public function postAction($id)
  // {
  //   $repository = $this->getDoctrine()->getRepository('bundleBundle:Post');
  //   $post = $repository->monFind($id);
  //
  //   $likeManager = $this->get('bundlebundle.likemanager');
  //   $likes = $likeManager->getLikes($post);
  //
  //
  //   return $this->render('bundleBundle:Default:post.html.twig',['post'=> $post, 'likes'=> $likes]);
  // }
  //
  // public function newAction(Request $request)
  // {
  //
  //   if($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')){
  //     //Faire ceci celà si un utilisateur est connecté
  //   }
  //
  //   $user = $this->get('security.token_storage')->getToken()->getUser();
  //
  //   $post = new Post();
  //
  //   $post->setAuthor($user);
  //
  //   $form = $this->createForm(PostType::class, $post);
  //
  //   $form-> handleRequest( $request);
  //
  //   if($form->isValid()){
  //     $em = $this-> getDoctrine()->getManager();
  //     $em->persist($post);
  //     $em->flush($post);
  //
  //     return new Response('ok');
  //   }
  //
  //   return $this->render('bundleBundle:Default:new.html.twig',[
  //     'form' => $form->createView()
  //   ]);
  // }
}
