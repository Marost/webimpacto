<?php
//EVENTOS
$rst_heroefe=mysql_query("SELECT * FROM iev_noticia WHERE categoria=6 AND publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC LIMIT 1;", $conexion);
$fila_heroefe=mysql_fetch_array($rst_heroefe);

//VARIABLES
$HerFe_id=$fila_heroefe["id"];
$HerFe_url=$fila_heroefe["url"];
$HerFe_titulo=$fila_heroefe["titulo"];
$HerFe_contenido=primerParrafo($fila_heroefe["contenido"]);
$HerFe_imagen=$fila_heroefe["imagen"];
$HerFe_imagen_carpeta=$fila_heroefe["imagen_carpeta"];
$HerFe_fechaPub=$fila_heroefe["fecha_publicacion"];

//SEPARACION DE FECHA
$fechaPubSep=explode(" ", $HerFe_fechaPub);
$fechaSep=explode("-", $fechaPubSep[0]);
$FechaDia=$fechaSep[2];
$FechaMes=mesCorto($fechaSep[1]);
$FechaAnio=$fechaSep[0];

//URLS
$HerFe_UrlWeb=$web."noticia/".$HerFe_id."-".$HerFe_url;
$HerFe_UrlImg=$web."imagenes/upload/".$HerFe_imagen_carpeta."thumbdeven/".$HerFe_imagen;
?>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="widget-area-4">
        <div class="widget kopa-list-posts-thumb-big-small-widget">
            <header class="widget-header">
                <h3 class="widget-title">HÉROES DE LA FE</h3>
            </header>
            <div class="widget-content">
                <div class="item item-latest clearfix">
                    <div class="post-thumb">
                        <a href="<?php echo $HerFe_UrlWeb; ?>" class="img-responsive"><img src="<?php echo $HerFe_UrlImg; ?>" alt=""></a>
                    </div>
                    <!-- thumb -->
                    <div class="item-content">
                        <header>
                            <h4 class="post-title">
                                <a href="<?php echo $HerFe_UrlWeb; ?>"><?php echo $HerFe_titulo; ?></a>
                            </h4>
                        </header>
                        <div class="post-content">

                            <div class="kopa-metadata-border col-lg-12 col-md-12 col-sm-12">

                                <!-- AddThis -->
                                <div class="addthis_native_toolbox col-lg-6 col-md-6 col-sm-6"
                                     data-url="<?php echo $HerFe_UrlWeb; ?>" data-title="<?php echo $HerFe_titulo; ?>">
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

                            <?php echo $HerFe_contenido; ?>
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