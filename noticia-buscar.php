<?php
require_once("panel@impacto/conexion/conexion.php");
require_once("panel@impacto/conexion/funciones.php");

//VARIABLES
$header="interno";

################################################################
//PAGINACION DE NOTICIAS
require("libs/pagination/class_pagination.php");

################################################################
/*VARIABLES DE URL AL BUSCAR POR TEXTO*/
$buscar=$_REQUEST["buscar"];

if($buscar<>""){
    $url_web=$web."buscar?buscar=$buscar";
    $page = (isset($_GET['page'])) ? intval($_GET['page']) : 1;
    $rst_noticias   = mysql_query("SELECT COUNT(*) as count FROM iev_noticia WHERE titulo LIKE '%$buscar%' AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC", $conexion);
    $fila_noticias  = mysql_fetch_assoc($rst_noticias);
    $generated      = intval($fila_noticias['count']);
    $pagination     = new Pagination("10", $generated, $page, $url_web."&page", 1, 0);
    $start          = $pagination->prePagination();
    $rst_noticias        = mysql_query("SELECT * FROM iev_noticia WHERE titulo LIKE '%$buscar%' AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC LIMIT $start, 10", $conexion);
}

################################################################
/*BUSCAR SI EL INPUT ESTA VACIO*/

if($buscar==""){
    $url_web=$web."buscar";
    $page = (isset($_GET['page'])) ? intval($_GET['page']) : 1;
    $rst_noticias   = mysql_query("SELECT COUNT(*) as count FROM iev_noticia WHERE fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC", $conexion);
    $fila_noticias  = mysql_fetch_assoc($rst_noticias);
    $generated      = intval($fila_noticias['count']);
    $pagination     = new Pagination("10", $generated, $page, $url_web."?page", 1, 0);
    $start          = $pagination->prePagination();
    $rst_noticias        = mysql_query("SELECT * FROM iev_noticia WHERE fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC LIMIT $start, 10", $conexion);
}

?>
<!DOCTYPE html>
<html lang="es" class="no-js">
    <head>
        <meta charset="utf-8">
        <title>Buscar: <?php echo $buscar; ?></title>

        <!-- PAGINACION -->
        <link rel="stylesheet" href="/libs/pagination/pagination.css" media="screen">

        <?php require_once("w-header-script.php"); ?>

    </head>
    <body class="sub-page">

        <?php require_once("w-header.php"); ?>

        <div class="container">
            <?php require_once("w-saludos-formulario.php"); ?>

            <div class="kopa-breadcrumb"></div>
            <!-- kopa-breadcrumb -->

            <div class="row">

                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div id="main-content">
                        <div class="widget kopa-list-posts-widget">

                            <header class="widget-header">
                                <h3 class="widget-title">Buscar: <?php echo $buscar; ?></h3>
                                <i class="fa fa-plus-square-o"></i>
                            </header>

                            <script>
                                (function() {
                                    var cx = '005142815043326354435:5qgiwe8awlo';
                                    var gcse = document.createElement('script');
                                    gcse.type = 'text/javascript';
                                    gcse.async = true;
                                    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
                                        '//www.google.com/cse/cse.js?cx=' + cx;
                                    var s = document.getElementsByTagName('script')[0];
                                    s.parentNode.insertBefore(gcse, s);
                                })();
                            </script>
                            <gcse:searchresults-only></gcse:searchresults-only>

                        </div>
                        <!-- kopa-list-posts-widget -->

                    </div>
                    <!-- main content -->

                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div id="sidebar" class="widget-area-26">

                        <?php require_once("w-portada.php"); ?>

                        <?php require_once("w-galeria-fotos.php"); ?>

                    </div>
                    <!-- sidebar -->

                </div>
            </div>
            <!-- row -->
        </div>
        <!-- container -->

        <?php require_once("w-footer.php"); ?>

        <?php require_once("w-footer-script.php"); ?>

    </body>
</html>