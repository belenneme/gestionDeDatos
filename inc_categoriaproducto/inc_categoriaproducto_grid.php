<?php include "inc_categoriaproducto_query.php" ?>
<?php 
	
	 $num_total_registros = mysql_num_rows($q_categoriaproducto);

	if ($num_total_registros>0) {?>
		<table class="table">
			<tr>
				<th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Id</th>
				<th class="col-xs-8 col-sm-8 col-md-8 col-lg-8">Nombre</th>
				<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></th>
				<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></th>
			</tr>
<?php 
	 while ($row_categoriaproducto=mysql_fetch_array($q_categoriaproducto)) { ?>
	 	<tr>
	 		<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><?php echo $row_categoriaproducto['idcategoriaproducto'] ?></td>
	 		<td class="col-xs-5 col-sm-5 col-md-5 col-lg-5"><?php echo $row_categoriaproducto['nombrecategoria'] ?></td>
	 		<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><a href="categoriaproducto_edicion.php?idcategoriaproducto=<?php echo $row_categoriaproducto['idcategoriaproducto']; ?>"><button type="button" class= "btn btn-info btn-xs"> <span class="glyphicon glyphicon-pencil"> Editar</span></button></a></td>
	 		<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><a href="categoriaproducto_eliminar.php?idcategoriaproducto=<?php echo $row_categoriaproducto['idcategoriaproducto']; ?>"><button type="button" class= "btn btn-primary btn-xs"><span class="glyphicon glyphicon-trash"> Borrar </span></button></a></td>
	 	</tr>
	 <?php 	}
	 }	?>
	</table>