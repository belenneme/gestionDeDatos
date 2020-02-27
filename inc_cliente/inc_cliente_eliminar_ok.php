<?php
	mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

	$idcliente=$_GET['idcliente'];
	$idcuenta=$_GET['idcuenta'];
	$delete_cuenta = "UPDATE cuenta SET estado='0' WHERE idcuenta=$idcuenta";
	$delete_cliente="UPDATE cliente SET estado='0' WHERE idcliente=$idcliente";
	mysql_query($delete_cuenta);
	mysql_query($delete_cliente);
?>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	<div><h2>Eliminaci&oacute;n exitosa!</h2></div>
	<br>
</div>
<div ><img src="images/icono_ok_grande.png"></div>
<div class="clearfix">
</div>
<a href="clientes.php">Volver</a>