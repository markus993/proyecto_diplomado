 function sesiones(rol,identificacion) {
	$.get( 
		"/proyecto_diplomado/web/app_dev.php/materias/"+rol+"/"+identificacion, 
		function(data) {
			console.log(data);
		}
	);
}