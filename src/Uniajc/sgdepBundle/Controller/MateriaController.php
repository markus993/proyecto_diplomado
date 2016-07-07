<?php

namespace Uniajc\sgdepBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Uniajc\sgdepBundle\Entity\Persona;
use Symfony\Component\HttpFoundation\Response;

class MateriaController extends Controller
{
    public function docenteAction($id)
    {
		$em = $this->getDoctrine()->getEntityManager();
		$connection = $em->getConnection();
		$statement = $connection->prepare("SELECT
												asignatura.nombre as Asignatura,
												persona.nombres as nombre_Docente,
												asignatura.id as Identificacion
											FROM
												Asignacion
												INNER JOIN Informacion_asignatura ON Asignacion.id_informacion = Informacion_asignatura.id_informacion
												INNER JOIN asignatura ON Informacion_asignatura.id_asignatura = asignatura.id AND Informacion_asignatura.id_asignatura = asignatura.id
												INNER JOIN docente ON Asignacion.id_docente = docente.id
												INNER JOIN persona ON docente.id_persona = persona.id AND docente.id = persona.identificacion AND docente.id_persona = persona.id AND docente.id = persona.identificacion
											WHERE 
												docente.id = :id
											LIMIT 1");
		$statement->bindValue('id', $id);
		$statement->execute();
		$results = $statement->fetchAll();
		if( count($results) ==0){
			return $this->render('UniajcsgdepBundle:Default:materia.html.twig', array('response' => 'false'));
		}else{
			if( $results[0]['vocero']=='t' &&  $results[0]['estudiante']==1)
				$response['vocero'] = 'true';
			if( $results[0]['docente']==1 )
				$response['docente'] = 'true';
			if( $results[0]['director']==1 )
				$response['director'] = 'true';
			if(isset($response))
				return $this->render('UniajcsgdepBundle:Default:materia.html.twig', array('response' =>json_encode($response)));
			else
				return $this->render('UniajcsgdepBundle:Default:materia.html.twig', array('response' => 'false'));
		}
    }
}
