<?php

namespace gesGfctBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use gesGfctBundle\Form\empresaType;
use gesGfctBundle\Entity\alumno;
use Symfony\Component\HttpFoundation\Request;

class alumnoController extends Controller
{
    public function allAction()
    {
        $respository = $this->getDoctrine()->getRepository('gesGfctBundle:alumno');
        $alumno = $respository->findAll();
        return $this->render('gesGfctBundle:Alumno:all.html.twig',array("NumAlumno"=>$alumno));

    }

}
