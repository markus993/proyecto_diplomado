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
	}
	else{
		echo 'ingreso no valido';
		exit();
	}
	
	switch ($rol) {
		case 'director':
			$label='Director';
			break;

		case 'docente':
			$label='Docente';
			break;

		case 'vocero':
			$label='Vocero';
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
					</h1>
					<ol class="breadcrumb">
						<li>
							<a href="/proyecto_diplomado/app_js/menu/">
								<i class="fa fa-dashboard"></i>Home
							</a>
						</li>
						<li class="active">Materias</li>
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
											<th>Ingresar</th>
											<th></th>
											<th>Materia</th>
										</tr>
									</thead>
									<tbody id="tbody">
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
<script type="text/javascript">
	load_materias('<?=$rol ?>',<?=$_SESSION['identificacion'] ?>);
</script>