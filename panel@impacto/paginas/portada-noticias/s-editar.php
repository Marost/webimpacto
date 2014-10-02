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
//$video_upload=$_POST["uploader_video_0_tmpname"];

//AUDIO
$audio=$_POST["audio"];

//IMAGEN
if($_POST['uploader_0_tmpname']<>""){
    $imagen=$_POST["uploader_0_tmpname"];
    $imagen_carpeta=fechaCarpeta()."/";

    guardarImagen($imagen, $imagen_carpeta);

}else{
    $imagen=$_POST["imagen"];
    $imagen_carpeta=$_POST["imagen_carpeta"];

    guardarImagen($imagen, $imagen_carpeta);

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