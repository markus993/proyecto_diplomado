
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Datalpha - Homologaciones</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link rel="icon" type="image/png" href="img/favicon.ico">
        <!-- jQuery UI 1.10.3 -->        
		<script src="js/jquery-1.11.3.min.js"></script>
        <!-- bootstrap 3.0.2 -->
        <link media="all" type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
        <!-- font Awesome -->
        <link media="all" type="text/css" rel="stylesheet" href="css/font-awesome.min.css">
        <!-- Ionicons -->
        <link media="all" type="text/css" rel="stylesheet" href="css/ionicons.min.css">
        <!-- Morris chart -->
        <link media="all" type="text/css" rel="stylesheet" href="css/morris.css">
        <!-- jvectormap -->
        <link media="all" type="text/css" rel="stylesheet" href="css/jquery-jvectormap-1.2.2.css">
        <!-- Daterange picker -->
        <link media="all" type="text/css" rel="stylesheet" href="css/daterangepicker-bs3.css">
        <!-- bootstrap wysihtml5 - text editor -->
        <link media="all" type="text/css" rel="stylesheet" href="css/bootstrap3-wysihtml5.min.css">
        <!-- Theme style -->
        <link media="all" type="text/css" rel="stylesheet" href="css/AdminLTE.css">

        <link media="all" type="text/css" rel="stylesheet" href="css/select2.min.css">
		<link media="all" type="text/css" rel="stylesheet" href="css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script type="text/javascript">
			$( document ).ready(function() {
                $("input[type*=text]").addClass("form-control");
				$("input[type*=number]").addClass("form-control");
				$("input[type*=date]").addClass("form-control");
				$("select").addClass("form-control");
				//$("select").select2();
			});
		</script>

        
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="http://181.48.204.173/homologaciones/public" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                <img alt="UNIAJC" src="img/logo_uniajc_azul.png" style="width:100px">
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span>Admin <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="img/avatar3.png" class="img-circle" alt="User Image" />
                                    <p>
                                        Admin
                                        <small>Member since Nov. 2012</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="#" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li>
                            <a href="paises">
                                <i class="fa fa-dashboard"></i> <span>Paises</span>
                            </a>
                        </li>
                        <li>
                            <a href="departamentos">
                                <i class="fa fa-dashboard"></i> <span>Departamentos</span>
                            </a>
                        </li>
                        <li>
                            <a href="ciudades">
                                <i class="fa fa-dashboard"></i> <span>Ciudades</span>
                            </a>
                        </li>
                        <li>
                            <a href="instituciones">
                                <i class="fa fa-dashboard"></i> <span>Instituciones</span>
                            </a>
                        </li>
                        <li>
                            <a href="facultades">
                                <i class="fa fa-dashboard"></i> <span>Facultades</span>
                            </a>
                        </li>
                        <li>
                            <a href="programas">
                                <i class="fa fa-dashboard"></i> <span>Programas</span>
                            </a>
                        </li>
                        <li>
                            <a href="asignaturas">
                                <i class="fa fa-dashboard"></i> <span>Asignaturas</span>
                            </a>
                        </li>
                        <li>
                            <a href="pensums">
                                <i class="fa fa-dashboard"></i> <span>Pensums</span>
                            </a>
                        </li>
                        <li>
                            <a href="documentos">
                                <i class="fa fa-dashboard"></i> <span>Documentos</span>
                            </a>
                        </li>
                        <li>
                            <a href="personas">
                                <i class="fa fa-dashboard"></i> <span>Personas</span>
                            </a>
                        </li>
                        <li>
                            <a href="homologaciones">
                                <i class="fa fa-dashboard"></i> <span>Homologaciones</span>
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
                        Dashboard
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
					<div class="box box-info">						
                        <div class="box-body">
                                                    </div><!-- /.box-body -->
                    </div>
                	

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
 
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js"></script>
        <!-- Morris.js charts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="js/morris.min.js"></script>
        <!-- Sparkline -->
        <script src="js/jquery.sparkline.min.js"></script>
        <!-- jvectormap -->
        <script src="js/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="js/jquery-jvectormap-world-mill-en.js"></script>
        <!-- daterangepicker -->
        <script src="js/daterangepicker.js"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="js/bootstrap3-wysihtml5.all.min.js"></script>
        <!-- iCheck -->
        <script src="js/icheck.min.js"></script>
        <!-- AdminLTE App -->
        <script src="js/app.js"></script>
    </body>
</html>