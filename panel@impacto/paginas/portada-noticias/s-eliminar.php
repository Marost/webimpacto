<?php
session_start();
include("../../conexion/conexion.php");
include("../../conexion/funciones.php");
require_once('../../js/plugins/thumbs/ThumbLib.inc.php');

//VARIABLES DE URL
$Req_Not=$_REQUEST["not"];

//DECLARACION DE VARIABLES
$id=$_REQUEST["id"];

mysql_query("DELETE FROM ".$tabla_suf."_edicion_noticia WHERE id=$id;", $conexion);

if (mysql_errno()!=0){
	echo "ERROR: <strong>".mysql_errno()."</strong> - ". mysql_error();
	mysql_close($conexion);
	header("Location:lista.php?not=$Req_Not&msj=er");
} else {
	mysql_close($conexion);
	header("Location:lista.php?not=$Req_Not&msj=el");
}

?>