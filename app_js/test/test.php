<?php
/** /mis-proyectos/autentia/php/tutorial/php-unit/test/AdictosTutorialTest.php */

class AdictosTutorialTest extends PHPUnit_Framework_TestCase {

    public function testReturnGreeting() {
        $adictos = file_get_contents('http://192.168.0.30:8585/proyecto_diplomado/web/app_dev.php/materias/docente/946868686');

        $resultado = '[{"asignatura":"Ingenieria del Sofware I","id_ejecucion":"1","checkbox_docente":true,"checkbox_estudiante":true,"observacion_docente":"OK1","observacion_Facultad":"OK2","facultad":"Facultad de Ingenierias","fecha_sesion":"2016-07-11","identificacion_docente":"946868686","intensidad_horaria":3}]';
        $this->assertEquals($resultado , $adictos->greet());
    }
}

?>