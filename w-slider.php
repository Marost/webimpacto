<?php
//SLIDE SUPERIOR
$rst_slideSup=mysql_query("SELECT * FROM iev_slide_superior", $conexion);
?>
<div class="tp-banner-container">

    <div class="tp-banner" >
        <ul>

            <?php while($fila_slideSup=mysql_fetch_array($rst_slideSup)){
                    $SlideSup_titulo=$fila_slideSup["titulo"];
                    $SlideSup_contenido=$fila_slideSup["contenido"];
                    $SlideSup_imagen=$fila_slideSup["imagen"];
                    $SlideSup_imagen_carpeta=$fila_slideSup["imagen_carpeta"];

                    //URLS
                    $SlideSup_UrlWeb=$fila_slideSup["url"];
                    $SlideSup_UrlImg=$web."imagenes/slide/".$SlideSup_imagen_carpeta."".$SlideSup_imagen;

                    //DATOS PARA SLIDE
                    $array=json_decode($SlideSup_contenido);
            ?>

            <li data-transition="fade" data-slotamount="7" data-masterspeed="500" data-thumb=""  data-saveperformance="on"  data-title="<?php echo $SlideSup_titulo; ?>">

                <img alt="<?php echo $SlideSup_titulo; ?>" data-lazyload="<?php echo $SlideSup_UrlImg; ?>" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">

                <?php for($i=0; $i<count($array); $i++){
                        if($array[$i]->fondo <> ""){ $fondo="padding: 10px 20px; background: #".$array[$i]->fondo.";";
                        }else{ $fondo=""; }
                ?>

                    <div style="font-size: <?php echo $array[$i]->tamano; ?>px; color: #<?php echo $array[$i]->color; ?>; <?php echo $fondo; ?>" class="tp-caption tp-resizeme"
                         data-x="<?php echo $array[$i]->x; ?>"
                         data-y="<?php echo $array[$i]->y; ?>"
                         data-speed="500"
                         data-start="800"
                         data-easing="Power3.easeInOut"><?php echo $array[$i]->texto; ?>
                    </div>

                <?php } ?>

            </li>

            <?php } ?>

        </ul>

        <div class="tp-bannertimer"></div>

    </div>

</div>