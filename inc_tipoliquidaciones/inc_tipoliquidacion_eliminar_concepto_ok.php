<?php
	mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

	$idtipoliquidacion=$_GET['idtipoliquidacion'];
	$idconcepto=$_GET['idconcepto'];
	$delete_concepto="DELETE FROM tipoliquidacion_concepto WHERE tipoliquidacion_idtipoliquidacion=$idtipoliquidacion 
                        AND concepto_idconcepto=$idconcepto";
	mysql_query($delete_concepto);
?>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	<div><h2>Eliminaci&oacute;n exitosa!</h2></div>
	<br>
</div>
<div ><img src="images/icono_ok_grande.png"></div>
<div class="clearfix">
</div>
<a href="tipoliquidacion_editar.php?idtipoliquidacion=<?php echo $idtipoliquidacion; ?>">Volver</a>