<?php require_once('Connections/conexion_compucentro.php'); ?>
<?php include('sis_acceso_ok.php'); ?>
<?php mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

	$q_lineas=mysql_query("SELECT * FROM lineaventa
		INNER JOIN producto ON producto_idproducto=idproducto
		WHERE venta_idventa=$ult_venta");

	$q_cliente=mysql_query("SELECT * FROM cliente
	INNER JOIN tipo ON tipo_idtipo=idtipo
		WHERE idcliente=$idcliente");
	$row_cliente=mysql_fetch_array($q_cliente);

	$q_empleado=mysql_query("SELECT * FROM empleado
		WHERE idempleado=$idempleado");
	$row_empleado=mysql_fetch_array($q_empleado);
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include "sis_header.php" ?>
<title>El Pasaje Materiales</title>
</head>

<body>
<br><br>
<div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="panel panel-default">
        <p class="panel-heading no-collapse"><i class="fa fa-check" aria-hidden="true"></i>
        Venta finalizada</p>
        <div class="panel-body">
            <table class='table table-bordered table-striped'>
				<tr>
					<td class="info" align="right" class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><div align='right'>Numero Factura </div></td>
					<td  align="left" class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><?php echo $numerofactura; ?></div></td>
					<td class="info" align="right"><div align='right'>Fecha</div></td>
					<td  align="lef" colspan="3" class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><div><div><?php echo $fechaventa; ?></div></td>
				</tr>
				<tr>
					<td class="info" ><div align='right'>Cliente </div></td>
					<td><?php echo $row_cliente['nombreorsocial']; ?></td>
					<td class="info"><div align='right'>Cuil: </div></td>
					<td align="lef" colspan="1" class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><?php echo $row_cliente['cuilcliente']; ?></td>
					<td class="info"><div align='right'>Condici&oacute;n IVA: </div></td>
					<td align="lef" colspan="1" class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><?php echo $row_cliente['tiponombre']; ?></td>
				</tr>
				<tr>
					<td class="info" ><div class="info" align='right'>Empleado: </div></td>
					<td  colspan="5"><?php echo $row_empleado['nombreempleado']; ?> <?php echo $row_empleado['apellidoempleado']; ?></td>
				</tr>
				<tr>
					<br>
					<td colspan="6"><div align='center'><strong>Productos</strong></div></td>

				</tr>
				<tr>
					<td class="info" align="right">Item</td>
					<td class="info" align="right">Producto</td>
					<td class="info" align="right">Cantidad</td>
					<td class="info" colspan="2" align="right">Importe</td>
					<td class="info" colspan="2" align="right">Total producto</td>
				</tr>
				<?php
					$i=1;
					while ($row_lineas_m=mysql_fetch_array($q_lineas)) {
						$preciounitario=$row_lineas_m['subtotallineaventa']/$row_lineas_m['cantidad'];
					 ?>
						<tr>
							<td align="right"><?php echo $i ?></td>
							<td align="right"><?php echo $row_lineas_m['nombreproducto'] ?></td>
							<td align="right"><?php echo $row_lineas_m['cantidad'] ?></td>
							<td colspan="2" align="right"><?php echo $preciounitario ?></td>
							<td align="right"><?php echo $row_lineas_m['subtotallineaventa'] ?></td>

						</tr>

					<?php $i++;}
				?>
<td colspan="6"></td>
				 <tr>
				 	<td colspan="3" align="right"><strong>Subtotal</strong></td>
					<td colspan="3" align="right" ><?php echo round( $subtotal,2); ?></td>
					</tr>
					 <tr>

					<td colspan="3" align='right'><strong>Iva </strong> </td>
					<td colspan="3" align='right'><?php echo round($iva,2); ?></td>
				</tr>
				<tr>
				 	<td colspan="3" align='right'><strong>Total </strong> </td>
					<td colspan="3" align='right'><?php echo round($total,2); ?></td>
				</tr>
				<tr>
				 	<td align="right" colspan="6"><div id="imprimir"><a><i class="fa fa-print" aria-hidden="true">    </i><strong> Imprimir</strong></a></div></td>
				</tr>
	</table>
	<div><a href="venta_nueva.php"><strong>Volver a Ventas</strong></a></div>

        </div>
    </div>
  <?php include 'inc_footer.php'; ?>
</div>
</body>

<script type="text/javascript">
    $('#imprimir').on('click',function(){
    window.print();
    });
</script>

</html>
