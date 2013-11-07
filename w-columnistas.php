<?php
//COLUMNISTAS
$rst_columnista=mysql_query("SELECT * FROM iev_columnista WHERE publicar=1 ORDER BY orden ASC", $conexion);
?>
<aside>
                            
    <div class="sidebar" id="columnistas">
        
        <h3><span></span>EDITORIAL</h3>

        <?php while($fila_columnista=mysql_fetch_array($rst_columnista)){
                $columnista_id=$fila_columnista["id"];
                $columnista_url=$fila_columnista["url"];
                $columnista_titulo=$fila_columnista["nombre_completo"];

                //COLUMNA
                $rst_columna=mysql_query("SELECT * FROM iev_columnista_columna WHERE columnista=$columnista_id AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC", $conexion);
                $fila_columna=mysql_fetch_array($rst_columna);

                //VARAIBLES
                $columna_id=$fila_columna["id"];
                $columna_url=$fila_columna["url"];
                $columna_titulo=$fila_columna["titulo"];
        ?>

        <article>
            
            <div class="imagen">
                <img src="imagenes/columnistas/8fbxl3tpxildqtsjy74i.png" alt="">
            </div>

            <div class="datos">
                <h2><a href="editorial/<?php echo $columna_id."".$columna_url; ?>">
                    <?php echo $columna_titulo; ?></a></h2>
                <p><a href="columnista/<?php echo $columnista_id."".$columnista_url; ?>">
                    <?php echo $columnista_titulo; ?></a></p>
            </div>

        </article>

        <?php } ?>

    </div>

</aside>