$(document).ready(function () {
	'use strict';
	
	//Inicia la sesión del usuario
	iniciarSesion();

	//Ajusta el alto del body al tamaño de la pantalla
	$('body').height($(window).height());
});

//Inicia la sesión del usuario
function iniciarSesion() {
	'use strict';

	$('#login_boton_ingresar').click(function () {
		var loginUsuario    = $('#login_usuario'),
			loginContrasena = $('#login_contrasena'),
			loginEstado     = false,
			sesion          = {};

		if (loginUsuario.val().length === 0) {
			loginUsuario.notify(
				"Falta ingresar el usuario",
				{ className: "error", position: "right" }
			);
		} else if (loginContrasena.val().length === 0) {
			loginContrasena.notify(
				"Falta ingresar la contraseña",
				{ className: "error", position: "right" }
			);
		} else {
			mostrarCargando();
		
			//Aqui va el api call para verificar el usuario y contraseña
			
			$.post(
				"/proyecto_diplomado/web/app_dev.php/auth",
				{ 
					id: loginUsuario.val(),
					pass: CryptoJS.SHA3(loginContrasena.val()).toString() 
				},
				 function (datos) {
					$.post( 
						"menu/session.php", 
  						{ 
  							session: 'start', 
  							identificacion: loginUsuario.val(), 
  							roles: datos
  						},
						function(data) {
							console.log(data);
							if(data == 'true'){
							  window.location = 'menu/';
							}else{
								ocultarCargando();
								loginContrasena.notify(
									"Usuario o contraseña incorrecta",
									{ className: "error", position: "right" }
								);
							}
						}
					);
			});        
		}
	});
}
