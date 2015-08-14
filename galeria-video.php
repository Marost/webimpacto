<?php
require_once("panel@impacto/conexion/conexion.php");
require_once("panel@impacto/conexion/funciones.php");

//VARIABLES DE URL
$Req_Id=$_REQUEST["id"];
$Req_Url=$_REQUEST["url"];

//VARIABLES
$header="interno";
$w_galeria=true;

##################################################################################################################
//NOTICIA
$rst_noticia=mysql_query("SELECT * FROM iev_videos WHERE id=$Req_Id AND publicar=1 AND fecha_publicacion<='$fechaActual';", $conexion);
$fila_noticia=mysql_fetch_array($rst_noticia);

//VARIABLES DE NOTICIA
$Noticia_titulo=$fila_noticia["titulo"];
$Noticia_contenido=$fila_noticia["contenido"];
$Noticia_fechaPub=$fila_noticia["fecha_publicacion"];
$Noticia_imagen=$fila_noticia["imagen"];
$Noticia_imagen_carpeta=$fila_noticia["imagen_carpeta"];
$Noticia_video=$fila_noticia["video"];

//SEPARACION FECHA
$Noticia_fechaPubSep=explode(" ", $Noticia_fechaPub);
$Noticia_fecha=explode("-", $Noticia_fechaPubSep[0]);
$NoticiaFecha=nombreFechaTotal($Noticia_fecha[0], $Noticia_fecha[1], $Noticia_fecha[2]);

##################################################################################################################
//NOTICIAS RELACIONADAS
$rst_NotRel=mysql_query("SELECT * FROM iev_videos WHERE id<>$Req_Id AND publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC LIMIT 15;", $conexion);

##################################################################################################################
//URLS
$Noticia_UrlImg=$web."imagenes/galeria/".$Noticia_imagen_carpeta."".$Noticia_imagen;
$Noticia_UrlWeb=$web."video/".$Req_Id."-".$Req_Url;

?>
<!DOCTYPE html>
<html lang="es" class="no-js">
    <head>
        <meta charset="utf-8">
        <title><?php echo $Noticia_titulo; ?> | <?php echo $web_nombre; ?></title>

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
            <?php require_once("w-saludos-formulario.php"); ?>

            <div class="kopa-breadcrumb"></div><!-- kopa-breadcrumb -->

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div id="main-content">
                        <article class="single-post-content">

                            <h1 class="entry-title"><?php echo $Noticia_titulo; ?></h1>

                            <div class="clearfix">

                                <div class="article-content">

                                    <div class="entry-content">
                                        <?php echo primerParrafo($Noticia_contenido); ?>
                                    </div>

                                    <div class="post-thumb">

                                        <iframe width="100%" height="600" src="//www.youtube.com/embed/<?php echo $Noticia_video; ?>?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>

                                    </div>

                                </div>
                                <!-- item right -->

                            </div>
                            <!-- clearfix -->

                        </article>

                        <!-- NOTICIAS RELACIONADAS -->
                        <div class="widget kopa-list-posts-carousel-4-widget">
                            <header class="widget-header">
                                <h3 class="widget-title">Galería de Videos</h3>
                                <span class="videos-mas-interno">
                                    <a href="videos" title="Más videos">
                                        <i class="fa fa-plus"></i> Más videos
                                    </a>
                                </span>
                            </header>
                            <div class="widget-content">
                                <div class="owl-carousel">

                                    <?php while($fila_NotRel=mysql_fetch_array($rst_NotRel)){
                                            $NotRel_id=$fila_NotRel["id"];
                                            $NotRel_url=$fila_NotRel["url"];
                                            $NotRel_titulo=$fila_NotRel["titulo"];
                                            $NotRel_fechaPub=$fila_NotRel["fecha_publicacion"];
                                            $NotRel_imagen=$fila_NotRel["imagen"];
                                            $NotRel_imagen_carpeta=$fila_NotRel["imagen_carpeta"];

                                            //SEPARACION DE FECHA
                                            $fechaPubSep=explode(" ", $NotRel_fechaPub);
                                            $fechaSep=explode("-", $fechaPubSep[0]);
                                            $FechaDia=$fechaSep[2];
                                            $FechaMes=mesCorto($fechaSep[1]);
                                            $FechaAnio=$fechaSep[0];

                                            //URL
                                            $NotRel_UrlWeb=$web."video/".$NotRel_id."-".$NotRel_url;
                                            $NotRel_UrlImg=$web."imagenes/upload/".$NotRel_imagen_carpeta."thumb/".$NotRel_imagen;
                                    ?>
                                    <div class="item">
                                        <div class="post-thumb">
                                            <a href="<?php echo $NotRel_UrlWeb; ?>" class="img-responsive">
                                                <img class="lazy" data-original="<?php echo $NotRel_UrlImg; ?>" src="<?php echo $NotRel_UrlImg; ?>" alt="<?php echo $NotRel_titulo; ?>">
                                            </a>
                                            <footer>
                                                <span class="kopa-date"><?php echo $FechaMes." ".$FechaDia.", ".$FechaAnio; ?></span>
                                            </footer>
                                        </div>
                                        <!-- post-thumb -->
                                        <div class="item-content">
                                            <h4 class="post-title">
                                                <a href="<?php echo $NotRel_UrlWeb; ?>"><?php echo $NotRel_titulo; ?></a>
                                                <span class="kopa-rate">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </span>
                                            </h4>
                                        </div>
                                        <!-- item content -->
                                    </div>
                                    <?php } ?>

                                </div>
                                <!-- owl carousel -->
                            </div>
                            <!-- widget content -->
                        </div>
                        <!-- NOTICIAS RELACIONADAS -->

                    </div>
                    <!-- main content -->
                </div>

            </div>
            <!-- row -->
        </div>

        <?php require_once("w-footer.php"); ?>

        <?php require_once("w-footer-script.php"); ?>

    </body>
</html>