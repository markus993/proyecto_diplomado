<?php 
	session_start();
	if (isset($_SESSION['session']) ) {
		if ( $_SESSION['session'] != 'true' ) {
		    print_r ($_SESSION['session']);
		    print_r ('No hay Sesion abierta');
		    exit();
		}
	}else{
	    print_r ('No hay Sesion abierta');
	    exit();
	}

	if(isset($_GET["rol"])){
		$rol = $_GET["rol"];
	}else{
		echo 'ingreso no valido';
		exit();
	}

	if(isset($_GET["materia"])){
		$materia = $_GET["materia"];
	}else{
		echo 'ingreso no valido';
		exit();
	}

	if(isset($_GET["sesion"])){
		$sesion = $_GET["sesion"];
	}else{
		echo 'ingreso no valido';
		exit();
	}

	$identificacion = $_SESSION['identificacion'];

	$permisos = array(
						'fecha' => 'disabled', 
						'horas' => 'disabled', 
						'temas' => 'disabled', 
						'obs_doc' => 'false', 
						'firm_doc' => 'disabled', 
						'firm_voc' => 'disabled', 
						'obs_fac' => 'false'
					);
	$display = array(
						'temas' => 'display:none'
					);

	switch ($rol) {
		case 'director':
			$display['obs_fac']='';
			$permisos['obs_fac']='';
			$funcion='guarda_director';
			$label='Director';
			break;

		case 'docente':
			$permisos['fecha']='';
			$permisos['horas']='';
			$permisos['temas']='';
			$permisos['obs_doc']='true';
			$permisos['firm_doc']='';
			$display['temas']='';
			$funcion='guarda_docente';
			$label='Docente';
			break;

		case 'vocero':
			$permisos['firm_voc']='';
			$funcion='guarda_vocero';
			$label='Vocero';
			break;
	}

	$url = "http://186.146.248.97:8585/proyecto_diplomado/web/app_dev.php/asignacion/$materia/$sesion";
	
	$vars = file_get_contents($url);
	$vars = json_decode($vars,true);

	//echo '<pre>'; var_dump($vars);echo '</pre>'; exit();

	$horas = $vars ['intensidad_horaria'];
	$fecha_sesion = $vars ['fecha_sesion'];

	if(isset($vars ['observacion_docente']))
		$observacion_docente = $vars ['observacion_docente'];
	else
		$observacion_docente = '';

	if(isset($vars ['observacion_Facultad']))
		$observacion_Facultad = $vars ['observacion_Facultad'];
	else
		$observacion_Facultad = '';

	if(isset($vars ['id_ejecucion']))
		$id_ejecucion = $vars ['id_ejecucion'];
	else
		$id_ejecucion = "";

	if(isset($vars ['checkbox_docente']))
		if($vars ['checkbox_docente'] == '1')
			$checkbox_docente = 'checked';
		else
			$checkbox_docente = "";
	else
		$checkbox_docente = "";

	if(isset($vars ['checkbox_estudiante']))
		if($vars ['checkbox_estudiante'] == '1')
			$checkbox_estudiante = 'checked';
		else
			$checkbox_estudiante = "";
	else
		$checkbox_estudiante = "";


?>
<!DOCTYPE html>
<html>
	<?php include 'head.php';?>
	<body class="skin-blue">
		<?php include 'header.php';?>
		<div class="wrapper row-offcanvas row-offcanvas-left">
			<!-- Left side column. contains the logo and sidebar -->
			<aside class="left-side sidebar-offcanvas">
				<!-- sidebar: style can be found in sidebar.less -->
				<section class="sidebar">
					<!-- sidebar menu: : style can be found in sidebar.less -->
					<ul class="sidebar-menu">
						<?php if($_SESSION['director']=='true'){ ?>
						<li onclick="console.log('Director')">
							<a href="/proyecto_diplomado/app_js/menu/materias.php?rol=director">
								<i class="fa fa-dashboard"></i> <span>Director</span>
							</a>
						</li>
						<?php }
						if($_SESSION['docente']=='true'){ ?>
						<li onclick="console.log('Docente')">
							<a href="/proyecto_diplomado/app_js/menu/materias.php?rol=docente">
								<i class="fa fa-dashboard"></i> <span>Docente</span>
							</a>
						</li>
						<?php }
						if($_SESSION['vocero']=='true'){ ?>
						<li onclick="console.log('Vocero')">
							<a href="/proyecto_diplomado/app_js/menu/materias.php?rol=vocero">
								<i class="fa fa-dashboard"></i> <span>Vocero</span>
							</a>
						</li>
						<?php } ?>
					</ul>
				</section>
				<!-- /.sidebar -->
			</aside>
			<!-- Right side column. Contains the navbar and content of the page -->
			<aside class="right-side">            	
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<h1>
						<?=$label ?>
						<small>Materia Calculo II</small>
					</h1>
					<ol class="breadcrumb">
						<li>
							<a href="/proyecto_diplomado/app_js/menu/">
								<i class="fa fa-dashboard"></i>Home
							</a>
						</li>
						<li class="active">Materias</li>
						<li class="active">Lista de Semanas</li>
						<li class="active">Semana</li>
					</ol>
				</section>

				<!-- Main content -->
				<section class="content">
					<div class="box box-info">						
						<div class="box-body">
							<h1>Semana <?= $sesion ?></h1>
							<?php if($vars['estado'] == 'creado'){ ?>
								<form method="POST" action="" id="sesion" accept-charset="UTF-8">
									<input name="rol" id="rol" type="hidden" value="<?=$rol ?>">
									<input name="id_ejecucion" id="id_ejecucion" type="hidden" value="<?=$id_ejecucion ?>">
									<div class="form-group">
										<label for="fecha">Fecha</label>
										<input name="fecha" type="date" value="<?=$fecha_sesion ?>" id="fecha" <?=$permisos['fecha'] ?> >
									</div>
									<div class="form-group">
										<label for="horas">Horas</label>
										<input name="horas" type="number" value="<?= $horas ?>" <?=$permisos['horas'] ?>>
									</div>
									<div class="form-group">
										<label for="temas">Temas</label><br>
										<a style="<?=$display['temas'] ?>" class="btn btn-small btn-success <?=$permisos['temas'] ?>" href="/proyecto_diplomado/app_js/menu/temas.php?rol=<?=$rol ?>&materia=<?=$materia ?>&sesion=<?=$sesion ?>">Seleccionar</a>
										<ul id="tematica" class="sort-highlight margin">
										</ul>
										<input name="json_tematica" id="json_tematica" type="hidden" value="">
									</div>
									<div class="form-group">
										<label for="estado">Observaciones Docente</label><br>
										<div class="sort-highlight pad" id="observacion_docente" contenteditable="<?=$permisos['obs_doc'] ?>"><?=$observacion_docente ?></div>
									</div>
									<div class="form-group">
										<label for="modalidad">Firma Docente</label>
										<input <?=$checkbox_docente ?> name="firma_docente" type="checkbox" value="1" id="firma_docente" <?=$permisos['firm_doc'] ?>>
									</div>
									<div class="form-group">
										<label for="estado">Firma Vocero</label>
										<input <?=$checkbox_estudiante ?> name="firma_vocero" type="checkbox" value="1" id="firma_vocero" <?=$permisos['firm_voc'] ?>>
									</div>
									<div class="form-group">
										<label for="obs_facultad">Observaciones Facultad</label><br>
										<div class="sort-highlight pad" id="observacion_Facultad" contenteditable="<?=$permisos['obs_fac'] ?>"><?=$observacion_Facultad ?></div>
									</div>
									<input name="uniajc" type="hidden" value="0">
									<input class="btn btn-primary" type="submit" value="Guardar">
									<a href="/proyecto_diplomado/app_js/menu/sesiones.php?rol=<?=$rol ?>&materia=<?=$materia ?>" class="btn btn-default">
										Volver
									</a>
								</form>
							<?php }else{ ?>
								<form action="return false"accept-charset="UTF-8">
									<div class="form-group">
										<label for="fecha">El docente aun no a creado la sesion</label>
									</div>
									<a href="/proyecto_diplomado/app_js/menu/sesiones.php?rol=<?=$rol ?>&materia=<?=$materia ?>" class="btn btn-default">
										Volver
									</a>
								</form>
							<?php } ?>
						</div><!-- /.box-body -->
					</div>
				</section><!-- /.content -->
			</aside><!-- /.right-side -->
		</div><!-- ./wrapper -->
		<?php include 'footer.php';?>
		<div style="display:none"><?= $url ?> </div>
	</body>
</html>

<script type="text/javascript">

	$( "#sesion" ).submit(function( event ) {
		<?=$funcion ?>();
		event.preventDefault();
	});

	$(document).ready(function () {
		 load_temas(<?=$materia ?>,<?=$sesion ?>);
	});

</script>