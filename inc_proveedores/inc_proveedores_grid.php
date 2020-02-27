<?php

	$num_total_registros = mysql_num_rows($q_proveedor);
	if ($num_total_registros>0) {?>
		<table class="table">
			<tr>
				<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1">Id</th>
				<th class="col-xs-3 col-sm-3 col-md-3 col-lg-3">Raz&oacute;n Social</th>
				<th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Tel&eacute;fono</th>
				<th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Provincia</th>
				<th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Localidad</th>
				<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></th>
				<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></th>
				<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></th>
			</tr>
<?php
	 while ($row_proveedor=mysql_fetch_array($q_proveedor)) {
	 	if ($row_proveedor['idproveedor']!=0) { ?>
	 	<tr>
	 		<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><?php echo $row_proveedor['idproveedor'] ?></td>
	 		<td class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><?php echo $row_proveedor['razonsocialproveedor'] ?></td>
	 		<td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?php echo $row_proveedor['telefonoproveedor'] ?></td>
	 		<td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?php echo $row_proveedor['nombreprovincia'] ?></td>
	 		<td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?php echo $row_proveedor['nombrelocalidad'] ?></td>
	 		<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1" ><a href="proveedor_detalle.php?idproveedor=<?php echo $row_proveedor['idproveedor']; ?>"><button type="button" class= "btn btn-warning btn-xs"><span class="glyphicon glyphicon-list"> Detalle</span> </button></a></td>
	 		<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><a href="proveedor_edicion.php?idproveedor=<?php echo $row_proveedor['idproveedor']; ?>"><button type="button" class= "btn btn-info btn-xs"> <span class="glyphicon glyphicon-pencil"> Editar</span> </button></a></td>
	 		<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><a href="proveedor_eliminar.php?idproveedor=<?php echo $row_proveedor['idproveedor']; ?>"><button type="button" class= "btn btn-primary btn-xs"><span class="glyphicon glyphicon-trash"> Borrar </span></button></a></td>
	 	</tr>
	 <?php }
	 	}
	 }	?>
</table>
