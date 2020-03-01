<?php
	mysql_select_db($database_conexion_compucentro,$conexion_compucentro);	
	$idnovedadempleado=$_POST['idnovedadempleado'];
	$fechanovedad=$_POST['fechaNovedad'];
    //$empleado=$_POST['empleado'];
    $falta=$_POST['falta'];
	$llegadatarde=$_POST['llegadaTarde'];

	$update_novedad="UPDATE novedad SET fechaNovedad='$fechanovedad',falta='$falta',llegadaTarde='$llegadatarde'
    
     WHERE idNovedad=$idnovedadempleado";
	$q_update=mysql_query($update_novedad);
?>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	<div><h2>Modificaci&oacute;n de novedad exitosa!</h2></div>
	<br>
</div>
<div ><img src="images/icono_ok_grande.png"></div>
<div class="clearfix">
</div>
<a href="novedadempleado.php">Volver</a>