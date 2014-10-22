<?php
require_once("panel@impacto/conexion/conexion.php");
require_once("panel@impacto/conexion/funciones.php");

//VARIABLES DE URL
$Req_Url=$_REQUEST["url"];

//VARIABLES
$header="interno";

//PAGINA
$rst_pagina=mysql_query("SELECT * FROM iev_paginas WHERE url='$Req_Url' AND publicar=1", $conexion);
$num_pagina=mysql_num_rows($rst_pagina);

if($num_pagina==0){
    header("Location:/404");
}else{
    $fila_pagina=mysql_fetch_array($rst_pagina);

    //VARIABLES
    $Pagina_titulo=$fila_pagina["titulo"];
    $Pagina_contenido=$fila_pagina["contenido"];
}

?>
<!DOCTYPE html>
<html lang="es" class="no-js">
<head>
    <meta charset="utf-8">
    <title><?php echo $Pagina_titulo; ?></title>

    <?php require_once("w-header-script.php"); ?>

</head>
<body class="sub-page">

<?php require_once("w-header.php"); ?>

<div class="container">
    <?php require_once("w-saludos-formulario.php"); ?>

    <div class="kopa-breadcrumb"></div>
    <!-- kopa-breadcrumb -->

    <div class="row">

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div id="main-content">
                <div class="widget kopa-list-posts-widget">

                    <header class="widget-header">
                        <h3 class="widget-title"><?php echo $Pagina_titulo; ?></h3>
                    </header>

                    <div class="single-post-content">

                        <div class="article-content">

                            <div class="entry-content">

                                <?php echo $Pagina_contenido; ?>

                            </div>

                        </div>


                    </div>
                    <!-- widget content -->

                </div>
                <!-- kopa-list-posts-widget -->

            </div>
            <!-- main content -->

        </div>

    </div>
    <!-- row -->

</div>
<!-- container -->

<?php require_once("w-footer.php"); ?>

<?php require_once("w-footer-script.php"); ?>

</body>
</html>