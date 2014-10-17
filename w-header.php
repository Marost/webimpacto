<?php
if(isset($header)){
    if($header=="home"){ $header_class="header-1"; $ocultar="dpnone"; $mostrar=""; $cambioMB="middle"; }
    elseif($header=="interno"){ $header_class="header-2"; $ocultar=""; $mostrar="dpnone"; $cambioMB="bottom"; }
}
?>
<header id="kopa-header" class="<?php echo $header_class; ?>">

    <div class="kopa-header-top">
        <div class="container">
            <div class="menu-second pull-left">
                <ul class="list-unstyled clearfix">
                    <li><a href="#">Contactos</a></li>
                    <li><a href="#">Login</a></li>
                </ul>
            </div>
            <div class="kopa-social pull-right">
                <a href="#" class="fa fa-pinterest"></a>
                <a href="#" class="fa fa-twitter"></a>
                <a href="#" class="fa fa-facebook"></a>
                <a href="#" class="fa fa-youtube"></a>
            </div>
            <!-- social -->
        </div>
    </div>
    <!-- kopa header top -->

    <div class="kopa-header-middle <?php echo $ocultar; ?>">
        <div class="container">

            <div class="kopa-logo pull-left">
                <a href="/"><img src="imagenes/logo.png" alt=""></a>
            </div>
            <!-- logo -->

        </div>
        <!-- container -->
    </div>
    <!-- kopa header -->

    <div class="kopa-header-<?php echo $cambioMB; ?>">
        <div class="container">

            <div class="kopa-logo <?php echo $mostrar; ?>">
                <a href="#"><img src="imagenes/logo.png" alt=""></a>
            </div>
            <!-- logo -->

            <div class="main-menu">
                <span class="mobile-menu-icon fa fa-align-justify"></span>
                <ul class="kopa-menu sf-menu">
                    <li><a href="/">Inicio</a></li>
                    <li><a href="categoria/12/noticias">Noticias</a></li>
                    <li><a href="javascript:;">Ediciones</a>
                        <ul>
                            <li><a href="edicion-anterior-es">Español</a></li>
                            <li><a href="edicion-anterior-en">Ingles</a></li>
                            <li><a href="edicion-anterior-fr">Francés</a></li>
                            <li><a href="edicion-anterior-pr">Portugués</a></li>
                            <li><a href="edicion-anterior-al">Alemán</a></li>
                            <li><a href="edicion-anterior-it">Italiano</a></li>
                            <li><a href="edicion-anterior-ch">Chino</a></li>
                        </ul>
                    </li>
                    <li><a href="javascript:;">Secciones</a>
                        <ul>
                            <li><a href="categoria/11/portada">Portada</a></li>
                            <li><a href="categoria/3/historia">Historia</a></li>
                            <li><a href="categoria/4/literatura">Literatura</a></li>
                            <li><a href="categoria/13/musica">Música</a></li>
                            <li><a href="categoria/6/heroes-fe">Héroes de la fe</a></li>
                            <li><a href="categoria/14/historias-vida">Historias de vida</a></li>
                            <li><a href="categoria/7/devocionales">Devocional</a></li>
                            <li><a href="categoria/8/eventos">Eventos</a></li>
                            <li><a href="categoria/16/informe-especial">Informe Especial</a></li>
                        </ul>
                    </li>
                    <li><a href="videogaleria">Videogalería</a></li>
                    <li><a href="contacto">Contacto</a></li>
                </ul>

                <ul class="kopa-menu mobile-menu">
                    <li><a href="/">Inicio</a></li>
                    <li><a href="categoria/12/noticias">Noticias</a></li>
                    <li><a href="javascript:;">Ediciones</a>
                        <ul>
                            <li><a href="edicion-anterior-es">Español</a></li>
                            <li><a href="edicion-anterior-en">Ingles</a></li>
                            <li><a href="edicion-anterior-fr">Francés</a></li>
                            <li><a href="edicion-anterior-pr">Portugués</a></li>
                            <li><a href="edicion-anterior-al">Alemán</a></li>
                            <li><a href="edicion-anterior-it">Italiano</a></li>
                            <li><a href="edicion-anterior-ch">Chino</a></li>
                        </ul>
                    </li>
                    <li><a href="javascript:;">Secciones</a>
                        <ul>
                            <li><a href="categoria/11/portada">Portada</a></li>
                            <li><a href="categoria/3/historia">Historia</a></li>
                            <li><a href="categoria/4/literatura">Literatura</a></li>
                            <li><a href="categoria/13/musica">Música</a></li>
                            <li><a href="categoria/6/heroes-fe">Héroes de la fe</a></li>
                            <li><a href="categoria/14/historias-vida">Historias de vida</a></li>
                            <li><a href="categoria/7/devocionales">Devocional</a></li>
                            <li><a href="categoria/8/eventos">Eventos</a></li>
                            <li><a href="categoria/16/informe-especial">Informe Especial</a></li>
                        </ul>
                    </li>
                    <li><a href="videogaleria">Videogalería</a></li>
                    <li><a href="contacto">Contacto</a></li>
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


