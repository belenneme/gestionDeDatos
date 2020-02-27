<?php
$hostname_conexion_compucentro = "localhost";
$database_conexion_compucentro = "db_compu_nuevo";
$username_conexion_compucentro = "root";
$password_conexion_compucentro = "";
$conexion_compucentro = @mysql_connect($hostname_conexion_compucentro, $username_conexion_compucentro, $password_conexion_compucentro) or trigger_error(mysql_error(),E_USER_ERROR);
Class dbObj{
  var $hostname_conexion_compucentro = "localhost";
  var $database_conexion_compucentro = "db_compu_nuevo";
  var $username_conexion_compucentro= "root";
  var $password_conexion_compucentro = "";

function getConnstring() {
$con = mysql_connect($this->hostname_conexion_compucentro, $this->username_conexion_compucentro, $this->password_conexion_compucentro, $this->database_conexion_compucentro) or die("Connection failed: " . mysqli_connect_error());

/* check connection */
if (mysqli_connect_errno()) {
printf("Connect failed: %s\n", mysqli_connect_error());
exit();
} 

else {
$this->conn = $con;
}
return $this->conn;
}
}
?>
