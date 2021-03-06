<?php
require_once("panel@impacto/conexion/conexion.php");
require_once("panel@impacto/conexion/funciones.php");

//VARIABLES DE URL
$id_url=$_REQUEST["id"];
$url=$_REQUEST["url"];

//WIDGETS
$sc_addthis=true;
$sc_galinferior=true;
$sc_videos=true;
$sc_saludos=true;
$sc_slider=false;

//NOTICIA
$rst_noticia=mysql_query("SELECT * FROM iev_columnista_columna WHERE id=$id_url", $conexion);
$fila_noticia=mysql_fetch_array($rst_noticia);

//VARIABLES
$noticia_titulo=$fila_noticia["titulo"];
$noticia_contenido=$fila_noticia["contenido"];
$noticia_categoria=$fila_noticia["categoria"];
$noticia_imagen=$fila_noticia["imagen"];
$noticia_imagen_carpeta=$fila_noticia["imagen_carpeta"];
$noticia_fechatotal=explode(" ", $fila_noticia["fecha_publicacion"]);
$noticia_fechapub=explode("-", $noticia_fechatotal[0]);

//VARIABLES
$url_final=$web."editorial/".$id_url."-".$url;
$url_imagen=$web."imagenes/upload/".$noticia_imagen_carpeta."".$noticia_imagen;

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
        <base href="<?php echo $web; ?>">

        <!-- OPEN GRAPH -->
        <meta property="og:title" content="<?php echo $noticia_titulo; ?>"/>
        <meta property="og:type" content="article"/>
        <meta property="og:url" content="<?php echo $url_final; ?>"/>
        <meta property="og:image" content="<?php echo $url_imagen; ?>"/>
        <meta property="og:site_name" content="<?php echo $web_nombre; ?>"/>
        <meta property="fb:admins" content="1376286793"/>
        <meta property="og:description" content="<?php echo soloDescripcion($noticia_contenido); ?>"/>

        <?php require_once("w-script.php"); ?>

    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <header id="interno">

            <?php require_once("w-header.php"); ?>
            
        </header>

        <section id="news">
            
            <div class="container">
                
                <!-- SECCION SUPERIOR -->
                <section id="nws">

                    <div class="nwder col-lg-8 col-md-8 col-sm-7 col-xs-12 notawizq">

                        <section class="nota editorial">
                            
                            <div class="datos col-lg-12">

                                <div id="social-media" class="col-lg-9 visible-lg addthis_toolbox addthis_default_style ">
                                    <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
                                    <a class="addthis_button_tweet" tw:count="horizontal"></a>
                                    <a class="addthis_button_facebook_like" fb:like:layout="button_count" fb:like:width="120"></a>
                                    <a class="addthis_button_pinterest_pinit"
                                       pi:pinit:url="<?php echo $web; ?>nota/<?php echo $nota_id."-".$nota_url; ?>"
                                       pi:pinit:media="<?php echo $web; ?>upload/<?php echo $nota_imagen_carpeta."".$nota_imagen; ?>"
                                       pi:pinit:layout="horizontal"></a>
                                    <a class="addthis_counter addthis_pill_style"></a>
                                </div>

                                <div class="col-lg-3 fecha">
                                    <?php echo nombreFechaTotal($noticia_fechapub[0], $noticia_fechapub[1], $noticia_fechapub[2]); ?>
                                </div>
                                    
                            </div>

                            <div class="titulo">
                                <h2><?php echo $noticia_titulo; ?></h2>
                                <?php echo cortarTextoRH($noticia_contenido,1,0,150); ?>
                            </div>

                            <div class="info">
                                <?php echo cortarTextoRH($noticia_contenido,0,1,0); ?>
                            </div>

                        </section>
                        
                    </div>

                    <div class="nwizq col-lg-4 col-md-4 col-sm-5 hidden-xs notawder">

                        <?php require_once("w-portada.php"); ?>
                        
                        <?php require_once("w-idiomas.php"); ?>

                        <?php require_once("w-columnistas.php"); ?>

                        <?php require_once("w-saludos.php"); ?>

                        <?php require_once("w-infografias.php"); ?>
                    
                    </div>

                </section>
                <!-- SECCION SUPERIOR FIN -->

            </div>

        </section>

        <!-- FOOTER -->
        <footer>
            
            <?php require_once("w-footer.php"); ?>

        </footer>
        <!-- FOOTER FIN -->

    </body>
</html>
