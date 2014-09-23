<?php
require_once("panel@impacto/conexion/conexion.php");
require_once("panel@impacto/conexion/funciones.php");

//VARIABLES DE URL
$Req_Id=$_REQUEST["id"];
$Req_Url=$_REQUEST["url"];

//VARIABLES
$header="interno";

//NOTICIA
$rst_noticia=mysql_query("SELECT * FROM iev_noticia WHERE id=$Req_Id AND publicar=1 AND fecha_publicacion<='$fechaActual';", $conexion);
$fila_noticia=mysql_fetch_array($rst_noticia);

//VARIABLES DE NOTICIA
$Noticia_id=$fila_noticia["id"];
$Noticia_url=$fila_noticia["url"];
$Noticia_titulo=$fila_noticia["titulo"];
$Noticia_contenido=$fila_noticia["contenido"];
$Noticia_categoria=$fila_noticia["categoria"];
$Noticia_fechaPub=$fila_noticia["fecha_publicacion"];
$Noticia_imagen=$fila_noticia["imagen"];
$Noticia_imagen_carpeta=$fila_noticia["imagen_carpeta"];

//SEPARACION FECHA
$Noticia_fechaPubSep=explode(" ", $Noticia_fechaPub);
$Noticia_fecha=explode("-", $Noticia_fechaPubSep[0]);
$NoticiaFecha=nombreFechaTotal($Noticia_fecha[0], $Noticia_fecha[1], $Noticia_fecha[2]);

//URLS
$Noticia_UrlImg=$web."imagenes/upload/".$Noticia_imagen_carpeta."".$Noticia_imagen;

//NOTICIA - CATEGORIA
$rst_notCat=mysql_query("SELECT * FROM iev_noticia_categoria WHERE id=$Noticia_categoria;", $conexion);
$fila_notCat=mysql_fetch_array($rst_notCat);

//VARIABLES DE NOTICIA - CATEGORIA
$NotCat_id=$fila_notCat["id"];
$NotCat_url=$fila_notCat["url"];
$NotCat_titulo=$fila_notCat["categoria"];

//NOTICIAS RELACIONADAS
$rst_NotRel=mysql_query("SELECT * FROM iev_noticia WHERE id<>$Req_Id AND categoria=$Noticia_categoria AND publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC LIMIT 6;", $conexion);

?>
<!DOCTYPE html>
<html lang="es" class="no-js">
    <head>
        <meta charset="utf-8">
        <title><?php echo $Noticia_titulo; ?></title>

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
                                        <?php echo primerParrafo($Noticia_contenido); ?>
                                    </div>

                                    <div class="post-thumb">
                                        <img src="<?php echo $Noticia_UrlImg; ?>" alt="<?php echo $Noticia_titulo; ?>">
                                    </div>
                                    <!-- post thumb -->

                                    <div class="entry-content">
                                        <?php echo siguienteParrafo($Noticia_contenido); ?>
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

                        <!-- NOTICIAS RELACIONADAS -->
                        <div class="widget kopa-list-posts-carousel-4-widget">
                            <header class="widget-header">
                                <h3 class="widget-title">Articulos relacionados</h3>
                                <i class="fa fa-plus-square-o"></i>
                            </header>
                            <div class="widget-content">
                                <div class="owl-carousel">

                                    <?php while($fila_NotRel=mysql_fetch_array($rst_NotRel)){
                                            $NotRel_id=$fila_NotRel["id"];
                                            $NotRel_url=$fila_NotRel["url"];
                                            $NotRel_titulo=$fila_NotRel["titulo"];
                                            $NotRel_imagen=$fila_NotRel["imagen"];
                                            $NotRel_imagen_carpeta=$fila_NotRel["imagen_carpeta"];
                                            $NotRel_categoria=$fila_NotRel["categoria"];
                                            $NotRel_fechaPub=$fila_NotRel["fecha_publicacion"];

                                            //URL
                                            $NotRel_UrlWeb=$web."noticia/".$NotRel_id."-".$NotRel_url;
                                            $NotRel_UrlImg=$web."imagenes/upload/".$NotRel_imagen_carpeta."thumb/".$NotRel_imagen;
                                    ?>
                                    <div class="item">
                                        <div class="post-thumb">
                                            <a href="#" class="img-responsive">
                                                <img src="<?php echo $NotRel_UrlImg; ?>" alt="<?php echo $NotRel_titulo; ?>">
                                            </a>
                                            <footer>
                                                <h4 class="post-cat"><a href="#">culture</a></h4>
                                                <span class="kopa-date">January 1, 2014</span>
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
                                    <!-- item -->
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

                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

                    <div id="sidebar" class="widget-area-26">

                        <div class="widget widget-sidebar kopa-tab-widget">

                            <header class="widget-header">
                                <h3 class="widget-title">Datos de Noticia</h3>
                            </header>

                            <div class="widget-contenido">

                                <div class="clearfix">
                                    <h5 class="post-cat">Categoría: <a href="#"><?php echo $NotCat_titulo; ?></a></h5>
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
                                    <div class="addthis_sharing_toolbox"></div>
                                    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50f364066076ff63"></script>
                                </div>

                                <div class="tags-link">
                                    <span>Tags:</span>
                                    <a href="#">cinema</a>,
                                    <a href="#">sky</a>,
                                    <a href="#">Design</a>,
                                    <a href="#">Fashion</a>,
                                    <a href="#">Life style</a>
                                </div>

                            </div>

                        </div>

                        <div class="widget kopa-tab-widget">
                            <div class="widget-content">
                                <div class="kopa-tabs">
                                    <ul>
                                        <li><a href="javascript:;">Lo más visitado</a></li>
                                    </ul>
                                    <div>
                                        <ul class="list-unstyled">
                                            <li class="clearfix item-post">
                                                <a href="#" class="post-thumb pull-left img-responsive">
                                                <img src="placeholders/posts/36.jpg" alt="">
                                                </a>
                                                <div class="item-right">
                                                    <h4 class="post-title"><a href="#">Live Now: Convene Founder Answers Questions via Video. </a></h4>
                                                    <div class="kopa-metadata">
                                                        <span class="kopa-date"> Fer 20, 2014</span>
                                                        <span class="kopa-rate">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        </span>
                                                    </div>
                                                    <!-- metadata -->
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- widget content -->
                        </div>

                        <div class="widget kopa-gallery-widget">
                            <header class="widget-header">
                                <h3 class="widget-title">Gallery</h3>
                            </header>
                            <div class="widget-content">
                                <a href="#" class="imgLiquid"><img src="placeholders/posts/1.jpg" alt=""></a>
                                <a href="#" class="imgLiquid"><img src="placeholders/posts/2.jpg" alt=""></a>
                                <a href="#" class="imgLiquid"><img src="placeholders/posts/3.jpg" alt=""></a>
                                <a href="#" class="imgLiquid"><img src="placeholders/posts/4.jpg" alt=""></a>
                                <a href="#" class="imgLiquid"><img src="placeholders/posts/5.jpg" alt=""></a>
                                <a href="#" class="imgLiquid"><img src="placeholders/posts/6.jpg" alt=""></a>
                            </div>
                        </div>

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