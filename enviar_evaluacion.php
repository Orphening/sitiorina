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
	$mail->Host     = "mail.rinaruiz.cl";           //Servidor SMTP
	$mail->SMTPAuth = true;						  //Autenticación
	$mail->SMTPSecure = "tls";
	$mail->Port     = 587;
	$mail->Username = "info@rinaruiz.cl";         //Usuario
	$mail->Password = "rina2016";				  //Contraseña
	//Definir Remitente
	$mail->From     = "info@rinaruiz.cl";   		//Correo Remitente
	$mail->FromName = "Rina Ruiz";            //Nombre de Remitente
	//Definir destinatario(s)
	$mail->AddAddress("info@rinaruiz.cl",$nombre);
	//$mail->AddCC('matias.evert@gmail.com', 'ME');  //Copia
	//$mail->AddBCC('matias.evert@gmail.com', 'ME'); //Copia Oculta
	
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