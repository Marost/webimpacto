<?php
require_once("panel@impacto/conexion/conexion.php");
require_once("panel@impacto/conexion/funciones.php");

//WIDGETS
$sc_addthis=true;
$sc_galinferior=true;
$sc_videos=true;
$sc_saludos=true;
$sc_slider=true;

//NOTICIAS
$rst_noticias=mysql_query("SELECT * FROM iev_noticia WHERE fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC LIMIT 2", $conexion);

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Impacto Evangelistico</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <?php require_once("w-script.php"); ?>

    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <header>

            <?php require_once("w-header.php"); ?>
            
        </header>

        <?php require_once("w-slider.php"); ?>

        <section id="news">
            
            <div class="interior">
                
                <!-- SECCION SUPERIOR -->
                <section id="nws">

                    <div class="nwizq">

                        <?php require_once("w-portada.php"); ?>

                        <?php require_once("w-columnistas.php"); ?>

                        <aside>

                            <div class="publicidad">
                                
                            </div>
                            
                        </aside>
                    
                    </div>

                    <div class="nwder">

                        <section>

                            <h3>NOTICIAS</h3>

                            <?php while($fila_noticias=mysql_fetch_array($rst_noticias)){
                                    $noticias_id=$fila_noticias["id"];
                                    $noticias_url=$fila_noticias["url"];
                                    $noticias_urlFinal=$web."nota/".$noticias_id."-".$noticias_url;
                                    $noticias_titulo=$fila_noticias["titulo"];
                                    $noticias_contenido=primerParrafo($fila_noticias["contenido"]);
                                    $fechaPubNoticia=$fila_noticias["fecha_publicacion"];
                                    $fechaNoticia=explode(" ", $fechaPubNoticia);
                                    $fechaExpNoticia=explode("-", $fechaNoticia[0]);
                                    $noticias_fecha=nombreFechaTotal($fechaExpNoticia[0],$fechaExpNoticia[1],$fechaExpNoticia[2]);
                            ?>

                            <article>

                                <div class="imagen">
                                    <img src="" alt="" width="290" height="220">
                                </div>

                                <div class="datos">
                                    <h2><a href="<?php echo $noticias_urlFinal; ?>" title="<?php echo $noticias_titulo; ?>">
                                        <?php echo $noticias_titulo; ?></a></h2>
                                    <?php echo $noticias_contenido; ?>
                                </div>

                                <div class="fecha_social">
                                    <p><?php echo $noticias_fecha; ?></p>

                                    <div class="addthis_toolbox addthis_default_style"
                                        addthis:url="<?php echo $noticias_urlFinal; ?>" addthis:title="<?php echo $noticias_titulo; ?>">
                                        <a class="addthis_button_tweet" tw:count="horizontal"></a>
                                        <a class="addthis_button_facebook_like" fb:like:layout="button_count" fb:like:width="120"></a>
                                    </div>                                    
                                </div>
                                
                            </article>

                            <?php } ?>

                        </section>

                        <section>

                            <h3>EVENTOS</h3>

                            <article>

                                <div class="imagen">
                                    <img src="" alt="" width="290" height="220">
                                </div>

                                <div class="datos">
                                    <h2>El mundo no se acaba en diciembre, lo explica la NASA</h2>
                                    <p>¿Te preparas para algún apocalipsis ficticio este mes?</p>
                                    <p>La idea de que el mundo termina el 21 de diciembre </p>
                                </div>

                                <div class="fecha_social">
                                    <p>Miercoles, 24 de agosto del 2012</p>

                                    <div class="addthis_toolbox addthis_default_style ">
                                        <a class="addthis_button_tweet" tw:count="horizontal"></a>
                                        <a class="addthis_button_facebook_like" fb:like:layout="button_count" fb:like:width="120"></a>
                                    </div>                                    
                                </div>
                                
                            </article>
                            
                        </section>
                        
                    </div>

                </section>
                <!-- SECCION SUPERIOR FIN -->

                <!-- SECCION CENTRO -->
                <section id="nwm">
                    <div class="nwizq">

                        <div id="galeria-datos">
                            <h3><span></span>GALERIA DE IMÁGENES</h3>
                            <p>Más Galerías</Mas>
                        </div>

                        <div id="galeria-contenido" class="royalSlider rsDefault">
                            <a class="rsImg" href="imagenes/upload/img1.jpg">
                                Vincent van Gogh - Still Life: Vase with Twelve Sunflowers
                                <img width="96" height="72" class="rsTmb" src="imagenes/upload/img1.jpg">
                            </a>
                            <a class="rsImg" href="imagenes/upload/img1.jpg">
                                Vincent van Gogh - Still Life: Vase with Twelve
                                <img width="96" height="72" class="rsTmb" src="imagenes/upload/img1.jpg">
                            </a>
                            <a class="rsImg" href="imagenes/upload/img1.jpg">
                                Vincent van Gogh - Still Life: Vase with
                                <img width="96" height="72" class="rsTmb" src="imagenes/upload/img1.jpg">
                            </a>
                            <a class="rsImg" href="imagenes/upload/img1.jpg">
                                Vincent van Gogh - Still Life: Vase
                                <img width="96" height="72" class="rsTmb" src="imagenes/upload/img1.jpg">
                            </a>
                        </div>
                    </div>

                    <div class="nwder">
                        
                        <?php require_once("w-escriben.php"); ?>

                        <?php require_once("w-saludos.php"); ?>

                        <?php require_once("w-infografias.php"); ?>

                    </div>

                </section>
                <!-- SECCION CENTRO FIN -->

                <!-- SECCION INFERIOR -->
                <section id="nwi">

                    <?php require_once("w-videos.php"); ?>

                </section>
                <!-- SECCION INFERIOR FIN -->

            </div>

        </section>

        <!-- FOOTER -->
        <footer>
            
            <?php require_once("w-footer.php"); ?>

        </footer>
        <!-- FOOTER FIN -->

    </body>
</html>
