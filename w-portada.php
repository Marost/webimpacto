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

?>
<div class="widget widget-ed">

    <div class="widget kopa-list-posts-carousel-2-widget">
        <header class="widget-header">
            <h3 class="widget-title">EDICIÓN IMPRESA</h3>
        </header>

        <div class="widget-content col-lg-12">

            <div class="edicion-impresa">

                <div class="portada col-lg-12 col-md-9 col-sm-5">
                    <a href="<?php echo $EdEsp_url; ?>" title="<?php echo $EdEsp_nombre_edicion; ?>" target="_blank">
                        <img class="lazy" data-original="<?php echo $EdEsp_UrlImg; ?>" src="<?php echo $EdEsp_UrlImg; ?>" alt="<?php echo $EdEsp_nombre_edicion; ?>"/>
                    </a>
                </div>

                <div class="idiomas col-lg-12 col-md-3 col-sm-2">
                    <audio id="idioma_audio" src="audio/idioma/es.mp3"></audio>
                    <ul>
                        <li><a class="en" href="edicion-anterior-en">Ingles</a></li>
                        <li><a class="al" href="edicion-anterior-al">Aleman</a></li>
                        <li><a class="it" href="edicion-anterior-it">Italiano</a></li>
                        <li><a class="fr" href="edicion-anterior-fr">Fránces</a></li>
                        <li><a class="pr" href="edicion-anterior-pr">Portugues</a></li>
                        <li><a class="ch" href="edicion-anterior-ch">Chino</a></li>
                    </ul>
                </div>

            </div>

        </div>
        <!-- widget content -->

    </div>
    <!-- kopa-list-posts-carousel-2-widget -->

</div>
<!-- widget area 6 -->