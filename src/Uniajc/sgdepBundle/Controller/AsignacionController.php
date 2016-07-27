<?php

namespace Uniajc\sgdepBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Uniajc\sgdepBundle\Entity\EjecucionPlan;

class AsignacionController extends Controller
{
	public function showAction($id_asignatura, $sesion )
	{
		$em = $this->getDoctrine()->getEntityManager();
		$connection = $em->getConnection();
		$statement = $connection->prepare('SELECT
											"public".asignatura.nombre AS asignatura,
											"public".ejecucion_plan.id_ejecucion,
											"public".ejecucion_plan.checkbox_docente,
											"public".ejecucion_plan.checkbox_estudiante,
											"public".ejecucion_plan.observacion_docente,
											"public".ejecucion_plan."observacion_Facultad",
											"public".facultad.nombre AS facultad,
											"public".plan_curso.fecha_sesion AS fecha_sesion,
											"public".persona.identificacion AS identificacion_docente,
											"public".asignatura.intensidad_horaria
											FROM
											"public".asignatura
											INNER JOIN "public"."Informacion_asignatura" ON "public"."Informacion_asignatura".id_asignatura = "public".asignatura."id"
											INNER JOIN "public"."Asignacion" ON "public"."Asignacion".id_informacion = "public"."Informacion_asignatura".id_informacion
											INNER JOIN "public".plan_curso ON "public".plan_curso.id_asignacion = "public"."Asignacion".id_asignacion
											INNER JOIN "public".ejecucion_plan ON "public".ejecucion_plan.id_asignacion = "public"."Asignacion".id_asignacion AND "public".ejecucion_plan.id_plan = "public".plan_curso.id_plan
											INNER JOIN "public".facultad ON "public".ejecucion_plan.id_facultad = "public".facultad."id"
											INNER JOIN "public".docente ON "public"."Asignacion".id_docente = "public".docente."id"
											INNER JOIN "public".persona ON "public".docente.id_persona = "public".persona."id" AND "public".docente."id" = "public".persona.identificacion
											INNER JOIN "public"."Unidad_tematica" ON "public"."Unidad_tematica".id_informacion = "public"."Informacion_asignatura".id_informacion
											WHERE "public".plan_curso.sesion = :sesion 
											AND 
												"public".asignatura.id = :id_asignatura 
											AND
												"public"."Unidad_tematica".semanas = "public".plan_curso.sesion');
		$statement->bindValue('id_asignatura', $id_asignatura);
		$statement->bindValue('sesion', $sesion);
		$statement->execute();
		$results = $statement->fetchAll();
		//echo '<pre>'; var_dump($results);echo '</pre>';
		if( count($results) == 0){
			$statement = $connection->prepare('SELECT max ("public".ejecucion_plan.id_ejecucion) as id FROM "public".ejecucion_plan LIMIT 1');
			$statement->execute();
			$results = $statement->fetchAll();
			echo $results[0]['id'];
			exit();

			$statement = $connection->prepare('SELECT
													"public".asignatura.intensidad_horaria,
													"public"."Unidad_tematica".nombre AS asignatura,
													"public".plan_curso.fecha_sesion AS fecha_sesion 
												FROM
													"public".asignatura
												INNER JOIN "public"."Informacion_asignatura" ON "public"."Informacion_asignatura".id_asignatura = "public".asignatura."id"
												INNER JOIN "public"."Unidad_tematica" ON "public"."Unidad_tematica".id_informacion = "public"."Informacion_asignatura".id_informacion 
												INNER JOIN "public".plan_curso ON "public".plan_curso.sesion = "public"."Unidad_tematica".semanas 
												WHERE "public"."Unidad_tematica".semanas = :sesion
												AND "public".asignatura.id = :id_asignatura
												LIMIT 1');
			$statement->bindValue('id_asignatura', $id_asignatura);
			$statement->bindValue('sesion', $sesion);
			$statement->execute();
			$results = $statement->fetchAll();

			if( count($results) == 0){
				return $this->render('UniajcsgdepBundle:Default:asignacion.html.twig', array('response' => 'false'));
			}else{//echo '<pre>'; var_dump($results);echo '</pre>';
				$response = $results[0];
				if(isset($response)){
					$response['estado'] = 'sin_crear';
					$response = new Response(json_encode($response));
					$response->headers->set('Content-Type', 'application/json');
					return $response;
				}else{
					return $this->render('UniajcsgdepBundle:Default:asignacion.html.twig', array('response' => 'false'));
				}
			}
		}else{
			$response = $results[0];
			if(isset($response)){
				$response['estado'] = 'creado';
				$response = new Response(json_encode($response));
				$response->headers->set('Content-Type', 'application/json');
				return $response;
			}else
				return $this->render('UniajcsgdepBundle:Default:asignacion.html.twig', array('response' => 'false'));
		}
	}

	public function loadSesionesReporteAction($materia )
	{
		$em = $this->getDoctrine()->getEntityManager();
		$connection = $em->getConnection();
		$statement = $connection->prepare('SELECT
											"public".asignatura.nombre AS asignatura,
											"public".ejecucion_plan.id_ejecucion,
											"public".ejecucion_plan.checkbox_docente,
											"public".ejecucion_plan.checkbox_estudiante,
											"public".ejecucion_plan.observacion_docente,
											"public".ejecucion_plan."observacion_Facultad",
											"public".facultad.nombre AS facultad,
											"public".plan_curso.fecha_sesion AS fecha_sesion,
											"public".persona.identificacion AS identificacion_docente,
											"public".asignatura.intensidad_horaria
											FROM
											"public".asignatura
											INNER JOIN "public"."Informacion_asignatura" ON "public"."Informacion_asignatura".id_asignatura = "public".asignatura."id"
											INNER JOIN "public"."Asignacion" ON "public"."Asignacion".id_informacion = "public"."Informacion_asignatura".id_informacion
											INNER JOIN "public".plan_curso ON "public".plan_curso.id_asignacion = "public"."Asignacion".id_asignacion
											INNER JOIN "public".ejecucion_plan ON "public".ejecucion_plan.id_asignacion = "public"."Asignacion".id_asignacion AND "public".ejecucion_plan.id_plan = "public".plan_curso.id_plan
											INNER JOIN "public".facultad ON "public".ejecucion_plan.id_facultad = "public".facultad."id"
											INNER JOIN "public".docente ON "public"."Asignacion".id_docente = "public".docente."id"
											INNER JOIN "public".persona ON "public".docente.id_persona = "public".persona."id" AND "public".docente."id" = "public".persona.identificacion
											INNER JOIN "public"."Unidad_tematica" ON "public"."Unidad_tematica".id_informacion = "public"."Informacion_asignatura".id_informacion
											WHERE 
												"public".asignatura.id = :materia 
											AND
												"public"."Unidad_tematica".semanas = "public".plan_curso.sesion');
		$statement->bindValue('materia', $materia);
		$statement->execute();
		$results = $statement->fetchAll();
		//echo '<pre>'; var_dump($results);echo '</pre>';
		if( count($results) == 0){
			return $this->render('UniajcsgdepBundle:Default:asignacion.html.twig', array('response' => 'false'));
		}else{
			$response = $results;
			if(isset($response)){
				$response = new Response(json_encode($response));
				$response->headers->set('Content-Type', 'application/json');
				return $response;
			}else
				return $this->render('UniajcsgdepBundle:Default:asignacion.html.twig', array('response' => 'false'));
		}
	}

	public function saveVoceroAction($id_ejecucion, $checked )
	{
		
		$em = $this->getDoctrine()->getEntityManager();
		$connection = $em->getConnection();
		$statement = $connection->prepare("	UPDATE 
												ejecucion_plan
											SET 
												checkbox_estudiante= :checked
											WHERE 
												id_ejecucion  = :id_ejecucion
										");
		$statement->bindValue('id_ejecucion', $id_ejecucion);
		$statement->bindValue('checked', $checked);
		$rows = $statement->execute();
		
		if($rows){
			return $this->render('UniajcsgdepBundle:Default:asignacion.html.twig', array('response' => 'true'));
		}else
			return $this->render('UniajcsgdepBundle:Default:asignacion.html.twig', array('response' => 'false'));
		
	}

	public function saveDocenteAction($id_asignacion, $id_ejecucion, $id_facultad ,$id_plan , $checked )
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

	public function saveDirectorAction($id_asignacion, $id_ejecucion, $id_facultad ,$id_plan , $observacion_Facultad )
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
