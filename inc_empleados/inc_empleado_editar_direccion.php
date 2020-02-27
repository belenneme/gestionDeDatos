<?php
mysql_select_db($database_conexion_compucentro,$conexion_compucentro);
$iddireccion=$_GET['iddireccion'];
$idempleado=$_GET['idempleado'];

$direccion="SELECT * FROM direccion
INNER JOIN localidad ON localidad_idlocalidad=idlocalidad
INNER JOIN provincia ON provincia_idprovincia=idprovincia
WHERE iddireccion=$iddireccion";
$q_direccion=mysql_query($direccion);

?>

<table class='table table-bordered table-striped'>
	<thead>
		<th>Provincia</th>
		<th>Localidad</th>
		<th>Calle</th>
		<th>Numero</th>
		<th>Barrio</th>
	</thead>
	<tbody>
	<?php while ($row_direccion= mysql_fetch_array($q_direccion)) { ?>
		<tr>
			<td class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><?php echo $row_direccion['nombreprovincia']; ?></td>
			<td class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><?php echo $row_direccion['nombrelocalidad']; ?></td>
			<td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?php echo $row_direccion['calle']; ?></td>
			<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><?php echo $row_direccion['numero']; ?></td>
			<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><?php echo $row_direccion['barrio']; ?></td>
			
			</tr>
			<tr>
			<td colspan="8"><a><a href="empleado_modificar_direccion.php?idempleado=<?php echo $idempleado ; ?>&iddireccion=<?php echo $iddireccion ; ?>"><input type="submit" class="btn btn-info pull-right" name="button" id="button" value="Modificar"></a></td>

		</tr>
		<?php } ?>
	</tbody>

</table>