
<?php
$hostname_conexion_compucentro = "localhost";
$database_conexion_compucentro = "db_compu_nuevo";
$username_conexion_compucentro = "root";
$password_conexion_compucentro = "";

$conexion_compucentro = @mysql_connect($hostname_conexion_compucentro, $username_conexion_compucentro, $password_conexion_compucentro) or trigger_error(mysql_error(),E_USER_ERROR);

mysql_select_db($database_conexion_compucentro,$conexion_compucentro);


$idclientejs = $_POST['idclientejs'];
$q_clientes=mysql_query("SELECT * FROM cliente
  INNER JOIN tipo ON tipo_idtipo=idtipo
  INNER JOIN direccion ON direccion_iddireccion=iddireccion
  INNER JOIN localidad ON localidad_idlocalidad=idlocalidad
  INNER JOIN provincia ON provincia_idprovincia=idprovincia
  WHERE idcliente=$idclientejs
  ORDER BY nombreorsocial");
$row_cliente=mysql_fetch_array($q_clientes);
	echo $row_cliente['cuilcliente'].",".$row_cliente['tiponombre'];
?>
