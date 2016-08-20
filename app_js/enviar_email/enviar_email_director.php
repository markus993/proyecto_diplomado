<?php
   
// ----------------------------- DATOS DE SMTP Y CUENTA DE ENVÍO -------------------------------

  // primero hay que incluir la clase phpmailer para poder instanciar
  //un objeto de la misma
  require ("PHPMailer/class.phpmailer.php");
  require ("PHPMailer/class.smtp.php");

  //instanciamos un objeto de la clase phpmailer al que llamamos 
  //por ejemplo mail
  $mail=new phpmailer();

  //Definimos las propiedades y llamamos a los métodos 
  //correspondientes del objeto mail

  //indicamos a la clase phpmailer donde se 
  //encuentra la clase smtp 

  //Con la propiedad Mailer le indicamos que vamos a usar un 
  //servidor smtp
  $mail->Mailer = "smtp";

  //Asignamos a Host el nombre de nuestro servidor smtp
  $mail->Host = "smtp.gmail.com";
  
  //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
 
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

  //Le indicamos que el servidor smtp requiere autenticación
  $mail->SMTPAuth = true;

  //Le decimos cual es nuestro nombre de usuario y password
  $mail->Username = "alexcord477@gmail.com"; 
  $mail->Password = "3117842659";

  //Indicamos cual es nuestra dirección de correo y el nombre que 
  //queremos que vea el usuario que lee nuestro correo
  $mail->From = "alexcord477@gmail.com";
  $mail->FromName = "SGEP UNIAJC";

  //el valor por defecto 10 de Timeout es un poco escaso dado que voy a usar 
  //una cuenta gratuita, por tanto lo pongo a 30  
  $mail->Timeout=120;

// ----------------------------- DATOS DEL MENSAJE -------------------------------

$url = 'http://186.146.248.97:8585/proyecto_diplomado/web/app_dev.php/materias/sesiones/mail/';
$content = file_get_contents($url);
$json = json_decode($content);

 foreach($json as $obj){
        $id_ejecucion = $obj->id_ejecucion;
		$mail_docente = $obj->mail_docente;
        $materia = $obj->materia;
		$fecha_vencida= $obj->fecha_vencida;
		$sesion_vencida = $obj->sesion_vencida;
		



  //Indicamos cual es la dirección de destino del correo
  $mail->AddAddress('markus993@hotmail.com');
  //$mail->AddAddress($mail_docente);

  //Asignamos asunto y cuerpo del mensaje
  //El cuerpo del mensaje lo ponemos en formato html, haciendo 
  //que se vea en negrita
  $mail->Subject = "Plantilla de Ejecucion de Programa por Asignatura  NO Diligenciada";
  $mail->Body = "<h2>Sr. Director </h2>
                 <br>
				 <h3>Cordial saludo</h3>
				 <br>
				 <p>Se le ha enviado este correo electrónico para Notificarle que la Plantilla de Ejecución del plan de Curso 
				    no se ha diligenciado por parte del vocero y/o docente  en la fecha programada, 
				    este email se reenviara automaticamente al Docente.
                    <br>Gracias.
					<br>
					</p>"
					."MATERIA: ".$materia."<br>"
					."FECHA VENCIDA: ".$fecha_vencida."<br>"
					."SESION VENCIDA: ".$sesion_vencida."<br>"			 
				 ;

  //Definimos AltBody por si el destinatario del correo no admite email con formato html 
  $mail->AltBody = " ";
 
  
  //Decimos que el email va a ser tipo HTML
  $mail->IsHTML(true); 
  
  if ($mail->Send()) {
  	echo "Envío correcto";
	echo "<br>";
  }else {
  	echo "Error".$mail->ErrorInfo;  // La propiedad errorinfo contiene el error
  }
  
}  


   
?>