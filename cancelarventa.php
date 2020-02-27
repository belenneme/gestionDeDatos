<?php require_once('Connections/conexion_compucentro.php'); ?>
<?php include('sis_acceso_ok.php'); ?>
<?php
	mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

	$eliminarventa = "DELETE FROM lineaventa WHERE venta_idventa='1'";
	mysql_query($eliminarventa);

?>