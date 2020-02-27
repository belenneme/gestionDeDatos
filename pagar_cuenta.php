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
			<h1 class="page-title">Pago de Cuentas</h1>
			<ul class="breadcrumb">
	    		<li><a href="clientes.php">cuentas</a> </li>
	    		<li class="active">Realizar Pago</li>
			</ul>
		</div>
		<div class="main-content">

		<div class="row">
    		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        		<div class="panel panel-default">
            			<div class="panel-heading no-collapse">Datos del Pago</div>
            			<?php include "inc_pago/inc_pago_pagar_cuenta.php" ?>
						</div>
    		</div>

		</div>

		<?php include "inc_footer.php" ?>
		</div>
	</div>
	<?php include "sis_script_bootstrap.php" ?>

</body>
</html>
