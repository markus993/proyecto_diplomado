<?php 
	session_start();
	if (isset($_POST['session']) && $_POST['session']=='start') {

		$session = 'false';
		$roles = json_decode( htmlspecialchars_decode ($_POST['roles']));

		$_SESSION['vocero'] = 'false';
		$_SESSION['docente'] = 'false';
		$_SESSION['director'] = 'false';

		if( isset($roles->vocero) && $roles->vocero == 'true'){
			$_SESSION['vocero'] = 'true';
			$session = 'true';
		}

		if(isset($roles->docente) && $roles->docente == 'true'){
			$_SESSION['docente'] = 'true';
			$session = 'true';
		}

		if(isset($roles->director) && $roles->director == 'true'){
			$_SESSION['director'] = 'true';
			$session = 'true';
		}

		$_SESSION['identificacion']=$_POST['identificacion'];

		if($session!='true'){
			session_destroy();
			echo 'false';
		}else{
			$_SESSION['session'] = $session;
			echo 'true';
		}
		
	}else{
	    print_r ('No hay Sesion abierta');
	    exit();
	}
?>