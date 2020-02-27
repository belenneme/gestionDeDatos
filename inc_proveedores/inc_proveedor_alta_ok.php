<?php
	mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

	$razonsocialproveedor=$_POST['razonsocialproveedor'];
	$cuilproveedor=$_POST['cuilproveedor'];
	$mailproveedor=$_POST['mailproveedor'];
	$telefonoproveedor=$_POST['telefonoproveedor'];
	$calle=$_POST['calle'];
	$numero=$_POST['numero'];
	$manzana=$_POST['manzana'];
	$barrio=$_POST['barrio'];
	$inputlocalidad=$_POST['inputlocalidad'];

	$alta_proveedor=mysql_query("INSERT INTO proveedor (razonsocialproveedor, cuilproveedor, mailproveedor, telefonoproveedor, estado)
		VALUES ('$razonsocialproveedor', '$cuilproveedor', '$mailproveedor', '$telefonoproveedor', '1')");

	$q_ultimoproveedor=mysql_query("SELECT * FROM proveedor ORDER BY idproveedor DESC LIMIT 0,1");
	$row_ultimo_proveedor=mysql_fetch_array($q_ultimoproveedor);
	$id_ultimo_proveedor=$row_ultimo_proveedor['idproveedor'];

	$alta_direccion=mysql_query("INSERT INTO direccion (calle, numero, manzana, barrio, localidad_idlocalidad, proveedor_idproveedor)
		VALUES ('$calle', '$numero', '$manzana', '$barrio', '$inputlocalidad', '$id_ultimo_proveedor')");
?>

<?php //si elproveedor se carga ?>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	<div><h2>Alta de proveedor exitosa!</h2></div>
	<br>
</div>
<div ><img src="images/icono_ok_grande.png"></div>
<div class="clearfix">
</div>
<a href="proveedores.php">Volver</a>
<?php //Si no se carga mostrtar error?>
