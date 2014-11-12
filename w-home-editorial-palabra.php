<?php
//COLUMNISTA - 1
$rst_columnista=mysql_query("SELECT * FROM iev_columnista WHERE id=1", $conexion);
$fila_columnista=mysql_fetch_array($rst_columnista);

//VARIABLES
$Columnista_id=$fila_columnista["id"];
$Columnista_url=$fila_columnista["url"];
$Columnista_titulo=$fila_columnista["nombre_completo"];
$Columnista_cargo=$fila_columnista["cargo"];
$Columnista_imagen=$fila_columnista["foto"];

//COLUMNAS
$rst_colNota=mysql_query("SELECT * FROM iev_columnista_columna WHERE columnista=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC;", $conexion);
$fila_colNota=mysql_fetch_array($rst_colNota);

//VARIABLES
$ColNota_id=$fila_colNota["id"];
$ColNota_url=$fila_colNota["url"];
$ColNota_titulo=$fila_colNota["titulo"];

//URLS
$Columnista_UrlWeb=$web."columnista/".$Columnista_id."-".$Columnista_url;
$Columnista_UrlImg=$web."imagenes/columnistas/".$Columnista_imagen;
$ColNota_UrlWeb=$web."editorial/".$ColNota_id."-".$ColNota_url;

//MAS COLUMNISTAS
$rst_colOtros=mysql_query("SELECT * FROM iev_columnista WHERE id<>1 ORDER BY id ASC", $conexion);

?>
<div class="col-lg-12 col-md-5 col-sm-6 col-xs-12">
    <div class="widget-area-5">

        <div id="editorial" class="widget kopa-list-post-small-thumb-widget no-cat">
            <header class="widget-header">
                <h3 class="widget-title">
                    <a href="#" title="Noticias de Editorial">
                        EDITORIAL</a></h3>
            </header>
            <div class="widget-content">
                <ul>
                    <li class="col-lg-12 pdr0 pdl0">
                        <div class="contenedor col-lg-12 pdr0 pdl0">

                            <div class="datos col-lg-8 pdr0 pdl0 flnone">
                                
                                <span class="titulo">
                                    <h4>
                                        <a href="<?php echo $ColNota_UrlWeb; ?>" title="<?php echo $ColNota_titulo; ?>"><?php echo $ColNota_titulo; ?></a>
                                    </h4>
                                </span>

                                <span class="cargo">
                                    <a href="<?php echo $Columnista_UrlWeb; ?>" title="Autor <?php echo $Columnista_titulo; ?>, <?php echo $Columnista_cargo; ?>">
                                        <p><strong><?php echo $Columnista_titulo; ?></strong></p>
                                    </a>
                                    <p><?php echo $Columnista_cargo; ?></p>
                                </span>

                            </div>

                            <div class="imagen col-lg-4 pdr0 pdl0 flnone">
                                
                                <a href="<?php echo $Columnista_UrlWeb; ?>">
                                    <img class="lazy" data-original="<?php echo $Columnista_UrlImg; ?>" src="<?php echo $Columnista_UrlImg; ?>" alt="<?php echo $Columnista_titulo; ?>">
                                </a>

                            </div>

                        </div>

                    </li>
                </ul>
            </div>
        </div>

        <div id="lapalabra" class="widget kopa-list-post-small-thumb-widget no-cat">
            <header class="widget-header">
                <h3 class="widget-title">
                    <a href="#" title="Noticias de La Palabra">
                        LA PALABRA</a></h3>
            </header>
            <div class="widget-content">
                <ul class="list-unstyled">

                    <?php while($fila_colOtros=mysql_fetch_array($rst_colOtros)){
                        $Columnista_id=$fila_colOtros["id"];
                        $Columnista_url=$fila_colOtros["url"];
                        $Columnista_titulo=$fila_colOtros["nombre_completo"];
                        $Columnista_cargo=$fila_colOtros["cargo"];
                        $Columnista_imagen=$fila_colOtros["foto"];

                        //COLUMNAS
                        $rst_colNota=mysql_query("SELECT * FROM iev_columnista_columna WHERE columnista=$Columnista_id AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC;", $conexion);
                        $fila_colNota=mysql_fetch_array($rst_colNota);

                        //VARIABLES
                        $ColNota_id=$fila_colNota["id"];
                        $ColNota_url=$fila_colNota["url"];
                        $ColNota_titulo=$fila_colNota["titulo"];

                        //URLS
                        $Columnista_UrlWeb=$web."columnista/".$Columnista_id."-".$Columnista_url;
                        $Columnista_UrlImg=$web."imagenes/columnistas/".$Columnista_imagen;
                        $ColNota_UrlWeb=$web."la-palabra/".$ColNota_id."-".$ColNota_url;
                    ?>
                    <li class="clearfix">
                        <a class="post-thumb pull-left  pdr0 pdl0 flnone col-lg-3 col-md-4" href="<?php echo $Columnista_UrlWeb; ?>">
                            <img class="lazy" data-original="<?php echo $Columnista_UrlImg; ?>" src="<?php echo $Columnista_UrlImg; ?>" alt="<?php echo $Columnista_titulo; ?>">
                        </a>
                        <div class="item-right col-lg-9 col-md-8 pdr0 pdl0 flnone">
                            <h4 class="post-title">
                                <a href="<?php echo $ColNota_UrlWeb; ?>" title="<?php echo $ColNota_titulo; ?>"><?php echo $ColNota_titulo; ?></a>
                            </h4>

                            <span>
                                <a href="<?php echo $Columnista_UrlWeb; ?>" title="Autor <?php echo $Columnista_titulo; ?>, <?php echo $Columnista_cargo; ?>">
                                    <p><strong><?php echo $Columnista_titulo; ?></strong></p>
                                </a>
                                <p><?php echo $Columnista_cargo; ?></p>
                            </span>
                        </div>
                    </li>
                    <?php } ?>

                </ul>
            </div>
        </div>
        <!-- list post small thumb -->
    </div>
</div>
<!-- col-4 -->