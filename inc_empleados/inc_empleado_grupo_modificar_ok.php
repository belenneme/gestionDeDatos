<?php
	mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

	$idempleado=$_POST['idempleado'];
	$iddireccion=$_POST['iddireccion'];
	$idgrupo=$_POST['idgrupo'];
	$apellido_pariente=$_POST['apellido_pariente'];
	$nombre_pariente=$_POST['nombre_pariente'];
	$dni_pariente=$_POST['dni_pariente'];
	$fechanacimiento_pariente=$_POST['fechanacimiento_pariente'];
	$parentesco=$_POST['parentesco'];

	$update_grupo="UPDATE grupofamiliar SET apellido_pariente='$apellido_pariente', nombre_pariente='$nombre_pariente', dni_pariente='$dni_pariente', fechanacimiento_pariente='$fechanacimiento_pariente', parentesco='$parentesco'
		WHERE idgrupofamiliar=$idgrupo";
	mysql_query($update_grupo);
?>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	<div><h2>Modificaci&oacute;n de grupo exitosa!</h2></div>
	<br>
</div>
<div ><img src="images/icono_ok_grande.png"></div>
<div class="clearfix">
</div>
<a href="empleado_edicion.php?idempleado=<?php echo $idempleado; ?>&iddireccion=<?php echo $iddireccion; ?>">Volver</a>