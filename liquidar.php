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
    <h1 class="page-title">Empleados</h1>
  </div>
  <div class="main-content">
    <!-- Contenido principal -->
    <ul class="nav nav-tabs">
      <li class="active"><a href="#">Listado de Liquidaciones</a></li>
      <li><a href="liquidar_nuevo.php">Liquidar</a></li>
    </ul>
    <br>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in">
    <!--    <?php  include "includes/buscador/inc_buscador_empleados.php" ?> -->
      <br/>
    <?php include "inc_liquidaciones/inc_liquidar_query.php" ?>
      <?php include "inc_liquidaciones/inc_liquidar_grid.php"; ?>
      </div>
    </div>

    <?php include "inc_footer.php" ?>
  </div>
</div>
<?php include "sis_script_bootstrap.php" ?>

</body>
</html>
