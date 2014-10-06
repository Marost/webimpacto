<?php
session_start();
include("../../conexion/conexion.php");
include("../../conexion/funciones.php");
require_once('../../js/plugins/thumbs/ThumbLib.inc.php');

//VARIABLES DE URL
$Req_Url=$_REQUEST["not"];

//DECLARACION DE VARIABLES
$nombre=$_POST["nombre"];
$url=getUrlAmigable(eliminarTextoURL($nombre));
$contenido=$_POST["contenido"];
$pagina=$_POST["pagina"];
$tipo_noticia=$_POST["tipo_noticia"];

//FECHA Y HORA
$pub_fecha=$_POST["pub_fecha"];
$pub_hora=$_POST["pub_hora"];
$fecha_publicacion=$pub_fecha." ".$pub_hora;
$publicar=1;

//TAGS
$tags=$_POST["tags"];
if($tags==""){ $union_tags=0; }
elseif($tags<>""){ $union_tags=implode(",", $tags);}

//SUBIR IMAGEN
$upload_imagen=$_POST["uploader_0_tmpname"];
$upload_imagenin=$_POST["uploader_1_tmpname"];

//SUBIR VIDEO
$video_youtube=$_POST["video_youtube"];
$video_upload=$_POST["uploader_video_0_tmpname"];

//IMAGEN
if($upload_imagen<>""){
    $imagen=$upload_imagen;
    $imagen_carpeta=fechaCarpeta()."/";
    guardarImagen($imagen, $imagen_carpeta);
}else{
    $imagen=""; $imagen_carpeta="";
}

if($upload_imagenin<>""){
    $imagenin=$upload_imagenin;
    $imagenin_carpeta=fechaCarpeta()."/";
    guardarImagen($imagenin, $imagenin_carpeta);
}else{
    $imagenin=""; $imagenin_carpeta="";
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
$rst_guardar=mysql_query("INSERT INTO ".$tabla_suf."_edicion_noticia (url, titulo, pagina, contenido, imagen, imagen_carpeta, imagenin, imagenin_carpeta, fecha_publicacion, publicar, video, audio, edicion_id)
VALUES('$url', '".htmlspecialchars($nombre)."', '$pagina', '$contenido', '$imagen', '$imagen_carpeta', '$imagenin', '$imagenin_carpeta', '$fecha_publicacion', $publicar, '$video', '$audio', $Req_Url);",$conexion);

if (mysql_errno()!=0){
	echo "ERROR: <strong>".mysql_errno()."</strong> - ". mysql_error();
	mysql_close($conexion);
	header("Location:lista.php?not=$Req_Url&msj=er");
} else {
	mysql_close($conexion);
	header("Location:lista.php?not=$Req_Url&msj=ok");
}