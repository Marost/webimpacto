<?php
//EDICION ESPAÑOL
$rst_edEsp=mysql_query("SELECT * FROM iev_edicion ORDER BY fecha_publicacion DESC LIMIT 1", $conexion);
$fila_edEsp=mysql_fetch_array($rst_edEsp);

//VARIABLES
$EdEsp_id=$fila_edEsp["id"];
$EdEsp_url=$fila_edEsp["url"];
$EdEsp_nombre_edicion=$fila_edEsp["nombre_edicion"];
$EdEsp_imagen=$fila_edEsp["imagen"];

$EdEsp_UrlImg=$web."imagenes/revista/".$EdEsp_imagen;

//NOTICIAS DE PORTADA
$rst_edNot=mysql_query("SELECT * FROM iev_edicion_noticia WHERE edicion_id=$EdEsp_id AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC", $conexion);

?>
<div class="widget-area-6">

    <div class="widget kopa-list-posts-carousel-2-widget">
        <header class="widget-header">
            <h3 class="widget-title">EDICIÓN IMPRESA</h3>
        </header>

        <div class="widget-content col-lg-12">

            <div class="edicion-impresa col-lg-3">

                <div class="portada">
                    <a href="<?php echo $EdEsp_url; ?>" title="<?php echo $EdEsp_nombre_edicion; ?>" target="_blank">
                        <img height="249" src="<?php echo $EdEsp_UrlImg; ?>" alt="<?php echo $EdEsp_nombre_edicion; ?>"/>
                    </a>
                </div>

                <div class="idiomas">
                    <ul>
                        <li><a class="en" href="">Ingles</a></li>
                        <li><a class="al" href="">Aleman</a></li>
                        <li><a class="it" href="">Italiano</a></li>
                        <li><a class="fr" href="">Fránces</a></li>
                        <li><a class="pr" href="">Portugues</a></li>
                        <li><a class="ch" href="">Chino</a></li>
                    </ul>
                </div>

            </div>

            <div class="owl-carousel col-lg-9">

                <?php while($fila_edNot=mysql_fetch_array($rst_edNot)){
                        $EdNot_id=$fila_edNot["id"];
                        $EdNot_url=$fila_edNot["url"];
                        $EdNot_titulo=$fila_edNot["titulo"];
                        $EdNot_pagina=$fila_edNot["pagina"];
                        $EdNot_imagen=$fila_edNot["imagen"];
                        $EdNot_imagen_carpeta=$fila_edNot["imagen_carpeta"];
                        $EdNot_fechaPub=$fila_edNot["fecha_publicacion"];

                        //SEPARACION DE FECHA
                        $fechaPubSep=explode(" ", $EdNot_fechaPub);
                        $fechaSep=explode("-", $fechaPubSep[0]);
                        $FechaDia=$fechaSep[2];
                        $FechaMes=mesCorto($fechaSep[1]);
                        $FechaAnio=$fechaSep[0];

                        //URLS
                        $EdNot_UrlWeb=$web."noticiaed/".$EdNot_id."-".$EdNot_url;
                        $EdNot_UrlImg=$web."imagenes/upload/".$EdNot_imagen_carpeta."thumbport/".$EdNot_imagen;
                ?>
                <div class="item">

                    <div class="post-thumb">
                        <a href="#" class="img-responsive"><img src="<?php echo $EdNot_UrlImg; ?>" alt="<?php echo $EdNot_titulo; ?>"></a>
                        <div class="kopa-metadata">
                            <span class="kopa-date"><?php echo $FechaMes." ".$FechaDia.", ".$FechaAnio; ?></span>
                        </div>
                    </div>
                    <!-- post-thumb -->

                    <div class="item-content clearfix">
                        <span class="kopa-num-pag">Pág.</span>
                        <span class="kopa-num pull-left"><?php echo $EdNot_pagina; ?></span>
                        <div class="post-content edimpresa-titulo">
                            <h4 class="post-title"><a href="#"><?php echo $EdNot_titulo; ?></a></h4>
                        </div>

                        <span class="fa-stack fa-lg">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-volume-up fa-stack-1x fa-inverse"></i>
                        </span>

                        <span class="fa-stack fa-lg">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-file-text-o fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <!-- post content -->

                </div>
                <?php } ?>

            </div>
            <!-- owl carousel -->
        </div>
        <!-- widget content -->
    </div>
    <!-- kopa-list-posts-carousel-2-widget -->

</div>
<!-- widget area 6 -->