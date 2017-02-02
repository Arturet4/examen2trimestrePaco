<?php

namespace gesGfctBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use gesGfctBundle\Form\profesoresType;
use gesGfctBundle\Entity\profesores;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class apiController extends Controller
{

private function serializeProfesores(Profesores $profesores)
{
return array(
  'Id' => $profesores->getId(),
  'Nombre' => $profesores->getNombre(),
  'Apellidos' => $profesores->getApellidos(),
  'Departamento' => $profesores->getDepartamento(),
);
}
public function profesoresAction()
{
$repository = $this->getDoctrine()->getRepository('gesGfctBundle:profesores');
$profesores = $repository->findAll() ;


//var_dump($empresas);
$data = array('preofesores' => array());
foreach ($preofesores as $preofesores) {
    $data['profesores'][] = $this->serializeProfesores($profesores);
}
$response = new JsonResponse($data, 400);
return $response;
//return $this->json($empresas);*/

}
