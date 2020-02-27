<?php
	mysql_select_db($database_conexion_compucentro,$conexion_compucentro);


	 $idproducto=$_POST['idproducto'];
	 $nombreproducto=$_POST['nombreproducto'];
	 $marcaproducto=$_POST['marcaproducto'];
	 $stockproducto=$_POST['stockproducto'];
	 $porcganancia=$_POST['porcganancia'];
	 $stockcritico=$_POST['stockcritico'];
	 $preciocompra=$_POST['preciocompra'];
	 $idcategoriaproductos=$_POST['idcacategoriaproducto'];

	 $ganancia=$preciocompra * ($porcganancia/100);
	 $preciopublico = $preciocompra + $ganancia;


	$update_producto="UPDATE producto SET nombreproducto='$nombreproducto',marca='$marcaproducto', stockproducto='$stockproducto', porcentajeganancia='$porcganancia', stockcritico='$stockcritico', preciocompra='$preciocompra', categoriaproducto_idcategoriaproducto='$idcategoriaproductos', precioventa='$preciopublico'
		WHERE idproducto=$idproducto";
		mysql_query($update_producto);

?>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	<div><h2>Modificaci&oacute;n de producto exitosa!</h2></div>
	<br>
</div>
<div ><img src="images/icono_ok_grande.png"></div>
<div class="clearfix">
</div>
<a href="productos.php?">Volver</a>
