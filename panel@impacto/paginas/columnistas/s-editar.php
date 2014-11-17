<?php
session_start();
include("../../conexion/conexion.php");
include("../../conexion/funciones.php");
require_once('../../js/plugins/thumbs/ThumbLib.inc.php');

//DECLARACION DE VARIABLES
$nota_id=$_REQUEST["id"];
$nombre=$_POST["nombre"];
$apellidos=$_POST["apellidos"];
$cargo=$_POST["cargo"];
$nombre_completo=$nombre." ".$apellidos;
$url=getUrlAmigable(eliminarTextoURL($nombre_completo));
$contenido=$_POST["contenido"];

//PUBLICAR
if ($_POST["publicar"]<>""){ $publicar=$_POST["publicar"]; }else{ $publicar=0; }

//SUBIR IMAGEN
if($_POST['uploader_columnista_0_tmpname']<>""){
	$imagen=$_POST["uploader_columnista_0_tmpname"];
}else{
	$imagen=$_POST["imagen"];
}

//INSERTANDO DATOS
$rst_guardar=mysql_query("UPDATE ".$tabla_suf."_columnista SET url='$url',
	nombre='$nombre',
	apellidos='$apellidos',
	cargo='$cargo',
	nombre_completo='$nombre_completo',
	foto='$imagen',
	descripcion='$contenido',
	publicar=$publicar WHERE id=$nota_id;", $conexion);

if (mysql_errno()!=0){
	//echo "ERROR: <strong>".mysql_errno()."</strong> - ". mysql_error();
	mysql_close($conexion);
	header("Location:lista.php?msj=er");
} else {
	mysql_close($conexion);
	header("Location:lista.php?msj=ok");
}

?>