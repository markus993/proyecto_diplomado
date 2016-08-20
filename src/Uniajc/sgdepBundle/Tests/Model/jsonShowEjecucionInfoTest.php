<?php
	class  jsonShowEjecucionInfo_Test extends PHPUnit_Framework_TestCase{ 

		public function test_show_ejecucion_info(){
			echo ' >>>>>>>>>> test_show_ejecucion_info Correcta<<<<<<<<<<';

			$url = 'http://186.146.248.97:8585/proyecto_diplomado/web/app_dev.php/asignacion/1/1/docente';

			$content=file_get_contents($url);

			$json = json_decode($content);

			//Afirma que una cadena es una cadena JSON válida	
			$this->assertJson($content,'El JSON recibido es incorrecto!');

			$asignatura = $json->asignatura;
			$id_ejecucion = $json->id_ejecucion;
			$checkbox_docente = $json->checkbox_docente;
			$checkbox_estudiante= $json->checkbox_estudiante;
			$observacion_docente = $json->observacion_docente;
			$observacion_Facultad = $json->observacion_Facultad;
			$fecha_sesion = $json->fecha_sesion;
			$identificacion_docente = $json->identificacion_docente;
			$intensidad_horaria = $json->intensidad_horaria;
			$estado = $json->estado;

			// Afirma que una variable no está vacía
			$this->assertNotEmpty($asignatura,'No se encuentra el email del director en el JSON');
			$this->assertNotEmpty($id_ejecucion,'No se encuentra la materia  en el JSON');
			$this->assertNotEmpty($checkbox_docente,'No se encuentra la fecha en el JSON');
			$this->assertNotEmpty($checkbox_estudiante,'No se encuentra la sesion en el JSON');
			$this->assertNotEmpty($observacion_docente,'No se encuentra la sesion en el JSON');
			$this->assertNotEmpty($observacion_Facultad,'No se encuentra la sesion en el JSON');
			$this->assertNotEmpty($fecha_sesion,'No se encuentra la sesion en el JSON');
			$this->assertNotEmpty($identificacion_docente,'No se encuentra la sesion en el JSON');
			$this->assertNotEmpty($intensidad_horaria,'No se encuentra la sesion en el JSON');
			$this->assertNotEmpty($estado,'No se encuentra la sesion en el JSON');
		}
	}