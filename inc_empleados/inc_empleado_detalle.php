<?php
mysql_select_db($database_conexion_compucentro,$conexion_compucentro);
$idempleado=$_GET['idempleado'];
$empleado="SELECT * FROM empleado 
INNER JOIN categoriaempleado ON categoriaempleado_idcategoriaempleado=idcategoriaempleado
INNER JOIN direccion ON direccion_iddireccion=iddireccion
LEFT JOIN localidad ON localidad_idlocalidad=idlocalidad
LEFT JOIN provincia ON provincia_idprovincia=idprovincia

WHERE idempleado=$idempleado";
$q_empleado=mysql_query($empleado);
$row_empleado= mysql_fetch_array($q_empleado);

$grupofamiliar="SELECT * FROM grupofamiliar 
WHERE empleado_idempleado=$idempleado";
$q_grupofamiliar=mysql_query($grupofamiliar);

?>

<table class='table table-bordered table-striped'>

<tr>
	<td><div align='right'>id: </div></td>
	<td class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><div><?php echo $idempleado; ?></div></td>
</tr> 
<tr>
	<td><div align='right'>Apellido: </div></td>
	<td class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><div><?php echo $row_empleado['apellidoempleado'] ?></div></td>
</tr>
<tr>
	<td><div align='right'>Nombre: </div></td>
	<td class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><div><?php echo $row_empleado['nombreempleado'] ?></div></td>
</tr>
<tr>
	<td><div align='right'>Dni: </div></td>
	<td class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><div><?php echo $row_empleado['dniempleado'] ?></div></td>
</tr>
<tr>
	<td><div align='right'>Cuil: </div></td>
	<td class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><div><?php echo $row_empleado['cuilempleado'] ?></div></td>
</tr>
<tr>
	<td><div align='right'>Fecha Nacimiento: </div></td>
	<td class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><div><?php echo $row_empleado['fechanacimientoempleado'] ?></div></td>
</tr>
<tr>
	<td><div align='right'>Estado Civil: </div></td>
	<td class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><div><?php echo $row_empleado['estadocivilempleado'] ?></div></td>
</tr>
<tr>
	<td><div align='right'>Grupo Familiar: </div></td>
	<td class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<div>
			<?php 
				while ($row_grupo= mysql_fetch_array($q_grupofamiliar)) {
					echo $row_grupo['nombre_pariente']." ".$row_grupo['apellido_pariente']."(".$row_grupo['parentesco']."), ";
				}
			 ?>
		</div>
	</td>
</tr>
<tr>
	<td><div align='right'>Categor&iacute;a: </div></td>
	<td class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><div><?php echo $row_empleado['nombrecategoria'] ?></div></td>
</tr> 


<tr>
	<td><div align='right'>Fecha de Ingreso: </div></td>
	<td class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><div><?php echo $row_empleado['fechaingresoempleado'] ?></div></td>
</tr>
<tr>
	<td><div align='right'>Provincia: </div></td>
	<td class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><div><?php echo $row_empleado['nombreprovincia'] ?></div></td>
</tr>
<tr>
	<td><div align='right'>Localidad: </div></td>
	<td class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><div><?php echo $row_empleado['nombrelocalidad'] ?></div></td>
</tr>
<tr>
	<td><div align='right'>Direcci&oacute;n: </div></td>
	<td class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><div><?php echo $row_empleado['calle']." ".$row_empleado['numero']." ".$row_empleado['barrio']." ".$row_empleado['manzana'] ?></div></td>
</tr>
<tr>
	<td><div align='right'>Tel&eacute;fono: </div></td>
	<td class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><div><?php echo $row_empleado['telefonoempleado'] ?></div></td>
</tr>

</table>