<?php
//TAGS
$rst_tags=mysql_query("SELECT * FROM iev_noticia_tags ORDER BY RAND() LIMIT 15", $conexion);
?>
<div class="widget kopa-list-posts-thumb-big-small-widget">
    <header class="widget-header">
        <h3 class="widget-title">TAGS</h3>
    </header>
    <div class="widget-content">
        <div class="item item-latest clearfix">

            <div class="item-content">

                <ul id="home-tags">
                <?php while($fila_tags=mysql_fetch_array($rst_tags)){
                        $Tags_id=$fila_tags["id"];
                        $Tags_url=$fila_tags["url"];
                        $Tags_titulo=$fila_tags["nombre"];

                        //URLS
                        $Tags_UrlWeb=$web."tags/".$Tags_id."/".$Tags_url;
                ?>
                    <li><a href="<?php echo $Tags_UrlWeb; ?>"><?php echo $Tags_titulo; ?></a></li>
                <?php } ?>
                </ul>

            </div>
            <!-- item content -->

        </div>
        <!-- item latest -->
    </div>
</div>
<!-- list posts 1 widget -->