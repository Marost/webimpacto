<?php
session_start();
include("../../conexion/conexion.php");
include("../../conexion/funciones.php");
require_once('../../js/plugins/thumbs/ThumbLib.inc.php');

//DECLARACION DE VARIABLES
$nombre=$_POST["nombre"];
$apellidos=$_POST["apellidos"];
$cargo=$_POST["cargo"];
$nombre_completo=$nombre." ".$apellidos;
$url=getUrlAmigable(eliminarTextoURL($nombre_completo));
$contenido=$_POST["contenido"];
$publicar=1;
$imagen=$_POST["uploader_columnista_0_tmpname"];

//INSERTANDO DATOS
$rst_guardar=mysql_query("INSERT INTO ".$tabla_suf."_columnista (url,
	nombre,
	apellidos,
	cargo,
	nombre_completo,
	foto,
	descripcion,
	publicar) VALUES('$url',
	'$nombre',
	'$apellidos',
	'$cargo',
	'$nombre_completo',
	'$imagen',
	'$contenido',
	$publicar);",$conexion);

if (mysql_errno()!=0){
	//echo "ERROR: <strong>".mysql_errno()."</strong> - ". mysql_error();
	mysql_close($conexion);
	header("Location:lista.php?msj=er");
} else {
	mysql_close($conexion);
	header("Location:lista.php?msj=ok");
}

?>