<?php
	mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

	$idempleado=$_POST['idempleado'];
	$iddireccion=$_POST['iddireccion'];
	$apellidoempleado=$_POST['apellidoempleado'];
	$nombreempleado=$_POST['nombreempleado'];
	$dniempleado=$_POST['dniempleado'];
	$cuilempleado=$_POST['cuilempleado'];
	$estadocivilempleado=$_POST['estadocivilempleado'];
	$fechanacimientoempleado=$_POST['fechanacimientoempleado'];
	$fechaingresoempleado= $_POST['fechaingresoempleado'];
	$telefonoempleado=$_POST['telefonoempleado'];
	//$horastrabajadas=$_POST['horastrabajadas'];
	$categoriaempleado=$_POST['categoriaempleado'];

	$update_empleado="UPDATE empleado SET apellidoempleado='$apellidoempleado', nombreempleado='$nombreempleado', dniempleado='$dniempleado', cuilempleado='$cuilempleado', estadocivilempleado='$estadocivilempleado', fechanacimientoempleado='$fechanacimientoempleado',fechaingresoempleado='$fechaingresoempleado', telefonoempleado='$telefonoempleado', categoriaempleado_idcategoriaempleado='$categoriaempleado'
		WHERE idempleado=$idempleado";
	$q_update=mysql_query($update_empleado);
?>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	<div><h2>Modificaci&oacute;n de empleado exitosa!</h2></div>
	<br>
</div>
<div ><img src="images/icono_ok_grande.png"></div>
<div class="clearfix">
</div>
<a href="empleado_edicion.php?idempleado=<?php echo $idempleado; ?>&iddireccion=<?php echo $iddireccion; ?>">Volver</a>