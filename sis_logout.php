<?php require_once('Connections/conexion_compucentro.php'); ?>
<?php include('sis_acceso_ok.php'); ?>
<?php date_default_timezone_set('America/Argentina/Tucuman'); ?>
<?php mysql_select_db($database_conexion_compucentro,$conexion_compucentro);
  $fechalogin=$_SESSION['fechalogin'];
  $idempleado=$_SESSION["idempleado"];
  $formato = 'Y-m-d H:i:s';
  $formato_dias = 'd-m-Y';
  $fecha =new DateTime();
  $dateformat = date_format($fecha, $formato);
  echo "$dateformat";
  $minutes=0;
  $fechalogindia = date_format($fechalogin, $formato);
  $fechalogoutdia = date_format($dateformat, $formato);
    if($fechalogindia==$fechalogoutdia){
      $seconds = strtotime($dateformat) - strtotime($fechalogin);
      $minutes = floor(($seconds - ($days * 86400) - ($hours * 3600))/60);
    }

  $insertlogout="UPDATE asistencia set logout='$dateformat', tiempotrabajado=$minutes
  WHERE login='$fechalogin' AND empleado_idempleado='$idempleado'";
  $q_insertarlogout=mysql_query($insertlogout);
  $row_logout=mysql_fetch_array($q_insertarlogout);
  ?>
<?php
header("Location: index.php");
session_destroy();
?>
