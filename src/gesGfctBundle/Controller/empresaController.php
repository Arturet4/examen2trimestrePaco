<?php

namespace gesGfctBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use gesGfctBundle\Form\empresaType;
use gesGfctBundle\Entity\empresa;
use Symfony\Component\HttpFoundation\Request;

class empresaController extends Controller
{
    public function allAction()
    {
        $respository = $this->getDoctrine()->getRepository('gesGfctBundle:empresa');
        $emp = $respository->findAll();
        return $this->render('gesGfctBundle:Empresa:all.html.twig',array("NumEmpresas"=>$emp));

    }
    public function newEmpresaAction(Request $request)
    {
    $NuevaEmpresa= new empresa();
    $form=$this->createForm(empresaType::class,$NuevaEmpresa);

    $form->handleRequest($request);
    if($form->isSubmitted() && $form->isValid()){
      $NuevaEmpresa=$form->getData();

      $nuevaEm=$this->getDoctrine()->getManager();
      $nuevaEm->persist($NuevaEmpresa);
      $nuevaEm->flush();

      return $this->redirectToRoute('exito_empresa');
    }

    return $this->render('gesGfctBundle:Empresa:new.html.twig',array("formulario"=>$form->createView() ));

    }

    public function msgExitoAction()
    {
        return $this->render('gesGfctBundle:Empresa:msgExito.html.twig');

    }
}
