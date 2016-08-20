<?php
	if (!isset($_GET["var"]))
		$var = 1;
	else
		$var = $_GET["var"];
	$jason = file_get_contents("http://186.146.248.97:8585/proyecto_diplomado/web/app_dev.php/materias/sesiones/reporte/".$var);
	$producto = json_decode(utf8_decode($jason));
	//echo '<pre>';var_dump($producto);echo '</pre>';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Informe de ejecucion de clases UNIAJC</title>
		<link rel="stylesheet" href="style.css" media="all" />
	</head>
	<body>
		<header class="clearfix">
			<div id="logo">
				<img style="width:40px;" src="img/logo_redondo.png">
			</div>
			<h1>Informe de ejecucion de clases</h1>
			<div id="company" class="clearfix">
			</div>
			<div id="project">
				<div><span>Profesor: </span> <?= $producto[0]->docente ?></div>
				<div><span>Materia: </span> <?= $producto[0]->asignatura ?></div>
				<div><span>Dia impresion: </span><?php echo date('d/m/Y'); ?></div>
			</div>
		</header>
		<main>
			<table>
				<thead>
					<tr>
						<th>FECHA SESION</th>
						<th>TEMAS SESION</th>
						<th>OBSERVACION DOCENTE</th>
						<th>OBSERVACION FACULTAD</th>
						<th>FIRMADO DOCENTE</th>
						<th>FIRMADO ESTUDIANTE</th>
						<th>INTENSIDAD HORARIA</th>
					</tr>
					<?php
					$variable_cont = '';
					$acum = '';
					foreach ($producto as $obj) {
						$asignatura = $obj->asignatura;
						$checkbox_docente = ($obj->checkbox_docente = 't') ? 'Firmado' : '-' ;
						$checkbox_estudiante = ($obj->checkbox_estudiante = 't') ? $obj->estudiante : '-' ;
						$observacion_Facultad = $obj->observacion_Facultad;
						$facultad = $obj->facultad;
						$fecha_sesion = $obj->fecha_sesion;
						$intensidad_horaria = $obj->intensidad_horaria;
						$variable_cont = '
						<tr>
						<td class="total">' . $fecha_sesion . '</td>
						<td class="total">' . 'TEMAS' . '</td>
						<td class="qty">' . $observacion_Facultad . '</td>
						<td class="total">' . $intensidad_horaria . '</td>
						<td class="unit">' . $checkbox_docente . '</td>
						<td class="qty">' . $checkbox_estudiante . '</td>
						</tr>';
						$acum = '' . $acum . '' . $variable_cont;
					}
					print $acum;
					?>
				</thead>
			</table>
		</main>
	</body>
</html>