<?php
//EDICION ESPAÑOL
$rst_edEsp=mysql_query("SELECT * FROM iev_edicion ORDER BY fecha_publicacion DESC LIMIT 1", $conexion);
$fila_edEsp=mysql_fetch_array($rst_edEsp);

//VARIABLES
$EdEsp_id=$fila_edEsp["id"];
$EdEsp_url=$fila_edEsp["url"];
$EdEsp_nombre_edicion=$fila_edEsp["nombre_edicion"];
$EdEsp_imagen=$fila_edEsp["imagen"];

$EdEsp_UrlImg=$web."imagenes/revista/".$EdEsp_imagen;

?>
<div class="widget-area-6">

    <div class="widget kopa-list-posts-carousel-2-widget">
        <header class="widget-header">
            <h3 class="widget-title">EDICIÓN IMPRESA</h3>
        </header>

        <div class="widget-content col-lg-12">

            <div class="edicion-impresa col-lg-3">

                <div class="portada">
                    <a href="<?php echo $EdEsp_url; ?>" title="<?php echo $EdEsp_nombre_edicion; ?>" target="_blank">
                        <img height="249" src="<?php echo $EdEsp_UrlImg; ?>" alt="<?php echo $EdEsp_nombre_edicion; ?>"/>
                    </a>
                </div>

                <div class="idiomas">
                    <ul>
                        <li><a class="en" href="">Ingles</a></li>
                        <li><a class="al" href="">Aleman</a></li>
                        <li><a class="it" href="">Italiano</a></li>
                        <li><a class="fr" href="">Fránces</a></li>
                        <li><a class="pr" href="">Portugues</a></li>
                        <li><a class="ch" href="">Chino</a></li>
                    </ul>
                </div>

            </div>

            <div class="owl-carousel col-lg-9">

                <div class="item">
                    <div class="post-thumb">
                        <a href="#" class="img-responsive"><img src="imagenes/prueba/img5.jpg" alt=""></a>
                        <div class="kopa-metadata">
                            <span class="kopa-date"> Fer 20, 2014</span>
                        </div>
                    </div>
                    <!-- post-thumb -->
                    <div class="item-content clearfix">
                        <span class="kopa-num-pag">Pág.</span>
                        <span class="kopa-num pull-left">01</span>
                        <div class="post-content edimpresa-titulo">
                            <h4 class="post-title"><a href="#">Los adolescentes protegen más su privacidad que los adultos</a></h4>
                        </div>

                                    <span class="fa-stack fa-lg">
                                        <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="fa fa-volume-up fa-stack-1x fa-inverse"></i>
                                    </span>
                                    <span class="fa-stack fa-lg">
                                        <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="fa fa-file-text-o fa-stack-1x fa-inverse"></i>
                                    </span>

                        <!-- post content -->
                    </div>
                </div>

                <div class="item">
                    <div class="post-thumb">
                        <a href="#" class="img-responsive"><img src="imagenes/prueba/img6.jpg" alt=""></a>
                        <div class="kopa-metadata">
                            <span class="kopa-date"> Fer 20, 2014</span>
                        </div>
                    </div>
                    <!-- post-thumb -->
                    <div class="item-content clearfix">
                        <span class="kopa-num-pag">Pág.</span>
                        <span class="kopa-num pull-left">02</span>
                        <div class="post-content edimpresa-titulo">
                            <h4 class="post-title"><a href="#">Panamá capital mundial de la fe</a></h4>
                        </div>

                                    <span class="fa-stack fa-lg">
                                        <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="fa fa-volume-up fa-stack-1x fa-inverse"></i>
                                    </span>
                                    <span class="fa-stack fa-lg">
                                        <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="fa fa-file-text-o fa-stack-1x fa-inverse"></i>
                                    </span>

                        <!-- post content -->
                    </div>
                </div>

                <div class="item">
                    <div class="post-thumb">
                        <a href="#" class="img-responsive"><img src="imagenes/prueba/img7.jpg" alt=""></a>
                        <div class="kopa-metadata">
                            <span class="kopa-date"> Fer 20, 2014</span>
                        </div>
                    </div>
                    <!-- post-thumb -->
                    <div class="item-content clearfix">
                        <span class="kopa-num-pag">Pág.</span>
                        <span class="kopa-num pull-left">03</span>
                        <div class="post-content edimpresa-titulo">
                            <h4 class="post-title"><a href="#">¿Por qué es tan malo el pecado?</a></h4>
                        </div>

                                    <span class="fa-stack fa-lg">
                                        <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="fa fa-volume-up fa-stack-1x fa-inverse"></i>
                                    </span>
                                    <span class="fa-stack fa-lg">
                                        <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="fa fa-file-text-o fa-stack-1x fa-inverse"></i>
                                    </span>

                        <!-- post content -->
                    </div>
                </div>

                <div class="item">
                    <div class="post-thumb">
                        <a href="#" class="img-responsive"><img src="imagenes/prueba/img8.jpg" alt=""></a>
                        <div class="kopa-metadata">
                            <span class="kopa-date"> Fer 20, 2014</span>
                        </div>
                    </div>
                    <!-- post-thumb -->
                    <div class="item-content">
                        <span class="kopa-num-pag">Pág.</span>
                        <span class="kopa-num pull-left">04</span>
                        <div class="post-content edimpresa-titulo">
                            <h4 class="post-title"><a href="#">Cinco décadas evangelizando</a></h4>
                        </div>

                                    <span class="fa-stack fa-lg">
                                        <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="fa fa-volume-up fa-stack-1x fa-inverse"></i>
                                    </span>
                                    <span class="fa-stack fa-lg">
                                        <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="fa fa-file-text-o fa-stack-1x fa-inverse"></i>
                                    </span>

                        <!-- post content -->
                    </div>
                </div>

            </div>
            <!-- owl carousel -->
        </div>
        <!-- widget content -->
    </div>
    <!-- kopa-list-posts-carousel-2-widget -->

</div>
<!-- widget area 6 -->