<?php 
	
	$num_total_registros = mysql_num_rows($q_venta);
	if ($num_total_registros>0) {?>
		<table class="table">
			<tr>
				<th class="col-xs-3 col-sm-3 col-md-3 col-lg-3">id</th>
				<th class="col-xs-3 col-sm-3 col-md-3 col-lg-3">Fecha</th>
				<th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Empleado</th>
				<th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Cliente</th>
				<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1">Total</th>
			</tr>
<?php 
	 while ($row_ventas=mysql_fetch_array($q_venta)) { ?>
	 	<tr>
	 		<td class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><?php echo $row_ventas['idventa'] ?></td>
	 		<td class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><?php echo $row_ventas['fechaventa'] ?></td>
	 		<td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?php echo $row_ventas['apellidoempleado'] ?></td>
	 		<td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?php echo $row_ventas['nombreorsocial'] ?></td>
	 		<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><?php echo $row_ventas['totalventa'] ?></td>
	 	</tr>
	 <?php 	}
	 }	?>
</table>