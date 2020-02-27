<?php
	mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

	$idempleado=$_GET['idempleado'];
	$iddireccion=$_GET['iddireccion'];

	$delete_usuario="DELETE FROM usuario WHERE empleado_idempleado=$idempleado";
	mysql_query($delete_usuario);
	$delete_grupofamiliar="DELETE FROM grupofamiliar WHERE empleado_idempleado=$idempleado";
	mysql_query($delete_grupofamiliar);
	$delete_empleado="UPDATE empleado SET estado='0' WHERE idempleado=$idempleado";
	mysql_query($delete_empleado);
?>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	<div><h2>Eliminaci&oacute;n exitosa!</h2></div>
	<br>
</div>
<div ><img src="images/icono_ok_grande.png"></div>
<div class="clearfix">
</div>
<a href="empleados.php">Volver</a>
