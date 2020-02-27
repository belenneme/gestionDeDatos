<?php
	mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

	$idconcepto=$_GET['idconcepto'];
	$delete_concepto="UPDATE concepto SET estado='0' WHERE idconcepto='$idconcepto'";
	mysql_query($delete_concepto);
?>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	<div><h2>Eliminaci&oacute;n exitosa!</h2></div>
	<br>
</div>
<div ><img src="images/icono_ok_grande.png"></div>
<div class="clearfix">
</div>
<a href="conceptos.php">Volver</a>