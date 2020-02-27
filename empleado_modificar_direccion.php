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
      <h1 class="page-title">Empleado - Modificar Direccion</h1>
      <!-- Navegador -->
      <ul class="breadcrumb">
          <li><a href="empleado_edicion.php?idempleado=<?php echo $_GET['idempleado']; ?>&iddireccion=<?php echo $_GET['iddireccion']; ?>">Empleado<?php echo " ".$_GET['idempleado']; ?></a> </li>
          <li class="active">Edici&oacute;n Empleado</li>
      </ul>

    </div>
    <div class="main-content">

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="panel panel-default">
              <div class="panel-heading no-collapse">Direccion</div> 
                <?php include "inc_empleados/inc_empleado_modificar_direccion.php" ?>                     
        </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" align="center">
          <br><br><br><br><br><br><br>
        </div>
    </div>

    <?php include "inc_footer.php" ?>
    </div>
  </div>
  <?php include "sis_script_bootstrap.php" ?> 
  
</body>
</html>