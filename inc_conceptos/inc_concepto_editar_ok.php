<?php
	mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

	$idconcepto=$_POST['idconcepto'];
	$descripcionconcepto=$_POST['descripcionconcepto'];
	$montofijo=$_POST['montofijo'];
	$tipoconcepto=$_POST['tipoconcepto'];
	$montovariable= $_POST['montovariable'];

	$update_concepto="UPDATE concepto SET descripcionconcepto='$descripcionconcepto', montofijo='$montofijo',montovariable= '$montovariable', tipoconcepto='$tipoconcepto' WHERE idconcepto=$idconcepto";
	$q_update=mysql_query($update_concepto);
?>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	<div><h2>Modificaci&oacute;n de concepto exitosa!</h2></div>
	<br>
</div>
<div ><img src="images/icono_ok_grande.png"></div>
<div class="clearfix">
</div>
<a href="conceptos.php">Volver</a>