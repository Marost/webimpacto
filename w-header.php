<?php
//CATEGORIAS
$rst_menu=mysql_query("SELECT * FROM iev_noticia_categoria WHERE id<>11 AND id<>12 ORDER BY orden DESC", $conexion);

//SLIDER SUPERIOR
$rst_sliderSup=mysql_query("SELECT * FROM iev_slide_superior ORDER BY orden ASC", $conexion);

?>
<div class="header-slider-opt">

    <div class="header-opt">

        <div id="social" class="visible-lg visible-md">

            <div class="container">
                <ul>
                    <li><a href="javascript:;" class="youtube" title="Youtube">Youtube</a></li>
                    <li><a href="javascript:;" class="google" title="Google+">Google+</a></li>
                    <li><a href="javascript:;" class="twitter" title="Twitter">Twitter</a></li>
                    <li><a href="https://www.facebook.com/impactoevangelistico" class="facebook" title="Facebook">Facebook</a></li>                            
                </ul>
            </div>
            
        </div>

        <div class="container">
                        
            <h1 class="visible-lg visible-md visible-sm">
                <a href="/" title="Impacto Evangelistico">Impacto Evangelístico</a>
            </h1>

            <div class="der visible-lg visible-md">
                
                <div id="busqueda">
                    <form action="buscar" class="search-form noframe inbtn rsmall lblue" method="get">
                        <input type="text" name="buscar" class="search-input" placeholder="Buscar..." />
                        <input class="search-btn" type="submit" value="" />
                    </form>
                </div>

            </div>

            <div class="navbar navbar-default" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Menú</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand visible-xs" href="#">Impacto Evangelístico</a>
                    </div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="/" title="">Inicio</a></li>
                            <li><a href="categoria/11/portada" title="">Portada</a></li>
                            <li><a href="categoria/12/noticias" title="">Noticias</a></li>
                            <li><a href="edicion-anterior-es" title="">Ediciones</a></li>
                            <?php while($fila_menu=mysql_fetch_array($rst_menu)){
                                $menu_id=$fila_menu["id"];
                                $menu_url=$fila_menu["url"];
                                $menu_titulo=$fila_menu["categoria"];
                                ?>
                                <li><a href="categoria/<?php echo $menu_id."/".$menu_url; ?>" title="<?php echo $menu_titulo; ?>">
                                        <?php echo $menu_titulo; ?></a></li>
                            <?php } ?>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>

        </div>

    </div> <!-- FIN DE OPCIONES DE HEADER -->

    <?php if($sc_slider==true){ ?>
    <section id="slider" class="visible-lg visible-md visible-sm">
            
        <div class="tp-banner-container">
                <div class="tp-banner">
                    <ul>

                        <?php while($fila_sliderSup=mysql_fetch_array($rst_sliderSup)){
                                $SliderSup_titulo=$fila_sliderSup["titulo"];
                                $SliderSup_contenido=explode("---", $fila_sliderSup["contenido"]);
                                $SliderSup_edicion=$fila_sliderSup["edicion"];
                                $SliderSup_edicion_pagina=$fila_sliderSup["edicion_pagina"];
                                $SliderSup_imagen=$fila_sliderSup["imagen"];
                                $SliderSup_imagen_carpeta=$fila_sliderSup["imagen_carpeta"];

                                //URL
                                $SliderSup_UrlWeb="http://impactoevangelistico.net/revista/".$SliderSup_edicion."/index.html?pageNumber=".$SliderSup_edicion_pagina;
                                $SliderSup_UrlImg=$web."imagenes/slide/".$SliderSup_imagen_carpeta."".$SliderSup_imagen;
                        ?>

                        <li data-transition="fade" data-slotamount="15" data-masterspeed="500" data-delay="9400">
                    
                            <img src="<?php echo $SliderSup_UrlImg; ?>" data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                                                    
                            <div class="tp-caption slider_titulo"
                                data-x="0"
                                data-y="550"
                                data-start="1000"
                                data-speed="600"
                                data-easing="Linear.easeNone"
                                data-end="9000"
                                data-endspeed="600"
                                data-endeasing="Linear.easeNone"
                                ><a href="<?php echo $SliderSup_UrlWeb; ?>" target="_blank">
                                    <?php echo $SliderSup_titulo; ?></a>
                            </div>

                            <div class="tp-caption slider_contenido"
                                data-x="0"
                                data-y="590"

                                data-start="1000"
                                data-speed="600"
                                data-easing="Linear.easeNone"

                                data-end="9000"
                                data-endspeed="600"
                                data-endeasing="Linear.easeNone"
                                ><p><?php echo $SliderSup_contenido[0]."<br>".$SliderSup_contenido[1]; ?></p>
                            </div>
                                                    
                        </li>

                        <?php } ?>

                        </li>
                
                    
                    </ul>
                                
                    <div class="tp-bannertimer"></div>
                </div>

            </div>

    </section>
    <?php } ?>

</div> <!-- FIN OPCIONES: SLIDER - HEADER -->