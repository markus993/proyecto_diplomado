
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="es" class="bg-black">
<head>
	<title>DatAlpha| Login</title>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	<link rel="icon" type="image/png" href="img/favicon.ico">
	<!-- CSS Files -->
	<link href="css/jquery-ui.min.css" rel="stylesheet" type="text/css">
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="css/global.min.css" rel="stylesheet" type="text/css">
	<!-- Javascript Files -->
	<script src="js/jquery.min.js" type="text/javascript"></script>
	<script src="js/jquery-ui.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/global.min.js" type="text/javascript"></script>
	<script src="js/login.js" type="text/javascript"></script>
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="js/plugins/html5shiv.min.js"></script>
	<script src="js/plugins/respond.min.js"></script>
	<![endif]-->
	<script src="js/notify.min.js"></script>
	<script src="js/sha3.js"></script>
	<script src="js/enc-base64-min.js"></script>
</head>
<body id="login" class="bg-black">
	<div class="form-box" id="login-box">
		<div class="header">
			<img id="logo_login" alt="UNIAJC" src="img/logo_uniajc_blanco.png"><br><br>
		</div>
		<div>
			<div class="body bg-gray">
				<div class="form-group">
					<input id="login_usuario" type="number" type="text" name="userid" class="form-control" placeholder="Usuario">
				</div>
				<div class="form-group">
					<input id="login_contrasena" type="password" name="password" class="form-control" placeholder="Contraseña">
				</div>
				<div class="form-group">
					<div class="form-control" id="mensaje"></div>
				</div>
			</div>
			<div class="footer">
				<button id="login_boton_ingresar" type="submit" class="btn bg-blue btn-block tecla_enter jquery_button">Ingresar</button>
			</div>
		</div>
	</div>
</body>
</html>
