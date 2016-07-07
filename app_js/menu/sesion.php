<?php 
	if(isset($_GET["rol"])){
		$rol = $_GET["rol"];
	}
	else{
		echo 'ingreso no valido';
		exit();
	}

	if(isset($_GET["materia"])){
		$materia = $_GET["materia"];
	}
	else{
		echo 'ingreso no valido';
		exit();
	}

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
			break;

		case 'docente':
			$permisos['fecha']='';
			$permisos['horas']='';
			$permisos['temas']='';
			$permisos['obs_doc']='';
			$permisos['firm_doc']='';
			$display['temas']='';
			$display['obs_doc']='';
			break;

		case 'vocero':
			$permisos['firm_voc']='';
			break;
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
						Docente
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
								<form method="POST" action="/homologaciones/public/asignaturas/1" accept-charset="UTF-8">
									<input name="rol" id="rol" type="hidden" value="<?=$rol ?>">
									<div class="form-group">
										<label for="fecha">Fecha</label>
										<input name="fecha" type="date" value="2016-07-07" id="fecha" <?=$permisos['fecha'] ?> >
									</div>
									<div class="form-group">
										<label for="horas">Horas</label>
										<input name="horas" type="number" value="3" <?=$permisos['horas'] ?>>
									</div>
									<div class="form-group">
										<label for="temas">Temas</label><br>
										<a style="<?=$display['temas'] ?>" class="btn btn-small btn-success <?=$permisos['temas'] ?>" href="/proyecto_diplomado/app_js/menu/sesion.php?rol=vocero&materia=12">Seleccionar</a>
										<ul class="sort-highlight margin">
											<li>Tema I</li>
											<li>Tema II</li>
											<li>Tema III</li>
										</ul>
									</div>
									<div class="form-group">
										<label for="estado">Observaciones Docente</label><br>
										<a style="<?=$display['obs_doc'] ?>" class="btn btn-small btn-success margin <?=$permisos['obs_doc'] ?>" href="/proyecto_diplomado/app_js/menu/sesion.php?rol=vocero&materia=12">Editar</a>
										<div class="sort-highlight pad">Observaciones realizadas por el docente</div>
									</div>
									<div class="form-group">
										<label for="modalidad">Firma Docente</label>
										<input name="chk_firma_docente" type="hidden" value="0" id="chk_firma_docente">
										<input checked="checked" name="firma_docente" type="checkbox" value="1" id="firma_docente" <?=$permisos['firm_doc'] ?>>
									</div>
									<div class="form-group">
										<label for="estado">Firma Vocero</label>
										<input name="chk_firma_vocero" type="hidden" value="0" id="chk_firma_vocero">
										<input checked="checked" name="firma_vocero" type="checkbox" value="1" id="firma_vocero" <?=$permisos['firm_voc'] ?>>
									</div>
									<div class="form-group">
										<label for="obs_facultad">Observaciones Facultad</label><br>
										<a style="<?=$display['obs_fac'] ?>" class="btn btn-small btn-success margin <?=$permisos['obs_fac'] ?>" href="/proyecto_diplomado/app_js/menu/sesion.php?rol=vocero&materia=12">Editar</a>
										<div class="sort-highlight pad">Observaciones realizadas por el director de programa</div>
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