<?php
	mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

	$idtipoliquidacion=$_GET['idtipoliquidacion'];
	$delete_tipo_liquidacion="DELETE FROM tipoliquidacion WHERE idtipoliquidacion='$idtipoliquidacion'";
	mysql_query($delete_tipo_liquidacion);
?>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	<div><h2>Eliminaci&oacute;n exitosa!</h2></div>
	<br>
</div>
<div ><img src="images/icono_ok_grande.png"></div>
<div class="clearfix">
</div>
<a href="tipo_liquidaciones.php">Volver</a>