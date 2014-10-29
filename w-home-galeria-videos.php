<?php
//GALERIA DE VIDEOS
$rst_videos=mysql_query("SELECT * FROM iev_videos WHERE publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC LIMIT 10", $conexion);

?>
<div id="home-videos" class="col-lg-12 col-md-7 col-sm-6 col-xs-12 hidden-xs">
    <div id="home-video" class="widget-area-9">
        <div class="widget kopa-list-posts-thumb-big-small-widget">
            <header class="widget-header">
                <h3 class="widget-title">VIDEOS</h3>
                <span class="videos-mas">
                    <a href="videos" title="Más videos">
                        <i class="fa fa-plus"></i> Más videos
                    </a>
                </span>
            </header>
            <div class="widget-content">
                <div id="video" class="item item-latest clearfix">

                    <?php while($fila_videos=mysql_fetch_array($rst_videos)){
                            $Videos_id=$fila_videos["id"];
                            $Videos_url=$fila_videos["url"];
                            $Videos_titulo=$fila_videos["titulo"];
                            $Videos_imagen=$fila_videos["imagen"];
                            $Videos_imagen_carpeta=$fila_videos["imagen_carpeta"];

                            //URLS
                            $Videos_UrlWeb=$web."video/".$Videos_id."-".$Videos_url;
                            $Videos_UrlImg=$web."imagenes/upload/".$Videos_imagen_carpeta."".$Videos_imagen;
                    ?>
                    <div class="slide">
                        <a href="<?php echo $Videos_UrlWeb; ?>">
                        <span><p><?php echo $Videos_titulo; ?></p></span>
                            <img src="<?php echo $Videos_UrlImg; ?>" alt="<?php echo $Videos_titulo; ?>"/>
                        </a>
                    </div>
                    <?php } ?>

                </div>
                <!-- item latest -->
            </div>
        </div>
        <!-- list posts 1 widget -->
    </div>
</div>
<!-- col 4 -->