<?php
//SALUDOS
$rst_saludos=mysql_query("SELECT * FROM iev_saludos WHERE estado_saludo='A' ORDER BY fecha DESC LIMIT 10", $conexion);
?>
<div id="saludos-lista" class="kopa-head-line clearfix">
    <div class="container">
        <div class="kopa-list-news-carousel-widget">
            <h3 class="widget-title"><a id="saludos-enviar" class="popup-with-zoom-anim" href="#form_saludos"><i class="fa fa-comments"></i> Envía tus Saludos</a></h3>
            <div class="kp-headline clearfix">
                <dl class="ticker-1 clearfix">
                    <?php while($fila_saludos=mysql_fetch_array($rst_saludos)){
                            $Saludos_nombre=strtoupper($fila_saludos["nombre"]);
                            $Saludos_contenido=$fila_saludos["contenido"];
                    ?>
                    <dd>
                        <a href="javascript:;" title="<?php echo $Saludos_nombre.": ".$Saludos_contenido; ?>">
                            <span class="saludo-nombre"><?php echo $Saludos_nombre; ?>:</span> <?php echo $Saludos_contenido; ?>
                        </a>
                    </dd>
                    <?php } ?>
                </dl>
                <!--ticker-1-->
            </div>
            <!--kp-headline-->
        </div>
        <!-- widget news carousel -->
    </div>
</div>