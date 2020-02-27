<?php require_once('Connections/conexion_compucentro.php'); ?>
<?php include('sis_acceso_ok.php'); ?>
<!doctype html>
<html lang="es">
<head>    
<?php include "sis_header.php" ?>
</head>
<body class=" theme-blue">
<?php include "sis_script.php" ?>
<?php include "sis_menu_usuario.php" ?>   
<?php include "sis_menu.php" ?>

<div class="content">
<div class="header">
<h1 class="page-title">Cambiar Contrase&ntildea</h1>
<?php include "inc_navegadores/inc_navegador_usuario_contrasena.php" ?>

</div>
<div class="main-content">
	<div class="panel panel-default">
      <a href="#" class="panel-heading" data-toggle="">Modificar contrase&ntildea usuario</a>
      <div id="page-stats" class="panel-collapse panel-body collapse in">      
      <?php include "inc_usuarios/inc_usuario_contrasena.php" ?>              
      </div>
    </div>
</div>

<?php include "inc_footer.php" ?>
</div>
</div>
<?php include "sis_script_bootstrap.php" ?> 
  
</body></html>