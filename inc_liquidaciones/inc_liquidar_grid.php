<?php
	$num_total_registros = mysql_num_rows($q_liquidacion);
	if ($num_total_registros>0) {?>
		<table class="table">
			<tr>
				<th class="col-xs-3 col-sm-3 col-md-3 col-lg-3">Descripcion</th>
				<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1">Tipo Liquidacion</th>
				<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1">Fecha Desde</th>
				<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1">Fecha Hasta</th>
				<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></th>
				<th class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></th>
			</tr>
<?php
	 while ($row_liquidacion=mysql_fetch_array($q_liquidacion)) {
	 	if ($row_liquidacion['idliquidacion']) { ?>
	 		<tr>
	 		<td class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><?php echo $row_liquidacion['descripcionliq'] ?></td>
	 		<td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?php echo $row_liquidacion['descripcion'] ?></td>
	 		<td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?php echo $row_liquidacion['desde'] ?></td>
	 		<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><?php echo $row_liquidacion['hasta'] ?></td>
	 		<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></th>
	 		<td class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><a href="liquidar_empleados_nuevo.php?idliquidacion=<?php echo $row_liquidacion['idliquidacion']; ?>&idtipoliquidacion=<?php echo $row_liquidacion['tipoliquidacion_idtipoliquidacion']; ?>"><button type="button" class= "btn btn-info btn-xs"> <span class="glyphicon glyphicon-pencil"> Liquidar</span>
	 	</tr>

	 <?php }
		}
	 }	?>
</table>
