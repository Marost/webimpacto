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

        <?php require_once("w-header-script.php"); ?>

    </head>

    <body class="kopa-home">

        <?php require_once("w-header.php"); ?>

        <?php require_once("w-slider.php"); ?>

        <div class="kopa-head-line clearfix">
            <div class="container">
                <?php require_once("w-saludos-lista.php"); ?>
            </div>
        </div>

        <div class="container">
            <?php require_once("w-saludos-formulario.php"); ?>

            <?php require_once("w-home-noticias-prin.php"); ?>

            <?php require_once("w-home-portada.php"); ?>

            <div class="row">

                <?php require_once("w-home-devocionales.php"); ?>

                <?php require_once("w-home-eventos.php"); ?>

                <?php require_once("w-home-editorial-palabra.php"); ?>

            </div>

            <div class="row">

                <?php require_once("w-home-galeria-fotos.php"); ?>

                <?php require_once("w-home-galeria-videos.php"); ?>

                <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                    <div class="widget-area-9">
                        <div class="widget kopa-list-posts-thumb-big-small-widget">
                            <header class="widget-header">
                                <h3 class="widget-title">TAGS</h3>
                            </header>
                            <div class="widget-content">
                                <div class="item item-latest clearfix">

                                    <div class="item-content">

                                    </div>
                                    <!-- item content -->

                                </div>
                                <!-- item latest -->
                            </div>
                        </div>
                        <!-- list posts 1 widget -->

                        <div class="widget kopa-list-posts-thumb-big-small-widget">
                            <header class="widget-header">
                                <h3 class="widget-title">LO MÁS VISTO</h3>
                            </header>
                            <div class="widget-content">
                                <div class="item item-latest clearfix">

                                    <div class="item-content">

                                    </div>
                                    <!-- item content -->

                                </div>
                                <!-- item latest -->
                            </div>
                        </div>
                        <!-- list posts 1 widget -->
                    </div>
                </div>
                <!-- col 4 -->

            </div>

        </div>

        <?php require_once("w-footer.php"); ?>

        <?php require_once("w-footer-script.php"); ?>

    </body>

</html>