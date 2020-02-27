<?php
	mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

	$iddireccion=$_GET['iddireccion'];
	$idempleado=$_GET['idempleado'];
	$idgrupo=$_GET['idgrupo'];
	$delete_grupo="DELETE FROM grupofamiliar WHERE idgrupofamiliar=$idgrupo";
	mysql_query($delete_grupo);
?>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	<div><h2>Eliminaci&oacute;n exitosa!</h2></div>
	<br>
</div>
<div ><img src="images/icono_ok_grande.png"></div>
<div class="clearfix">
</div>
<a href="empleado_edicion.php?idempleado=<?php echo $idempleado; ?>&iddireccion=<?php echo $iddireccion; ?>">Volver</a>