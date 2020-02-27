<?php
mysql_select_db($database_conexion_compucentro,$conexion_compucentro);
$idempleado=$_GET['idempleado'];
$iddireccion=$_GET['iddireccion'];
$grupofamiliar="SELECT * FROM grupofamiliar
INNER JOIN parentesco ON parentesco_idparentesco= idparentesco
WHERE empleado_idempleado=$idempleado";
$q_grupofamiliar=mysql_query($grupofamiliar);
?>

<table class='table table-bordered table-striped'>
	<thead>
		<th>id</th>
		<th>Apellido</th>
		<th>Nombre</th>
		<th>Dni</th>
		<th>Parentezco</th>
		<th></th>
		<th></th>
	</thead>
	<tbody>
	<?php while ($row_grupo= mysql_fetch_array($q_grupofamiliar)) { ?>
		<tr>
			<td class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><?php echo $row_grupo['idgrupofamiliar']; ?></td>
			<td class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><?php echo $row_grupo['apellido_pariente']; ?></td>
			<td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?php echo $row_grupo['nombre_pariente']; ?></td>
			<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><?php echo $row_grupo['dni_pariente']; ?></td>
			<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><?php echo $row_grupo['descripcion']; ?></td>
			<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><a><a href="empleado_modificar_grupo.php?idempleado=<?php echo $idempleado ; ?>&iddireccion=<?php echo $iddireccion ; ?>&idgrupo=<?php echo $row_grupo['idgrupofamiliar'] ; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
			<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><a><a href="empleado_eliminar_grupo.php?idempleado=<?php echo $idempleado ; ?>&iddireccion=<?php echo $iddireccion ; ?>&idgrupo=<?php echo $row_grupo['idgrupofamiliar'] ; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
		</tr>
		<?php } ?>
		<tr>
			<td colspan="8"><div class="pull-right"><a><a href="empleado_add_grupo.php?idempleado=<?php echo $idempleado ; ?>&iddireccion=<?php echo $iddireccion ; ?>&idgrupo=<?php echo $row_grupo['idgrupofamiliar'] ; ?>">Agregar Pariente</a></div></td>
		</tr>
	</tbody>

</table>