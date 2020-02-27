<?php
	mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

  $fechaliquidacion=$_POST['fechaliquidacion'];
  $descripcion=$_POST['descripcion'];
	$tipoliquidacion=$_POST['tipoliquidacion'];

	$fechadesde=$_POST['fechadesde'];
  $fechahasta=$_POST['fechahasta'];

	$alta_tipoliquidacion="INSERT INTO liquidacion (fechaliquidacion, desde, hasta, tipoliquidacion_idtipoliquidacion, descripcionliq, estado) VALUES ('$fechaliquidacion', '$fechadesde', '$fechahasta', '$tipoliquidacion', '$descripcion', 1)";
	mysql_query($alta_tipoliquidacion) or die(mysql_error());
		?>


<?php //si el tipo liquidacion se carga ?>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	<div><h2>Alta de  Liquidacion exitosa!</h2></div>
	<br>	
</div>
<div ><img src="images/icono_ok_grande.png"></div>
<div class="clearfix">
</div>
<a href="liquidar.php">Volver</a>
<?php //Si no se carga mostrtar error?>
