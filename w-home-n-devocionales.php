<?php
//DEVOCIONALES
$rst_devoc=mysql_query("SELECT * FROM iev_noticia WHERE categoria=7 AND publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC LIMIT 1;", $conexion);
$fila_devoc=mysql_fetch_array($rst_devoc);

//VARIABLES
$Devoc_id=$fila_devoc["id"];
$Devoc_url=$fila_devoc["url"];
$Devoc_titulo=$fila_devoc["titulo"];
$Devoc_contenido=primerParrafo($fila_devoc["contenido"]);
$Devoc_imagen=$fila_devoc["imagen"];
$Devoc_imagen_carpeta=$fila_devoc["imagen_carpeta"];
$Devoc_fechaPub=$fila_devoc["fecha_publicacion"];

//SEPARACION DE FECHA
$fechaPubSep=explode(" ", $Devoc_fechaPub);
$fechaSep=explode("-", $fechaPubSep[0]);
$FechaDia=$fechaSep[2];
$FechaMes=mesCorto($fechaSep[1]);
$FechaAnio=$fechaSep[0];

//URLS
$Devoc_UrlWeb=$web."noticia/".$Devoc_id."-".$Devoc_url;
$Devoc_UrlImg=$web."imagenes/upload/".$Devoc_imagen_carpeta."thumbdeven/".$Devoc_imagen;
?>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="widget-area-3">
        <div class="widget kopa-list-posts-thumb-big-small-widget">
            <header class="widget-header">
                <h3 class="widget-title">
                    <a href="categoria/7/devocionales" title="Noticias de Devocionales">DEVOCIONALES</a></h3>
            </header>
            <div class="widget-content">
                <div class="item item-latest clearfix">
                    <div class="post-thumb">
                        <a href="<?php echo $Devoc_UrlWeb; ?>" class="img-responsive" title="<?php echo $Devoc_titulo; ?>">
                            <img class="lazy" data-original="<?php echo $Devoc_UrlImg; ?>" src="<?php echo $Devoc_UrlImg; ?>" alt="<?php echo $Devoc_titulo; ?>"></a>
                    </div>
                    <!-- thumb -->
                    <div class="item-content">
                        <header>
                            <h4 class="post-title">
                                <a href="<?php echo $Devoc_UrlWeb; ?>"><?php echo $Devoc_titulo; ?></a>
                            </h4>
                        </header>
                        <div class="post-content">

                            <div class="kopa-metadata-border col-lg-12 col-md-12 col-sm-12 hidden-xs">

                                <!-- AddThis -->
                                <div class="addthis_native_toolbox col-lg-8 col-md-9 col-sm-9"
                                     data-url="<?php echo $Devoc_UrlWeb; ?>" data-title="<?php echo $Devoc_titulo; ?>">
                                </div>

                                <div class="notaprin-mdstar col-lg-4 col-md-3 col-sm-3 pdr0 pdl0">
                                <span class="kopa-rate">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </span>
                                </div>

                            </div>

                            <?php echo $Devoc_contenido; ?>
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