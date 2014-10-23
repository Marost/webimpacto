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
$Noticia_columnista=$fila_noticia["columnista"];

//SEPARACION FECHA
$Noticia_fechaPubSep=explode(" ", $Noticia_fechaPub);
$Noticia_fecha=explode("-", $Noticia_fechaPubSep[0]);
$NoticiaFecha=nombreFechaTotal($Noticia_fecha[0], $Noticia_fecha[1], $Noticia_fecha[2]);

##################################################################################################################
//COLUMNISTA
$rst_columnista=mysql_query("SELECT * FROM iev_columnista WHERE id=$Noticia_columnista", $conexion);
$fila_columnista=mysql_fetch_array($rst_columnista);

//VARIABLES
$Columnista_id=$fila_columnista["id"];
$Columnista_url=$fila_columnista["url"];
$Columnista_titulo=$fila_columnista["nombre_completo"];

##################################################################################################################
//URLS
$Noticia_UrlWeb=$web."editorial/".$Req_Id."-".$Req_Url;
$Noticia_UrlCol=$web."columnista/".$Columnista_id."-".$Columnista_url;

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

                            <h5 class="post-cat"><a href="<?php echo $Noticia_UrlCol; ?>"><?php echo $Columnista_titulo; ?></a></h5>
                            <h5 class="post-cat"><?php echo $NoticiaFecha; ?></h5>

                            <h1 class="entry-title"><?php echo $Noticia_titulo; ?></h1>

                            <?php listaSocialMedia(true, true, "Impacto_Evangel", true, true, $Noticia_UrlWeb, $Noticia_titulo, ""); ?>

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

                            <div id="fb-root"></div>
                            <script>(function(d, s, id) {
                                    var js, fjs = d.getElementsByTagName(s)[0];
                                    if (d.getElementById(id)) return;
                                    js = d.createElement(s); js.id = id;
                                    js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&appId=1456294131292438&version=v2.0";
                                    fjs.parentNode.insertBefore(js, fjs);
                                }(document, 'script', 'facebook-jssdk'));</script>

                            <div data-width="624" class="fb-comments" data-href="<?php echo $Noticia_UrlWeb; ?>" data-numposts="5" data-colorscheme="light"></div>

                        </div>
                        <!-- comments -->

                    </div>
                    <!-- main content -->
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

                    <div id="sidebar" class="widget-area-26">

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