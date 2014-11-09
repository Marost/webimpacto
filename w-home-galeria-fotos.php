<?php
//GALERIA DE FOTOS
$rst_galeria=mysql_query("SELECT * FROM iev_galeria WHERE publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC LIMIT 4", $conexion);

//GALERIA DE FOTOS - THUMB
$rst_galThumb=mysql_query("SELECT * FROM iev_galeria WHERE publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC LIMIT 4", $conexion);
?>
<div id="home-galeriafotos" class="col-lg-8 col-md-8 col-sm-12 col-xs-12 hidden-xs">
    <div class="widget-area-8">
        <div class="widget kopa-sync-carousel-widget">
            <header class="widget-header">
                <h3 class="widget-title">GALERÍA DE IMÁGENES</h3>
                <span class="galerias-mas">
                    <a href="galerias" title="Más galerías">
                        <i class="fa fa-plus"></i> Más galerías
                    </a>
                </span>
            </header>
            <div class="widget-content">
                <div class="sync1 owl-carousel">

                    <?php while($fila_galeria=mysql_fetch_array($rst_galeria)){
                            $Galeria_id=$fila_galeria["id"];
                            $Galeria_url=$fila_galeria["url"];
                            $Galeria_titulo=$fila_galeria["titulo"];

                            //FOTOS DE GALERIA SELECCIONADA
                            $rst_galFotos=mysql_query("SELECT * FROM iev_galeria_slide WHERE noticia=$Galeria_id AND orden=0", $conexion);
                            $fila_galFotos=mysql_fetch_array($rst_galFotos);

                            //VARIABLES
                            $GalFotos_imagen=$fila_galFotos["imagen"];
                            $GalFotos_imagen_carpeta=$fila_galFotos["imagen_carpeta"];

                            //URLS
                            $Galeria_UrlWeb=$web."galeria/".$Galeria_id."-".$Galeria_url;
                            $Galeria_UrlImg=$web."imagenes/galeria/".$GalFotos_imagen_carpeta."".$GalFotos_imagen;

                    ?>
                    <div class="item">
                        <div class="post-thumb">
                            <a href="<?php echo $Galeria_UrlWeb; ?>" class="img-responsive">
                                <img class="lazy" data-orignal="<?php echo $Galeria_UrlImg; ?>" src="<?php echo $Galeria_UrlImg; ?>" alt="<?php echo $Galeria_titulo; ?>">
                            </a>
                        </div>
                        <!-- thumb -->
                        <div class="item-content">
                            <h4 class="post-title">
                                <a href="<?php echo $Galeria_UrlWeb; ?>"><?php echo $Galeria_titulo; ?></a>
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
                <div class="sync2 owl-carousel">
                    <?php while($fila_galThumb=mysql_fetch_array($rst_galThumb)){
                    $Galeria_id=$fila_galThumb["id"];

                    //FOTOS DE GALERIA SELECCIONADA
                    $rst_galFotos=mysql_query("SELECT * FROM iev_galeria_slide WHERE noticia=$Galeria_id AND orden=0", $conexion);
                    $fila_galFotos=mysql_fetch_array($rst_galFotos);

                    //VARIABLES
                    $GalFotos_imagen=$fila_galFotos["imagen"];
                    $GalFotos_imagen_carpeta=$fila_galFotos["imagen_carpeta"];

                    //URLS
                    $Galeria_UrlImg=$web."imagenes/galeria/".$GalFotos_imagen_carpeta."thumb/".$GalFotos_imagen;

                    ?>
                    <div class="item img-responsive">
                        <img class="lazy" data-original="<?php echo $Galeria_UrlImg; ?>" src="<?php echo $Galeria_UrlImg; ?>" alt="<?php echo $Galeria_titulo; ?>">
                    </div>
                    <?php } ?>
                </div>
            </div>
            <!-- widget content -->
        </div>
        <!-- sync carousel  -->
    </div>
    <!-- widget area 8 -->
</div>
<!-- col 4 -->