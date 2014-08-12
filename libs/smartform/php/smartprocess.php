<?php
require_once("../../../panel@impacto/conexion/conexion.php");
require_once("../../../panel@impacto/conexion/funciones.php");

	if (!isset($_SESSION)) session_start(); 
	if(!$_POST) exit;
	
	// Enter your name or company name below
	$receiver_name = "Hello";
	
	// Enter email address below for receiving the form
	// All Contact messages will be sent there
	$receiver_email = "example@domain.com";
	
	// Enter email subject below
	// This will be your message subject
	$msg_subject = "New Contact Message";
	
	$sendername = strip_tags(trim($_POST["sendername"]));
	$sendersubject = strip_tags(trim($_POST["sendersubject"]));
	$sendermessage = strip_tags(trim($_POST["sendermessage"]));
    $securitycode = strip_tags(trim($_POST["securitycode"]));
	
	/*
	========================================
	Start server side validation
	========================================
	*/ 
	$errors = array();
	 //validate name
	if(isset($_POST["sendername"])){
	 
			if (!$sendername) {
				$errors[] = "Ingresa tu nombre";
			} elseif(strlen($sendername) < 2)  {
				$errors[] = "Nombre: Minimo 2 caracteres";
			}
	 
	}

	//validate subject
	if(isset($_POST["sendersubject"])){
			if (!$sendersubject) {
				$errors[] = "Ingresa tu país";
			} elseif(strlen($sendersubject) < 4)  {
				$errors[] = "País: Minimo 2 caracteres";
			}
	}
	
	//validate message / comment
	if(isset($_POST["sendermessage"])){
		if (strlen($sendermessage) < 10) {
			if (!$sendermessage) {
				$errors[] = "Ingresa tu mensaje";
			} else {
				$errors[] = "Mensaje: Minimo 2 caracteres";
			}
		}
	}
	
	//validate security captcha
	if(isset($_POST["securitycode"])){
		if (!$securitycode) {
			$errors[] = "Ingresa el codigo";
		} else if ($securitycode<>16) {
			$errors[] = "El codigo es incorrecto";
		}
	}
	
	if ($errors) {
		//Output errors in a list
		$errortext = "";
		foreach ($errors as $error) {
			$errortext .= '<li>'. $error . "</li>";
		}
	
		echo '<div class="alert notification alert-error">Ha ocurrido los siguientes errores:<br><ul>'. $errortext .'</ul></div>';
	
	} else{

        $nombre=$sendername;
        $pais=$sendersubject;
        $mensaje=$sendermessage;
        $fecha=$fechaActual;
        $estado="D";

        $rst_saludo=mysql_query("INSERT INTO iev_saludos (nombre, contenido, pais, estado_saludo, fecha) VALUES('$nombre', '$pais', '$mensaje', '$estado', '$fecha')", $conexion);

        if (mysql_errno()!=0){
            echo "ERROR: <strong>".mysql_errno()."</strong> - ". mysql_error();
            mysql_close($conexion);
            echo '<div class="alert notification alert-error">Ha ocurrido un error al enviar el mensaje.</div> ';
        } else {
            mysql_close($conexion);
            echo '<div class="alert notification alert-success">Tu mensaje ha sido enviado.</div> ';
        }
	}
?>