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
			$.get("http://192.168.0.30:8585/proyecto_diplomado/web/app_dev.php/rol/"+loginUsuario.val(), function (datos) {

				/*if(datos!=false){
					$.each(datos.usuarios, function (id, dato) {
						if (loginUsuario.val() == dato.usuario &&
							CryptoJS.SHA3(loginContrasena.val()).toString(CryptoJS.enc.Base64) == CryptoJS.SHA3(dato.contrasena).toString(CryptoJS.enc.Base64)) {
							loginEstado     = true;
							sesion.usuario  = loginUsuario.val();
							sesion.nombre   = dato.nombre;
							sesion.perfil   = dato.perfil;
							sesion.token    = tokenAleatorio();
						}
					});
					loginEstado     = true;
				}
				
				if (loginEstado === true) {
					guardarLocalStorage('datAlphaSesion', JSON.stringify(sesion));
					window.location = 'main.html';
				} else {
					$('#mensaje').html('<div>Rol response: '+datos+'</div>');
					ocultarCargando();
					$('#login_boton_ingresar').notify(
						"El usuario o la contraseña son invalidos",
						{ className: "error", position: "right" }
					);
				}*/
				
				ocultarCargando();

				$('#mensaje').html('<div>Rol : '+datos+'</div>');
			});        
		}
	});
}
