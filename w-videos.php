<?php
$rst_videos=mysql_query("SELECT * FROM iev_videos WHERE publicar=1 ORDER BY fecha_publicacion DESC LIMIT 15;", $conexion);
?>
<section class="videos">
                        
    <div class="titulo">
        <h3><span></span>VIDEOS</h3>
        <p style="margin-left:430px;"><a href="/videos-all.php">Más Videos</a></p>
    </div>

    <div class="contenido">

        <div id="video-gallery" class="royalSlider videoGallery rsDefault">

            <?php while($fila_videos=mysql_fetch_array($rst_videos)){
                    $videos_titulo=$fila_videos["titulo"];
                    $videos_contenido=$fila_videos["contenido"];
                    $videos_imagen=$fila_videos["imagen"];
                    $videos_imagen_carpeta=$fila_videos["imagen_carpeta"];
                    $videos_video=$fila_videos["video"];

                    //URL
                    $videos_UrlImg=$web."imagenes/upload/".$videos_imagen_carpeta."thumb/".$videos_imagen;
                    $videos_UrlYoutube="http://www.youtube.com/watch?v=".$videos_video;
            ?>
            <div class="rsContent">
                <a class="rsImg" data-rsVideo="<?php echo $videos_UrlYoutube; ?>" href="<?php echo $videos_UrlImg; ?>">
                    <div class="rsTmb">
                        <h5><?php echo $videos_titulo ?></h5>
                    </div>
                </a>
                <h3 class="rsABlock sampleBlock"><?php echo $videos_titulo ?></h3>
            </div>
            <?php } ?>

        </div>
        
    </div>

</section>