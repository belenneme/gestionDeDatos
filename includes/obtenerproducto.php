
<?php
$hostname_conexion_compucentro = "localhost";
$database_conexion_compucentro = "db_compu_nuevo";
$username_conexion_compucentro = "root";
$password_conexion_compucentro = "";

$conexion_compucentro = @mysql_connect($hostname_conexion_compucentro, $username_conexion_compucentro, $password_conexion_compucentro) or trigger_error(mysql_error(),E_USER_ERROR);

mysql_select_db($database_conexion_compucentro,$conexion_compucentro);


$idproductojs = $_POST['idproductojs'];
$q_productos=mysql_query("SELECT * FROM producto
  WHERE idproducto=$idproductojs
  ORDER BY nombreproducto"); 
$row_producto=mysql_fetch_array($q_productos);
	echo $row_producto['idproducto'].",".$row_producto['precioventa'].",".$row_producto['stockproducto'];
?>