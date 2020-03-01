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
      <h1 class="page-title">Tipo de Liquidacion - Agregar Concepto</h1>
      <!-- Navegador -->
      <ul class="breadcrumb">
          <li><a href="tipoliquidacion_editar.php?idtipoliquidacion=<?php echo $_GET['idtipoliquidacion']; ?>">Tipo De Liquidacion<?php echo " ".$_GET['idtipoliquidacion']; ?></a> </li>
          <li class="active">Edici&oacute;n Tipo de Liquidacion</li>
      </ul>

    </div>
    <div class="main-content">

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="panel panel-default">
              <div class="panel-heading no-collapse">Conceptos</div> 
                <?php include "inc_tipoliquidaciones/inc_tipoliquidacion_conceptos_agregar.php" ?>                     
        </div>
        </div>
        
    </div>

    <?php include "inc_footer.php" ?>
    </div>
  </div>
  <?php include "sis_script_bootstrap.php" ?> 
  
</body>
</html>