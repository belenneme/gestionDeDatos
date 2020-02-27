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
    <h1 class="page-title">Productos</h1>
  </div>
  <div class="main-content">
    <!-- Contenido principal -->
    <ul class="nav nav-tabs">
      <li><a href="productos.php">Listado de productos</a></li>
      <li class="active"><a href="#">Alta de Productos</a></li>
    </ul> 
    <br>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in">        
      <?php  include "inc_productos/inc_productos_alta.php" ?>         
      </div>      
    </div>     

    <?php include "inc_footer.php" ?>
  </div>
</div>
<?php include "sis_script_bootstrap.php" ?> 
  
</body></html>