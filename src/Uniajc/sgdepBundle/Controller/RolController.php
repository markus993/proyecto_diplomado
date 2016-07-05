<?php

namespace Uniajc\sgdepBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Uniajc\sgdepBundle\Entity\Persona;
use Symfony\Component\HttpFoundation\Response;

class RolController extends Controller
{
    public function showAction($id)
    {
		$em = $this->getDoctrine()->getEntityManager();
		$connection = $em->getConnection();
		$statement = $connection->prepare("SELECT
													persona.nombres,
													persona.apellidos,
													director.estado AS director,
													docente.estado AS docente,
													estudiante.estado AS estudiante,
													estudiante.vocero AS vocero
											FROM
													persona
													LEFT JOIN director ON director.id_persona = persona.id AND director.id = persona.identificacion AND director.id_persona = persona.id AND director.id = persona.identificacion
													LEFT JOIN docente ON docente.id_persona = persona.id AND docente.id = persona.identificacion AND docente.id_persona = persona.id AND docente.id = persona.identificacion
													LEFT JOIN estudiante ON estudiante.id_persona = persona.id AND estudiante.id = persona.identificacion AND estudiante.id_persona = persona.id AND estudiante.id = persona.identificacion
												WHERE 
													persona.identificacion = :id
												LIMIT 1");
		$statement->bindValue('id', $id);
		$statement->execute();
		$results = $statement->fetchAll();
		if( count($results) ==0){
			return $this->render('UniajcsgdepBundle:Default:rol.html.twig', array('response' => 'false'));
		}else{
			if( $results[0]['vocero']=='t' &&  $results[0]['estudiante']==1)
				$response['vocero'] = 'true';
			if( $results[0]['docente']==1 )
				$response['docente'] = 'true';
			if( $results[0]['director']==1 )
				$response['director'] = 'true';
			if(isset($response))
				return $this->render('UniajcsgdepBundle:Default:rol.html.twig', array('response' =>json_encode($response)));
			else
				return $this->render('UniajcsgdepBundle:Default:rol.html.twig', array('response' => 'false'));
		}
    }
}
