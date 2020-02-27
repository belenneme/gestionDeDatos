<?php
	mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

	$idproveedor=$_GET['idproveedor'];
	$deletedireccion="DELETE FROM direccion WHERE proveedor_idproveedor=$idproveedor";
	mysql_query($deletedireccion);
	$delete_proveedor="UPDATE proveedor SET estado='0' WHERE idproveedor=$idproveedor";
	mysql_query($delete_proveedor);
?>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	<div><h2>Eliminaci&oacute;n exitosa!</h2></div>
	<br>
</div>
<div ><img src="images/icono_ok_grande.png"></div>
<div class="clearfix">
</div>
<a href="proveedores.php">Volver</a>