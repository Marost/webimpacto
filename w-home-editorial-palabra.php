<?php
//COLUMNISTA - 1
$rst_columnista=mysql_query("SELECT * FROM iev_columnista WHERE id=1", $conexion);
$fila_columnista=mysql_fetch_array($rst_columnista);

//VARIABLES
$Columnista_id=$fila_columnista["id"];
$Columnista_url=$fila_columnista["url"];
$Columnista_titulo=$fila_columnista["nombre_completo"];
$Columnista_cargo=$fila_columnista["cargo"];
$Columnista_foto=$fila_columnista["foto"];
$Columnista_imagen=$fila_columnista["imagen_portada"];

//COLUMNAS
$rst_colNota=mysql_query("SELECT * FROM iev_columnista_columna WHERE columnista=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC;", $conexion);
$fila_colNota=mysql_fetch_array($rst_colNota);

//VARIABLES
$ColNota_id=$fila_colNota["id"];
$ColNota_url=$fila_colNota["url"];
$ColNota_titulo=$fila_colNota["titulo"];

//URLS
$Columnista_UrlWeb=$web."columnista/".$Columnista_id."-".$Columnista_url;
$Columnista_UrlImg=$web."imagenes/columnistas".$Columnista_imagen;
$ColNota_UrlWeb=$web."editorial/".$ColNota_id."-".$ColNota_url;

//MAS COLUMNISTAS
$rst_colOtros=mysql_query("SELECT * FROM iev_columnista WHERE id<>1 ORDER BY id ASC", $conexion);

?>
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
    <div class="widget-area-5">

        <div class="widget kopa-list-post-small-thumb-widget no-cat">
            <header class="widget-header">
                <h3 class="widget-title">EDITORIAL</h3>
            </header>
            <div class="widget-content">
                <ul class="list-unstyled">
                    <li class="clearfix">
                        <div class="item-left">
                            <h4 class="post-title">
                                <a href="<?php echo $ColNota_UrlWeb; ?>"><?php echo $ColNota_titulo; ?></a>
                            </h4>

                            <span>
                                <p><strong><?php echo $Columnista_titulo; ?></strong></p>
                                <p><?php echo $Columnista_cargo; ?></p>
                            </span>
                        </div>

                        <a href="<?php echo $Columnista_UrlWeb; ?>" class="post-thumb pull-left">
                            <img src="<?php echo $Columnista_UrlImg; ?>" alt="<?php echo $Columnista_titulo; ?>">
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="widget kopa-list-post-small-thumb-widget no-cat">
            <header class="widget-header">
                <h3 class="widget-title">LA PALÁBRA</h3>
            </header>
            <div class="widget-content">
                <ul class="list-unstyled">

                    <?php while($fila_colOtros=mysql_fetch_array($rst_colOtros)){
                        $Columnista_id=$fila_colOtros["id"];
                        $Columnista_url=$fila_colOtros["url"];
                        $Columnista_titulo=$fila_colOtros["nombre_completo"];
                        $Columnista_cargo=$fila_colOtros["cargo"];
                        $Columnista_foto=$fila_colOtros["foto"];
                        $Columnista_imagen=$fila_colOtros["imagen_portada"];

                        //COLUMNAS
                        $rst_colNota=mysql_query("SELECT * FROM iev_columnista_columna WHERE columnista=$Columnista_id AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC;", $conexion);
                        $fila_colNota=mysql_fetch_array($rst_colNota);

                        //VARIABLES
                        $ColNota_id=$fila_colNota["id"];
                        $ColNota_url=$fila_colNota["url"];
                        $ColNota_titulo=$fila_colNota["titulo"];

                        //URLS
                        $Columnista_UrlWeb=$web."columnista/".$Columnista_id."-".$Columnista_url;
                        $Columnista_UrlImg=$web."imagenes/columnistas".$Columnista_imagen;
                        $ColNota_UrlWeb=$web."la-palabra/".$ColNota_id."-".$ColNota_url;
                    ?>
                    <li class="clearfix">
                        <a href="<?php echo $Columnista_UrlWeb; ?>" class="post-thumb pull-left">
                            <img src="<?php echo $Columnista_UrlImg; ?>" alt="<?php echo $Columnista_titulo; ?>">
                        </a>
                        <div class="item-right">
                            <h4 class="post-title">
                                <a href="<?php echo $ColNota_UrlWeb; ?>"><?php echo $ColNota_titulo; ?></a>
                            </h4>

                            <span>
                                <p><strong><?php echo $Columnista_titulo; ?></strong></p>
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