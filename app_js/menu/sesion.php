<?php 
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

	$identificacion = 946868686;

	$permisos = array(
						'fecha' => 'disabled', 
						'horas' => 'disabled', 
						'temas' => 'disabled', 
						'obs_doc' => 'disabled', 
						'firm_doc' => 'disabled', 
						'firm_voc' => 'disabled', 
						'obs_fac' => 'disabled'
					);
	$display = array(
						'temas' => 'display:none', 
						'obs_doc' => 'display:none', 
						'obs_fac' => 'display:none'
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
			$permisos['obs_doc']='';
			$permisos['firm_doc']='';
			$display['temas']='';
			$display['obs_doc']='';
			$funcion='guarda_docente';
			$label='Docente';
			break;

		case 'vocero':
			$permisos['firm_voc']='';
			$funcion='guarda_vocero';
			$label='Vocero';
			break;
	}
	$url = "http://186.146.248.97:8585/proyecto_diplomado/web/app_dev.php/asignacion/$rol/$identificacion/$materia/$sesion";
	
	$vars = file_get_contents($url);
	$vars = json_decode($vars,true);

	$horas = 3;
	$observacion_docente = $vars ['observacion_docente'];
	$observacion_Facultad = $vars ['observacion_Facultad'];
	$fecha_planeada = $vars ['fecha_planeada'];
	$identificacion = $vars ['identificacion'];
	$tematica = $vars ['tematica'];
	$fecha = $vars ['fecha'];


	$id_asignacion = $vars ['id_asignacion'];
	$id_ejecucion = $vars ['id_ejecucion'];
	$id_facultad = $vars ['id_facultad'];
	$id_plan = $vars ['id_plan'];



	if($vars ['checkbox_docente'] == '1'){
		$checkbox_docente = 'checked';
	}else{
		$checkbox_docente = "";
	}
	if($vars ['checkbox_estudiante'] == '1'){
		$checkbox_estudiante = 'checked';
	}else{
		$checkbox_estudiante = "";
	}

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
						<li onclick="console.log('Director')">
							<a href="/proyecto_diplomado/app_js/menu/materias.php?rol=director">
								<i class="fa fa-dashboard"></i> <span>Director</span>
							</a>
						</li>
						<li onclick="console.log('Docente')">
							<a href="/proyecto_diplomado/app_js/menu/materias.php?rol=docente">
								<i class="fa fa-dashboard"></i> <span>Docente</span>
							</a>
						</li>
						<li onclick="console.log('Vocero')">
							<a href="/proyecto_diplomado/app_js/menu/materias.php?rol=vocero">
								<i class="fa fa-dashboard"></i> <span>Vocero</span>
							</a>
						</li>
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
							<h1>Semana 1</h1>
								<form method="POST" action="" id="sesion" accept-charset="UTF-8">
									<input name="rol" id="rol" type="hidden" value="<?=$rol ?>">
									<div class="form-group">
										<label for="fecha">Fecha</label>
										<input name="fecha" type="date" value="<?=$fecha_planeada ?>" id="fecha" <?=$permisos['fecha'] ?> >
									</div>
									<div class="form-group">
										<label for="horas">Horas</label>
										<input name="horas" type="number" value="<?= $horas ?>" <?=$permisos['horas'] ?>>
									</div>
									<div class="form-group">
										<label for="temas">Temas</label><br>
										<a onclick="return no_implementado()" style="<?=$display['temas'] ?>" class="btn btn-small btn-success <?=$permisos['temas'] ?>" href="/proyecto_diplomado/app_js/menu/sesion.php?rol=vocero&materia=12">Seleccionar</a>
										<ul class="sort-highlight margin">
											<li><?=$tematica ?></li>
										</ul>
									</div>
									<div class="form-group">
										<label for="estado">Observaciones Docente</label><br>
										<a onclick="return no_implementado()" style="<?=$display['obs_doc'] ?>" class="btn btn-small btn-success margin <?=$permisos['obs_doc'] ?>" href="/proyecto_diplomado/app_js/menu/sesion.php?rol=vocero&materia=12">Editar</a>
										<div class="sort-highlight pad"><?=$observacion_docente ?></div>
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
										<a onclick="return no_implementado()" style="<?=$display['obs_fac'] ?>" class="btn btn-small btn-success margin <?=$permisos['obs_fac'] ?>" href="/proyecto_diplomado/app_js/menu/sesion.php?rol=vocero&materia=12">Editar</a>
										<div class="sort-highlight pad"><?=$observacion_Facultad ?></div>
									</div>
									<input name="uniajc" type="hidden" value="0">
									<input class="btn btn-primary" type="submit" value="Guardar">
									<a href="/proyecto_diplomado/app_js/menu/sesiones.php?rol=<?=$rol ?>&materia=<?=$materia ?>" class="btn btn-default">
										Volver
									</a>
								</form>
						</div><!-- /.box-body -->
					</div>
				</section><!-- /.content -->
			</aside><!-- /.right-side -->
		</div><!-- ./wrapper -->
		<?php include 'footer.php';?>
	</body>
</html>
<script type="text/javascript">

	function no_implementado(){
		alert('funcion no implementada');
		return false;
	}

	$( "#sesion" ).submit(function( event ) {
		<?=$funcion ?>();
		event.preventDefault();
	});

	function guarda_vocero(){
		firma_vocero = $('#firma_vocero').prop('checked');
		if(firma_vocero)
			firma_vocero = 't';
		else
			firma_vocero = 'f';
		url = '<?= "http://186.146.248.97:8585/proyecto_diplomado/web/app_dev.php/asignacion/vocero/$id_asignacion/$id_ejecucion/$id_facultad/$id_plan/" ?>'+firma_vocero;
		$.get(url, function(data, status){
			alert("Save: " + data + "\nStatus: " + status);
		});
		return false;
	}

</script>