<?php

namespace Uniajc\sgdepBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Uniajc\sgdepBundle\Model\Model;

class MateriasController extends Controller
{
	private $database;
	public function getAccessDatabase()
	{
		if(!isset($this->database))
			$this->database = new Model($this->getDoctrine()->getEntityManager());
		return $this->database;
	}   
	public function loadMailDocentesAction()
	{
		$this->getAccessDatabase();
		$results = $this->database->loadMailDocentesBD();
		//echo '<pre>'; var_dump($results);echo '</pre>';

		if( count($results) ==0){
			return $this->render('UniajcsgdepBundle:Default:asignacion.html.twig', array('response' => 'false'));
		}else{
			$response = $results;

			if(isset($response)){
				foreach ($response as $key => $value) {
					$ejecucion_plan = $this->database->getObject($value['id_ejecucion'],'EjecucionPlan');
					$results = $this->database->insertNotificacionBD($ejecucion_plan,$value['mail_docente'],'Text');
				}
				$response = new Response(json_encode($response));
				$response->headers->set('Content-Type', 'application/json');

				return $response;
			}else
				return $this->render('UniajcsgdepBundle:Default:asignacion.html.twig', array('response' => 'false'));
		}
	}

	public function loadDocenteAction($id_docente )
	{
		$this->getAccessDatabase();
		$results = $this->database->loadDocenteBD($id_docente);
		//echo '<pre>'; var_dump($statement);echo '</pre>';
		if( count($results) ==0){
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

	public function loadVoceroAction($id_vocero )
	{
		$this->getAccessDatabase();
		$results = $this->database->loadVoceroBD($id_vocero);
		//echo '<pre>'; var_dump($statement);echo '</pre>';
		if( count($results) ==0){
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

	public function loadSesionesAction($materia )
	{
		$this->getAccessDatabase();
		$results = $this->database->loadSesionesBD($materia);
		//echo '<pre>'; var_dump($statement);echo '</pre>';
		if( count($results) ==0){
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

	public function loadTemasDefault($materia, $sesion)
	{
		
		$this->getAccessDatabase();
		$results = $this->database->loadTemasDefaultBD($materia,$sesion);
		//echo '<pre>'; var_dump($statement);echo '</pre>';
		if( count($results) ==0){
			return $this->render('UniajcsgdepBundle:Default:asignacion.html.twig', array('response' => 'false'));
		}else{
			$response = $results;

			if(isset($response)){
				$response = new Response(json_encode($response));
				$response->headers->set('Content-Type', 'application/json');
				return $response;
			}else{
				return $this->render('UniajcsgdepBundle:Default:asignacion.html.twig', array('response' => 'false'));
			}
		}
	}	

	public function loadTemasAction($materia,$sesion)
	{
		$this->getAccessDatabase();
		$results = $this->database->loadTemasBD($materia,$sesion);
		//echo '<pre>'; var_dump($results[0]['tema']);echo '</pre>';
		if( count($results) > 0 && $results[0]['tema'] != NULL){
			$response = $results;
			$response = new Response(json_encode($response));
			$response->headers->set('Content-Type', 'application/json');
			return $response;
		}else{
			return $this->loadTemasDefault($materia, $sesion);
		}
	}

	public function loadAllTemasAction($materia)
	{
		
		$this->getAccessDatabase();
		$results = $this->database->loadAllTemasBD($materia);
		//echo '<pre>'; var_dump($statement);echo '</pre>';
		if( count($results) ==0){
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
}
