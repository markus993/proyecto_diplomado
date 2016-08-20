	function load_materias(id_docente){
		$.post(
			"/proyecto_diplomado/web/app_dev.php/materias/docente/"+id_docente,
			{ 
				id: loginUsuario.val(),
				pass: CryptoJS.SHA3(loginContrasena.val()).toString()
			},
			function (datos) {
				console.log(datos);
			}
		);
	}