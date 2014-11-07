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

//SUBIR IMAGEN
if(is_uploaded_file($_FILES['fileInput']['tmp_name'])){ 
	$fileName=$_FILES['fileInput']['name'];
	$uploadDir="../../../imagenes/columnistas/";
	$uploadFile=$uploadDir.$fileName;
	$num = 0;
	$name = $fileName;
	$extension = end(explode(".", $fileName));     
	$onlyName = substr($fileName,0,strlen($fileName)-(strlen($extension)+1));
	while(file_exists($uploadDir.$name))
	{
		$num++;         
		$name = $onlyName."".$num.".".$extension; 
	}
	$uploadFile = $uploadDir.$name; 
	move_uploaded_file($_FILES['fileInput']['tmp_name'], $uploadFile);  
	$name;
}

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
	'$cargo','
	'$nombre_completo',
	'$name',
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