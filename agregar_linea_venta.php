<?php require_once('Connections/conexion_compucentro.php'); ?>
<?php include('sis_acceso_ok.php'); ?>
<?php
mysql_select_db($database_conexion_compucentro,$conexion_compucentro);
$id=$_POST['idproducto'];
$cantidad=$_POST['cantidad'];
$precioventa=$_POST['precioventa'];
$subtotal=$cantidad*$precioventa;


$insertarlinea="INSERT INTO lineaventa (cantidad, venta_idventa, subtotallineaventa, producto_idproducto)
VALUES ('$cantidad', '1', '$subtotal', '$id')";
$q_insertarlinea=mysql_query($insertarlinea);
header ("Location: venta_nueva.php");
?>
