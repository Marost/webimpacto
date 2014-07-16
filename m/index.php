<?php
require_once("../panel@impacto/conexion/conexion.php");
require_once("../panel@impacto/conexion/funciones.php");

$rst_noticias=mysql_query("SELECT * FROM iev_noticia WHERE fecha_publicacion<='$fechaActual' AND destacada=2 AND publicar=1 AND categoria=12 ORDER BY fecha_publicacion DESC LIMIT 5", $conexion);

$rst_devoc=mysql_query("SELECT * FROM iev_noticia WHERE fecha_publicacion<='$fechaActual' AND destacada=2 AND publicar=1 AND categoria=7 ORDER BY fecha_publicacion DESC LIMIT 5", $conexion);

$rst_eventos=mysql_query("SELECT * FROM iev_noticia WHERE fecha_publicacion<='$fechaActual' AND destacada=2 AND publicar=1 AND categoria=8 ORDER BY fecha_publicacion DESC LIMIT 5", $conexion);
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Revista Impacto Evangelistico</title>

    <?php require_once("w-script.php") ?>

</head>
<body>
        <?php require_once("w-header.php"); ?>

		<div id="noticias" class="features">
			<div class="container">
				<div class="head text-center">
					<h3><span> </span> Noticias</h3>
					<p>Ultimas Noticias</p>
				</div>
	    	            <table>
	    	            <?php $i =0;
                            while($fila_noticias=mysql_fetch_array($rst_noticias)){
                                    $noticias_id=$fila_noticias["id"];
                                    $noticias_url=$fila_noticias["url"];
                                    $noticias_urlFinal=$web."m/nota/".$noticias_id."-".$noticias_url;
                                    $noticias_titulo=$fila_noticias["titulo"];
                                    $noticias_imagen=$fila_noticias["imagen"];
                                    $noticias_imagen_carpeta=$fila_noticias["imagen_carpeta"];
                                    $noticias_contenido=primerParrafo($fila_noticias["contenido"]);
                                    $fechaPubNoticia=$fila_noticias["fecha_publicacion"];
                                    $fechaNoticia=explode(" ", $fechaPubNoticia);
                                    $fechaExpNoticia=explode("-", $fechaNoticia[0]);
                                    $noticias_fecha=nombreFechaTotal($fechaExpNoticia[0],$fechaExpNoticia[1],$fechaExpNoticia[2]);
                            ?>
			    <tr><td>
                            <?php if($i==0){?>
				<div class="test-monial-time-line-grid test-monial-time-line-grid-r2">
					<div class="col-md-3 test-monial-time-line-left-pic">
		                                <a href="<?php echo $noticias_urlFinal; ?>" title="<?php echo $noticias_titulo; ?>"> 
		                                <img src="../imagenes/upload/<?php echo $noticias_imagen_carpeta."thumb/".$noticias_imagen; ?>" alt="<?php echo $noticias_titulo; ?>"></a>

                                <a href="<?php echo $noticias_urlFinal; ?>" title="<?php echo $noticias_titulo; ?>"><?php echo $noticias_titulo; ?></a>
                       </div>
                                <div class="col-md-9 test-monial-time-line-left-text">
                                <p><?php echo $noticias_fecha; ?></p>
                                <?php echo $noticias_contenido; ?>
                                <hr/>
                                </div>

 		                </div>

                                </td>
                                <?php $i =1; 
                                } else { ?>
                                <tr><td>
                                <div class="test-monial-time-line-grid test-monial-time-line-grid-r2">
				<div class="col-md-3 test-monial-time-line-left-pic">
                                  <a href="<?php echo $noticias_urlFinal; ?>" title="<?php echo $noticias_titulo; ?>">
                                        <?php echo $noticias_titulo; ?><div class="imgrow"><img src="../m/images/arrow-icon.png"/></div></a>
                                        </div>
                                <div class="col-md-9 test-monial-time-line-left-text">
                                        <p><?php echo $noticias_fecha; ?></p>
                                </div>
                                <hr/>
                                <?php }?>
                                </div>
                                </td></tr>
                            <?php } ?>
			</table>
			</div></div>
			
			<div id="devocionales" class="features">
			<div class="container">
				<div class="head text-center">
					<h3><span> </span> Devocionales</h3>
					<p>Ultimos Devocionales</p>

	    	            <table>
	    	            <?php $i =0;?>
                            <?php while($fila_devoc=mysql_fetch_array($rst_devoc)){
                                    $devoc_id=$fila_devoc["id"];
                                    $devoc_url=$fila_devoc["url"];
                                    $devoc_urlFinal=$web."noticia/".$devoc_id."-".$devoc_url;
                                    $devoc_titulo=$fila_devoc["titulo"];
                                    $devoc_imagen=$fila_devoc["imagen"];
                                    $devoc_imagen_carpeta=$fila_devoc["imagen_carpeta"];
                                    $devoc_contenido=primerParrafo($fila_devoc["contenido"]);
                                    $fechaPubNoticia=$fila_devoc["fecha_publicacion"];
                                    $fechaNoticia=explode(" ", $fechaPubNoticia);
                                    $fechaExpNoticia=explode("-", $fechaNoticia[0]);
                                    $devoc_fecha=nombreFechaTotal($fechaExpNoticia[0],$fechaExpNoticia[1],$fechaExpNoticia[2]);
                            ?>
			    <tr><td>
                            <?php if($i==0){?>
				<div class="test-monial-time-line-grid test-monial-time-line-grid-r2">
				<div class="col-md-3 test-monial-time-line-left-pic">
                                <a href="<?php echo $devoc_urlFinal; ?>" title="<?php echo $devoc_titulo; ?>"><img src="../imagenes/upload/<?php echo $devoc_imagen_carpeta."thumb/".$devoc_imagen; ?>" alt="<?php echo $devoc_titulo; ?>"</a>

                                <a href="<?php echo $devoc_urlFinal; ?>" title="<?php echo $devoc_titulo; ?>"><?php echo $devoc_titulo; ?></a>
                                </div>
                                <div class="col-md-9 test-monial-time-line-left-text">
                                <p><?php echo $devoc_fecha; ?></p>
                                <?php echo $devoc_contenido; ?>
                                <hr/>
                                </div>
                                </div>
                                </td>

                                <?php $i =1; 
                                } else { ?>
                                <div class="test-monial-time-line-grid test-monial-time-line-grid-r2">
				<div class="col-md-3 test-monial-time-line-left-pic">
                                  <a href="<?php echo $noticias_urlFinal; ?>" title="<?php echo $noticias_titulo; ?>"><?php echo $devoc_titulo; ?><div class="imgrow"><img src="../m/images/arrow-icon.png"/></div></a>
                                  </div>
                                 <div class="col-md-9 test-monial-time-line-left-text">
                                   <p><?php echo $devoc_fecha; ?></p>
                                 </div>
                                 <hr/>
                                 <?php }?>
                                 </div>
                                 </td></tr>
                            <?php } ?>
			</table>
			</div></div>

			<div id="eventos" class="features">
			<div class="container">
				<div class="head text-center">
					<h3><span> </span> Eventos</h3>
					<p>Ultimos Eventos</p>
				</div>
	    	            <table>
	    	            <?php $i =0;?>
                            <?php while($fila_eventos=mysql_fetch_array($rst_eventos)){
                                    $eventos_id=$fila_eventos["id"];
                                    $eventos_url=$fila_eventos["url"];
                                    $eventos_urlFinal=$web."noticia/".$eventos_id."-".$eventos_url;
                                    $eventos_titulo=$fila_eventos["titulo"];
                                    $eventos_imagen=$fila_eventos["imagen"];
                                    $eventos_imagen_carpeta=$fila_eventos["imagen_carpeta"];
                                    $eventos_contenido=primerParrafo($fila_eventos["contenido"]);
                                    $fechaPubNoticia=$fila_eventos["fecha_publicacion"];
                                    $fechaNoticia=explode(" ", $fechaPubNoticia);
                                    $fechaExpNoticia=explode("-", $fechaNoticia[0]);
                                    $eventos_fecha=nombreFechaTotal($fechaExpNoticia[0],$fechaExpNoticia[1],$fechaExpNoticia[2]);
                            ?>
			    <tr><td>
                            <?php if($i==0){?>
				<div class="test-monial-time-line-grid test-monial-time-line-grid-r2">
				<div class="col-md-3 test-monial-time-line-left-pic">
                                <a href="<?php echo $eventos_urlFinal; ?>" title="<?php echo $eventos_titulo; ?>"> <img src="../imagenes/upload/<?php echo $eventos_imagen_carpeta."thumb/".$eventos_imagen; ?>" alt="<?php echo $eventos_titulo; ?>"</a>
                                <a href="<?php echo $eventos_urlFinal; ?>" title="<?php echo $eventos_titulo; ?>"><?php echo $eventos_titulo; ?></a>
                                </div>
                                <div class="col-md-9 test-monial-time-line-left-text">
                                <p><?php echo $eventos_fecha; ?></p>
                                <?php echo $eventos_contenido; ?>
                                </div>
                                <hr/>
                                </div>
                                </td>
                                <?php $i =1; 
                                } else { ?>
                                <div class="test-monial-time-line-grid test-monial-time-line-grid-r2">
				<div class="col-md-3 test-monial-time-line-left-pic">
                                  <a href="<?php echo $noticias_urlFinal; ?>" title="<?php echo $noticias_titulo; ?>"><?php echo $eventos_titulo; ?><div class="imgrow"><img src="../m/images/arrow-icon.png"/></div></a>
                                  </div>
                                <div class="col-md-9 test-monial-time-line-left-text">
                                <p><?php echo $eventos_fecha; ?></p>
                                </div>
                                        <hr/>
                                        <?php }?>
                                        </div>
                                        </td></tr>
                            <?php } ?>
			</table>
			</div></div>


        <?php require_once("w-footer.php"); ?>
</body>
</html>