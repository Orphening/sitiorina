<?php
	
	$nombre = $_POST["nombre"];
	$correo = $_POST["correo"];
	$fono = $_POST["fono"];
	
	include "class.phpmailer.php";
	include "class.smtp.php";
	
	//Inicia una clase de PHPMailer	
	
	$mail = new PHPMailer();	
	//Defino los datos del servidor y de conexión
	$mail->IsSMTP();
	$mail->Host     = "mail.dominio.cl";            //Servidor SMTP
	$mail->SMTPAuth = true;				//Autenticación
	$mail->SMTPSecure = "tls";
	$mail->Port     = 587;
	$mail->Username = "correo@correo.cl";         	//Usuario
	$mail->Password = "***********";		//Contraseña
	//Definir Remitente
	$mail->From     = "correo@correo.cl";   	 //Correo Remitente
	$mail->FromName = "Nombre REmitente";            //Nombre de Remitente
	//Definir destinatario(s)
	$mail->AddAddress("correo@correo.cl",$nombre);
	//$mail->AddCC('correo@gmail.com', 'ME');  //Copia
	//$mail->AddBCC('correo@gmail.com', 'ME'); //Copia Oculta
	
	//Define los datos técnicos del mensaje
	$mail->IsHTML(true);  //Define que un email sea enviado como HTML
	
	//Define el Texto y Asunto
	$mail->Subject  = utf8_decode("Solicitud de Evaluación Gratis");    		  //Asunto		  
	$mail->Body     = "<h2>Solicitud de Evaluación Gratuita</h2><h4>Nombre: <b>$nombre</b></h4><h4>Correo: <b>$correo</b></h4><h4>Teléfono: <b>$fono</b></h4>";     //Mensaje

	//Enviar mensaje
	$enviado = $mail->Send();
	
	if($enviado){
		echo "Email enviado con éxito";
	}else{
		echo "No fue posible enviar el correo";
	}
	
?>
