<?php
require_once("../panel@impacto/conexion/conexion.php");
require_once("../panel@impacto/conexion/funciones.php");

//VARIABLES DE URL
$Req_Id=$_POST["id"];

//AUDIO DE NOTICIA
$rst_nota=mysql_query("SELECT * FROM iev_edicion_noticia WHERE id=$Req_Id", $conexion);
$fila_nota=mysql_fetch_array($rst_nota);

//VARIABLES
$titulo=$fila_nota["titulo"];
$audio=$fila_nota["audio"];

$resp = array("titulo"=>$titulo, "audio"=>$audio);

echo json_encode($resp);