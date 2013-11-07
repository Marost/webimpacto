<?php
require_once("panel@impacto/conexion/conexion.php");
require_once("panel@impacto/conexion/funciones.php");

//VARIABLES DE URL
$id_url=$_REQUEST["id"];
$url=$_REQUEST["url"];
$url_web=$web."edicion-anterior-en";

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
$rst_noticias   = mysql_query("SELECT COUNT(*) as count FROM iev_edicion_en WHERE fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC;", $conexion);
$row            = mysql_fetch_assoc($rst_noticias);
$generated      = intval($row['count']);
$pagination     = new Pagination("16", $generated, $page, $url_web."?page", 1, 0);
$start          = $pagination->prePagination();
$rst_noticias   = mysql_query("SELECT * FROM iev_edicion_en WHERE fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC LIMIT $start, 16", $conexion);

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Previous Edition: English</title>
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
                <section id="edicion-anterior">

                    <section class="categoria">

                        <h3><?php echo $categoria_titulo; ?></h3>

                        <?php while($fila_noticias=mysql_fetch_array($rst_noticias)){
                                $noticia_id=$fila_noticias["id"];
                                $noticia_url=$fila_noticias["url"];
                                $noticia_titulo=stripslashes($fila_noticias["titulo"]);
                                $noticia_nombre=$fila_noticias["nombre_edicion"];
                                $noticia_imagen=$fila_noticias["imagen"];
                                $noticia_imagen_carpeta=$fila_noticias["carpeta_imagen"];
                                $noticia_fechatotal=explode(" ", $fila_noticias["fecha_publicacion"]);
                                $noticia_fechapub=explode("-", $noticia_fechatotal[0]);

                                //URL
                                $noticia_urlFinal=$web."revista_en/".$noticia_titulo."/index.html";
                        ?>

                        <article>
                            <a href="<?php echo $noticia_urlFinal; ?>" target="_blank">
                                <img src="imagenes/revista/<?php echo $noticia_imagen_carpeta."".$noticia_imagen; ?>" alt="<?php echo $nombre_edicion; ?>" width="130">
                            </a>

                        </article>

                        <?php } ?>

                        <div id="paginacion">
                            <?php $pagination->pagination(); ?>
                        </div>

                    </section>

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
