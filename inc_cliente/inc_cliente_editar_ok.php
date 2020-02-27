<?php
	mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

	$idcliente=$_POST['idcliente'];
	$nombreorsocial=$_POST['nombreorsocial'];
	$cuilcliente=$_POST['cuilcliente'];
	$mailcliente=$_POST['mailcliente'];
	$telefonocliente=$_POST['telefonocliente'];
	$tipo=$_POST['tipo']; 

	$update_cliente="UPDATE cliente SET nombreorsocial='$nombreorsocial', cuilcliente='$cuilcliente', mailcliente='$mailcliente', telefonocliente='$telefonocliente'
		WHERE idcliente=$idcliente";
	$q_update=mysql_query($update_cliente);
?>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	<div><h2>Modificaci&oacute;n de cliente exitosa!</h2></div>
	<br>
</div>
<div ><img src="images/icono_ok_grande.png"></div>
<div class="clearfix">
</div>
<a href="cliente_edicion.php?idcliente=<?php echo $idcliente; ?>">Volver</a>