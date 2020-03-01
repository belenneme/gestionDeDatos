<?php include "inc_novedadempleado_query.php" ?>
<?php 
	
	 $num_total_registros = mysql_num_rows($q_novedadempleado);

	if ($num_total_registros>0) {?>
		<table class="table">
			<tr>
				<th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Id</th>
                <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Fecha</th>
				<th class="col-xs-4 col-sm-4 col-md-4 col-lg-4">Empleado</th>
				<th class="col-xs-4 col-sm-4 col-md-4 col-lg-4">Falta</th>
				<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1">Llegada Tarde</th>
				<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></th>
			</tr>
<?php 
	 while ($row_novedadempleado=mysql_fetch_array($q_novedadempleado)) { ?>
	 	<tr>
	 		<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><?php echo $row_novedadempleado['idNovedad'] ?></td>
	 		<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><?php echo $row_novedadempleado['fechaNovedad'] ?></td>
             <td class="col-xs-5 col-sm-5 col-md-5 col-lg-5"><?php echo $row_novedadempleado['empleado_idempleado'] ?></td>
	 		<td class="col-xs-5 col-sm-5 col-md-5 col-lg-5"><?php echo $row_novedadempleado['falta'] ?></td>
	 		<td class="col-xs-5 col-sm-5 col-md-5 col-lg-5"><?php echo $row_novedadempleado['llegadaTarde'] ?></td>
             <td class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><a href="novedadempleado_edicion.php?idNovedad=<?php echo $row_novedadempleado['idNovedad']; ?>"><button type="button" class= "btn btn-info btn-xs"> <span class="glyphicon glyphicon-pencil"> Editar</span></button></a></td>
	 		<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><a href="novedadempleado_eliminar.php?idNovedad=<?php echo $row_novedadempleado['idNovedad']; ?>"><button type="button" class= "btn btn-primary btn-xs"><span class="glyphicon glyphicon-trash"> Borrar </span></button></a></td>
	 	</tr>
	 <?php 	}
	 }	?>
	</table>