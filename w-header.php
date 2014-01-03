<?php
//CATEGORIAS
$rst_menu=mysql_query("SELECT * FROM iev_noticia_categoria WHERE id<>11 AND id<>12 ORDER BY orden DESC", $conexion);

?>
<div class="interior">

    <div class="publicidad-960">
        <object data="/flash/banner-960.swf" type="application/x-shockwave-flash" width="960">
            <param movie="/flash/banner-960.swf" />
        </object>
    </div>
                
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