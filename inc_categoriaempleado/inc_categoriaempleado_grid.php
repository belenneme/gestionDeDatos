<?php include "inc_categoriaempleado_query.php" ?>
<?php 
	
	 $num_total_registros = mysql_num_rows($q_categoriaempleado);

	if ($num_total_registros>0) {?>
		<table class="table">
			<tr>
				<th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Id</th>
				<th class="col-xs-4 col-sm-4 col-md-4 col-lg-4">Nombre</th>
				<th class="col-xs-4 col-sm-4 col-md-4 col-lg-4">Sueldo Basico</th>
				<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></th>
				<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></th>
			</tr>
<?php 
	 while ($row_categoriaempleado=mysql_fetch_array($q_categoriaempleado)) { ?>
	 	<tr>
	 		<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><?php echo $row_categoriaempleado['idcategoriaempleado'] ?></td>
	 		<td class="col-xs-5 col-sm-5 col-md-5 col-lg-5"><?php echo $row_categoriaempleado['nombrecategoria'] ?></td>
	 		<td class="col-xs-5 col-sm-5 col-md-5 col-lg-5"><?php echo $row_categoriaempleado['salariobasicocategoria'] ?></td>
	 		<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><a href="categoriaempleado_edicion.php?idcategoriaempleado=<?php echo $row_categoriaempleado['idcategoriaempleado']; ?>"><button type="button" class= "btn btn-info btn-xs"> <span class="glyphicon glyphicon-pencil"> Editar</span></button></a></td>
	 		<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><a href="categoriaempleado_eliminar.php?idcategoriaempleado=<?php echo $row_categoriaempleado['idcategoriaempleado']; ?>"><button type="button" class= "btn btn-primary btn-xs"><span class="glyphicon glyphicon-trash"> Borrar </span></button></a></td>
	 	</tr>
	 <?php 	}
	 }	?>
	</table>