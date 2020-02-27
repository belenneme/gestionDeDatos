<?php 
mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

$horastrabajadas=mysql_query("SELECT * FROM horastrabajadas ORDER BY cantidadhoras");
?>
	<select name="horastrabajadas" id="" class="form-control" required="required">
	<?php 
	while ($row_horas=mysql_fetch_array($horastrabajadas)) {
		if ($row_horas['idhotastrabajadas']==$row_empleado['horastrabajadas_idhorastrabajadas']) { ?>
			<option value="<?php echo $row_horas['idhotastrabajadas'] ?>" selected><?php echo $row_horas['cantidadhoras']." horas" ?></option>
		<?php }
		else{ 
	 ?>
		<option value="<?php echo $row_horas['idhotastrabajadas'] ?>"><?php echo $row_horas['cantidadhoras']." horas" ?></option>
	<?php }
	} ?>
	</select>