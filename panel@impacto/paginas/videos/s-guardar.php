<?php
session_start();
include("../../conexion/conexion.php");
include("../../conexion/funciones.php");
require_once('../../js/plugins/thumbs/ThumbLib.inc.php');

//DECLARACION DE VARIABLES
$titulo=$_POST["titulo"];
$url=getUrlAmigable(eliminarTextoURL($titulo));
$video=$_POST["video"];
$publicar=1;

//FECHA
$pub_fecha=$_POST["pub_fecha"];
$pub_hora=$_POST["pub_hora"];
$fecha_publicacion=$pub_fecha." ".$pub_hora;

//SUBIR IMAGEN
$upload_imagen=$_POST["uploader_0_tmpname"];

//IMAGEN
if($upload_imagen<>""){
	$imagen=$upload_imagen;
	$imagen_carpeta=fechaCarpeta()."/";	
	$mostrar_imagen=1;
	$thumb=PhpThumbFactory::create("../../../imagenes/upload/".$imagen_carpeta."".$imagen."");
	$thumb->adaptiveResize(770,464);
	$thumb->save("../../../imagenes/upload/".$imagen_carpeta."thumb/".$imagen."", "jpg");
}else{
	$imagen=""; $imagen_carpeta="";
}

//INSERTANDO DATOS
$rst_guardar=mysql_query("INSERT INTO ".$tabla_suf."_videos (url, titulo, imagen, imagen_carpeta, video, fecha_publicacion, publicar) 
	VALUES('$url', '".htmlspecialchars($titulo)."', '$imagen', '$imagen_carpeta', '$video', '$fecha_publicacion', $publicar);",$conexion);

if (mysql_errno()!=0){
	echo "ERROR: <strong>".mysql_errno()."</strong> - ". mysql_error();
	mysql_close($conexion);
	header("Location:lista.php?msj=er");
} else {
	mysql_close($conexion);
	header("Location:lista.php?msj=ok");
}

?>