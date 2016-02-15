<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use BlogBundle\Entity\Article;
use BlogBundle\Resources\Form\Type\ArticleType;


class ArticlesController extends Controller
{
  public function articlesAction(Request $request)
  {
    $repository = $this->getDoctrine()->getRepository('BlogBundle:Article');
    $articles = $repository->findAll();

    return $this->render('BlogBundle:Default:articles.html.twig',['articles'=> $articles]);
  }

  public function articleAction($id)
  {
    $repository = $this->getDoctrine()->getRepository('BlogBundle:Article');
    $article = $repository->findOne($id);

    return $this->render('BlogBundle:Default:article.html.twig',['article'=> $article]);
  }

  public function newAction(Request $request)
  {

    if($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')){
      //Faire ceci celà si un utilisateur est connecté
    }

    $user = $this->get('security.token_storage')->getToken()->getUser();

    $article = new Article();

    $article->setAuthor($user);

    $form = $this->createForm(ArticleType::class, $article);

    $form-> handleRequest( $request);

    if($form->isValid()){
      $em = $this-> getDoctrine()->getManager();
      $em->persist($article);
      $em->flush($article);

      return new Response('ok');
    }

    return $this->render('BlogBundle:Default:newArticle.html.twig',[
      'form' => $form->createView()
    ]);
  }
}
