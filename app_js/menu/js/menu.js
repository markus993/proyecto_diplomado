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
				console.log(val);  
				out = '<li>'+val['tema']+'</li>';
				 $("#tematica").append(out);
				});
			}
		);
	}

	function load_sesiones(rol,materia){
		$.get(
			"/proyecto_diplomado/web/app_dev.php/materias/sesiones/"+materia,
			function (datos) {
				  $("#tbody").html('');
				$.each(datos, function(i, val) {
				console.log(val);  
				out = '<tr><td><a class="btn btn-small btn-success" href="/proyecto_diplomado/app_js/menu/sesion.php?materia='+val['id_asignatura']+'&sesion='+val['sesion']+'&rol='+rol+'">></a></td><td>Semana '+val['sesion']+'</td></tr>';
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
		if(firma_vocero)
			firma_vocero = 't';
		else
			firma_vocero = 'f';
		url = '<?= "http://186.146.248.97:8585/proyecto_diplomado/web/app_dev.php/asignacion/vocero/$id_asignacion/$id_ejecucion/$id_facultad/$id_plan/" ?>'+firma_vocero;
		$.get(url, function(data, status){
			alert("Save: " + data + "\nStatus: " + status);
		});
		return false;
	}