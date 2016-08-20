	function load_materias(rol,id_docente){

		if (rol == 'vocero'){
			$.get(
				"/proyecto_diplomado/web/app_dev.php/materias/"+rol+"/"+id_docente,
				function (datos) {
					  $("#tbody").html('');
					$.each(datos, function(i, val) {
					console.log(val);  
					out = '<tr><td><a class="btn btn-small btn-success" href="/proyecto_diplomado/app_js/menu/sesiones.php?rol='+rol+'&materia='+val['id_asignatura']+'">></a></td><td></td><td>'+val['nombre']+'</td></tr>';
					  $("#tbody").append(out);
					});
				}
			);
		}else{
			$.get(
				"/proyecto_diplomado/web/app_dev.php/materias/"+rol+"/"+id_docente,
				function (datos) {
					  $("#tbody").html('');
					$.each(datos, function(i, val) {
					console.log(val);  
					out = '<tr><td><a class="btn btn-small btn-success" href="/proyecto_diplomado/app_js/menu/sesiones.php?rol='+rol+'&materia='+val['id_asignatura']+'">></a></td><td><a target="blank" class="btn btn-small btn-success" href="/proyecto_diplomado/app_js/pdf/informe.php?var='+val['id_asignatura']+'">PDF</a></td><td>'+val['nombre']+'</td><td>'+val['periodo']+'</td></tr>';
					  $("#tbody").append(out);
					});
				}
			);
		}
	}

	function load_temas(materia,sesion){
		$.get(
			"/proyecto_diplomado/web/app_dev.php/materias/temas/"+materia+'/'+sesion,
			function (datos) {
				  $("#tematica").html('');
				$.each(datos, function(i, val) {
				//console.log(val);  
				out = '<li>'+val['tema']+'</li>';
				 $("#tematica").append(out);
				});
			}
		);
	}

	function load_temas_editor(materia,sesion){
		$.get(
			"/proyecto_diplomado/web/app_dev.php/materias/temas_all/"+materia,
			function (datos) {
				$("#tbody").html('');
				$.each(datos, function(i, val) {
				console.log(val);  
				out = '<tr><td><input type="checkbox" name="chk_group[]" value="'+val['id_unidad']+'"></td><td>'+val['tema']+'</td><td></tr>';
				$("#tbody").append(out);
				});
			}
		);
	}

	function save_temas_editor(materia,sesion){

		var values = [];
		$(':checkbox:checked').each(function(i){
			values[i] = $(this).val();
		});
		console.log(values);
		$.post(
			"menu/session.php", 
				{ 
					session: 'start', 
					materia: materia,
					sesion: sesion,
					temas: values
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
	}

	function load_sesiones(rol,materia){
		$.get(
			"/proyecto_diplomado/web/app_dev.php/materias/sesiones/"+materia,
			function (datos) {
				$("#tbody").html('');
				if(datos != 'false'){
					$.each(datos, function(i, val) {
					//console.log(val);  
					out = '<tr><td><a class="btn btn-small btn-success" href="/proyecto_diplomado/app_js/menu/sesion.php?materia='+materia+'&sesion='+val['sesion']+'&rol='+rol+'">></a></td><td>Semana '+val['sesion']+'</td></tr>';
					});
				}else{
					out = '<tr><td></td><td>Sin Sesiones Programadas </td></tr>';
				}
				$("#tbody").append(out);
			}
		);
	}

	function no_implementado(){
		alert('funcion no implementada');
		return false;
	}

	function guarda_vocero(){
		id_ejecucion = $('#id_ejecucion').val();
		firma_vocero = $('#firma_vocero').prop('checked');
		if(firma_vocero)
			firma_vocero = 't';
		else
			firma_vocero = 'f';

		$.post(
			'/proyecto_diplomado/web/app_dev.php/guarda/vocero/',
				{ 
					id_ejecucion: id_ejecucion,
					firma_vocero: firma_vocero
				},
			function(data) {
				if(data == 'true')
					alert('Guardado correctamente');
				else
					alert('Hubo un error al guardar');
				}
		);
		return false;
	}

	function guarda_director(){
		id_ejecucion = $('#id_ejecucion').val();
		observacion_Facultad = $('#observacion_Facultad').text();
		
		$.post(
			'/proyecto_diplomado/web/app_dev.php/guarda/director/',
				{ 
					id_ejecucion: id_ejecucion,
					observacion_Facultad: observacion_Facultad
				},
			function(data) {
				if(data == 'true')
					alert('Guardado correctamente');
				else
					alert('Hubo un error al guardar');
				}
		);
		return false;
	}

	function guarda_docente(){
		id_ejecucion = $('#id_ejecucion').val();
		firma_docente = $('#firma_docente').prop('checked');
		fecha = $('#fecha').val();
		horas = $('#horas').val();
		observacion_docente = $('#observacion_docente').text();
		
		if(firma_docente)
			firma_docente = 't';
		else
			firma_docente = 'f';
		$.post(
			'/proyecto_diplomado/web/app_dev.php/guarda/docente/',
				{ 
					id_ejecucion: id_ejecucion,
					firma_docente: firma_docente,
					fecha: fecha,
					horas: horas,
					observacion_docente: observacion_docente
				},
			function(data) {
				if(data == 'true')
					alert('Guardado correctamente');
				else
					alert('Hubo un error al guardar');
				}
		);
		return false;
	}

	function cerrar_sesion(){
		console.log(cerrar_sesion);
		$.post(
			"/proyecto_diplomado/web/app_dev.php/deauth",
			{ 
				sesion: 'close'
			},
			 function(data) {
				console.log(data);
				if(data == 'true'){
				  window.location = '/&session=close';
				}else{
					alert('error cerrando sesion');
				}
			}
		); 
	}