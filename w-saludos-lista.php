<?php
//SALUDOS
$rst_saludos=mysql_query("SELECT * FROM iev_saludos WHERE estado_saludo='A' ORDER BY fecha DESC LIMIT 10", $conexion);
?>
<div class="kopa-list-news-carousel-widget">
    <h3 class="widget-title">Saludos</h3>
    <div class="kp-headline clearfix">
        <dl class="ticker-1 clearfix">
            <?php while($fila_saludos=mysql_fetch_array($rst_saludos)){
                    $Saludos_nombre=strtoupper($fila_saludos["nombre"]);
                    $Saludos_contenido=$fila_saludos["contenido"];
            ?>
            <dd><a href="javascript:;"><?php echo $Saludos_nombre.": ".$Saludos_contenido; ?></a></dd>
            <?php } ?>
        </dl>
        <!--ticker-1-->
    </div>
    <!--kp-headline-->
</div>
<!-- widget news carousel -->