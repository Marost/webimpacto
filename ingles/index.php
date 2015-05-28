<?php
require_once("../panel@impacto/conexion/conexion.php");
require_once("../panel@impacto/conexion/funciones.php");

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

        <?php require_once("../w-header-script.php"); ?>

    </head>

    <body class="kopa-home">

        <?php
        if(isset($header)){
            if($header=="home"){ $header_class="header-1"; $ocultar="dpnone"; $mostrar=""; $cambioMB="middle"; }
            elseif($header=="interno"){ $header_class="header-2"; $ocultar=""; $mostrar="dpnone"; $cambioMB="bottom"; }
        }
        $UrlWeb_AW="http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
        ?>
        <div id="accesibilidad-opcion">
            <a id="accesibilidadActivar" href="javascript:;" title="Presionar ENTER para activar modo de accesibilidad">Presionar ENTER para activar modo de accesibilidad</a>
            <a id="accesibilidadDesactivar" href="javascript:;" title="Presionar ENTER para desactivar modo de accesibilidad">Presionar ENTER para desactivar modo de accesibilidad</a>
        </div>

        <header id="kopa-header" class="<?php echo $header_class; ?>">

            <div class="kopa-header-top">
                <div class="container">
                    <div class="menu-second pull-left">
                        <ul class="list-unstyled clearfix">
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Login</a></li>
                        </ul>
                    </div>
                    <div class="kopa-social pull-right">
                        <a target="_blank" href="https://www.facebook.com/impactoevangelistico" class="fa fa-facebook"></a>
                    </div>
                    <!-- social -->
                </div>
            </div>
            <!-- kopa header top -->

            <div class="kopa-header-middle <?php echo $ocultar; ?>">
                <div class="container">

                    <div class="kopa-logo pull-left">
                        <a href="/" title="Logo Impacto Evangelistico"><img src="imagenes/logo.png" alt="Logo Impacto Evangelistico"></a>
                    </div>
                    <!-- logo -->

                </div>
                <!-- container -->
            </div>
            <!-- kopa header -->

            <div class="kopa-header-<?php echo $cambioMB; ?>">
                <div class="container">

                    <div class="kopa-logo <?php echo $mostrar; ?>">
                        <a href="/"><img src="imagenes/logo.png" alt=""></a>
                    </div>
                    <!-- logo -->

                    <div id="menu-princpal" class="main-menu">
                        <span class="mobile-menu-icon fa fa-align-justify"></span>
                        <ul class="kopa-menu sf-menu">
                            <li><a href="/">Home</a></li>
                            <li><a href="nosotros/">About Us</a></li>
                            <li><a href="categoria/12/noticias">News</a></li>
                            <li><a href="javascript:;">Editions</a>
                                <ul>
                                    <li><a href="edicion-anterior-es"><img src="imagenes/flags/es.png" alt="Español"/> Spanish</a></li>
                                    <li><a href="edicion-anterior-en"><img src="imagenes/flags/en.png" alt="Ingles"/> English</a></li>
                                    <li><a href="edicion-anterior-fr"><img src="imagenes/flags/fr.png" alt="Francés"/> French</a></li>
                                    <li><a href="edicion-anterior-pr"><img src="imagenes/flags/pr.png" alt="Portugués"/> Portuguese</a></li>
                                    <li><a href="edicion-anterior-al"><img src="imagenes/flags/al.png" alt="Alemán"/> German</a></li>
                                    <li><a href="edicion-anterior-it"><img src="imagenes/flags/it.png" alt="Italiano"/> Italian</a></li>
                                    <li><a href="edicion-anterior-ch"><img src="imagenes/flags/ch.png" alt="Chino"/> Chinese</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:;">Sections</a>
                                <ul>
                                    <li><a href="categoria/11/portada">Frontpage</a></li>
                                    <li><a href="categoria/3/historia">History</a></li>
                                    <li><a href="categoria/4/literatura">Literature</a></li>
                                    <li><a href="categoria/13/musica">Music</a></li>
                                    <li><a href="categoria/6/heroes-fe">Heroes of Faith</a></li>
                                    <li><a href="categoria/14/historias-vida">Life Stories</a></li>
                                    <li><a href="categoria/7/devocionales">Devotional</a></li>
                                    <li><a href="categoria/8/eventos">Events</a></li>
                                    <li><a href="categoria/16/informe-especial">Special Report</a></li>
                                </ul>
                            </li>
                            <li><a href="videos">Video Gallery</a></li>
                        </ul>

                        <ul class="kopa-menu mobile-menu">
                            <li><a href="/">Home</a></li>
                            <li><a href="nosotros/">About Us</a></li>
                            <li><a href="categoria/12/noticias">News</a></li>
                            <li><a href="javascript:;">Editions</a>
                                <ul>
                                    <li><a href="edicion-anterior-es"><img src="imagenes/flags/es.png" alt="Español"/> Spanish</a></li>
                                    <li><a href="edicion-anterior-en"><img src="imagenes/flags/en.png" alt="Ingles"/> English</a></li>
                                    <li><a href="edicion-anterior-fr"><img src="imagenes/flags/fr.png" alt="Francés"/> French</a></li>
                                    <li><a href="edicion-anterior-pr"><img src="imagenes/flags/pr.png" alt="Portugués"/> Portuguese</a></li>
                                    <li><a href="edicion-anterior-al"><img src="imagenes/flags/al.png" alt="Alemán"/> German</a></li>
                                    <li><a href="edicion-anterior-it"><img src="imagenes/flags/it.png" alt="Italiano"/> Italian</a></li>
                                    <li><a href="edicion-anterior-ch"><img src="imagenes/flags/ch.png" alt="Chino"/> Chinese</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:;">Sections</a>
                                <ul>
                                    <li><a href="categoria/11/portada">Frontpage</a></li>
                                    <li><a href="categoria/3/historia">History</a></li>
                                    <li><a href="categoria/4/literatura">Literature</a></li>
                                    <li><a href="categoria/13/musica">Music</a></li>
                                    <li><a href="categoria/6/heroes-fe">Heroes of Faith</a></li>
                                    <li><a href="categoria/14/historias-vida">Life Stories</a></li>
                                    <li><a href="categoria/7/devocionales">Devotional</a></li>
                                    <li><a href="categoria/8/eventos">Events</a></li>
                                    <li><a href="categoria/16/informe-especial">Special Report</a></li>
                                </ul>
                            </li>
                            <li><a href="videos">Video Gallery</a></li>
                        </ul>
                    </div>
                    <!-- main-menu -->
                </div>
                <!-- container -->
            </div>
            <!-- kopa header -->

            <?php if(isset($mostrar)){ if($mostrar==""){ ?>
            <div class="kopa-header-bottom">
            <?php }} ?>

                <div class="kopa-head-line clearfix">
                    <div class="container">

                        <?php if(isset($header)){ if($header=="interno"){
                            require_once("w-saludos-lista.php");
                         }else{ ?>
                        <div class="kopa-list-news-carousel-widget"><h3 class="widget-title">&nbsp;</h3></div>
                        <?php }} ?>

                        <div class="kopa-search-box">
                            <div class="kopa-search-box">
                                <form action="buscar" method="get" class="search-form">
                                    <input type="text" name="buscar" onBlur="if (this.value == '')
                                                this.value = this.defaultValue;" onFocus="if (this.value == this.defaultValue)
                                                this.value = '';" value="Buscar" >
                                    <span class="fa fa-search"></span>
                                    <button type="submit" class="fa fa-search"></button>
                                </form>
                            </div>
                        </div>
                        <!-- search box -->

                    </div>
                    <!-- container -->

                </div>
                <!-- kopa head line -->

            <?php if(isset($mostrar)){ if($mostrar==""){ ?>
            </div><!-- kopa header -->
            <?php }} ?>

        </header>
        <!-- page header -->


        <div class="tp-banner-container hidden-sm hidden-xs">

            <div class="tp-banner" >
                <ul>

                    <li data-transition="fade" data-slotamount="7" data-masterspeed="500" data-thumb=""  data-saveperformance="on"  data-title="">
                        
                        <img class="lazy" alt="" data-original="/ingles/img1.jpg" data-lazyload="/ingles/img1.jpg" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">

                    </li>

                    <li data-transition="fade" data-slotamount="7" data-masterspeed="500" data-thumb=""  data-saveperformance="on"  data-title="">
                        
                        <img class="lazy" alt="" data-original="/ingles/img2.jpg" data-lazyload="/ingles/img2.jpg" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">

                    </li>

                    <li data-transition="fade" data-slotamount="7" data-masterspeed="500" data-thumb=""  data-saveperformance="on"  data-title="">
                        
                        <img class="lazy" alt="" data-original="/ingles/img3.jpg" data-lazyload="/ingles/img3.jpg" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">

                    </li>

                    <li data-transition="fade" data-slotamount="7" data-masterspeed="500" data-thumb=""  data-saveperformance="on"  data-title="">
                        
                        <img class="lazy" alt="" data-original="/ingles/img4.jpg" data-lazyload="/ingles/img4.jpg" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">

                    </li>


                </ul>

                <div class="tp-bannertimer"></div>

            </div>

        </div>

        <?php require_once("../w-saludos-lista.php"); ?>

        <div id="contenido-pagina" class="container">
            <?php require_once("../w-saludos-formulario.php"); ?>

            <?php require_once("../w-home-noticias-prin.php"); ?>

            <?php require_once("../w-home-portada.php"); ?>

            <div class="row">

                <div class="col-lg-8">

                    <div class="row">

                        <?php require_once("../w-home-n-devocionales.php"); ?>

                        <?php require_once("../w-home-n-eventos.php"); ?>

                    </div>

                    <div class="row">

                        <?php require_once("../w-home-n-heroesfe.php"); ?>

                        <?php require_once("../w-home-n-histvida.php"); ?>

                    </div>

                </div>

                <div class="col-lg-4">

                    <?php require_once("../w-home-editorial-palabra.php"); ?>

                    <?php require_once("../w-home-galeria-videos.php"); ?>

                </div>

            </div>

            <div class="row">

                <?php require_once("../w-home-galeria-fotos.php"); ?>

                <div id="masvisto" class="col-lg-4 col-md-4 col-sm-12 col-xs-12 visible-lg visible-md">

                    <div class="widget-area-9 col-lg-12">

                        <?php require_once("../w-home-masvisto.php"); ?>

                    </div>

                </div>
                <!-- col 4 -->

            </div>

        </div>

        <?php require_once("../w-footer.php"); ?>

        <?php require_once("../w-footer-script.php"); ?>

    </body>

</html>