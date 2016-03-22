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
$rst_noticia=mysql_query("SELECT * FROM iev_noticia WHERE id=$Req_Id AND publicar=1 AND fecha_publicacion<='$fechaActual';", $conexion);
$fila_noticia=mysql_fetch_array($rst_noticia);

//VARIABLES DE NOTICIA
$Noticia_id=$fila_noticia["id"];
$Noticia_url=$fila_noticia["url"];
$Noticia_titulo=$fila_noticia["titulo"];
$Noticia_contenido=$fila_noticia["contenido"];
$Noticia_categoria=$fila_noticia["categoria"];
$Noticia_tags=$fila_noticia["tags"];
$Noticia_fechaPub=$fila_noticia["fecha_publicacion"];
$Noticia_imagen=$fila_noticia["imagen"];
$Noticia_imagen_carpeta=$fila_noticia["imagen_carpeta"];
$Noticia_video=$fila_noticia["video"];
$Noticia_audio=$fila_noticia["audio"];
$Noticia_contador=$fila_noticia["contador"]+1;

//SEPARACION FECHA
$Noticia_fechaPubSep=explode(" ", $Noticia_fechaPub);
$Noticia_fecha=explode("-", $Noticia_fechaPubSep[0]);
$NoticiaFecha=nombreFechaTotal($Noticia_fecha[0], $Noticia_fecha[1], $Noticia_fecha[2]);

##################################################################################################################
//SUMAR A CONTADOR
$rst_noticiaCont=mysql_query("UPDATE iev_noticia SET contador=$Noticia_contador WHERE id=$Req_Id;", $conexion);

##################################################################################################################
//NOTICIA - GALERIA DE FOTOS
$rst_notFotos=mysql_query("SELECT * FROM iev_noticia_slide WHERE noticia=$Noticia_id ORDER BY orden DESC", $conexion);
$num_notFotos=mysql_num_rows($rst_notFotos);

##################################################################################################################
//NOTICIA - TAGS
$tags=explode(",", $Noticia_tags);    //SEPARACION DE ARRAY CON COMAS
$rst_tags=mysql_query("SELECT * FROM iev_noticia_tags ORDER BY nombre ASC;", $conexion);

##################################################################################################################
//NOTICIA - CATEGORIA
$rst_notCat=mysql_query("SELECT * FROM iev_noticia_categoria WHERE id=$Noticia_categoria;", $conexion);
$fila_notCat=mysql_fetch_array($rst_notCat);

//VARIABLES DE NOTICIA - CATEGORIA
$NotCat_id=$fila_notCat["id"];
$NotCat_url=$fila_notCat["url"];
$NotCat_titulo=$fila_notCat["categoria"];

##################################################################################################################
//NOTICIAS RELACIONADAS
$rst_NotRel=mysql_query("SELECT * FROM iev_noticia WHERE id<>$Req_Id AND categoria=$Noticia_categoria AND publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC LIMIT 6;", $conexion);

##################################################################################################################
//URLS
$Noticia_UrlWeb=$web."noticia/".$Req_Id."-".$Req_Url;
$Noticia_UrlImg=$web."imagenes/upload/".$Noticia_imagen_carpeta."".$Noticia_imagen;
$Noticia_UrlCat=$web."categoria/".$NotCat_id."/".$NotCat_url;
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

        <div class="publicidad-header container">

            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <style type="text/css">
                .adslot_header { width: 970px; height: 90px; margin: 10px auto; }
            </style>
            <ins class="adsbygoogle adslot_header"
                 style="display:block"
                 data-ad-client="ca-pub-4677891133721920"
                 data-ad-slot="3499676490"
                 data-ad-format="auto"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>

        </div>

        <?php require_once("w-header.php"); ?>

        <div class="container">
            <?php require_once("w-saludos-formulario.php"); ?>

            <div class="kopa-breadcrumb"></div><!-- kopa-breadcrumb -->

            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div id="main-content">
                        <article class="single-post-content">

                            <h5 class="post-cat"><a href="<?php echo $Noticia_UrlCat; ?>"><?php echo $NotCat_titulo; ?></a></h5>
                            <h5 class="post-cat"><?php echo $NoticiaFecha; ?></h5>

                            <h1 class="entry-title"><?php echo $Noticia_titulo; ?></h1>

                            <div class="clearfix">

                                <div class="article-content">

                                    <div class="entry-content">
                                        <?php echo cortarTextoRH($Noticia_contenido,1,0,150); ?>
                                    </div>

                                    <?php listaSocialMedia(true, true, "Impacto_Evangel", true, true, $Noticia_UrlWeb, $Noticia_titulo, $Noticia_UrlImg); ?>

                                    <div class="post-thumb">

                                        <ul id="tipo-multimedia">
                                            <?php if($num_notFotos>0 OR $Noticia_video<>"" OR $Noticia_audio<>""){ ?>
                                            <li><a id="noticia-foto" href="javascript:;" title="Foto"><i class="fa fa-image"></i><span> Foto</span></a></li>
                                            <?php } ?>
                                            <?php if($num_notFotos>0){ ?>
                                            <li><a id="noticia-galeria" href="javascript:;" title="Galería de Fotos"><i class="fa fa-film"></i><span> Galería de Fotos</span></a></li>
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
                                            <?php if($num_notFotos>0){ ?>
                                            <li id="noticia-galeria">
                                                <div class="owl-carousel kopa-galler-post">
                                                    <?php while($fila_notFotos=mysql_fetch_array($rst_notFotos)){
                                                        $NotFotos_imagen=$fila_notFotos["imagen"];
                                                        $NotFotos_imagen_carpeta=$fila_notFotos["imagen_carpeta"];

                                                        //URL
                                                        $NotFotos_UrlImg=$web."imagenes/upload/".$NotFotos_imagen_carpeta."".$NotFotos_imagen;
                                                        ?>
                                                        <div class="item img-responsive"><img class="lazy" data-original="<?php echo $NotFotos_UrlImg; ?>" src="<?php echo $NotFotos_UrlImg; ?>" alt="<?php echo $Noticia_titulo; ?>"></div>
                                                    <?php } ?>
                                                </div>
                                                <!-- owl carousel -->
                                            </li>
                                            <?php } ?>
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
                                        <?php echo cortarTextoRH($Noticia_contenido,0,1,0); ?>

                                        <div class="tags-link">
                                            <span>Tags:</span>

                                            <?php while($fila_tags=mysql_fetch_array($rst_tags)){
                                                $tags_id=$fila_tags["id"];
                                                $tags_url=$fila_tags["url"];
                                                $tags_nombre=$fila_tags["nombre"];

                                                //URL
                                                $tags_WebURL=$web."tags/".$tags_id."/".$tags_url;
                                                if(in_array($tags_id, $tags)){
                                                    ?>
                                                    <a href="<?php echo $tags_WebURL; ?>"><?php echo $tags_nombre; ?></a>
                                                <?php }} ?>

                                        </div>

                                    </div><!-- entry-content -->

                                </div>
                                <!-- item right -->

                                <div class="publicidad-nota">

                                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                                    <style type="text/css">
                                        .adslot_nota { width: 728px; height: 90px; margin: 10px auto; }
                                    </style>
                                    <ins class="adsbygoogle adslot_nota"
                                         style="display:block"
                                         data-ad-client="ca-pub-3674889010429322"
                                         data-ad-slot="5650709146"
                                         data-ad-format="auto"></ins>
                                    <script>
                                    (adsbygoogle = window.adsbygoogle || []).push({});
                                    </script>

                                </div>

                            </div>
                            <!-- clearfix -->

                        </article>

                        <div id="comments" class="hidden-xs">

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
                                <h3 class="widget-title">Noticias relacionadas</h3>
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
                                            $NotRel_UrlWeb=$web."noticia/".$NotRel_id."-".$NotRel_url;
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

                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

                    <div id="sidebar" class="widget-area-26">

                        <?php require_once("w-portada.php"); ?>

                        <div class="publicidad-sidebar">

                            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                            <style type="text/css">
                                .adslot_sidebar { width: 300px; height: 600px; margin: 10px auto; }
                            </style>
                            <ins class="adsbygoogle adslot_sidebar"
                                 style="display:block"
                                 data-ad-client="ca-pub-4677891133721920"
                                 data-ad-slot="3499676490"
                                 data-ad-format="auto"></ins>
                            <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>

                        </div>

                        <?php require_once("w-galeria-fotos.php") ?>

                        <?php require_once("w-masvisto.php") ?>

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