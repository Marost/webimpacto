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
                                                    
                            <div class="tp-caption small_thin_grey customin customout" data-x="80" data-y="240" data-speed="500" data-start="1300" data-endspeed="500">Claro ejemplo del poder del Creador 
                            </div>

                            <div class="tp-caption small_thin_grey customin customout" data-x="80" data-y="240" data-speed="500" data-start="1300" data-endspeed="500">Claro ejemplo del poder del Creador 
                            </div>
                                                    
                        </li>
                        
                        <li data-transition="fade" data-slotamount="15" data-masterspeed="300" data-delay="9400">
                            <img src="/imagenes/slide/slide2.jpg" >
                                                    
                            <!-- <div class="caption very_big_white lfl stl" data-x="0" data-y="100" data-speed="300" data-start="500" 
                            data-easing="easeOutExpo" data-end="6000" data-endspeed="300" data-endeasing="easeInSine" >
                            El mensaje llegó de la India</div> -->
                                                    
                        </li>
                        
                        <li data-transition="fade" data-slotamount="15" data-masterspeed="300" data-delay="9400">
                            <img src="/imagenes/slide/slide3.jpg" >
                                                    
                            <!-- <div class="caption very_big_white lfl stl" data-x="0" data-y="100" data-speed="300" data-start="500" 
                            data-easing="easeOutExpo" data-end="6000" data-endspeed="300" data-endeasing="easeInSine" >
                            Avivamiento!!!</div> -->
                                                    
                        </li>

                        <li data-transition="fade" data-slotamount="15" data-masterspeed="300" data-delay="9400">
                            <img src="/imagenes/slide/slide4.jpg" >
                                                    
                            <!-- <div class="caption very_big_white lfl stl" data-x="0" data-y="100" data-speed="300" data-start="500" 
                            data-easing="easeOutExpo" data-end="6000" data-endspeed="300" data-endeasing="easeInSine" >
                            Los cielos cuentan la Gloria de Dios</div>

                            <div class="caption big_white lfl stl" data-x="0" data-y="150" data-speed="300" data-start="800" 
                            data-easing="easeOutExpo" data-end="6000" data-endspeed="300" data-endeasing="easeInSine" >
                            Salmos 19:1</div> -->
                                                    
                        </li>
                
                    
                    </ul>
                                
                    <div class="tp-bannertimer"></div>
                </div>

            </div>

    </section>

</div> <!-- FIN OPCIONES: SLIDER - HEADER -->