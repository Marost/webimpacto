<?php
require_once("panel@impacto/conexion/conexion.php");
require_once("panel@impacto/conexion/funciones.php");

//VARIABLES DE URL
$id_url=$_REQUEST["id"];
$url=$_REQUEST["url"];

//WIDGETS
$sc_addthis=true;
$sc_galinferior=false;
$sc_videos=false;
$sc_saludos=true;
$sc_slider=false;
$sc_galeria=true;

//GALERIA
$rst_noticia=mysql_query("SELECT * FROM iev_galeria WHERE id=$id_url", $conexion);
$fila_noticia=mysql_fetch_array($rst_noticia);

//VARIABLES
$noticia_titulo=$fila_noticia["titulo"];
$noticia_contenido=$fila_noticia["contenido"];

//IMAGENES DE GALERIA
$rst_noticia_img=mysql_query("SELECT * FROM iev_galeria_slide WHERE noticia=$id_url ORDER BY orden ASC", $conexion);

//VARIABLES
$url_final=$web."galeria/".$id_url."-".$url;

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

                    <div class="nwder col-lg-12 col-md-12 col-sm-12 nota-galeria">

                        <section class="nota">
                            
                            <div class="titulo">
                                <h2><?php echo $noticia_titulo; ?></h2>

                                <div class="addthis_toolbox addthis_default_style ">
                                    <a class="addthis_button_tweet" tw:count="horizontal"></a>
                                    <a class="addthis_button_facebook_like" fb:like:layout="button_count" fb:like:width="120"></a>
                                    <a class="addthis_counter addthis_pill_style"></a>
                                </div>

                                <?php echo $noticia_contenido; ?>
                            </div>  
                            
                            <div id="galeria" class="royalSlider rsDefault">
                                <?php while($fila_noticia_img=mysql_fetch_array($rst_noticia_img)){
                                        $galeria_imagen=$fila_noticia_img["imagen"];
                                        $galeria_imagen_carpeta=$fila_noticia_img["imagen_carpeta"];

                                        //URL
                                        $galeria_UrlImg=$web."imagenes/galeria/".$galeria_imagen_carpeta."".$galeria_imagen;
                                        $galeria_UrlImgThumb=$web."imagenes/galeria/".$galeria_imagen_carpeta."thumb/".$galeria_imagen;
                                ?>

                                <div>
                                    <img class="rsImg" data-rsbigimg="<?php echo $galeria_UrlImg; ?>" src="<?php echo $galeria_UrlImg; ?>" />
                                    <img width="96" height="72" class="rsTmb" src="<?php echo $galeria_UrlImgThumb; ?>">
                                </div>
                                <?php } ?>
                            </div>

                        </section>
                        
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
