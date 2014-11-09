<?php
//SLIDE SUPERIOR
$rst_slideSup=mysql_query("SELECT * FROM iev_slide_superior", $conexion);
?>
<div class="tp-banner-container hidden-sm hidden-xs">

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
                
                <img class="lazy" alt="<?php echo $SlideSup_titulo; ?>" data-original="<?php echo $SlideSup_UrlImg; ?>" data-lazyload="<?php echo $SlideSup_UrlImg; ?>" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                <a style="position: absolute; top:0; left:0; width: 100%; height: 100%;" href="<?php echo $SlideSup_UrlWeb; ?>"></a>

                <?php for($i=0; $i<count($array); $i++){
                        if($array[$i]->texto->fondo <> ""){ $fondo="padding: 10px 20px; background: #".$array[$i]->texto->fondo.";";
                        }else{ $fondo=""; }
                ?>

                    <div style="line-height: normal !important; font-size: <?php echo $array[$i]->texto->tamano; ?>px; color: #<?php echo $array[$i]->texto->color; ?>; <?php echo $fondo; ?>" class="tp-caption tp-resizeme"
                         data-x="<?php echo $array[$i]->texto->x; ?>"
                         data-y="<?php echo $array[$i]->texto->y; ?>"
                         data-speed="500"
                         data-start="800"
                         data-easing="Power3.easeInOut">
                         <a style="color: #<?php echo $array[$i]->texto->color; ?>;" href="<?php echo $SlideSup_UrlWeb; ?>">
                            <?php echo $array[$i]->texto->texto; ?>
                         </a>
                    </div>

                <?php } ?>

            </li>

            <?php } ?>

        </ul>

        <div class="tp-bannertimer"></div>

    </div>

</div>