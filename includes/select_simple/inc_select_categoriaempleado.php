<?php 
mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

$categoria=mysql_query("SELECT * FROM categoriaempleado ORDER BY idcategoriaempleado");
?>
	<select name="categoriaempleado" id="" class="form-control" required="required">
	<?php 
	while ($row_categoria=mysql_fetch_array($categoria)) { ?>
		<option value="<?php echo $row_categoria['idcategoriaempleado'] ?>"><?php echo $row_categoria['nombrecategoria'] ?></option>
	<?php } ?>
	</select>