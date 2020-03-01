<?php
	mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

	$idnovedadempleado=$_GET['idNovedad'];
	$delete_novedad="DELETE FROM novedad WHERE idNovedad='$idnovedadempleado'";
	mysql_query($delete_novedad);
?>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	<div><h2>Eliminaci&oacute;n exitosa!</h2></div>
	<br>
</div>
<div ><img src="images/icono_ok_grande.png"></div>
<div class="clearfix">
</div>
<a href="novedadempleado.php">Volver</a>