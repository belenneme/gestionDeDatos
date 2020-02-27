<?php

	$num_total_registros = mysql_num_rows($q_producto);
	if ($num_total_registros>0) {?>
		<table class="table">
			<tr>
				<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1">Id</th>
				<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1">Nombre</th>
				<th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Categoria</th>
				<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1">Stock</th>
				<th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Precio de Venta </th>
				<th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Iva Producto </th>
				<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1">Estado</th>
				<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></th>
				<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></th>
				<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></th>
			</tr>
<?php
	 while ($row_producto=mysql_fetch_array($q_producto)) { ?>
	 	<tr >
	 			 	<?php
if ($row_producto['stockproducto'] < $row_producto['stockcritico']){ ?>
 <?php if ($row_producto['stockproducto']==0) { ?>
<td class="danger" class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><?php echo $row_producto['idproducto'] ?></td>
	 		<td class="danger" class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><?php echo $row_producto['nombreproducto'] ?></td>
	 		<td class="danger" class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?php echo $row_producto['nombrecategoria'] ?></td>
	 		<td class="danger" class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><?php echo $row_producto['stockproducto'] ?></td>
	 		<td class="danger" class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?php echo $row_producto['precioventa'] ?></td>
	 		<td class="danger" class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?php echo $row_producto['ivaproducto'] ?></td>
			 <td class="danger" class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><?php echo "Sin Stock" ?></td>
	 		<td  class="danger" class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><a href="producto_detalle.php?idproducto=<?php echo $row_producto['idproducto']; ?>"><button type="button" class= "btn btn-warning btn-xs"><span class="glyphicon glyphicon-list"> Detalle</span> </button></a></td>
	 		<td class="danger" class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><a href="producto_edicion.php?idproducto=<?php echo $row_producto['idproducto']; ?>"><button type="button" class= "btn btn-info btn-xs"> <span class="glyphicon glyphicon-pencil"> Editar </span></button></a></td>
	 		<td class="danger" class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><a href="producto_eliminar.php?idproducto=<?php echo $row_producto['idproducto']; ?>"><button type="button" class= "btn btn-primary btn-xs"> <span class="glyphicon glyphicon-trash">  Borrar </span></button></a></td>

	 		<?php }else { ?>
	 		<td class="warning" class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><?php echo $row_producto['idproducto'] ?></td>
	 		<td class="warning" class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><?php echo $row_producto['nombreproducto'] ?></td>
	 		<td class="warning" class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?php echo $row_producto['nombrecategoria'] ?></td>
	 		<td class="warning" class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><?php echo $row_producto['stockproducto'] ?></td>
	 		<td class="warning" class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?php echo $row_producto['precioventa'] ?></td>
			 <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?php echo $row_producto['ivaproducto'] ?></td>
			 <td class="warning" class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><?php echo "Poco Stock" ?></td>
	 		<td class="warning" class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><a href="producto_detalle.php?idproducto=<?php echo $row_producto['idproducto']; ?>"><button type="button" class= "btn btn-warning btn-xs"><span class="glyphicon glyphicon-list"> Detalle</span> </button></a></td>
	 		<td class="warning" class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><a href="producto_edicion.php?idproducto=<?php echo $row_producto['idproducto']; ?>"><button type="button" class= "btn btn-info btn-xs"> <span class="glyphicon glyphicon-pencil"> Editar </span></button></a></td>
	 		<td class="warning" class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><a href="producto_eliminar.php?idproducto=<?php echo $row_producto['idproducto']; ?>"><button type="button" class= "btn btn-primary btn-xs"> <span class="glyphicon glyphicon-trash">  Borrar </span></button></a></td>

	 	<?php } ?>

	 		<?php	}else{ ?>

           <td class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><?php echo $row_producto['idproducto'] ?></td>
	 		<td class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><?php echo $row_producto['nombreproducto'] ?></td>
	 		<td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?php echo $row_producto['nombrecategoria'] ?></td>
	 		<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><?php echo $row_producto['stockproducto'] ?></td>
	 		<td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?php echo $row_producto['precioventa'] ?></td>
			<td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?php echo $row_producto['ivaproducto'] ?></td>
			 <td class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><i class="fa fa-check" aria-hidden="true"></i></td>
			<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><a href="producto_detalle.php?idproducto=<?php echo $row_producto['idproducto']; ?>"><button type="button" class= "btn btn-warning btn-xs"><span class="glyphicon glyphicon-list"> Detalle</span> </button></a></td>
	 		<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><a href="producto_edicion.php?idproducto=<?php echo $row_producto['idproducto']; ?>"><button type="button" class= "btn btn-info btn-xs"> <span class="glyphicon glyphicon-pencil"> Editar </span></button></a></td>
	 		<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><a href="producto_eliminar.php?idproducto=<?php echo $row_producto['idproducto']; ?>"><button type="button" class= "btn btn-primary btn-xs"> <span class="glyphicon glyphicon-trash">  Borrar </span></button></a></td>

	 		<?php } ?>

	 	</tr>
	 <?php 	}
	 }	?>
</table>
