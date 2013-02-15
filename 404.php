<?php
require_once("panel@impacto/conexion/conexion.php");
require_once("panel@impacto/conexion/funciones.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>404 - Archivo no encontrado</title>
<base href="<?php echo $web; ?>">

<link rel="stylesheet" href="css/404.css" type="text/css" />

<!-- PNG fix for Internet Explorer-->
<!--[if IE]>
	<script src="js/DD_belatedPNG_0.0.7a.js" type="text/javascript"></script>
	<script src="js/png_fix_elements.js" type="text/javascript"></script>
<![endif]-->

</head>

<!--BEGIN SITE -->

<body>
	
    <!-- BEGIN 404 SCREEN-->
	<div id="screen-404">
    	<h2>404 Page</h2>
        
        <p class="custom"><strong>Tal vez quieras visitar nuestro sitio:</strong></p>
        <ul>
        	<li><a href="/">&raquo; Inicio</a></li>
            <li><a href="categoria/11/portada">&raquo; Portada</a></li>
            <li><a href="categoria/12/noticias">&raquo; Noticias</a></li>
            <li><a href="editorial">&raquo; Editorial</a></li>
            <li><a href="categoria/7/devocionales">&raquo; Devocionales</a></li>
            <li><a href="categoria/6/heroes-fe">&raquo; Héroes de la Fe</a></li>
            <li class="last-item"><a href="categoria/5/testimonios">&raquo; Testimonios</a></li>
        </ul>
        <ul class="custom">
        	<li><a href="categoria/4/literatura">&raquo; Literatura</a></li>
            <li><a href="categoria/3/historia">&raquo; Historia</a></li>
            <li><a href="categoria/2/economia">&raquo; Economía</a></li>
            <li><a href="categoria/1/internacional">&raquo; Internacional</a></li>
            <li><a href="categoria/8/eventos">&raquo; Eventos</a></li>
            <li class="last-item"><a href="categoria/10/amenidades">&raquo; Amenidades</a></li>
        </ul>
    </div>
    <!-- END 404 SCREEN-->

</body>
</html>