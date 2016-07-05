
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
						<small>Materia</small>
						Calculo II
					</h1>
					<ol class="breadcrumb">
						<li>
							<a href="/proyecto_diplomado/app_js/menu/">
								<i class="fa fa-dashboard"></i>Home
							</a>
						</li>
						<li class="active">Materia</li>
						<li class="active">Sesion</li>
					</ol>
				</section>

				<!-- Main content -->
				<section class="content">
					<div class="box box-info">						
						<div class="box-body">
							<h1>Semana 1</h1>
								<form method="POST" action="http://181.48.204.173/homologaciones/public/asignaturas/1" accept-charset="UTF-8">
									<input name="_rol" type="hidden" value="docente">
									<input name="_token" type="hidden" value="VWduhQgBAcd1Puy0lN6PGjtQF09AfaCD4B4rVJrM">
									<div class="form-group">
										<label for="codigo">Fecha</label>
										<input name="codigo" type="date" value="111" id="codigo">
									</div>
									<div class="form-group">
										<label for="nombre">Horas</label>
										<input name="nombre_asignatura" type="number" value="Matematicas">
									</div>
									<div class="form-group">
										<label for="intensidad_horaria">Temas</label>
										<input name="intensidad_horaria" type="text" value="3" id="intensidad_horaria">
									</div>
									<div class="form-group">
										<label for="estado">Observaciones Docnete</label>
										<input name="intensidad_horaria" type="text" value="3" id="intensidad_horaria">
									</div>
									<div class="form-group">
										<label for="modalidad">Firma Docente</label>
										<input name="estado" type="hidden" value="0" id="estado">
										<input checked="checked" name="estado" type="checkbox" value="1" id="estado">
									</div>
									<div class="form-group">
										<label for="estado">Firma Vocero</label>
										<input name="estado" type="hidden" value="0" id="estado">
										<input checked="checked" name="estado" type="checkbox" value="1" id="estado">
									</div>
									<div class="form-group">
										<label for="estado">Observaciones Facultad</label>
										<input name="intensidad_horaria" type="text" value="3" id="intensidad_horaria">
									</div>
									<input name="uniajc" type="hidden" value="0">
									<input class="btn btn-primary" type="submit" value="Guardar">
									<a href="/proyecto_diplomado/app_js/menu/materias.php?rol=docente" class="btn btn-default">
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