<?php require_once('Connections/conexion_compucentro.php'); ?>
<?php include('sis_acceso_ok.php'); ?> 
<?php
mysql_select_db($database_conexion_compucentro,$conexion_compucentro);
$id=$_POST['idproducto'];
$cantidad=$_POST['cantidad'];
$preciocompra=$_POST['preciocompra'];
$neto=$cantidad*$preciocompra;
$bruto=$neto/1.21;
$ivaLineaCompra= $neto - $bruto;


$insertlineacompra="INSERT INTO lineacompra (cantidad, neto, iva_lineacompra,bruto,compra_idcompra, producto_idproducto) 
VALUES ('$cantidad','$neto','$ivaLineaCompra','$bruto','1','$id')";
$q_insertarlineacompra=mysql_query($insertlineacompra);
header ("Location: compra_nueva.php");
?>
