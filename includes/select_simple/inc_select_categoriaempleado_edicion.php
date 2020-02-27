<?php 
mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

$categoria=mysql_query("SELECT * FROM categoriaempleado ORDER BY nombrecategoria");
?>
	<select name="categoriaempleado" id="" class="form-control" required="required">
	<?php 
	while ($row_categoria=mysql_fetch_array($categoria)) {
		if ($row_categoria['idcategoriaempleado']==$row_empleado['categoriaempleado_idcategoriaempleado']) {?>
			<option value="<?php echo $row_categoria['idcategoriaempleado'] ?>" selected><?php echo $row_categoria['nombrecategoria'] ?></option>
		<?php }
		else{ ?>
		<option value="<?php echo $row_categoria['idcategoriaempleado'] ?>"><?php echo $row_categoria['nombrecategoria'] ?></option>
	<?php }
	} ?>
	</select>