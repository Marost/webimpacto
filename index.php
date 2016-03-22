<?php
require_once("panel@impacto/conexion/conexion.php");
require_once("panel@impacto/conexion/funciones.php");

//VARIABLES
$header="home";
$w_video=true;
?>
<!DOCTYPE html>
<html lang="es" class="no-js">

    <head>
        <meta charset="utf-8">
        <title><?php echo $web_nombre; ?></title>        

        <?php require_once("w-header-script.php"); ?>

    </head>

    <body class="kopa-home">

        <div class="publicidad-header container">

            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <style type="text/css">
                .adslot_header { width: 970px; height: 250px; margin: 10px auto; }
            </style>
            <ins class="adsbygoogle adslot_header"
                 style="display:block"
                 data-ad-client="ca-pub-4677891133721920"
                 data-ad-slot="3499676490"
                 data-ad-format="auto"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
            
        </div>

        <?php require_once("w-header.php"); ?>

        <?php require_once("w-saludos-lista.php"); ?>

        <div id="contenido-pagina" class="container">
            <?php require_once("w-saludos-formulario.php"); ?>

            <?php require_once("w-home-noticias-prin.php"); ?>

            <div class="publicidad-header container">

                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <style type="text/css">
                    .adslot_slider { width: 970px; height: 250px; margin: 10px auto; }
                </style>
                <ins class="adsbygoogle adslot_slider"
                     style="display:block"
                     data-ad-client="ca-pub-4677891133721920"
                     data-ad-slot="3499676490"
                     data-ad-format="auto"></ins>
                <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
                
            </div>

            <?php require_once("w-home-portada.php"); ?>

            <div class="row">

                <div class="col-lg-8">

                    <div class="row">

                        <?php require_once("w-home-n-devocionales.php"); ?>

                        <?php require_once("w-home-n-eventos.php"); ?>

                    </div>

                    <div class="publicidad-header">

                        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <style type="text/css">
                            .adslot_nota { width: 728px; height: 90px; margin: 10px auto; }
                        </style>
                        <ins class="adsbygoogle adslot_nota"
                             style="display:block"
                             data-ad-client="ca-pub-4677891133721920"
                             data-ad-slot="3499676490"
                             data-ad-format="auto"></ins>
                        <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                        
                    </div>

                    <div class="row">

                        <?php require_once("w-home-n-heroesfe.php"); ?>

                        <?php require_once("w-home-n-histvida.php"); ?>

                    </div>

                </div>

                <div class="col-lg-4">

                    <?php require_once("w-home-editorial-palabra.php"); ?>

                    <?php require_once("w-home-galeria-videos.php"); ?>

                </div>

            </div>

            <div class="row">

                <?php require_once("w-home-galeria-fotos.php"); ?>

                <div id="masvisto" class="col-lg-4 col-md-4 col-sm-12 col-xs-12 visible-lg visible-md">

                    <div class="widget-area-9 col-lg-12">

                        <?php require_once("w-home-masvisto.php"); ?>

                    </div>

                </div>
                <!-- col 4 -->

            </div>

        </div>

        <?php require_once("w-footer.php"); ?>

        <?php require_once("w-footer-script.php"); ?>

    </body>

</html>