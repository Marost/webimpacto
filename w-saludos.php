<?php
//SALUDOS
$rst_saludos=mysql_query("SELECT * FROM iev_saludos WHERE estado_saludo='A' ORDER BY fecha DESC LIMIT 12", $conexion);
?>
<aside>
    <div class="titulo">
        <h3><span></span>ENVÍA TUS SALUDOS</h3>
    </div>

    <div class="contenido contenido_wg_saludos">
        
        <div class="wg_saludos">
            <?php while($fila_saludos=mysql_fetch_array($rst_saludos)){ ?>
            <div>
                <p><strong><?php echo $fila_saludos["nombre"]; ?>:</strong> <?php echo $fila_saludos["contenido"]; ?></p>
            </div>
            <?php } ?>
        </div>

    </div>
</aside>