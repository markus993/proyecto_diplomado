
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
						<small>Lista de Materias</small>
						Docente
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
							<div class="panel panel-default">
								<div class="panel-heading">Todas las Materias</div>
								<table class="table table-striped">
									<thead>
										<tr>
											<th>ID</th>
											<th>Materia</th>
											<th>Sede</th>
											<th>Grupo</th>
											<th>Estado</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>Cali</td>
											<td>805000889-0</td>
											<td>Institución Universitaria Antonio José Camacho</td>
											<td><input disabled="disabled" checked="checked" type="checkbox"></td>
											<td>
												<a class="btn btn-small btn-success" href="/proyecto_diplomado/app_js/menu/sesion.php?rol=vocero&materia=12">Ver</a>
											</td>
										</tr>
									</tbody>		
								</table>
								<div class="centrado"></div>
							</div>
						</div><!-- /.box-body -->
					</div>
				</section><!-- /.content -->
			</aside><!-- /.right-side -->
		</div><!-- ./wrapper -->
		<?php include 'footer.php';?>
	</body>
</html>