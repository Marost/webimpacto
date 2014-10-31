<?php
//NOTICIA DESTACADA
$rst_notDest=mysql_query("SELECT * FROM iev_noticia WHERE destacada=1 AND fecha_publicacion<='$fechaActual' AND publicar=1 ORDER BY fecha_publicacion DESC;", $conexion);
$fila_notDest=mysql_fetch_array($rst_notDest);

//VARIABLES
$NotDest_id=$fila_notDest["id"];
$NotDest_url=$fila_notDest["url"];
$NotDest_titulo=$fila_notDest["titulo"];
$NotDest_contenido=primerParrafo($fila_notDest["contenido"]);
$NotDest_fechaPub=$fila_notDest["fecha_publicacion"];
$NotDest_imagen=$fila_notDest["imagen"];
$NotDest_imagen_carpeta=$fila_notDest["imagen_carpeta"];
$NotDest_UrlImg=$web."imagenes/upload/".$NotDest_imagen_carpeta."thumbdest/".$NotDest_imagen;
$NotDest_UrlWeb=$web."noticia/".$NotDest_id."-".$NotDest_url;

//SEPARACION DE FECHA
$fechaPubSep=explode(" ", $NotDest_fechaPub);
$fechaSep=explode("-", $fechaPubSep[0]);
$FechaDia=$fechaSep[2];
$FechaMes=mesCorto($fechaSep[1]);
$FechaAnio=$fechaSep[0];

//NOTICIAS DERECHA
$rst_notNor=mysql_query("SELECT * FROM iev_noticia WHERE destacada=0 AND categoria<>6 AND categoria<>7 AND categoria<>8 AND categoria<>14 AND fecha_publicacion<='$fechaActual' AND publicar=1 ORDER BY fecha_publicacion DESC LIMIT 3", $conexion);

?>
<div class="widget-area-2">

    <header class="widget-header">
        <h3 class="widget-title"><a href="#" title="Noticias destacadas">NOTICIAS</a></h3>
    </header>

    <div class="widget kopa-grid-posts-widget">

        <div class="widget-content clearfix">

            <article class="item latest-post">

                <div class="post-thumb">
                    <a href="<?php echo $NotDest_UrlWeb; ?>" class="img-responsive" title="<?php echo $NotDest_titulo; ?>">
                        <img src="<?php echo $NotDest_UrlImg; ?>" alt="<?php echo $NotDest_titulo; ?>">
                    </a>
                </div>
                <!-- post thumb -->

                <div class="item-content">
                    <header>
                        <h4 class="post-title">
                            <a href="<?php echo $NotDest_UrlWeb; ?>" title="<?php echo $NotDest_titulo; ?>"><?php echo $NotDest_titulo; ?></a></h4>
                    </header>
                    <div class="post-content">

                        <div class="notaprin-texto">
                            <?php echo $NotDest_contenido; ?>
                        </div>

                        <div class="kopa-metadata-border col-lg-12 col-md-12 col-sm-12 col-xs-12 hidden-xs">

                            <!-- AddThis -->
                            <div class="addthis_native_toolbox col-lg-6 col-md-6 col-sm-6 col-xs-5"
                                 data-url="<?php echo $NotDest_UrlWeb; ?>" data-title="<?php echo $NotDest_titulo; ?>">
                            </div>

                            <div class="notaprin-mdstar col-lg-3 col-md-3 col-sm-3 col-xs-4">
                                <span class="kopa-rate">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </span>
                            </div>

                            <div class="notaprin-mdln col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <a href="<?php echo $NotDest_UrlWeb; ?>" class="kopa-readmore">Leer nota</a>
                            </div>

                        </div>

                    </div>
                </div>
                <!-- item content -->

                <div class="kopa-date-box">
                    <span class="kopa-mon"><?php echo $FechaMes; ?></span>
                    <span class="kopa-day"><?php echo $FechaDia; ?></span>
                    <span class="kopa-yea"><?php echo $FechaAnio; ?></span>
                </div>

            </article>
            <!-- item -->

            <section class="home-notprin">

                <?php while($fila_notNor=mysql_fetch_array($rst_notNor)){
                        $NotNor_id=$fila_notNor["id"];
                        $NotNor_url=$fila_notNor["url"];
                        $NotNor_titulo=$fila_notNor["titulo"];
                        $NotNor_imagen=$fila_notNor["imagen"];
                        $NotNor_imagen_carpeta=$fila_notNor["imagen_carpeta"];
                        $NotNor_categoria=$fila_notNor["categoria"];

                        //SEPARAR FECHA
                        $NotNor_fechaPub=$fila_notNor["fecha_publicacion"];
                        $NotNor_fechaPubSep=explode(" ", $NotNor_fechaPub);
                        $NotNor_fecha=explode("-", $NotNor_fechaPubSep[0]);
                        $NotNor_fechaPub=nombreFecha($NotNor_fecha[0], $NotNor_fecha[1], $NotNor_fecha[2]);

                        //URLS
                        $NotNor_UrlWeb=$web."noticia/".$NotNor_id."-".$NotNor_url;
                        $NotNor_UrlImg=$web."imagenes/upload/".$NotNor_imagen_carpeta."thumbnor/".$NotNor_imagen;
                ?>

                <article class="item pull-left">
                    <div class="item-content">
                        <span class="kopa-date hidden-xs"><?php echo $NotNor_fechaPub; ?></span>
                        <h4 class="post-title">
                            <a href="<?php echo $NotNor_UrlWeb; ?>" title="<?php echo $NotNor_titulo; ?>"><?php echo $NotNor_titulo; ?></a>
                        </h4>
                    </div>
                    <div class="post-thumb">
                        <a href="<?php echo $NotNor_UrlWeb; ?>" class="img-responsive" title="<?php echo $NotNor_titulo; ?>">
                            <img src="<?php echo $NotNor_UrlImg; ?>" alt="<?php echo $NotNor_titulo; ?>">
                        </a>
                    </div>
                    <!-- post thumb -->
                </article>
                <!-- item item-rtl -->

                <?php } ?>

            </section>

        </div>
        <!-- widget content -->

    </div>
    <!-- grid posts -->

</div>
<!-- widget area 2 -->