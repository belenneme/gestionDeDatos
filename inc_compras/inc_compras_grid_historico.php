<?php

	$num_total_registros = mysql_num_rows($q_compra);
	if ($num_total_registros>0) {?>
		<table class="table">
			<tr>
				<th class="col-xs-3 col-sm-3 col-md-3 col-lg-3">id</th>
				<th class="col-xs-3 col-sm-3 col-md-3 col-lg-3">Fecha</th>
				<th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Empleado</th>
				<th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Proveedor</th>
				<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1">Total</th>
				<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></th>
			</tr>
<?php
	 while ($row_compra=mysql_fetch_array($q_compra)) { ?>
	 	<tr>
	 		<td class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><?php echo $row_compra['idcompra'] ?></td>
	 		<td class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><?php echo $row_compra['fechacompra'] ?></td>
	 		<td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?php echo $row_compra['apellidoempleado'] ?></td>
	 		<td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?php echo $row_compra['razonsocialproveedor'] ?></td>
	 		<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><?php echo $row_compra['totalcompra'] ?></td>
	 		<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><a href="ver_compra.php?idcompra=<?php echo $row_compra['idcompra'] ?>&idproveedor=<?php echo $row_compra['idproveedor'] ?>&idempleado=<?php echo $row_compra['idempleado'] ?>"><button type="button" class= "btn btn-warning btn-xs"><span class="glyphicon glyphicon-list"> Detalle</span> </button></a></td>
	 	</tr>
	 <?php 	}
	 }	?>
</table>
