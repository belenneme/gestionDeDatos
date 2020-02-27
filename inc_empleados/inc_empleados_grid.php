<?php

	
	$num_total_registros = mysql_num_rows($q_empleado);
	if ($num_total_registros>0) {?>
		<table class="table">
			<tr>
				<th class="col-xs-3 col-sm-3 col-md-3 col-lg-3">Apellido y Nombre</th>
				<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1">Dni</th>
				<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1">Cuil</th>
				<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1">Tel&eacute;fono</th>
				<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></th>
				<th class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></th>
			</tr>
<?php 
	 while ($row_empleado=mysql_fetch_array($q_empleado)) { 
	 	if ($row_empleado['idempleado']!=0) { ?>
	 		<tr>
	 		<td class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><?php echo $row_empleado['apellidoempleado'] ?> &nbsp;<?php echo $row_empleado['nombreempleado'] ?></td>
	 		<td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?php echo $row_empleado['dniempleado'] ?></td>
	 		<td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?php echo $row_empleado['cuilempleado'] ?></td>
	 		<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><?php echo $row_empleado['telefonoempleado'] ?></td>
	 		<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></th>
	 		<td class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><a href="empleado_edicion.php?idempleado=<?php echo $row_empleado['idempleado']; ?>&iddireccion=<?php echo $row_empleado['direccion_iddireccion']; ?>"><button type="button" class= "btn btn-info btn-xs"> <span class="glyphicon glyphicon-pencil"> Editar</span> </button></a>&nbsp;<a href="empleado_eliminar.php?idempleado=<?php echo $row_empleado['idempleado']; ?>&iddireccion=<?php echo $row_empleado['direccion_iddireccion']; ?>"><button type="button" class= "btn btn-primary btn-xs"><span class="glyphicon glyphicon-trash"> Borrar </span></button></a>&nbsp;<a href="empleado_detalle.php?idempleado=<?php echo $row_empleado['idempleado']; ?>"><button type="button" class= "btn btn-warning btn-xs"><span class="glyphicon glyphicon-list"> Detalle</span> </button></a></td>
	 	</tr>
	 	
	 <?php }	
		}
	 }	?>
</table>