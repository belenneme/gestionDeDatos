<?php
mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

$idempleado=$_GET['idempleado'];
$iddireccion=$_GET['iddireccion'];
$empleado="SELECT * FROM empleado
INNER JOIN categoriaempleado ON categoriaempleado_idcategoriaempleado=idcategoriaempleado

WHERE idempleado=$idempleado";
$q_empleado=mysql_query($empleado);
$row_empleado= mysql_fetch_array($q_empleado);

?>

<table class='table table-bordered table-striped'>
<form action="empleado_editar_ok.php" method="POST">
<input type="hidden" name="iddireccion" id="" class="form-control" value="<?php echo $iddireccion; ?>">
<input type="hidden" name="idempleado" id="" class="form-control" value="<?php echo $idempleado; ?>">

<tr>

	<td><div align='right'>Fecha de Ingreso</td>
	<td>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<input type="date" name="fechaingresoempleado" id="inputFecha" class="form-control" value="<?php echo $row_empleado['fechaingresoempleado'] ?>" required="required" title="">
		</div>
	</td>
</tr>

<tr>
	<td><div align='right'>Apellido</td>
	<td>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<input class="form-control" type="text" value="<?php echo $row_empleado['apellidoempleado'] ?>" name="apellidoempleado" required>
		</div>
	</td>
</tr>

<tr>
	<td><div align='right'>Nombre</td>
	<td>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<input class="form-control" type="text" value="<?php echo $row_empleado['nombreempleado'] ?>" name="nombreempleado" required>
		</div>
	</td>
</tr>

<tr>
	<td><div align='right'>Dni</td>
	<td>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<input class="form-control" type="text" value="<?php echo $row_empleado['dniempleado'] ?>" name="dniempleado" required>
		</div>
	</td>
</tr>

<tr>
	<td><div align='right'>Cuil</td>
	<td>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<input class="form-control" type="text" value="<?php echo $row_empleado['cuilempleado'] ?>" name="cuilempleado" required>
		</div>
	</td>
</tr>

<tr>
	<td><div align='right'>Estado Civil</td>
	<td>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<select name="estadocivilempleado" id="" class="form-control">
				<?php
					if (strcmp ($row_empleado['estadocivilempleado'], "Soltero" ) == 0) { ?>
						<option value="Soltero" selected>Soltero</option>
						<option value="Casado">Casado</option>
						<option value="Divorciado">Divorciado</option>
						<option value="Viudo">Viudo</option>
					<?php }
					else { ?>
						<option value="Casado" selected>Casado</option>
						<option value="Soltero">Soltero</option>
						<option value="Divorciado">Divorciado</option>
						<option value="Viudo">Viudo</option>
				<?php	}
				 ?>

        	</select>
		</div>
	</td>
</tr>
<tr>
	<td><div align='right'>Fecha de Nacimiento</td>
	<td>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<input type="date" name="fechanacimientoempleado" id="inputFecha" class="form-control" value="<?php echo $row_empleado['fechanacimientoempleado'] ?>" required="required" title="">
		</div>
	</td>
</tr>
<tr>
	<td><div align='right'>Tel&eacute;fono</td>
	<td>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<input class="form-control" type="text" value="<?php echo $row_empleado['telefonoempleado'] ?>" name="telefonoempleado">
		</div>
	</td>
</tr>
<tr>
	<td><div align='right'>Categor&iacute;a</td>
	<td>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<?php include "includes/select_simple/inc_select_categoriaempleado_edicion.php" ?>
		</div>
	</td>
</tr>

	<td></td>
	<td><input type="submit" class="btn btn-info pull-right" name="button" id="button" value="Modificar"></td>
</tr>

</form>
</table>
