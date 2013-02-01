<?php
require_once("panel@impacto/conexion/conexion.php");
require_once("panel@impacto/conexion/funciones.php");

//VARIABLES DE URL
$id_url=$_REQUEST["id"];

//WIDGETS
$sc_addthis=true;
$sc_galinferior=true;
$sc_videos=true;
$sc_saludos=true;
$sc_slider=true;

//NOTICIA
$rst_noticia=mysql_query("SELECT * FROM iev_noticia WHERE id=$id_url", $conexion);
$fila_noticia=mysql_fetch_array($rst_noticia);

//VARIABLES
$noticia_titulo=$fila_noticia["titulo"];
$noticia_contenido=$fila_noticia["contenido"];
$noticia_imagen=$fila_noticia["imagen"];
$noticia_imagen_carpeta=$fila_noticia["carpeta_imagen"];
$noticia_fechatotal=explode(" ", $fila_noticia["fecha_publicacion"]);
$noticia_fechapub=explode("-", $noticia_fechatotal);

//SALUDOS
$rst_saludos=mysql_query("SELECT * FROM iev_saludos WHERE id>0 AND estado_saludo='A' ORDER BY fecha DESC LIMIT 12", $conexion);

//NOS ESCRIBEN
$rst_escriben=mysql_query("SELECT * FROM iev_saludos WHERE id>0 AND estado_saludo='A' ORDER BY fecha DESC LIMIT 12", $conexion);

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $noticia_titulo; ?></title>
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

                    <div class="nwder">

                        <section class="nota">
                            
                            <div class="fecha">
                                <?php echo nombreFechaTotal($noticia_fechapub[0], $noticia_fechapub[1], $noticia_fechapub[2]); ?>
                            </div>

                            <div class="titulo">
                                <?php echo $noticia_titulo; ?>
                            </div>

                            <div class="imagen">
                                <img src="imagenes/upload/<?php echo $noticia_imagen_carpeta."".$noticia_imagen; ?>" alt="<?php echo $noticia_titulo; ?>">
                            </div>

                            <div class="info">
                                <?php echo $noticia_contenido; ?>
                            </div>

                        </section>
                        
                    </div>

                    <div class="nwizq">

                        <aside>

                            <div class="edimpreso">
                                
                                <div class="datos">
                                    <h3>Edición del mes</h3>
                                    <h3 class="numedicion">N° 707</h3>
                                    <p>Click Aquí</p>
                                </div>

                                <div class="imagen">
                                    <a href="#" title="Edición N° 707">
                                        <img src="imagenes/upload/portada.jpg" alt="">
                                    </a>
                                </div>

                            </div>

                            <div class="edanterior">
                                <h3>EDICIONES ANTERIORES</h3>
                                <p>Click aquí xxxx xxxxx xxxxx xxxx xxxxx xxx xxxxx xxxx xxxxxx xxxxxx x</p>
                            </div>
                            
                        </aside>

                        <aside>
                            
                            <div class="columnistas">
                                
                                <h3><span></span>COLUMNISTAS</h3>

                                <article>
                                    
                                    <div class="imagen">
                                        <img src="imagenes/upload/rev-gustavo.png" alt="">
                                    </div>

                                    <div class="datos">
                                        <h2>OÍD PALABRA DE JEHOVÁ</h2>
                                        <p>Rev. Gustavo Martínez</p>
                                    </div>

                                </article>

                                <article>
                                    
                                    <div class="imagen">
                                        <img src="imagenes/upload/rev-jose.png" alt="">
                                    </div>

                                    <div class="datos">
                                        <h2>UN ACTO VALIOSO Y COSTOSO</h2>
                                        <p>Rev. José Soto</p>
                                    </div>

                                </article>

                            </div>

                        </aside>

                        <aside>

                            <div class="publicidad">
                                
                            </div>
                            
                        </aside>
                    
                    </div>

                </section>
                <!-- SECCION SUPERIOR FIN -->

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
