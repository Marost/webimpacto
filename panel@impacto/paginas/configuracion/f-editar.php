<?php 
session_start();
require_once("../../conexion/conexion.php");
require_once("../../conexion/funciones.php");
require_once("../../conexion/verificar_sesion.php");

//EDITAR
$rst_nota=mysql_query("SELECT * FROM ".$tabla_suf."_empresa WHERE id=1;", $conexion);
$fila_nota=mysql_fetch_array($rst_nota);

//VARIABLES
$nota_nombre=$fila_nota["nombre"];
$nota_web=$fila_nota["web"];
$nota_descripcion=$fila_nota["descripcion"];
$nota_palabras_clave=$fila_nota["palabras_clave"];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<title>Administrador</title>

<?php require_once("../../w-scripts.php"); ?>

</head>

<body>

<!-- Top line begins -->
<?php require_once("../../w-topline.php"); ?>
<!-- Top line ends -->

<!-- Sidebar begins -->
<div id="sidebar">
    
    <?php require_once("../../w-sidebarmenu.php"); ?>
    
</div><!-- Sidebar ends -->    
	
    
<!-- Content begins -->
<div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-screen"></span>Noticias</span>
    </div>
    
    <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
        </div>
    </div>
    
    <!-- Main content -->
    <div class="wrapper">

        <form id="submit-form" class="main" method="POST" action="s-editar.php">

            <fieldset>
                <div class="widget fluid">
                    
                    <div class="whead"><h6>Configuración</h6></div>
                    
                    <div class="formRow">
                        <div class="grid3"><label>Titulo:</label></div>
                        <div class="grid9"><input type="text" name="nombre" value="<?php echo $nota_nombre; ?>" /></div>
                    </div>

                    <div class="formRow">
                        <div class="grid3"><label>Dominio:</label></div>
                        <div class="grid9"><input type="text" name="web" value="<?php echo $nota_web; ?>" /></div>
                    </div>

                    <div class="formRow">
                        <div class="grid3"><label>Descripción:</label></div>
                        <div class="grid9"><textarea name="descripcion"><?php echo $nota_descripcion; ?></textarea></div>                        
                    </div>

                    <div class="formRow">
                        <div class="grid3"><label>Palabras clave:</label></div>
                        <div class="grid9"><textarea name="palabras_clave"><?php echo $nota_palabras_clave; ?></textarea></div>                        
                    </div>
                    
                    <div class="formRow">
                        <div class="body" align="center">
                            <a href="lista.php" class="buttonL bBlack">Cancelar</a>
                            <input type="submit" class="buttonL bGreen" name="btn-guardar" value="Guardar datos">
                        </div>
                    </div>
                    
                </div>
            </fieldset>

        </form>

    </div>
  <!-- Main content ends -->
    
</div>
<!-- Content ends -->    
   
        
</body>
</html>