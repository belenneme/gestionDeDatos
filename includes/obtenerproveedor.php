
<?php
$hostname_conexion_compucentro = "localhost";
$database_conexion_compucentro = "db_compu_nuevo";
$username_conexion_compucentro = "root";
$password_conexion_compucentro = "";

$conexion_compucentro = @mysql_connect($hostname_conexion_compucentro, $username_conexion_compucentro, $password_conexion_compucentro) or trigger_error(mysql_error(),E_USER_ERROR);

mysql_select_db($database_conexion_compucentro,$conexion_compucentro);


$idproveedorjs = $_POST['idproveedorjs'];
$q_proveedores=mysql_query("SELECT * FROM proveedor
 	WHERE idproveedor=$idproveedorjs");
$row_proveedor=mysql_fetch_array($q_proveedores);
	echo $row_proveedor['cuilproveedor'];
?>
