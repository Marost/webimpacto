<?php
require_once("panel@impacto/conexion/conexion.php");
require_once("panel@impacto/conexion/funciones.php");

//VARIABLES DE URL
$Req_Id=$_REQUEST["id"];
$Req_Url=$_REQUEST["url"];

//VARIABLES
$header="interno";

##################################################################################################################
//NOTICIA
$rst_noticia=mysql_query("SELECT * FROM iev_columnista_columna WHERE id=$Req_Id AND fecha_publicacion<='$fechaActual';", $conexion);
$fila_noticia=mysql_fetch_array($rst_noticia);

//VARIABLES DE NOTICIA
$Noticia_id=$fila_noticia["id"];
$Noticia_url=$fila_noticia["url"];
$Noticia_titulo=$fila_noticia["titulo"];
$Noticia_contenido=$fila_noticia["contenido"];
$Noticia_fechaPub=$fila_noticia["fecha_publicacion"];
$Noticia_imagen=$fila_noticia["imagen"];

//SEPARACION FECHA
$Noticia_fechaPubSep=explode(" ", $Noticia_fechaPub);
$Noticia_fecha=explode("-", $Noticia_fechaPubSep[0]);
$NoticiaFecha=nombreFechaTotal($Noticia_fecha[0], $Noticia_fecha[1], $Noticia_fecha[2]);

##################################################################################################################
//NOTICIAS RELACIONADAS
$rst_NotRel=mysql_query("SELECT * FROM iev_noticia WHERE id<>$Req_Id AND categoria=$Noticia_categoria AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC LIMIT 6;", $conexion);

##################################################################################################################
//URLS
$Noticia_UrlWeb=$web."noticia/".$Req_Id."-".$Req_Url;
$Noticia_UrlImg=$web."imagenes/upload/".$Noticia_imagen_carpeta."".$Noticia_imagen;
$Noticia_UrlCat=$web."categoria/".$NotCat_id."/".$NotCat_titulo;

?>
<!DOCTYPE html>
<html lang="es" class="no-js">
    <head>
        <meta charset="utf-8">
        <title><?php echo $Noticia_titulo; ?></title>

        <!-- OPEN GRAPH -->
        <meta property="og:title" content="<?php echo $Noticia_titulo; ?>"/>
        <meta property="og:type" content="article"/>
        <meta property="og:url" content="<?php echo $Noticia_UrlWeb; ?>"/>
        <meta property="og:image" content="<?php echo $Noticia_UrlImg; ?>"/>
        <meta property="og:site_name" content="<?php echo $web_nombre; ?>"/>
        <meta property="fb:admins" content="1376286793"/>
        <meta property="og:description" content="<?php echo soloDescripcion($Noticia_contenido); ?>"/>

        <?php require_once("w-header-script.php"); ?>

    </head>
    <body class="kopa-single-blog sub-page">

        <?php require_once("w-header.php"); ?>

        <div class="container">

            <div class="kopa-breadcrumb"></div><!-- kopa-breadcrumb -->

            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div id="main-content">
                        <article class="single-post-content">

                            <h1 class="entry-title"><?php echo $Noticia_titulo; ?></h1>

                            <div class="clearfix">

                                <div class="article-content">

                                    <div class="entry-content">
                                        <?php echo $Noticia_contenido; ?>
                                    </div>
                                    <!-- entry-content -->
                                </div>
                                <!-- item right -->

                            </div>
                            <!-- clearfix -->

                        </article>

                        <div id="comments">

                            <h3>Comentarios</h3>

                        </div>
                        <!-- comments -->

                    </div>
                    <!-- main content -->
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

                    <div id="sidebar" class="widget-area-26">

                        <div class="widget widget-sidebar kopa-tab-widget">

                            <header class="widget-header">
                                <h3 class="widget-title">Datos</h3>
                            </header>

                            <div class="widget-contenido">

                                <div class="clearfix">
                                    <h5 class="post-cat">Publicación: <?php echo $NoticiaFecha; ?></h5>
                                </div>

                                <div class="user-rating">
                                    <header>
                                        <h3>Califica la Noticia</h3>
                                        <span class="kopa-rate">
                                            <i class="fa fa-star fa-3x"></i>
                                            <i class="fa fa-star fa-3x"></i>
                                            <i class="fa fa-star fa-3x"></i>
                                            <i class="fa fa-star fa-3x"></i>
                                            <i class="fa fa-star-o fa-3x"></i>
                                        </span>
                                    </header>
                                </div>
                                <!-- user rating -->

                                <div class="link-social-2">
                                    <div class="addthis_native_toolbox"></div>
                                    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50f364066076ff63" async></script>

                                </div>

                            </div>

                        </div>

                        <?php require_once("w-portada.php"); ?>

                        <?php require_once("w-galeria-fotos.php") ?>

                    </div>
                    <!-- sidebar -->

                </div>

            </div>
            <!-- row -->
        </div>

        <?php require_once("w-footer.php"); ?>

        <?php require_once("w-footer-script.php"); ?>

    </body>
</html>