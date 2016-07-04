<?php

namespace Uniajc\sgdepBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Uniajc\sgdepBundle\Entity\Persona;
use Symfony\Component\HttpFoundation\Response;

class ConsultaController extends Controller
{
    public function showAction($tabla,$campo,$id)
    {
		$persona = $this->getDoctrine()
        ->getRepository('UniajcsgdepBundle:Persona')
        ->findOneBy(array($campo=> $id));
 
		if (!$persona) {
			return $this->render('UniajcsgdepBundle:Default:consulta.html.twig', array('tabla' => $tabla,'campo' => $campo,'id' => 'No encontrado'));
		}
		$codigo = $persona->getCodigo();
        return $this->render('UniajcsgdepBundle:Default:consulta.html.twig', array('tabla' => $tabla,'campo' => $campo,'id' => $codigo));
    }
}
