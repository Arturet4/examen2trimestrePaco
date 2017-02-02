<?php

namespace gesGfctBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use gesGfctBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use gesGfctBundle\Form\UserType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use gesGfctBundle\Entity\conf;
use gesGfctBundle\Form\confType;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('gesGfctBundle:Default:index.html.twig');
    }

  public function registerAction(Request $request)
  {
      // 1) build the form
      $user = new User();
      $form = $this->createForm(UserType::class, $user);
      // 2) handle the submit (will only happen on POST)
      $form->handleRequest($request);
      $roles = ["ROLE_USER"];// esto te pone este rol automatico al registrarte

      if ($form->isSubmitted() && $form->isValid()) {

          // 3) Encode the password (you could also do this via Doctrine listener)
          $password = $this->get('security.password_encoder')
              ->encodePassword($user, $user->getPlainPassword());
          $user->setPassword($password);
          $user->setRoles($roles);
          // 4) save the User!
          $em = $this->getDoctrine()->getManager();
          $em->persist($user);
          $em->flush();

          // ... do any other work - like sending them an email, etc
          // maybe set a "flash" success message for the user

        return new Response("Usuario registrado");
      }

      return $this->render(
          'gesGfctBundle:Default:register.html.twig',
          array('form' => $form->createView())
      );
  }
  public function adminAction()
  {
      return $this->render('gesGfctBundle:Default:admin.html.twig');
  }
  /**
    * @Route("/usuarios", name="usuarios")
    */
  public function usuariosAction()
  {
      return $this->render('gesGfctBundle:Default:usuarios.html.twig');
  }

  /**
    * @Route("/usuarios/login", name="login")
    */
   public function loginAction(Request $request)
   {
     $authenticationUtils = $this->get('security.authentication_utils');

   // get the login error if there is one
   $error = $authenticationUtils->getLastAuthenticationError();

   // last username entered by the user
   $lastUsername = $authenticationUtils->getLastUsername();

   return $this->render('gesGfctBundle:Default:login.html.twig', array(
       'last_username' => $lastUsername,
       'error'         => $error,
   ));
   }

   public function allConfAction()
   {
       $respository = $this->getDoctrine()->getRepository('gesGfctBundle:conf');
       $con = $respository->findAll();
       return $this->render('gesGfctBundle:conf:all.html.twig',array("NumConf"=>$con));

   }

   public function newConfAction(Request $request)
   {
   $NuevaConf= new conf();
   $form=$this->createForm(confType::class,$NuevaConf);

   $form->handleRequest($request);
   if($form->isSubmitted() && $form->isValid()){
     $NuevaConf=$form->getData();

     $nuevaCo=$this->getDoctrine()->getManager();
     $nuevaCo->persist($NuevaConf);
     $nuevaCo->flush();

     return $this->redirectToRoute('all_conf');
   }

   return $this->render('gesGfctBundle:conf:new.html.twig',array("formulario"=>$form->createView() ));

   }


}
