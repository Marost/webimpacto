<?php
session_start();
include("../../conexion/conexion.php");
include("../../conexion/funciones.php");
require_once('../../js/plugins/thumbs/ThumbLib.inc.php');

//VARIABLES DE URL
$Req_Not=$_REQUEST["not"];

//DECLARACION DE VARIABLES
$nota_id=$_REQUEST["id"];
$nombre=$_POST["nombre"];
$url=getUrlAmigable(eliminarTextoURL($nombre));
$contenido=$_POST["contenido"];
$pagina=$_POST["pagina"];

//FECHA Y HORA
$pub_fecha=$_POST["pub_fecha"];
$pub_hora=$_POST["pub_hora"];
$fecha_publicacion=$pub_fecha." ".$pub_hora;

//PUBLICAR
if ($_POST["publicar"]<>""){ $publicar=$_POST["publicar"]; }else{ $publicar=0; }

//VIDEO
$video_youtube=$_POST["video_youtube"];

//AUDIO
$audio=$_POST["audio"];

//SUBIR IMAGEN
$upload_imagenTmp=$_POST["uploader_0_tmpname"];
$upload_imagenName=$_POST["uploader_0_name"];

$upload_imageninTmp=$_POST["uploader_1_tmpname"];
$upload_imageninName=$_POST["uploader_1_name"];

//IMAGEN
if($upload_imagen<>""){
    $imagenTmp=$upload_imagenTmp;
    $imagen_carpeta=fechaCarpeta()."/";
    
    $imagen = guardarImagen($imagenTmp, $imagen_carpeta, $upload_imagenName);
}else{
    $imagen=$_POST["imagen"];
    $imagen_carpeta=$_POST["imagen_carpeta"];
}

if($upload_imagenin<>""){
    $imageninTmp=$upload_imageninTmp;
    $imagenin_carpeta=fechaCarpeta()."/";
    
    $imagenin = guardarImagen($imageninTmp, $imagenin_carpeta, $upload_imageninName);
}else{
    $imagenin=$_POST["imagenin"];
    $imagenin_carpeta=$_POST["imagenin_carpeta"];
}

//VIDEO YOUTUBE
if($video_youtube<>""){
	$mostrar_video=1;
	$tipo_video="youtube";
	$video=$video_youtube;
	$video_carpeta="";
}elseif($video_youtube==""){
	$mostrar_video=0;
	$tipo_video="";
	$video="";
	$video_carpeta="";
}

//AUDIO SOUNDCLOUD
if($audio<>""){
    $audio=$audio;
}elseif($audio==""){
    $audio="";
}

//INSERTANDO DATOS
/*
$rst_guardar=mysql_query("UPDATE ".$tabla_suf."_edicion_noticia SET url='$url', titulo='".htmlspecialchars($nombre)."',
    pagina=$pagina,
	contenido='$contenido', 
	imagen='$imagen', 
	imagen_carpeta='$imagen_carpeta',
	imagenin='$imagenin',
	imagenin_carpeta='$imagenin_carpeta',
	fecha_publicacion='$fecha_publicacion', 
	publicar=$publicar,
	video='$video',
	audio='$audio' WHERE id=$nota_id;", $conexion);
*/

if (mysql_errno()!=0){
	echo "ERROR: <strong>".mysql_errno()."</strong> - ". mysql_error();
	mysql_close($conexion);
	//header("Location:lista.php?not=$Req_Not&msj=er");
} else {
	mysql_close($conexion);
	//header("Location:lista.php?not=$Req_Not&msj=ok");
}

?>