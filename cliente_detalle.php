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
			<h1 class="page-title">Inicio</h1>
			<ul class="breadcrumb">
	    		<li><a href="clientes.php">Cliente</a> </li>
	    		<li class="active">Detalle cliente</li>
			</ul>
		</div>
		<div class="main-content">

		<div class="row">
    		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        		<div class="panel panel-default">
            	<div class="panel-heading no-collapse">Datos cliente</div>
            		<?php include "inc_cliente/inc_cliente_detalle_datos.php" ?>                     
				</div>
    		</div>
    		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        		<div class="panel panel-default">
            	<div class="panel-heading no-collapse">Direcciones</div> 
            		<?php include "inc_cliente/inc_cliente_detalle_direcciones.php" ?>
				</div>
    		</div>
    		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        		<div class="panel panel-default">
            	<div class="panel-heading no-collapse">Cuenta</div> 
            		<?php include "inc_cliente/inc_cliente_detalle_cuente.php" ?>                     
				</div>
    		</div>
		</div>

		<?php include "inc_footer.php" ?>
		</div>
	</div>
	<?php include "sis_script_bootstrap.php" ?> 
  
</body>
</html>