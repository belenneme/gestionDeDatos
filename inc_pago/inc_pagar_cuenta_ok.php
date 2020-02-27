<?php
	mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

	$monto=$_POST['monto'];
	$descripcionpago=$_POST['cuentacorriente'];
	$idcuenta=$_POST['idcuenta'];
	$fecha=$_POST['fechaventa'];

	 

	$pago = "INSERT INTO pago ( monto, fechapago, descripcionpago)
	 VALUES ('$monto',   '$fecha ' , '$descripcionpago')";
	
	mysql_query($pago);

$update_cliente= "UPDATE cuenta SET saldocuenta = saldocuenta -'$monto' WHERE idcuenta=$idcuenta";
	
	$q_update=mysql_query($update_cliente);


?>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	<div><h2>Pago realizado!!!</h2></div>
	<br>
</div>
<div ><img src="images/icono_ok_grande.png"></div>
<div class="clearfix">
</div>
<a href="pago.php">Volver</a> 