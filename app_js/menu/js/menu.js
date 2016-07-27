	function load_materias(rol,id_docente){
		$.get(
			"/proyecto_diplomado/web/app_dev.php/materias/"+rol+"/"+id_docente,
			function (datos) {
				  $("#tbody").html('');
				$.each(datos, function(i, val) {
				console.log(val);  
				out = '<tr><td><a class="btn btn-small btn-success" href="/proyecto_diplomado/app_js/menu/sesiones.php?rol='+rol+'&materia='+val['id_asignatura']+'">></a></td><td>'+val['nombre']+'</td><td>'+val['periodo']+'</td><td>-</td><td>-</td></tr>';
				  $("#tbody").append(out);
				});
			}
		);
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
				$.each(datos, function(i, val) {
				//console.log(val);  
				out = '<tr><td><a class="btn btn-small btn-success" href="/proyecto_diplomado/app_js/menu/sesion.php?materia='+materia+'&sesion='+val['sesion']+'&rol='+rol+'">></a></td><td>Semana '+val['sesion']+'</td></tr>';
				 $("#tbody").append(out);
				});
			}
		);
	}

	function no_implementado(){
		alert('funcion no implementada');
		return false;
	}

	function guarda_vocero(){
		firma_vocero = $('#firma_vocero').prop('checked');
		id_ejecucion = $('#id_ejecucion').val();
		if(firma_vocero)
			firma_vocero = 't';
		else
			firma_vocero = 'f';
		url = '/proyecto_diplomado/web/app_dev.php/asignacion/vocero/'+id_ejecucion+'/'+firma_vocero;
		$.get(url, function(data, status){
			if(status == 'success' && data == 'true')
				alert('Guardado correctamente');
			else
				alert('Hubo un error al guardar');
		});
		return false;
	}

	function guarda_docente(){
		firma_docente = $('#firma_docente').prop('checked');
		fecha = $('#fecha').val();
		horas = $('#horas').val();
		json_tematica = $('#json_tematica').val();
		observacion_docente = $('#observacion_docente').val();
		
		if(firma_docente)
			firma_docente = 't';
		else
			firma_docente = 'f';
		url = '/proyecto_diplomado/web/app_dev.php/asignacion/vocero/'+id_ejecucion+'/'+firma_vocero;
		$.get(url, function(data, status){
			if(status == 'success' && data == 'true')
				alert('Guardado correctamente');
			else
				alert('Hubo un error al guardar');
		});
		return false;
	}