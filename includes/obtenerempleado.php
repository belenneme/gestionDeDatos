
<?php
$hostname_conexion_compucentro = "localhost";
$database_conexion_compucentro = "db_compu_nuevo";
$username_conexion_compucentro = "root";
$password_conexion_compucentro = "";

$conexion_compucentro = @mysql_connect($hostname_conexion_compucentro, $username_conexion_compucentro, $password_conexion_compucentro) or trigger_error(mysql_error(),E_USER_ERROR);

mysql_select_db($database_conexion_compucentro,$conexion_compucentro);


$idempleadojs = $_POST['idempleadojs'];
$q_empleados=mysql_query("SELECT * FROM empleado
 	WHERE idempleado=$idempleadojs");
$row_empleado=mysql_fetch_array($q_empleados);
	echo $row_empleado['cuilempleado'];
?>
