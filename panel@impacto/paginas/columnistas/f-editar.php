<?php 
session_start();
require_once("../../conexion/conexion.php");
require_once("../../conexion/funciones.php");
require_once("../../conexion/verificar_sesion.php");

//VARIABLES
$id_url=$_REQUEST["id"];

//EDITAR
$rst_nota=mysql_query("SELECT * FROM ".$tabla_suf."_columnista WHERE id=$id_url;", $conexion);
$fila_nota=mysql_fetch_array($rst_nota);

//VARIABLES
$nota_nombre=$fila_nota["nombre"];
$nota_apellidos=$fila_nota["apellidos"];
$nota_cargo=$fila_nota["cargo"];
$nota_imagen=$fila_nota["foto"];
$nota_contenido=$fila_nota["descripcion"];
$nota_publicar=$fila_nota["publicar"];

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
        <span class="pageTitle"><span class="icon-screen"></span>Columnistas</span>
    </div>
    
    <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
        </div>
    </div>
    
    <!-- Main content -->
    <div class="wrapper">

        <form id="submit-form" class="main" method="POST" action="s-editar.php?id=<?php echo $id_url; ?>" enctype="multipart/form-data">

            <fieldset>
                <div class="widget fluid">
                    
                    <div class="whead"><h6>Editar</h6></div>
                    
                    <div class="formRow">
                        <div class="grid3"><label>Nombre:</label></div>
                        <div class="grid9"><input type="text" name="nombre" value="<?php echo $nota_nombre; ?>" /></div>
                    </div>

                    <div class="formRow">
                        <div class="grid3"><label>Apellidos:</label></div>
                        <div class="grid9"><input type="text" name="apellidos" value="<?php echo $nota_apellidos; ?>" /></div>
                    </div>

                    <div class="formRow">
                        <div class="grid3"><label>Cargo:</label></div>
                        <div class="grid9"><input type="text" name="cargo" value="<?php echo $nota_cargo; ?>" /></div>
                    </div>

                    <div class="widget">
                        <div class="whead"><h6>Descripción</h6></div>
                        <textarea class="ckeditor" name="contenido"><?php echo $nota_contenido; ?></textarea>
                    </div>

                    <div class="formRow">
                        <div class="grid3"><label>Imagen:</label> </div>
                        <div class="grid9">
                            <div class="floatL">
                                <a href="../../../imagenes/columnistas/<?php echo $nota_imagen; ?>" class="lightbox">
                                    <img src="../../../imagenes/columnistas/<?php echo $nota_imagen; ?>" width="100" >
                                </a>
                            </div>
                            <div class="widget floarL width60 margin1020">    
                                <div id="uploader_columnista">Tu navegador no soporta HTML5.</div>
                                <input type="hidden" name="imagen" value="<?php echo $nota_imagen; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="formRow">
                        <div class="grid3"><label>Publicar: </label></div>
                        <div class="grid9 enabled_disabled">
                            <div class="floatL mr10">
                                <input type="checkbox" id="check4" <?php if($nota_publicar==1){ ?>checked<?php } ?> value="1" name="publicar" />
                            </div>
                        </div>
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