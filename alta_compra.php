<?php require_once('Connections/conexion_compucentro.php'); ?>
<?php include('sis_acceso_ok.php'); ?>
<?php mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

	$idempleado=$_SESSION["idempleado"];
	$numerofactura=$_POST['numerofactura'];
	$fechacompra=$_POST['fechacompra'];
	$idproveedor=$_POST['idproveedor'];
	//$iva=
	$brutocompra=0;
	$totalcompra=0;
	$iva=0;

	$lineas_compra=mysql_query("SELECT * FROM lineacompra WHERE compra_idcompra=1");
	while ($row_lineacompra=mysql_fetch_array($lineas_compra)) {
		$totalcompra=$row_lineacompra['neto']+$totalcompra;
	}
	$brutocompra=$totalcompra/1.21;
	$iva=$totalcompra-$brutocompra;


	mysql_query("INSERT INTO compra (numerofactura, fechacompra, ivacompra,totalcompra, proveedor_idproveedor, empleado_idempleado)
	VALUES ('$numerofactura', '$fechacompra', '$iva', '$totalcompra', '$idproveedor', '$idempleado')");

	$compra=mysql_query("SELECT * FROM compra ORDER BY idcompra DESC LIMIT 0,1");
	$row_compra=mysql_fetch_array($compra);

	$ult_compra=$row_compra['idcompra'];

	mysql_query("UPDATE lineacompra SET compra_idcompra='$ult_compra' WHERE compra_idcompra='1'");

	//Actualiza stock de productos y precio de compra
	$stock_prod=mysql_query("SELECT cantidad,stockproducto,idproducto,neto FROM lineacompra
		INNER JOIN producto ON producto_idproducto=idproducto
		WHERE compra_idcompra=$ult_compra");
	while ($row_stock_prod=mysql_fetch_array($stock_prod)) {
		$nuevostock=$row_stock_prod['stockproducto']+$row_stock_prod['cantidad'];
		$precionuevo=$row_stock_prod['neto']/$row_stock_prod['cantidad'];
		$idproducto=$row_stock_prod['idproducto'];

		mysql_query("UPDATE producto SET stockproducto='$nuevostock', preciocompra='$precionuevo'  WHERE idproducto='$idproducto'");

	}

	include "inc_compras/inc_alta_compra.php";
?>
