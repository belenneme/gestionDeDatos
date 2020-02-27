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
    <h1 class="page-title">Ventas</h1>
  </div>
  <div class="main-content">
    <br>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in">
      <?php  include "includes/buscador/inc_buscador_ventas.php" ?>
      <br>
      <form action="historico_ventas_impr.php" method="POST" role="form">
        <button type="submit" class="btn btn-default"><strong>Imprimir Listado de Ventas</strong></button>
      </form>
      <br>
      <legend></legend>
      <?php include "inc_ventas/inc_ventas_query.php" ?>
      <?php include "inc_ventas/inc_ventas_grid_historico.php"; ?>
      </div>
    </div>

    <?php include "inc_footer.php" ?>
  </div>
</div>
<?php include "sis_script_bootstrap.php" ?>

</body>
</html>
