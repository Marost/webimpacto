<?php
//EVENTOS
$rst_hisvida=mysql_query("SELECT * FROM iev_noticia WHERE categoria=14 AND publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC LIMIT 1;", $conexion);
$fila_hisvida=mysql_fetch_array($rst_hisvida);

//VARIABLES
$HisVida_id=$fila_hisvida["id"];
$HisVida_url=$fila_hisvida["url"];
$HisVida_titulo=$fila_hisvida["titulo"];
$HisVida_contenido=primerParrafo($fila_hisvida["contenido"]);
$HisVida_imagen=$fila_hisvida["imagen"];
$HisVida_imagen_carpeta=$fila_hisvida["imagen_carpeta"];
$HisVida_fechaPub=$fila_hisvida["fecha_publicacion"];

//SEPARACION DE FECHA
$fechaPubSep=explode(" ", $HisVida_fechaPub);
$fechaSep=explode("-", $fechaPubSep[0]);
$FechaDia=$fechaSep[2];
$FechaMes=mesCorto($fechaSep[1]);
$FechaAnio=$fechaSep[0];

//URLS
$HisVida_UrlWeb=$web."noticia/".$HisVida_id."-".$HisVida_url;
$HisVida_UrlImg=$web."imagenes/upload/".$HisVida_imagen_carpeta."thumbdeven/".$HisVida_imagen;
?>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="widget-area-4">
        <div class="widget kopa-list-posts-thumb-big-small-widget">
            <header class="widget-header">
                <h3 class="widget-title">HISTORIAS DE VIDA</h3>
            </header>
            <div class="widget-content">
                <div class="item item-latest clearfix">
                    <div class="post-thumb">
                        <a href="<?php echo $HisVida_UrlWeb; ?>" class="img-responsive"><img src="<?php echo $HisVida_UrlImg; ?>" alt=""></a>
                    </div>
                    <!-- thumb -->
                    <div class="item-content">
                        <header>
                            <h4 class="post-title">
                                <a href="<?php echo $HisVida_UrlWeb; ?>"><?php echo $HisVida_titulo; ?></a>
                            </h4>
                        </header>
                        <div class="post-content">

                            <div class="kopa-metadata-border col-lg-12 col-md-12 col-sm-12">

                                <!-- AddThis -->
                                <div class="addthis_native_toolbox col-lg-8 col-md-6 col-sm-6"></div>
                                <script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50f364066076ff63"></script>

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

                            <?php echo $HisVida_contenido; ?>
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