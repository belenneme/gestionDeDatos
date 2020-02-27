<?php
	mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

	$idproducto=$_GET['idproducto'];
	$delete_producto="DELETE FROM producto WHERE idproducto=$idproducto";
	mysql_query($delete_producto);
?>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	<div><h2>Eliminaci&oacute;n exitosa!</h2></div>
	<br>
</div>
<div ><img src="images/icono_ok_grande.png"></div>
<div class="clearfix">
</div>
<a href="productos.php">Volver</a>