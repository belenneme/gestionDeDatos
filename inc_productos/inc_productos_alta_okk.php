<?php
	mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

	 $nombreproducto=$_POST['nombreproducto'];
	 $stockproducto=$_POST['stockproducto'];
	 $porcganancia=$_POST['porcganancia'];
	 $stockcritico=$_POST['stockcritico'];
	 $preciocompra=$_POST['preciocompra'];
	 $idcategoriaproductos=$_POST['idcacategoriaproducto'];
	 
	 $ganancia=$preciocompra * ($porcganancia/100);
	 $preciopublico = $preciocompra + $ganancia;
	 $ivaproducto= $preiocompra/1.21;

	$alta_producto = "INSERT INTO producto (nombreproducto, stockproducto, porcganancia, preciopublico, preciocompra, stockcritico, categoriaproducto_idcategoriaproducto,ivaproducto)
	 VALUES ('$nombreproducto', '$stockproducto', '$porcganancia', '$preciopublico', '$preciocompra', '$stockcritico', '$idcategoriaproductos','$ivaproducto')";
	mysql_query($alta_producto);
?>

<?php //si el producto se carga ?>
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
	<div><h2>Alta de producto exitosa!</h2></div>
	<br>
</div>
<div ><img src="images/icono_ok_grande.png"></div>
<div class="clearfix">
</div>
<a href="producto_alta.php">Agregar otro producto</a>