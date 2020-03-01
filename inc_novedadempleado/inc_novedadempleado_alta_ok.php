<?php
	mysql_select_db($database_conexion_compucentro,$conexion_compucentro);
    $fechaNovedad=$_POST['fechanovedad'];
	$llegadaTarde=$_POST['llegadaTarde'];
    $falta=$_POST['falta'];
    $idempleado=$_POST['idempleado'];
    


	$alta_novedad=mysql_query("INSERT INTO novedad (fechaNovedad,empleado_idempleado,falta,llegadaTarde) 
		VALUES ('$fechaNovedad','$idempleado','$falta','$llegadaTarde')");

?>

<?php //si el concepto se carga ?>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	<div><h2>Alta de novedad exitosa!</h2></div>
	<br>
</div>
<div ><img src="images/icono_ok_grande.png"></div>
<div class="clearfix">
</div>
<a href="novedadempleado.php">Volver</a>
<?php //Si no se carga mostrtar error?>