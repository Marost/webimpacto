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
$rst_noticia=mysql_query("SELECT * FROM iev_galeria WHERE id=$Req_Id AND publicar=1 AND fecha_publicacion<='$fechaActual';", $conexion);
$fila_noticia=mysql_fetch_array($rst_noticia);

//VARIABLES DE NOTICIA
$Noticia_id=$fila_noticia["id"];
$Noticia_url=$fila_noticia["url"];
$Noticia_titulo=$fila_noticia["titulo"];
$Noticia_contenido=$fila_noticia["contenido"];
$Noticia_fechaPub=$fila_noticia["fecha_publicacion"];

//SEPARACION FECHA
$Noticia_fechaPubSep=explode(" ", $Noticia_fechaPub);
$Noticia_fecha=explode("-", $Noticia_fechaPubSep[0]);
$NoticiaFecha=nombreFechaTotal($Noticia_fecha[0], $Noticia_fecha[1], $Noticia_fecha[2]);

##################################################################################################################
//NOTICIA - GALERIA DE FOTOS
$rst_notFotos=mysql_query("SELECT * FROM iev_galeria_slide WHERE noticia=$Req_Id ORDER BY orden DESC", $conexion);
$num_notFotos=mysql_num_rows($rst_notFotos);

##################################################################################################################
//NOTICIAS RELACIONADAS
$rst_NotRel=mysql_query("SELECT * FROM iev_noticia WHERE id<>$Req_Id AND categoria=$Noticia_categoria AND publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC LIMIT 6;", $conexion);

##################################################################################################################
//URLS
$Noticia_UrlImg=$web."imagenes/upload/".$Noticia_imagen_carpeta."".$Noticia_imagen;

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

                                        <div id="galeria" class="royalSlider rsDefault">
                                            <?php while($fila_noticia_img=mysql_fetch_array($rst_notFotos)){
                                                $galeria_imagen=$fila_noticia_img["imagen"];
                                                $galeria_imagen_carpeta=$fila_noticia_img["imagen_carpeta"];

                                                //URL
                                                $galeria_UrlImg=$web."imagenes/galeria/".$galeria_imagen_carpeta."".$galeria_imagen;
                                                $galeria_UrlImgThumb=$web."imagenes/galeria/".$galeria_imagen_carpeta."thumb/".$galeria_imagen;
                                                ?>

                                                <div>
                                                    <img class="rsImg" data-rsbigimg="<?php echo $galeria_UrlImg; ?>" src="<?php echo $galeria_UrlImg; ?>" />
                                                    <img width="96" height="72" class="rsTmb" src="<?php echo $galeria_UrlImgThumb; ?>">
                                                </div>
                                            <?php } ?>
                                        </div>

                                    </div>

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
                                                <img src="<?php echo $NotRel_UrlImg; ?>" alt="<?php echo $NotRel_titulo; ?>">
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

            </div>
            <!-- row -->
        </div>

        <?php require_once("w-footer.php"); ?>

        <?php require_once("w-footer-script.php"); ?>

    </body>
</html>