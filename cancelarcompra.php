<?php require_once('Connections/conexion_compucentro.php'); ?>
<?php include('sis_acceso_ok.php'); ?>
<?php
	mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

	$eliminarcompra = "DELETE FROM lineacomprA WHERE compra_idcompra='1'";
	mysql_query($eliminarcompra);
?>