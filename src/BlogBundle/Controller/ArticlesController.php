<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use BlogBundle\Entity\Article;
use BlogBundle\Entity\Comment;
use BlogBundle\Resources\Form\Type\ArticleType;
use BlogBundle\Resources\Form\Type\EditArticleType;


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

        $user = $this->get('security.token_storage')->getToken()->getUser();

        $article = new Article();

        $article->setAuthor($user);

        $form = $this->createForm(ArticleType::class, $article);

        $form-> handleRequest( $request);

        if($form->isValid()){
            $em = $this-> getDoctrine()->getManager();
            $em->persist($article);
            $em->flush($article);

            return $this->redirectToRoute("bundle_newArticle");

        }

        return $this->render('BlogBundle:Default:newArticle.html.twig',[
          'form' => $form->createView()
        ]);
    }

    public function adminAction(Request $request)
    {
      $repository = $this->getDoctrine()->getRepository('BlogBundle:Article');
      $articles = $repository->findAll();

      return $this->render('BlogBundle:Default:admin.html.twig',['articles'=> $articles]);
    }

    public function deleteAction($id)
    {

        $repository = $this->getDoctrine()->getRepository('BlogBundle:Article');
        $article = $repository->findOne($id);

        $form = $this->createDeleteForm($article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($article);
            $em->flush();
        }

        return $this->redirectToRoute('bundle_admin');
    }

    public function editAction(Request $request, $id)
    {
        $repository = $this->getDoctrine()->getRepository('BlogBundle:Article');
        $article = $repository->findOne($id);

        $form = $this->createForm(EditArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $user = $this->get('security.token_storage')->getToken()->getUser();
            $article->setCreatorUserId($user->getId());
            $em->persist($article);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Article modifié.');
            return $this->redirect($this->generateUrl('bundle_admin'));
        }

        return $this->render('BlogBundle:Default:editArticle.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    // public function newCommentAction(Request $request, $id)
    // {
    //
    //     $comment = new Comment();
    //
    //     $form = $this->createForm(ArticleType::class, $comment);
    //
    //     $comment->setPublishedAt(DateTime);
    //     $comment->setArticle($this->getDoctrine()->getRepository("Bundle:Article")->find($id));
    //
    //     $form-> handleRequest( $request);
    //
    //     if($form->isValid()){
    //         $em = $this-> getDoctrine()->getManager();
    //         $em->persist($comment);
    //         $em->flush($comment);
    //
    //         return $this->redirectToRoute("bundle_newComment");
    //
    //     }
    //
    //     return $this->render('BlogBundle:Default:newComment.html.twig',[
    //       'form' => $form->createView()
    //     ]);
    // }
}
