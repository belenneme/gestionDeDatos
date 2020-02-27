<?php
	mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

	$idproveedor=$_POST['idprov'];
	$cuilproveedor=$_POST['cuilproveedor'];
	$razonsocialproveedor=$_POST['razonsocialproveedor'];
	$mailproveedor=$_POST['mailproveedor'];
	$telefonoproveedor=$_POST['telefonoproveedor'];

	$update_proveedor="UPDATE proveedor SET razonsocialproveedor='$razonsocialproveedor', cuilproveedor='$cuilproveedor', mailproveedor='$mailproveedor', telefonoproveedor='$telefonoproveedor'
		WHERE idproveedor=$idproveedor";
	$q_update=mysql_query($update_proveedor);
?>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	<div><h2>Modificaci&oacute;n de proveedor exitosa!</h2></div>
	<br>
</div>
<div ><img src="images/icono_ok_grande.png"></div>
<div class="clearfix">
</div>
<a href="proveedor_edicion.php?idproveedor=<?php echo $idproveedor; ?>">Volver</a>
