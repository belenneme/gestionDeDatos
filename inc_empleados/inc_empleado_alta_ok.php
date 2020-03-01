<?php
	mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

	$categoriaempleado=$_POST['categoriaempleado'];
	$apellidoempleado=$_POST['apellidoempleado'];
	$nombreempleado=$_POST['nombreempleado'];
	$dniempleado=$_POST['dniempleado'];
	$cuilempleado=$_POST['cuilempleado'];
	$estadocivilempleado=$_POST['estadocivilempleado'];
	$fechanacimientoempleado=$_POST['fechanacimiento'];
	$fechaingresoempleado=date('Y-m-d H:i:s');
	$telefonoempleado=$_POST['telefonoempleado'];
	//$horastrabajadas=$_POST['horastrabajadas'];
	$nivel=$_POST['nivel'];
	$inputlocalidad=$_POST['inputlocalidad'];
	$barrio=$_POST['barrio'];
	$manzana=$_POST['manzana'];
	$calle=$_POST['calle'];
	$numero=$_POST['numero'];
	$banco=$_POST['idbanco'];
	$cajadeahorro=$_POST['cajadeahorro'];

	$alta_direccion=mysql_query("INSERT INTO direccion (calle, numero, manzana, barrio, localidad_idlocalidad)
		VALUES ('$calle', '$numero', '$manzana', '$barrio', '$inputlocalidad')");

	$q_ultimadireccion=mysql_query("SELECT * FROM direccion ORDER BY iddireccion DESC LIMIT 0,1");
	$row_ultimadireccion=mysql_fetch_array($q_ultimadireccion);
	$ult_direccion=$row_ultimadireccion['iddireccion'];

	$alta_empleado=mysql_query("INSERT INTO empleado (categoriaempleado_idcategoriaempleado, nombreempleado, apellidoempleado, dniempleado, cuilempleado, estadocivilempleado, fechanacimientoempleado, fechaingresoempleado, telefonoempleado, direccion_iddireccion, estado)
		 VALUES ('$categoriaempleado', '$nombreempleado', '$apellidoempleado', '$dniempleado', '$cuilempleado', '$estadocivilempleado', '$fechanacimientoempleado', '$fechaingresoempleado', '$telefonoempleado', '$ult_direccion', '1')");

	$q_ult_empleado=mysql_query("SELECT * FROM empleado ORDER BY idempleado DESC LIMIT 0,1");
	$row_ult_empleado=mysql_fetch_array($q_ult_empleado);
	$ult_empleado=$row_ult_empleado['idempleado'];

	$alta_usuario=mysql_query("INSERT INTO usuario (nombreusuario, password, empleado_idempleado, nivel)
	VALUES ('$nombreempleado', MD5('12345'),'$ult_empleado', $nivel)");

	$alta_cajadeahorro=mysql_query("INSERT INTO cajadeahorro (nrocuenta, banco_idbanco, empleado_idempleado)
	VALUES ('$cajadeahorro', '$banco', '$ult_empleado')")
?>

<?php //si  se carga ?>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	<div><h2>Alta de empleado exitosa!</h2></div>
	<div>Nombre de Usuario: <?php echo $nombreempleado ?></h2></div>
	<div>Pass: 12345</div>
	<br>
</div>
<div ><img src="images/icono_ok_grande.png"></div>
<div class="clearfix">
</div>
<a href="empleados.php">Volver</a>
<?php //Si no se carga mostrtar error?>
