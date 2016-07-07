<?php

namespace Uniajc\sgdepBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Uniajc\sgdepBundle\Entity\EjecucionPlan;

class AsignacionController extends Controller
{
	public function showAction($id_docente, $id_asignatura, $sesion )
	{
		$em = $this->getDoctrine()->getEntityManager();
		$connection = $em->getConnection();
		$statement = $connection->prepare('SELECT
												plan_curso.fecha_sesion as fecha_planeada,
												persona.identificacion as identificacion,
												"Unidad_tematica".nombre as tematica,
												"ejecucion_plan".checkbox_docente,
												"ejecucion_plan".checkbox_estudiante,
												"ejecucion_plan".fecha,
												"ejecucion_plan".observacion_docente,
												"ejecucion_plan"."observacion_Facultad",
												"ejecucion_plan"."id_asignacion",
												"ejecucion_plan"."id_ejecucion",
												"ejecucion_plan"."id_facultad",
												"ejecucion_plan"."id_plan"
											FROM
												asignatura
											INNER JOIN "Informacion_asignatura" ON "Informacion_asignatura".id_asignatura = asignatura."id" AND "Informacion_asignatura".id_asignatura = asignatura."id"
											INNER JOIN "Asignacion" ON "Asignacion".id_informacion = "Informacion_asignatura".id_informacion
											INNER JOIN "ejecucion_plan" ON "ejecucion_plan".id_asignacion = asignatura."id" 
											INNER JOIN plan_curso ON plan_curso.id_asignacion = "Asignacion".id_asignacion AND plan_curso.id_asignacion = "Asignacion".id_asignacion
											INNER JOIN docente ON "Asignacion".id_docente = docente."id"
											INNER JOIN persona ON docente.id_persona = persona."id" AND docente."id" = persona.identificacion AND docente.id_persona = persona."id" AND docente."id" = persona.identificacion
											INNER JOIN "Unidad_tematica" ON "Unidad_tematica".id_informacion = "Informacion_asignatura".id_informacion AND "Unidad_tematica".id_informacion = "Informacion_asignatura".id_informacion
											WHERE 
												docente.id = :id_docente
											AND
												asignatura.id  = :id_asignatura
											AND
												plan_curso.sesion  = :sesion
											LIMIT 1');
		$statement->bindValue('id_docente', $id_docente);
		$statement->bindValue('id_asignatura', $id_asignatura);
		$statement->bindValue('sesion', $sesion);
		$statement->execute();
		$results = $statement->fetchAll();
		//echo '<pre>'; var_dump($statement);echo '</pre>';
		if( count($results) ==0){
			return $this->render('UniajcsgdepBundle:Default:asignacion.html.twig', array('response' => 'false'));
		}else{
			
			$response['fecha_planeada'] = $results[0]['fecha_planeada'];
			$response['identificacion'] = $results[0]['identificacion'];
			$response['tematica'] = $results[0]['tematica'];

			$response['fecha'] = $results[0]['fecha'];
			$response['checkbox_docente'] = $results[0]['checkbox_docente'].'';
			$response['checkbox_estudiante'] = $results[0]['checkbox_estudiante'].'';
			$response['observacion_docente'] = $results[0]['observacion_docente'];
			$response['observacion_Facultad'] = $results[0]['observacion_Facultad'];

			$response['id_asignacion'] = $results[0]['id_asignacion'];
			$response['id_ejecucion'] = $results[0]['id_ejecucion'];
			$response['id_facultad'] = $results[0]['id_facultad'];
			$response['id_plan'] = $results[0]['id_plan'];

			if(isset($response)){
				$response = new Response(json_encode($response));
				$response->headers->set('Content-Type', 'application/json');
				return $response;
			}else
				return $this->render('UniajcsgdepBundle:Default:asignacion.html.twig', array('response' => 'false'));
		}
	}

	public function saveVoceroAction($id_asignacion, $id_ejecucion, $id_facultad ,$id_plan , $checked )
	{
		
        $em = $this->getDoctrine()->getEntityManager();
		$connection = $em->getConnection();
		$statement = $connection->prepare("	UPDATE 
												ejecucion_plan
											SET 
												checkbox_estudiante= :checked
											WHERE 
												id_asignacion = :id_asignacion
											AND
												id_ejecucion  = :id_ejecucion
											AND
												id_facultad  = :id_facultad 
											AND
												id_plan  = :id_plan 
										");
		$statement->bindValue('id_asignacion', $id_asignacion);
		$statement->bindValue('id_ejecucion', $id_ejecucion);
		$statement->bindValue('id_facultad', $id_facultad);
		$statement->bindValue('id_plan', $id_plan);
		$statement->bindValue('checked', $checked);
		$rows = $statement->execute();
		
		if($rows){
			return $this->render('UniajcsgdepBundle:Default:asignacion.html.twig', array('response' => 'true'));
		}else
			return $this->render('UniajcsgdepBundle:Default:asignacion.html.twig', array('response' => 'false'));
		
	}
}
