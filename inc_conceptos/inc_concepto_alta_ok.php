<?php
	mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

	$descripcion=$_POST['descripcion'];
	$montofijo=$_POST['montofijo'];
	$montovariable=$_POST['montovariable'];
	$tipoconcepto=$_POST['tipoconcepto'];

	$alta_concepto=mysql_query("INSERT INTO concepto (descripcionconcepto, montofijo, tipoconcepto, montovariable, estado) 
		VALUES ('$descripcion', '$montofijo', '$tipoconcepto', '$montovariable','1')");

?>

<?php //si el concepto se carga ?>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	<div><h2>Alta de concepto exitosa!</h2></div>
	<br>
</div>
<div ><img src="images/icono_ok_grande.png"></div>
<div class="clearfix">
</div>
<a href="conceptos.php">Volver</a>
<?php //Si no se carga mostrtar error?>