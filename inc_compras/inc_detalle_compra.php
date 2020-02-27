<?php
	mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

	$idcompra=$_GET['idcompra'];
	$idproveedor=$_GET['idproveedor'];
	$idempleado=$_GET['idempleado'];

	$compra="SELECT * FROM compra 
	INNER JOIN empleado ON empleado_idempleado=idempleado
	INNER JOIN proveedor ON proveedor_idproveedor=idproveedor
	WHERE idcompra=$idcompra";
	$q_compra=mysql_query($compra);
	$row_compra=mysql_fetch_array($q_compra);

	$q_lineas=mysql_query("SELECT * FROM lineacompra 
		INNER JOIN producto ON producto_idproducto=idproducto
		WHERE compra_idcompra=$idcompra");

 ?>

<body>
<br><br>
<div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="panel panel-info">
        <p class="panel-heading no-collapse"><i class="fa fa-check" aria-hidden="true"></i>Compra detalle</p>
        <div class="panel-body">
            <table class='table table-bordered table-striped'>
				<tr>
					<td class="info" align="right" class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><div align='right'>Numero Factura </div></td>
					<td  align="left" class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><div><?php echo $row_compra['numerofactura']; ?></div></td>
					<td class="info" align="right"><div align='right'>Fecha</div></td>
					<td  align="lef" colspan="3" class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><div><?php echo $row_compra['fechacompra']; ?></div></td>
				</tr>
				<tr>
					<td class="info" ><div align='right'>Proveedor: </div></td>
					<td><?php echo $row_compra['razonsocialproveedor']; ?></td>
					<td class="info"><div align='right'>Cuil: </div></td>
					<td align="lef" colspan="3" class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><?php echo $row_compra['cuilproveedor']; ?></td>
					
				</tr>
				<tr>
					<td class="info" ><div class="info" align='right'>Empleado: </div></td>
					<td  colspan="5"><?php echo $row_compra['nombreempleado']; ?> <?php echo $row_compra['apellidoempleado']; ?></td>
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
					<td class="info" colspan="2" align="right">Total</td>
				</tr>
				<?php 
					$i=1;
					while ($row_lineas_m=mysql_fetch_array($q_lineas)) {
						$preciounitario=$row_lineas_m['neto']/$row_lineas_m['cantidad'];
					 ?>
						<tr>
							<td align="right"><?php echo $i ?></td>
							<td align="right"><?php echo $row_lineas_m['nombreproducto'] ?></td>
							<td align="right"><?php echo $row_lineas_m['cantidad'] ?></td>
							<td colspan="2" align="right"><?php echo $preciounitario ?></td>
							<td align="right"><?php echo $row_lineas_m['neto'] ?></td>
							
						</tr>

					<?php $i++;}
					$bruto=$row_compra['totalcompra']/1.21;
					$iva=$row_compra['totalcompra']-$bruto;
				?>

</tr>
				<td colspan="6"></td>
				 <tr>
				<tr>					
					<td colspan="3" align="right"><strong>Subtotal</strong></td>
					<td colspan="3" align="right" ><?php echo round($bruto, 2); ?></td>
				</tr>
				<tr>
					<td colspan="3" align='right'><strong>Iva </strong> </td>
					<td colspan="3" align='right'><?php echo  round($iva, 2); ?></td>
				</tr>
				<tr>
				 	
					<td colspan="3" align='right'><strong>Total </strong> </td>
					<td colspan="3" align='right'><?php echo $row_compra['totalcompra']; ?></td>
				</tr>
				<tr>
				 	<td align="right" colspan="6"><div id="imprimir"><a><i class="fa fa-print" aria-hidden="true">    </i><strong> Imprimir</strong></a></div></td>
				</tr>
		</table>
		<div><a href="historico_compras.php"><strong>Volver a Compras</strong></a></div>
	
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