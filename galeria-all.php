<?php
require_once("panel@impacto/conexion/conexion.php");
require_once("panel@impacto/conexion/funciones.php");

//VARIABLES DE URL
$id_url=$_REQUEST["id"];
$url=$_REQUEST["url"];
$url_web=$web."galerias";

//WIDGETS
$sc_addthis=true;
$sc_galinferior=false;
$sc_videos=false;
$sc_saludos=true;
$sc_slider=false;

################################################################
//PAGINACION DE NOTICIAS
require("libs/pagination/class_pagination.php");

//INICIO DE PAGINACION
$page           = (isset($_GET['page'])) ? intval($_GET['page']) : 1;
$rst_noticias   = mysql_query("SELECT COUNT(*) as count FROM iev_galeria WHERE fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC;", $conexion);
$row            = mysql_fetch_assoc($rst_noticias);
$generated      = intval($row['count']);
$pagination     = new Pagination("15", $generated, $page, $url_web."?page", 1, 0);
$start          = $pagination->prePagination();
$rst_noticias   = mysql_query("SELECT * FROM iev_galeria WHERE fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC LIMIT $start, 15", $conexion);

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Galería de Fotos</title>
        <meta name="description" content="">
        <base href="<?php echo $web; ?>">

        <!-- PAGINACION -->
        <link rel="stylesheet" href="/libs/pagination/pagination.css" media="screen">

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

                        <section class="galeria col-lg-12 col-sm-12 col-xs-12">

                            <h3>Galería de Fotos</h3>

                            <?php while($fila_noticias=mysql_fetch_array($rst_noticias)){
                                    $noticia_id=$fila_noticias["id"];
                                    $noticia_url=$fila_noticias["url"];
                                    $noticia_titulo=stripslashes($fila_noticias["titulo"]);
                                    
                                    $noticia_fechatotal=explode(" ", $fila_noticias["fecha_publicacion"]);
                                    $noticia_fechapub=explode("-", $noticia_fechatotal[0]);

                                    //FOTOS
                                    $rst_fotos=mysql_query("SELECT * FROM iev_galeria_slide WHERE noticia=$noticia_id AND orden=0;", $conexion);
                                    $fila_fotos=mysql_fetch_array($rst_fotos);

                                    $noticia_imagen=$fila_fotos["imagen"];
                                    $noticia_imagen_carpeta=$fila_fotos["imagen_carpeta"];
                                    
                                    //URL
                                    $noticia_urlFinal=$web."galeria/".$noticia_id."-".$noticia_url;
                                    $noticia_urlImg=$web."imagenes/galeria/".$noticia_imagen_carpeta."thumb/".$noticia_imagen;
                            ?>

                            <article class="col-lg-4 col-md-4 col-sm-6">

                                <div class="imagen col-lg-12">
                                    <a href="<?php echo $noticia_urlFinal; ?>" title="<?php echo $noticia_titulo; ?>">
                                        <img src="<?php echo $noticia_urlImg; ?>" alt="<?php echo $noticia_titulo; ?>">
                                    </a>
                                    <div class="titulo">
                                        <h2>
                                            <a href="<?php echo $noticia_urlFinal; ?>" title="<?php echo $noticia_titulo; ?>">
                                                <?php echo $noticia_titulo; ?>
                                            </a>
                                        </h2>
                                    </div>
                                </div>

                            </article>

                            <?php } ?>

                            <div id="paginacion">
                                <?php $pagination->pagination(); ?>
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
