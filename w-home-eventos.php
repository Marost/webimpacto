<?php
//EVENTOS
$rst_eventos=mysql_query("SELECT * FROM iev_noticia WHERE categoria=8 AND publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC LIMIT 1;", $conexion);
$fila_eventos=mysql_fetch_array($rst_eventos);

//VARIABLES
$Eventos_id=$fila_eventos["id"];
$Eventos_url=$fila_eventos["url"];
$Eventos_titulo=$fila_eventos["titulo"];
$Eventos_contenido=primerParrafo($fila_eventos["contenido"]);
$Eventos_imagen=$fila_eventos["imagen"];
$Eventos_imagen_carpeta=$fila_eventos["imagen_carpeta"];
$Eventos_fechaPub=$fila_eventos["fecha_publicacion"];

//SEPARACION DE FECHA
$fechaPubSep=explode(" ", $Eventos_fechaPub);
$fechaSep=explode("-", $fechaPubSep[0]);
$FechaDia=$fechaSep[2];
$FechaMes=mesCorto($fechaSep[1]);
$FechaAnio=$fechaSep[0];

//URLS
$Eventos_UrlWeb=$web."noticia/".$Eventos_id."-".$Eventos_url;
$Eventos_UrlImg=$web."imagenes/upload/".$Eventos_imagen_carpeta."thumbdeven/".$Eventos_imagen;
?>
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="widget-area-4">
        <div class="widget kopa-list-posts-thumb-big-small-widget">
            <header class="widget-header">
                <h3 class="widget-title">EVENTOS</h3>
            </header>
            <div class="widget-content">
                <div class="item item-latest clearfix">
                    <div class="post-thumb">
                        <a href="<?php echo $Eventos_UrlWeb; ?>" class="img-responsive"><img src="<?php echo $Eventos_UrlImg; ?>" alt=""></a>
                    </div>
                    <!-- thumb -->
                    <div class="item-content">
                        <header>
                            <h4 class="post-title">
                                <a href="<?php echo $Eventos_UrlWeb; ?>"><?php echo $Eventos_titulo; ?></a>
                            </h4>
                        </header>
                        <div class="post-content">
                            <div class="kopa-metadata-border">
                                <!-- AddThis -->
                                <div class="addthis_native_toolbox col-lg-8"></div>
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
                            <?php echo $Eventos_contenido; ?>
                        </div>
                    </div>
                    <!-- item content -->
                    <div class="kopa-date-box">
                        <span class="kopa-mon"><?php echo $FechaMes; ?></span>
                        <span class="kopa-day"><?php echo $FechaDia; ?></span>
                        <span class="kopa-yea"><?php echo $FechaAnio; ?></span>
                    </div>
                </div>
                <!-- item latest -->
            </div>
        </div>
        <!-- list posts 1 widget -->
    </div>
</div>
<!-- col-4 -->