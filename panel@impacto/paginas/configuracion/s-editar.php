<?php
session_start();
include("../../conexion/conexion.php");
include("../../conexion/funciones.php");

//DECLARACION DE VARIABLES
$nombre=$_POST["nombre"];
$web=$_POST["web"];
$descripcion=$_POST["descripcion"];
$palabras_clave=$_POST["palabras_clave"];

//INSERTANDO DATOS
$rst_guardar=mysql_query("UPDATE ".$tabla_suf."_empresa SET nombre='".htmlspecialchars($nombre)."', 
	web='$web', 
	descripcion='$descripcion', 
	palabras_clave='$palabras_clave' WHERE id=1;", $conexion);

if (mysql_errno()!=0){
	echo "ERROR: <strong>".mysql_errno()."</strong> - ". mysql_error();
	mysql_close($conexion);
	header("Location:f-editar.php?msj=er");
} else {
	mysql_close($conexion);
	header("Location:f-editar.php?msj=ok");
}

?>