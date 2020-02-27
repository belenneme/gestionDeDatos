<?php require_once('Connections/conexion_compucentro.php'); ?>
<?php include('sis_acceso_ok.php'); ?>
<?php mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

	$idempleado=$_SESSION["idempleado"];
	$fechaventa=$_POST['fechaventa'];
	$idcliente=$_POST['idcliente'];
	$descuento=$_POST['descuento'];
	$condicionpago=$_POST['condicionpago'];//1 contado 0 cuenta
	$total=0;
	$subtotal=$_POST['subtotal'];
	$iva=0;
	$numerofactura= $_POST['numerofactura'];

	$cond_iva=mysql_query("SELECT idtipocliente FROM cliente
	INNER JOIN tipocliente ON tipocliente_idtipocliente=idtipocliente
	WHERE idcliente=$idcliente");

	$row_cond_iva=mysql_fetch_array($cond_iva);
	$condiva=$row_cond_iva['idtipocliente'];


	$totSinIva=0;
	$lineas_venta=mysql_query("SELECT * FROM lineaventa WHERE venta_idventa=1");
	while ($row_lineaventa=mysql_fetch_array($lineas_venta)) {
		$total=$row_lineaventa['subtotallineaventa']+$total;
	}

	$totSinIva= $total/1.21;
	$iva= $total-$totSinIva;
	if ($descuento!=0) {
		$total=$total*((100-$descuento)/100);
	}

	/**if ($condiva=$row_cond_iva['idtipocliente']==1) {
		$subtotal=$total/1.21;
		$iva=$subtotal*0.21;
	}**/
	// echo round($iva, 2); REDONDEA A DOS DECIMALES

	mysql_query("INSERT INTO venta (fechaventa, subtotal, ivaventa, totalventa, cliente_idcliente, descuentoventa, empleado_idempleado,numerofactura)
	VALUES ('$fechaventa', '$subtotal', '$iva', '$total', '$idcliente', '$descuento', '$idempleado','$numerofactura' )");

	$venta=mysql_query("SELECT * FROM venta ORDER BY idventa DESC LIMIT 0,1");
	$row_venta=mysql_fetch_array($venta);

	$ult_venta=$row_venta['idventa'];

	mysql_query("UPDATE lineaventa SET venta_idventa='$ult_venta' WHERE venta_idventa='1'");

	//Actualiza stock de productos
	$stock_prod=mysql_query("SELECT cantidad,stockproducto,idproducto FROM lineaventa
		INNER JOIN producto ON producto_idproducto=idproducto
		WHERE venta_idventa=$ult_venta");
	while ($row_stock_prod=mysql_fetch_array($stock_prod)) {
		$nuevostock=$row_stock_prod['stockproducto']-$row_stock_prod['cantidad'];
		$idproducto=$row_stock_prod['idproducto'];

		mysql_query("UPDATE producto SET stockproducto='$nuevostock' WHERE idproducto='$idproducto'");

	}


	if ($condicionpago==1) {
		mysql_query("INSERT INTO pago (monto, fechapago, descripcionpago)
		VALUES ('$total', '$fechaventa', 'Pago Contado')");

		$u_pago=mysql_query("SELECT * FROM pago ORDER BY idpago DESC LIMIT 0,1");
		$row_upago=mysql_fetch_array($u_pago);
		$ult_pago=$row_upago['idpago'];

		mysql_query("INSERT INTO venta_has_pago (venta_idventa, pago_idpago)
		VALUES ('$ult_venta', '$ult_pago')");
	}
	else{

		$qcuenta= mysql_query("SELECT * FROM cuenta  WHERE cliente_idcliente=$idcliente");
		$row_cuenta= mysql_fetch_array($qcuenta);
		$totalcuenta= $row_cuenta['saldocuenta']+$total;
		$idcuenta= $row_cuenta['idcuenta'];
		mysql_query("UPDATE cuenta SET saldocuenta='$totalcuenta' WHERE idcuenta=$idcuenta");
		mysql_query("UPDATE venta SET cuenta_idcuenta='$idcuenta' WHERE idventa=$ult_venta;");

	}

	include "inc_ventas/inc_alta_venta.php";
?>
