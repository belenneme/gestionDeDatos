<?php
	mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

	$iddireccion=$_POST['iddireccion'];
	$idproveedor=$_POST['idproveedor'];
	$idlocalidad=$_POST['inputlocalidad'];
	$barrio=$_POST['barrio'];
	$manzana=$_POST['manzana'];
	$calle=$_POST['calle'];
	$numero=$_POST['numero'];

	$update_proveedor="UPDATE direccion SET barrio='$barrio', manzana='$manzana', numero='$numero', calle='$calle', localidad_idlocalidad='$idlocalidad'
		WHERE iddireccion=$iddireccion";
	mysql_query($update_proveedor);
?>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	<div><h2>Modificaci&oacute;n de direci&oacute;n exitosa!</h2></div>
	<br>
</div>
<div ><img src="images/icono_ok_grande.png"></div>
<div class="clearfix">
</div>
<a href="proveedor_edicion.php?idproveedor=<?php echo $idproveedor; ?>">Volver</a>