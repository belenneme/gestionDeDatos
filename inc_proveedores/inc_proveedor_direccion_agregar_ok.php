<?php
	mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

	$idproveedor=$_POST['idproveedor'];
	$idlocalidad=$_POST['inputlocalidad'];
	$barrio=$_POST['barrio'];
	$manzana=$_POST['manzana'];
	$calle=$_POST['calle'];
	$numero=$_POST['numero'];

	$insert_direccion="INSERT INTO direccion (calle, numero, manzana, barrio, localidad_idlocalidad, proveedor_idproveedor) VALUES ('$calle', '$numero', '$manzana', '$barrio', '$idlocalidad', '$idproveedor');";
	mysql_query($insert_direccion);
?>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	<div><h2>Alta de direci&oacute;n exitosa!</h2></div>
	<br>
</div>
<div ><img src="images/icono_ok_grande.png"></div>
<div class="clearfix">
</div>
<a href="proveedor_edicion.php?idproveedor=<?php echo $idproveedor; ?>">Volver</a>