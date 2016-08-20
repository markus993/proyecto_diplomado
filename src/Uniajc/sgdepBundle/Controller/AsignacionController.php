<?php

namespace Uniajc\sgdepBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Uniajc\sgdepBundle\Model\Model;

class AsignacionController extends Controller
{
	private $database;

	public function getAccessDatabase()
	{
		if(!isset($this->database))
			$this->database = new Model($this->getDoctrine()->getEntityManager());
		return $this->database;
	}

	public function showAction($id_asignatura, $sesion ,$rol)
	{
		$this->getAccessDatabase();
		$results = $this->database->loadEjecucionBD($id_asignatura,$sesion);
		//echo '<pre>'; var_dump($results);echo '</pre>';
		
		if( count($results) == 0 ){

			if ($rol =! 'docente') {
				return $this->render('UniajcsgdepBundle:Default:asignacion.html.twig', array('response' => 'false1'));
			}

			$results = $this->database->loadEjecucionDataBD($id_asignatura,$sesion);
			if(count($results) == 0){
				return $this->render('UniajcsgdepBundle:Default:asignacion.html.twig', array('response' => 'false2'));
			}
			$id_ejecucion = $this->database->loadIDEjecucionBD()+1;

			$response = $results[0];

			//echo '<pre>'; var_dump($response);echo '</pre>';
			$this->database->insertEjecucionBD($id_ejecucion,$response['id_asignacion'],$response['id_facultad'],$response['id_plan'],$response['fecha_sesion']);
			
			if(isset($response)){
				$response['estado'] = 'creado';
				$response = new Response(json_encode($response));
				$response->headers->set('Content-Type', 'application/json');
				return $response;
			}else{
				return $this->render('UniajcsgdepBundle:Default:asignacion.html.twig', array('response' => 'false'));
			}
			
		}else{
			$response = $results[0];
			if(isset($response)){
				$response['estado'] = 'encontrado';
				$response = new Response(json_encode($response));
				$response->headers->set('Content-Type', 'application/json');
				return $response;
			}else
				return $this->render('UniajcsgdepBundle:Default:asignacion.html.twig', array('response' => 'false'));
		}
	}

	public function loadSesionesReporteAction($materia )
	{
		$this->getAccessDatabase();
		$results = $this->database->loadSesionesReporteBD($materia);
		//echo '<pre>'; var_dump($results);echo '</pre>';
		if( count($results) == 0){
			return $this->render('UniajcsgdepBundle:Default:asignacion.html.twig', array('response' => 'false'));
		}else{
			$response = $results;
			if(isset($response)){
				$response = new Response(utf8_encode( json_encode($response)));
				$response->headers->set('Content-Type', 'application/json');
				return $response;
			}else
				return $this->render('UniajcsgdepBundle:Default:asignacion.html.twig', array('response' => 'false'));
		}
	}

	public function saveVoceroAction()
	{
		$id_ejecucion = $this->get('request')->request->get('id_ejecucion');
		$checked = $this->get('request')->request->get('firma_vocero');

		$this->getAccessDatabase();
		$results = $this->database->saveVoceroBD($id_ejecucion, $checked);

		if($results){
			return $this->render('UniajcsgdepBundle:Default:asignacion.html.twig', array('response' => 'true'));
		}else
			return $this->render('UniajcsgdepBundle:Default:asignacion.html.twig', array('response' => 'false'));
		
	}

	public function saveDocenteAction()
	{
		
		$id_ejecucion = $this->get('request')->request->get('id_ejecucion');
		$observacion_docente = $this->get('request')->request->get('observacion_docente');
		$fecha = $this->get('request')->request->get('fecha');
		$checked = $this->get('request')->request->get('firma_docente');
		$horas = $this->get('request')->request->get('horas');

		$this->getAccessDatabase();
		$results = $this->database->saveDocenteBD( $id_ejecucion, $observacion_docente, $fecha, $checked,$horas);
		
		if($results){
			return $this->render('UniajcsgdepBundle:Default:asignacion.html.twig', array('response' => 'true'));
		}else{
			return $this->render('UniajcsgdepBundle:Default:asignacion.html.twig', array('response' => 'false'));
		}
	}

	public function saveDocenteTemasAction($id_ejecucion, $temas )
	{
		
		$this->getAccessDatabase();
		$results = $this->database->saveDocenteTemasBD($id_ejecucion, $temas);
		
		if($results){
			return $this->render('UniajcsgdepBundle:Default:asignacion.html.twig', array('response' => 'true'));
		}else{
			return $this->render('UniajcsgdepBundle:Default:asignacion.html.twig', array('response' => 'false'));
		}
	}

	public function saveDirectorAction()
	{
		$id_ejecucion = $this->get('request')->request->get('id_ejecucion');
		$observacion_Facultad = $this->get('request')->request->get('observacion_Facultad');
		$this->getAccessDatabase();
		$results = $this->database->saveDirectorBD( $id_ejecucion, $observacion_Facultad);
		
		if($results){
			return $this->render('UniajcsgdepBundle:Default:asignacion.html.twig', array('response' => 'true'));
		}else{
			return $this->render('UniajcsgdepBundle:Default:asignacion.html.twig', array('response' => 'false'));
		}
	}
}
