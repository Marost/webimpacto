<?php
require_once("panel@impacto/conexion/conexion.php");
require_once("panel@impacto/conexion/funciones.php");

//VARIABLES DE URL
$id_url=$_REQUEST["id"];
$url=$_REQUEST["url"];
$url_web=$web."categoria/".$id_url."/".$url;

//WIDGETS
$sc_addthis=true;
$sc_galinferior=false;
$sc_videos=false;
$sc_saludos=true;
$sc_slider=false;

//CATEGORIA
$rst_categoria=mysql_query("SELECT * FROM iev_noticia_categoria WHERE id=$id_url", $conexion);
$fila_categoria=mysql_fetch_array($rst_categoria);

//VARIABLES
$categoria_titulo=$fila_categoria["categoria"];

################################################################
//PAGINACION DE NOTICIAS
require("libs/pagination/class_pagination.php");

//INICIO DE PAGINACION
$page           = (isset($_GET['page'])) ? intval($_GET['page']) : 1;
$rst_noticias   = mysql_query("SELECT COUNT(*) as count FROM iev_noticia WHERE categoria=$id_url AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC;", $conexion);
$row            = mysql_fetch_assoc($rst_noticias);
$generated      = intval($row['count']);
$pagination     = new Pagination("10", $generated, $page, $url_web."&page", 1, 0);
$start          = $pagination->prePagination();
$rst_noticias   = mysql_query("SELECT * FROM iev_noticia WHERE categoria=$id_url AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC LIMIT $start, 10", $conexion);

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $categoria_titulo; ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <base href="<?php echo $web; ?>">

        <!-- PAGINACION -->
        <link rel="stylesheet" href="/libs/pagination/pagination.css" media="screen">

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

                    <div class="nwder notawizq">

                        <section class="categoria">

                            <h3><?php echo $categoria_titulo; ?></h3>

                            <?php while($fila_noticias=mysql_fetch_array($rst_noticias)){
                                    $noticia_id=$fila_noticias["id"];
                                    $noticia_url=$fila_noticias["url"];
                                    $noticia_titulo=stripslashes($fila_noticias["titulo"]);
                                    $noticia_contenido=$fila_noticias["contenido"];
                                    $noticia_imagen=$fila_noticias["imagen"];
                                    $noticia_imagen_carpeta=$fila_noticias["imagen_carpeta"];
                                    $noticia_fechatotal=explode(" ", $fila_noticias["fecha_publicacion"]);
                                    $noticia_fechapub=explode("-", $noticia_fechatotal[0]);

                                    //URL
                                    $noticia_urlFinal=$web."noticia/".$noticia_id."-".$noticia_url;
                            ?>

                            <article>
                                
                                <div class="imagen">
                                    <img src="imagenes/upload/<?php echo $noticia_imagen_carpeta."thumb/".$noticia_imagen; ?>" 
                                            alt="<?php echo $noticia_titulo; ?>" width="150">
                                </div>

                                <div class="datos">
                                    <h2><a href="noticia/<?php echo $noticia_id."-".$noticia_url; ?>" title="">
                                        <?php echo $noticia_titulo; ?></a></h2>
                                    <?php echo cortarTextoRH($noticia_contenido,1,0,150); ?>

                                    <!-- COMPARTIR -->
                                    <div class="addthis_toolbox addthis_default_style"
                                        addthis:url="<?php echo $noticia_urlFinal; ?>" addthis:title="<?php echo $noticia_titulo; ?>">
                                        <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                                        <a class="addthis_button_tweet"></a>
                                    </div>
                                </div>

                            </article>

                            <?php } ?>

                            <div id="paginacion">
                                <?php $pagination->pagination(); ?>
                            </div>

                        </section>
                        
                    </div>

                    <div class="nwizq notawder">

                        <?php require_once("w-portada.php"); ?>

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
