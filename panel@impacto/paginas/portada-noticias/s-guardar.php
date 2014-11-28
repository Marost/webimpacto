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

//FECHA Y HORA
$pub_fecha=$_POST["pub_fecha"];
$pub_hora=$_POST["pub_hora"];
$fecha_publicacion=$pub_fecha." ".$pub_hora;
$publicar=1;

//SUBIR IMAGEN
$upload_imagenTmp=$_POST["uploader_0_tmpname"];
$upload_imagenName=$_POST["uploader_0_name"];

$upload_imageninTmp=$_POST["uploader_1_tmpname"];
$upload_imageninName=$_POST["uploader_1_name"];

//SUBIR VIDEO
$video_youtube=$_POST["video_youtube"];

//IMAGEN
if($upload_imagenTmp<>""){
    $imagen_carpeta=fechaCarpeta()."/";
    
    $imagen = guardarImagen($upload_imagenTmp, $imagen_carpeta, $upload_imagenName);

}else{
    $imagen=""; $imagen_carpeta="";
}

if($upload_imageninTmp<>""){
    $imagenin_carpeta=fechaCarpeta()."/";
    
    $imagenin = guardarImagen($upload_imageninTmp, $imagenin_carpeta, $upload_imageninName);

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

echo $imagen."<br>";
echo $imagenin."<br>";

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