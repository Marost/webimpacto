<?php
require_once("panel@impacto/conexion/conexion.php");
require_once("panel@impacto/conexion/funciones.php");

//VARIABLES
$header="interno";
?>
<!DOCTYPE html>
<html lang="es" class="no-js">
    <head>
        <meta charset="utf-8">
        <title>Impacto Evangelístico</title>

        <?php require_once("w-header-script.php"); ?>

    </head>
    <body class="sub-page">

        <?php require_once("w-header.php"); ?>

        <div class="container">

            <div class="kopa-breadcrumb"></div><!-- kopa-breadcrumb -->

            <div class="widget-area-27">
                <div class="single-page-content">
                    
                    <section class="error-404 clearfix">
                        <div class="left-col">
                            <p>404</p>
                        </div><!--left-col-->
                        <div class="right-col">
                            <h1>Página no encontrada...</h1>
                            <p>Lo sentimos, pero no hemos podido encontrar la página que estabas buscando. Prueba una de estas opciones:</p>
                            <ul class="arrow-list">
                                <li><a href="/">Home</a></li>
                                <li><a href="buscar">Buscador</a></li>
                            </ul>
                        </div><!--right-col-->
                    </section><!--error-404-->
                </div>
                <!-- single page content -->
            </div>
            <!-- widget-area-27 -->
        </div>
        <!-- container -->

        <?php require_once("w-footer.php"); ?>

        <?php require_once("w-footer-script.php"); ?>

    </body>
</html>