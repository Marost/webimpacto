<?php
session_start();
include("../../conexion/conexion.php");
include("../../conexion/funciones.php");
require_once('../../js/plugins/thumbs/ThumbLib.inc.php');

//DECLARACION DE VARIABLES

$nombre=$_POST["nombre"];
$pais=$_POST["pais"];
$email=$_POST["email"];
$contenido=$_POST["contenido"];
$categoria=$_POST["categoria"];

//FECHAS
$pub_fecha=$_POST["pub_fecha"];
$pub_hora=$_POST["pub_hora"];
$fecha=$pub_fecha." ".$pub_hora;
$publicar="D";


//INSERTANDO DATOS
$rst_guardar=mysql_query("INSERT INTO ".$tabla_suf."_saludos (nombre, contenido, pais, fecha, registro_ip, estado_saludo) VALUES('$nombre', '$contenido', '$pais', '$fecha', '$email', '$publicar');",$conexion);

if (mysql_errno()!=0){
	echo "ERROR: <strong>".mysql_errno()."</strong> - ". mysql_error();
	mysql_close($conexion);
	header("Location:lista.php?msj=er");
} else {
	mysql_close($conexion);
	header("Location:lista.php?msj=ok");
}

?>