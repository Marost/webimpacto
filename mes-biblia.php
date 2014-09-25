<?php
require_once("panel@impacto/conexion/conexion.php");
require_once("panel@impacto/conexion/funciones.php");

//WIDGETS
$sc_addthis=true;
$sc_galinferior=false;
$sc_videos=false;
$sc_saludos=true;
$sc_slider=false;
$sc_galeria=true;

//VARIABLES
$noticia_titulo="Mes de la Biblia";
$noticia_contenido="Las mejores historias en un solo libro";
$url_final=$web."mes-biblia";

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
        <meta property="og:description" content="<?php echo $noticia_contenido; ?>"/>
        <meta property="fb:admins" content="1376286793"/>

        <?php require_once("w-script.php"); ?>

        <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
        <script type="text/javascript">
            var jScroll=jQuery.noConflict();jScroll(document).ready(function(){scroll_menu();})
            function scroll_menu(){var _c,_d,_dh,_dt,_ct,_ch;_d=jScroll('.app');if(!_d.length)return;_c=_d.parent();_dt=_d.offset().top;_dh=_d.outerHeight();_ct=_c.offset().top;_ch=_c.outerHeight();jScroll(window).bind('scroll',function(e){var _o=jScroll('html').scrollTop();_o=_o<1?jScroll('body').scrollTop():_o;var _mb=(_ct+_ch)-_dh;if(_o>(_dt)){_d.addClass('fixed');}else _d.removeClass('fixed');return;});jScroll(window).trigger('scroll');}
        </script>

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

                            </div>  
                            
                            <div id="mes-biblia">

                                <div class="video">
                                    <iframe width="560" height="315" src="//www.youtube.com/embed/SrkGrQ6g9Go?rel=0" frameborder="0" allowfullscreen></iframe>
                                </div>

                                <ul>
                                    <li><img src="imagenes/biblia/1-pentateuco.jpg" alt="Mes de la Biblia"/></li>
                                    <li><img src="imagenes/biblia/2-historicos.jpg" alt="Mes de la Biblia"/></li>
                                    <li><img src="imagenes/biblia/3-poeticos.jpg" alt="Mes de la Biblia"/></li>
                                    <li><img src="imagenes/biblia/4-profeticos.jpg" alt="Mes de la Biblia"/></li>
                                    <li><img src="imagenes/biblia/5-evangelios.jpg" alt="Mes de la Biblia"/></li>
                                    <li><img src="imagenes/biblia/6-historicos.jpg" alt="Mes de la Biblia"/></li>
                                    <li><img src="imagenes/biblia/7-paulinas.jpg" alt="Mes de la Biblia"/></li>
                                    <li><img src="imagenes/biblia/8-generales.jpg" alt="Mes de la Biblia"/></li>
                                    <li><img src="imagenes/biblia/9-profeticos.jpg" alt="Mes de la Biblia"/></li>
                                </ul>

                                <div class="app">

                                    <a href="https://www.bible.com/es" target="_blank">
                                        <img src="imagenes/biblia/app.jpg" alt=""/>
                                    </a>

                                </div>

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