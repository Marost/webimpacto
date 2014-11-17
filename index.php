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
        <title>Impacto Evangelístico</title>
        <meta name="description" content="Impacto Evangelístico es una publicación oficial del Movimiento Misionero Mundial con 50 años de circulación en el mundo entero, editado en seis idiomas. El contenido, con reportajes, testimonios, historias e información, está orientado a edificar la vida de nuestros lectores">

        <?php require_once("w-header-script.php"); ?>

    </head>

    <body class="kopa-home">

        <?php require_once("w-header.php"); ?>

        <?php require_once("w-slider.php"); ?>

        <?php require_once("w-saludos-lista.php"); ?>

        <div id="contenido-pagina" class="container">
            <?php require_once("w-saludos-formulario.php"); ?>

            <?php require_once("w-home-noticias-prin.php"); ?>

            <?php require_once("w-home-portada.php"); ?>

            <div class="row">

                <div class="col-lg-8">

                    <div class="row">

                        <?php require_once("w-home-n-devocionales.php"); ?>

                        <?php require_once("w-home-n-eventos.php"); ?>

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