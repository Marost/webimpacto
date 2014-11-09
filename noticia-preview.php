<?php
require_once("panel@impacto/conexion/conexion.php");
require_once("panel@impacto/conexion/funciones.php");

//VARIABLES
$header="interno";

##################################################################################################################
//VARIABLES DE NOTICIA
$Noticia_titulo=$_POST["nombre"];
$Noticia_contenido=$_POST["contenido"];
$Noticia_categoria=$_POST["categoria"];

$Noticia_imagen=$_POST["uploader_0_tmpname"];
$Noticia_imagen_carpeta=fechaCarpeta()."/";

$Noticia_video=$_POST["video_youtube"];
$Noticia_audio=$_POST["audio"];

$Noticia_tags=$_POST["tags"];
$Noticia_fechaPub=$_POST["pub_fecha"]." ".$_POST["pub_hora"];

//SEPARACION FECHA
$Noticia_fechaPubSep=explode(" ", $Noticia_fechaPub);
$Noticia_fecha=explode("-", $Noticia_fechaPubSep[0]);
$NoticiaFecha=nombreFechaTotal($Noticia_fecha[0], $Noticia_fecha[1], $Noticia_fecha[2]);

##################################################################################################################
//NOTICIA - TAGS
$tags=$Noticia_tags;
if($tags==""){ $union_tags=0; }
elseif($tags<>""){ $union_tags=implode(",", $tags);}
$Noticia_tags='0,'.$union_tags.',0';
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
//URLS
$Noticia_UrlWeb=$web."noticia";
$Noticia_UrlImg=$web."imagenes/upload/".$Noticia_imagen_carpeta."".$Noticia_imagen;
$Noticia_UrlCat=$web."categoria/".$NotCat_id."/".$NotCat_url;
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
                                        <?php echo primerParrafo($Noticia_contenido); ?>
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
                                        <?php echo $Noticia_contenido; ?>

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