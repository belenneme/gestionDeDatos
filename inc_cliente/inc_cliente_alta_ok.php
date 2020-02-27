<?php
	mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

	$nombreorsocial=$_POST['nombreorsocial'];
	$cuilcliente=$_POST['cuilcliente'];
	$mailcliente=$_POST['mailcliente'];
	$telefonocliente=$_POST['telefonocliente'];
	$tipo=$_POST['tipo'];

	$calle=$_POST['calle'];
	$numero=$_POST['numero'];
	$manzana=$_POST['manzana'];
	$barrio=$_POST['barrio'];
	$inputlocalidad=$_POST['inputlocalidad'];

	$alta_direccion=mysql_query("INSERT INTO direccion (calle, numero, manzana, barrio, localidad_idlocalidad)
		VALUES ('$calle', '$numero', '$manzana', '$barrio', '$inputlocalidad')");

	$q_ultimadireccion=mysql_query("SELECT * FROM direccion ORDER BY iddireccion DESC LIMIT 0,1");
	$row_ultimadireccion=mysql_fetch_array($q_ultimadireccion);
	$id_ultimadireccion=$row_ultimadireccion['iddireccion'];

	$alta_cliente=mysql_query("INSERT INTO cliente (nombreorsocial, cuilcliente, mailcliente, telefonocliente, tipo_idtipo, direccion_iddireccion, estado)
		VALUES ('$nombreorsocial', '$cuilcliente', '$mailcliente', '$telefonocliente', '$tipo', '$id_ultimadireccion', '1')");

	$q_ultimocliente = mysql_query("SELECT * FROM cliente ORDER BY idcliente DESC LIMIT 0,1");
	$row_ultimocliente = mysql_fetch_array($q_ultimocliente);
	$id_ultimocliente = $row_ultimocliente['idcliente'];
	$saldocuenta = 0;

	$alta_cuenta = mysql_query("INSERT INTO cuenta (saldocuenta, estado,cliente_idcliente)
		VALUES ('$saldocuenta', '1','$id_ultimocliente')");
?>

<?php //si el cliente se carga ?>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	<div><h2>Alta de cliente exitosa!</h2></div>
	<br>
</div>
<div ><img src="images/icono_ok_grande.png"></div>
<div class="clearfix">
</div>
<a href="clientes.php">Volver</a>
<?php //Si no se carga mostrtar error?>
