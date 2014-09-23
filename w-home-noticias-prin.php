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
$NotDest_UrlImg=$web."imagenes/upload/".$NotDest_imagen_carpeta."thumb/".$NotDest_imagen;
$NotDest_UrlWeb=$web."noticia/".$NotDest_id."-".$NotDest_url;

//SEPARACION DE FECHA
$fechaPubSep=explode(" ", $NotDest_fechaPub);
$fechaSep=explode("-", $fechaPubSep[0]);
$FechaDia=$fechaSep[2];
$FechaMes=mesCorto($fechaSep[1]);
$FechaAnio=$fechaSep[0];

//NOTICIAS DERECHA
$rst_notNor=mysql_query("SELECT * FROM iev_noticia WHERE noticia=1 AND fecha_publicacion<='$fechaActual' AND publicar=1 ORDER BY fecha_publicacion DESC LIMIT 3", $conexion);

?>
<div class="widget-area-2">

    <header class="widget-header">
        <h3 class="widget-title">NOTICIAS</h3>
    </header>

    <div class="widget kopa-grid-posts-widget">

        <div class="widget-content clearfix">

            <article class="item latest-post">

                <div class="post-thumb">
                    <a href="<?php echo $NotDest_UrlWeb; ?>" class="img-responsive">
                        <img src="<?php echo $NotDest_UrlImg; ?>" alt="">
                    </a>
                </div>
                <!-- post thumb -->

                <div class="item-content">
                    <header>
                        <h4 class="post-title">
                            <a href="<?php echo $NotDest_UrlWeb; ?>"><?php echo $NotDest_titulo; ?></a></h4>
                    </header>
                    <div class="post-content">
                        <?php echo $NotDest_contenido; ?>

                        <div class="kopa-metadata-border col-lg-9">

                            <!-- AddThis -->
                            <div class="addthis_native_toolbox col-lg-7"></div>
                            <script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50f364066076ff63"></script>

                            <span class="kopa-rate">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </span>

                        </div>
                        <!-- metadata -->

                        <a href="<?php echo $NotDest_UrlWeb; ?>" class="kopa-readmore">Leer nota</a>

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
                        $NotNor_fechaPub=$fila_notNor["fecha_publicacion"];
                        $NotNor_categoria=$fila_notNor["categoria"];

                        //URLS
                        $NotNor_UrlWeb=$web."noticia/".$NotNor_id."-".$NotNor_url;
                        $NotNor_UrlImg=$web."imagenes/upload/".$NotNor_imagen."thumb/".$NotNor_imagen_carpeta;
                ?>

                <article class="item pull-left">
                    <div class="item-content">
                        <span class="kopa-date">January 1, 2014</span>
                        <h4 class="post-title">
                            <a href="<?php echo $NotNor_UrlWeb; ?>"><?php echo $NotNor_titulo; ?></a>
                        </h4>
                    </div>
                    <div class="post-thumb">
                        <a href="#" class="img-responsive">
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