<?php
require_once("panel@impacto/conexion/conexion.php");
require_once("panel@impacto/conexion/funciones.php");

//VARIABLES DE URL
$Req_Id=$_REQUEST["id"];
$Req_Url=$_REQUEST["url"];

//VARIABLES
$header="interno";

//NOTICIA
$rst_noticia=mysql_query("SELECT * FROM iev_edicion_noticia WHERE id=$Req_Id AND publicar=1 AND fecha_publicacion<='$fechaActual';", $conexion);
$fila_noticia=mysql_fetch_array($rst_noticia);

//VARIABLES DE NOTICIA
$Noticia_id=$fila_noticia["id"];
$Noticia_url=$fila_noticia["url"];
$Noticia_titulo=$fila_noticia["titulo"];
$Noticia_contenido=$fila_noticia["contenido"];
$Noticia_tags=$fila_noticia["tags"];
$Noticia_fechaPub=$fila_noticia["fecha_publicacion"];
$Noticia_imagen=$fila_noticia["imagenin"];
$Noticia_imagen_carpeta=$fila_noticia["imagenin_carpeta"];
$Noticia_video=$fila_noticia["video"];
$Noticia_audio=$fila_noticia["audio"];

//SEPARACION FECHA
$Noticia_fechaPubSep=explode(" ", $Noticia_fechaPub);
$Noticia_fecha=explode("-", $Noticia_fechaPubSep[0]);
$NoticiaFecha=nombreFechaTotal($Noticia_fecha[0], $Noticia_fecha[1], $Noticia_fecha[2]);

//TAGS
$tags=explode(",", $Noticia_tags);    //SEPARACION DE ARRAY CON COMAS
$rst_tags=mysql_query("SELECT * FROM iev_noticia_tags ORDER BY nombre ASC;", $conexion);

//URLS
$Noticia_UrlWeb=$web."noticiaed/".$Req_Id."-".$Req_Url;
$Noticia_UrlImg=$web."imagenes/upload/".$Noticia_imagen_carpeta."".$Noticia_imagen;

//NOTICIAS RELACIONADAS
$rst_NotRel=mysql_query("SELECT * FROM iev_edicion_noticia WHERE id<>$Req_Id AND publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC LIMIT 6;", $conexion);

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
            <?php require_once("w-saludos-formulario.php"); ?>

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

                                        <ul id="tipo-multimedia">
                                            <?php if($num_notFotos>0 OR $Noticia_video<>"" OR $Noticia_audio<>""){ ?>
                                                <li><a id="noticia-foto" href="javascript:;" title="Foto"><i class="fa fa-image"></i><span> Foto</span></a></li>
                                            <?php } ?>
                                            <?php if($Noticia_video<>""){ ?>
                                                <li><a id="noticia-video" href="javascript:;" title="Video de youtube"><i class="fa fa-youtube"></i><span> Video</span></a></li>
                                            <?php } ?>
                                            <?php if($Noticia_audio<>""){ ?>
                                                <li><a id="noticia-audio" href="javascript:;" title="Audio de Soundcloud"><i class="fa fa-soundcloud"></i><span> Audio</span></a></li>
                                            <?php } ?>
                                        </ul>

                                        <ul id="lista-multimedia">
                                            <li id="noticia-foto">
                                                <img class="lazy" data-original="<?php echo $Noticia_UrlImg; ?>" src="<?php echo $Noticia_UrlImg; ?>" alt="<?php echo $Noticia_titulo; ?>">
                                            </li>
                                            <?php if($Noticia_video<>""){ ?>
                                                <li id="noticia-video">
                                                    <iframe width="100%" height="400" src="//www.youtube.com/embed/<?php echo $Noticia_video; ?>?rel=0" frameborder="0" allowfullscreen></iframe>
                                                </li>
                                            <?php } ?>
                                            <?php if($Noticia_audio<>""){ ?>
                                                <li id="noticia-audio">
                                                    <?php echo $Noticia_audio; ?>
                                                </li>
                                            <?php } ?>
                                        </ul>

                                    </div>
                                    <!-- post thumb -->

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

                        <!-- NOTICIAS RELACIONADAS -->
                        <div class="widget kopa-list-posts-carousel-4-widget">
                            <header class="widget-header">
                                <h3 class="widget-title">Articulos relacionados</h3>
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

                                            //SEPARACION DE FECHA
                                            $fechaPubSep=explode(" ", $NotRel_fechaPub);
                                            $fechaSep=explode("-", $fechaPubSep[0]);
                                            $FechaDia=$fechaSep[2];
                                            $FechaMes=mesCorto($fechaSep[1]);
                                            $FechaAnio=$fechaSep[0];

                                            //URL
                                            $NotRel_UrlWeb=$web."noticiaed/".$NotRel_id."-".$NotRel_url;
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
                                    <h5 class="post-cat">Publicación: <?php echo $NoticiaFecha; ?></h5>
                                </div>

                                <div class="link-social-2">
                                    <div class="addthis_native_toolbox"
                                         data-url="<?php echo $Noticia_UrlWeb; ?>" data-title="<?php echo $Noticia_titulo; ?>">
                                    </div>
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