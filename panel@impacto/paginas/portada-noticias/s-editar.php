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
$upload_imagen=$_POST["uploader_0_tmpname"];
$upload_imagenin=$_POST["uploader_1_tmpname"];

//IMAGEN
if($upload_imagen<>""){
    $imagen=$upload_imagen;
    $imagen_carpeta=fechaCarpeta()."/";
    guardarImagen($imagen, $imagen_carpeta);
}else{
    $imagen=$_POST["imagen"];
    $imagen_carpeta=$_POST["imagen_carpeta"];
}

if($upload_imagenin<>""){
    $imagenin=$upload_imagenin;
    $imagenin_carpeta=fechaCarpeta()."/";
    guardarImagen($imagenin, $imagenin_carpeta);
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

if (mysql_errno()!=0){
	echo "ERROR: <strong>".mysql_errno()."</strong> - ". mysql_error();
	mysql_close($conexion);
	header("Location:lista.php?not=$Req_Not&msj=er");
} else {
	mysql_close($conexion);
	header("Location:lista.php?not=$Req_Not&msj=ok");
}

?>