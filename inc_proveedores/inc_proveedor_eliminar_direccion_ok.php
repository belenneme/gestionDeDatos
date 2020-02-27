<?php
	mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

	$iddireccion=$_GET['iddireccion'];
	$idproveedor=$_GET['idproveedor'];
	$delete_direccion="DELETE FROM direccion WHERE iddireccion=$iddireccion";
	mysql_query($delete_direccion);
?>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	<div><h2>Eliminaci&oacute;n exitosa!</h2></div>
	<br>
</div>
<div ><img src="images/icono_ok_grande.png"></div>
<div class="clearfix">
</div>
<a href="proveedor_edicion.php?idproveedor=<?php echo $idproveedor; ?>">Volver</a>