<?php
//SELECCIONAR MAS VISTO
$rst_notCont=mysql_query("SELECT * FROM iev_noticia WHERE publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY contador DESC LIMIT 7", $conexion);
?>
<div id="home-masvisto" class="widget kopa-list-posts-thumb-big-small-widget">
    <header class="widget-header">
        <h3 class="widget-title">LO MÁS VISTO</h3>
    </header>
    <div class="widget-content">
        <div class="item item-latest clearfix">

            <div id="masvisto" class="item-content">

                <?php while($fila_notCont=mysql_fetch_array($rst_notCont)){
                        $NotCont_id=$fila_notCont["id"];
                        $NotCont_url=$fila_notCont["url"];
                        $NotCont_titulo=$fila_notCont["titulo"];
                        $NotCont_imagen=$fila_notCont["imagen"];
                        $NotCont_imagen_carpeta=$fila_notCont["imagen_carpeta"];
                        $NotCont_contador=$fila_notCont["contador"];

                        //URLS
                        $NotCont_UrlWeb=$web."noticia/".$NotCont_id."-".$NotCont_url;
                        $NotCont_UrlImg=$web."imagenes/upload/".$NotCont_imagen_carpeta."thumb/".$NotCont_imagen;
                ?>
                    <div class="masvisto-noticia">

                        <div class="imagen">
                            <a href="<?php echo $NotCont_UrlWeb; ?>">
                                <img class="lazy" data-original="<?php echo $NotCont_UrlImg; ?>" src="<?php echo $NotCont_UrlImg; ?>" alt="<?php echo $NotCont_titulo; ?>"/>
                            </a>
                        </div>

                        <div class="titulo">
                            <a href="<?php echo $NotCont_UrlWeb; ?>"><?php echo $NotCont_titulo; ?></a>
                            <span><i class="fa fa-eye"></i> <?php echo $NotCont_contador; ?></span>
                        </div>

                    </div>

                <?php } ?>

            </div>
            <!-- item content -->

        </div>
        <!-- item latest -->
    </div>
</div>
<!-- list posts 1 widget -->