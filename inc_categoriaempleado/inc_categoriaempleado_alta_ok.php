<?php
	mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

	$nombrecategoria=$_POST['nombrecategoria'];
	$salariobasicocategoria=$_POST['salariobasicocategoria'];

	$alta_categoria=mysql_query("INSERT INTO categoriaempleado (nombrecategoria,salariobasicocategoria) 
		VALUES ('$nombrecategoria','$salariobasicocategoria')");

?>

<?php //si el concepto se carga ?>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	<div><h2>Alta de concepto exitosa!</h2></div>
	<br>
</div>
<div ><img src="images/icono_ok_grande.png"></div>
<div class="clearfix">
</div>
<a href="categoriaempleado.php">Volver</a>
<?php //Si no se carga mostrtar error?>