<?php
//CATEGORIAS
$rst_menu=mysql_query("SELECT * FROM iev_noticia_categoria WHERE id<>11 AND id<>12 ORDER BY orden DESC", $conexion);

?>
<div class="header-slider-opt">

    <div class="header-opt">

        <div class="interior">

            <!-- <div class="publicidad-960">
                <object data="/flash/banner-960.swf" type="application/x-shockwave-flash" width="960">
                    <param movie="/flash/banner-960.swf" />
                </object>
            </div> -->
                        
            <h1>
                <a href="/" title="Impacto Evangelistico">Impacto Evangelístico</a>
            </h1>

            <div class="der">
                
                <div id="social">
                    <ul>
                        <li><a href="javascript:;" class="youtube" title="Youtube">Youtube</a></li>
                        <li><a href="javascript:;" class="google" title="Google+">Google+</a></li>
                        <li><a href="javascript:;" class="twitter" title="Twitter">Twitter</a></li>
                        <li><a href="https://www.facebook.com/impactoevangelistico" class="facebook" title="Facebook">Facebook</a></li>                            
                    </ul>
                </div>

                <div id="busqueda">
                    <form action="buscar" class="search-form noframe inbtn rsmall lblue" method="get">
                        <input type="text" name="buscar" class="search-input" placeholder="Buscar..." />
                        <input class="search-btn" type="submit" value="" />
                    </form>
                </div>

            </div>

            <nav>
                <div class="interior">
                    <ul>
                        <li><a href="/" title="">Inicio</a></li>
                        <li><a href="categoria/11/portada" title="">Portada</a></li>
                        <li><a href="categoria/12/noticias" title="">Noticias</a></li>
                        <li><a href="editorial" title="">Editorial</a></li>
                        <?php while($fila_menu=mysql_fetch_array($rst_menu)){
                                $menu_id=$fila_menu["id"];
                                $menu_url=$fila_menu["url"];
                                $menu_titulo=$fila_menu["categoria"];
                        ?>
                        <li><a href="categoria/<?php echo $menu_id."/".$menu_url; ?>" title="<?php echo $menu_titulo; ?>">
                            <?php echo $menu_titulo; ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </nav>

        </div>

    </div> <!-- FIN DE OPCIONES DE HEADER -->

    <section id="slider">
            
        <div class="tp-banner-container">
                <div class="tp-banner">
                    <ul>

                        <li data-transition="fade" data-slotamount="15" data-masterspeed="500" data-delay="9400">
                    
                            <img src="/imagenes/slide/slide1.jpg" data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                                                    
                            <div class="tp-caption slider_titulo"
                                data-x="100"
                                data-y="550"
                                data-start="1000"
                                data-speed="600"
                                data-easing="Linear.easeNone"
                                data-end="9000"
                                data-endspeed="600"
                                data-endeasing="Linear.easeNone"
                                >El maravilloso universo
                            </div>

                            <div class="tp-caption slider_contenido"
                                data-x="100"
                                data-y="590"

                                data-start="1000"
                                data-speed="600"
                                data-easing="Linear.easeNone"

                                data-end="9000"
                                data-endspeed="600"
                                data-endeasing="Linear.easeNone"
                                >Claro ejemplo del poder del Creador
                            </div>
                                                    
                        </li>
                        
                        <li data-transition="fade" data-slotamount="15" data-masterspeed="300" data-delay="9400">
                            <img src="/imagenes/slide/slide2.jpg" >                                                    

                            <div class="tp-caption slider_titulo"
                                data-x="100"
                                data-y="550"
                                data-start="1000"
                                data-speed="600"
                                data-easing="Linear.easeNone"
                                data-end="9000"
                                data-endspeed="600"
                                data-endeasing="Linear.easeNone"
                                >Los libros Apócrifos
                            </div>

                            <div class="tp-caption slider_contenido"
                                data-x="100"
                                data-y="590"

                                data-start="1000"
                                data-speed="600"
                                data-easing="Linear.easeNone"

                                data-end="9000"
                                data-endspeed="600"
                                data-endeasing="Linear.easeNone"
                                >¿Tiene la Iglesia Romana y las Sociedades Bíblicas algún argumento de peso a <br> favor de los libros apócrifos?
                            </div>

                        </li>
                        
                        <li data-transition="fade" data-slotamount="15" data-masterspeed="300" data-delay="9400">
                            <img src="/imagenes/slide/slide3.jpg" >

                            <div class="tp-caption slider_titulo"
                                data-x="100"
                                data-y="550"
                                data-start="1000"
                                data-speed="600"
                                data-easing="Linear.easeNone"
                                data-end="9000"
                                data-endspeed="600"
                                data-endeasing="Linear.easeNone"
                                >40 años preso y Dios lo liberó
                            </div>

                            <div class="tp-caption slider_contenido"
                                data-x="100"
                                data-y="590"

                                data-start="1000"
                                data-speed="600"
                                data-easing="Linear.easeNone"

                                data-end="9000"
                                data-endspeed="600"
                                data-endeasing="Linear.easeNone"
                                >Juan Carlos Cedillo fue un temido asaltante mas Dios extendió sus manos para rescatarlo.
                            </div>

                        </li>

                        <li data-transition="fade" data-slotamount="15" data-masterspeed="300" data-delay="9400">
                            <img src="/imagenes/slide/slide4.jpg" >

                            <div class="tp-caption slider_titulo"
                                data-x="100"
                                data-y="550"
                                data-start="1000"
                                data-speed="600"
                                data-easing="Linear.easeNone"
                                data-end="9000"
                                data-endspeed="600"
                                data-endeasing="Linear.easeNone"
                                >El Matrimonio, Institución Divina
                            </div>

                            <div class="tp-caption slider_contenido"
                                data-x="100"
                                data-y="590"

                                data-start="1000"
                                data-speed="600"
                                data-easing="Linear.easeNone"

                                data-end="9000"
                                data-endspeed="600"
                                data-endeasing="Linear.easeNone"
                                >“Y dijo Jehová Dios: No es bueno que el hombre esté solo; le haré ayuda idónea para él… <br> Jehová Dios… hizo una mujer, y la trajo al hombre” (Génesis 2:18-24).
                            </div>

                        </li>
                
                    
                    </ul>
                                
                    <div class="tp-bannertimer"></div>
                </div>

            </div>

    </section>

</div> <!-- FIN OPCIONES: SLIDER - HEADER -->