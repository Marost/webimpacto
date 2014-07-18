<?php 
session_start();
require_once("../../conexion/conexion.php");
require_once("../../conexion/funciones.php");
require_once("../../conexion/verificar_sesion.php");

//VARIABLES
$pub_fecha=date("Y-m-d");
$pub_hora=date("H:i:s");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<title>Administrador</title>

<?php require_once("../../w-scripts.php"); ?>

</head>

<body>

<!-- Top line begins -->
<?php require_once("../../w-topline.php"); ?>
<!-- Top line ends -->

<?php
//PAIS
$rst_pais=mysql_query("SELECT * FROM ".$tabla_suf."_saludos_pais ORDER BY nombre ASC;", $conexion);
?>

<!-- Sidebar begins -->
<div id="sidebar">
    
    <?php require_once("../../w-sidebarmenu.php"); ?>
    
</div><!-- Sidebar ends -->      
	
    
<!-- Content begins -->
<div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-screen"></span>Saludos</span>
    </div>
    
    <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
        </div>
    </div>
    
    <!-- Main content -->
    <div class="wrapper">

        <form id="validate" class="main" method="POST" action="s-guardar.php">

            <fieldset>
                <div class="widget fluid">
                    
                    <div class="whead"><h6>Agregar</h6></div>
                    
                    <div class="formRow">
                        <div class="grid3"><label>Nombre:</label></div>
                        <div class="grid9"><input type="text" name="nombre" class="validate[required]" /></div>
                    </div>

                    <div class="formRow">
                        <div class="grid3"><label>Email:</label></div>
                        <div class="grid9"><input type="text" name="email" class="validate[required]" /></div>
                    </div>

                    <div class="widget">
                        <div class="whead"><h6>Contenido</h6></div>
                        <textarea class="validate[required] ckeditor" name="contenido" /></textarea>
                    </div>

                    <div class="formRow">
                        <div class="grid3"><label>Pais:</label></div>
                        <div class="grid9">
                            <select name="pais" class="styled">
                                <option>Selecciona</option>
                                <?php while($fila_pais=mysql_fetch_array($rst_pais)){
                                        $pais_id=$fila_pais["id"];
                                        $pais_nombre=$fila_pais["nombre"];

                                        if ($saludo_pais==$pais_nombre){
                                ?>
                                <option value="<?php echo $pais_nombre; ?>" selected><?php echo $pais_nombre; ?></option>
                                <?php }else{ ?>
                                <option value="<?php echo $pais_nombre; ?>"><?php echo $pais_nombre; ?></option>
                                <?php }} ?>
                            </select>
                        </div>
                    </div>

                    <div class="formRow">
                        <div class="grid3"><label>Fecha de publicación:</label></div>
                        <div class="grid4"><input type="text" class="datepicker" name="pub_fecha" value="<?php echo $pub_fecha; ?>" /></div>
                    </div>

                    <div class="formRow">
                        <div class="grid3"><label>Hora de publicación:</label></div>
                        <div class="grid4"><input type="text" class="timepicker" name="pub_hora" size="10" value="<?php echo $pub_hora; ?>" />
                            <span class="ui-datepicker-append">Utilice la rueda del ratón y el teclado</span></div>
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