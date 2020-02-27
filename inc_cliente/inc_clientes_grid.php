<?php include "inc_clientes_query.php" ?>
<?php 
	 $num_total_registros = mysql_num_rows($q_cliente);

	if ($num_total_registros>0) {?>
		<table class="table">
			<tr>
				<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1">Id</th>
				<th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">NyA|Raz&oacute;n Social</th>
				<th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">CUIL</th>
				<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1">Tel&eacute;fono</th>
				<th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">E-mail</th>
				<th class="col-xs-2 col-sm-2 col-md-2 col-lg-1">Provincia</th>
				<th class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></th>

			</tr>
<?php
	 while ($row_cliente=mysql_fetch_array($q_cliente)) {
	 	if ($row_cliente['idcliente']!=0) { ?>
	 		<tr>
	 		<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><?php echo $row_cliente['idcliente'] ?></td>
	 		<td class="col-xs-1 col-sm-1 col-md-1 col-lg-2"><?php echo $row_cliente['nombreorsocial'] ?></td>
	 		<td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?php echo $row_cliente['cuilcliente'] ?></td>
	 		<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><?php echo $row_cliente['telefonocliente'] ?></td>
	 		<td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?php echo $row_cliente['mailcliente'] ?></td>
	 		<td class="col-xs-2 col-sm-2 col-md-2 col-lg-1"><?php echo $row_cliente['nombreprovincia'] ?></td>

	 		<td class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><a href="cliente_edicion.php?idcliente=<?php echo $row_cliente['idcliente']; ?>"><button type="button" class= "btn btn-info btn-xs"> <span class="glyphicon glyphicon-pencil"> Editar</span> </button></a>&nbsp;<a href="cliente_eliminar.php?idcliente=<?php echo $row_cliente['idcliente']; ?>&idcuenta=<?php echo $row_cliente['idcuenta']; ?>"><button type="button" class= "btn btn-primary btn-xs"><span class="glyphicon glyphicon-trash"> Borrar </span></button></a>&nbsp;<a href="cliente_detalle.php?idcliente=<?php echo $row_cliente['idcliente']; ?>"><button type="button" class= "btn btn-warning btn-xs"><span class="glyphicon glyphicon-list"> Detalle</span> </button></a></td>
	 	</tr>


	 <?php
		}
	}
}	?>


</table>
