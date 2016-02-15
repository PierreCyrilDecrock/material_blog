<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use BlogBundle\Entity\User;
use BlogBundle\Resources\Form\Type\UserType;



class SecurityController extends Controller
{
    public function loginAction(Request $request){

        $authenticationUtils = $this->get('security.authentication_utils');
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render(
            'BlogBundle::login.html.twig',
            array(
                // last username entered by the user
                'last_username' => $lastUsername,
                'error'         => $error,
            )
        );
    }

    public function loginCheckAction(Request $request){

    }

    public function signupAction(Request $request)
    {



        $user = new User();

        $form = $this->createForm(UserType::class, $user);

        $form-> handleRequest( $request);

        if($form->isValid()){
            $em = $this-> getDoctrine()->getManager();
            $em->persist($user);
            $em->flush($user);

            return $this->redirectToRoute("blog_homepage");

        }

        return $this->render('BlogBundle::signup.html.twig',[
          'form' => $form->createView()
        ]);
    }
}
