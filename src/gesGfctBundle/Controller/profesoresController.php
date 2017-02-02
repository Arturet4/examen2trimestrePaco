<?php

namespace gesGfctBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use gesGfctBundle\Form\profesoresType;
use gesGfctBundle\Entity\profesores;
use Symfony\Component\HttpFoundation\Request;

class profesoresController extends Controller
{
    public function allAction()
    {
        $respository = $this->getDoctrine()->getRepository('gesGfctBundle:profesores');
        $profesores = $respository->findAll();
        return $this->render('gesGfctBundle:Profesores:all.html.twig',array("NumProfesores"=>$profesores));

    }

    public function newProfesoresAction(Request $request)
    {
    $NuevoProfesor= new profesores();
    $form=$this->createForm(profesoresType::class,$NuevoProfesor);

    $form->handleRequest($request);
    if($form->isSubmitted() && $form->isValid()){
      $NuevoProfesor=$form->getData();

      $nuevoPro=$this->getDoctrine()->getManager();
      $nuevoPro->persist($NuevoProfesor);
      $nuevoPro->flush();

      return $this->redirectToRoute('exito_profesor');
    }

    return $this->render('gesGfctBundle:profesores:new.html.twig',array("formulario"=>$form->createView() ));

    }
    public function msgExitoAction()
    {
        return $this->render('gesGfctBundle:Profesores:msgExito.html.twig');

    }
}
