<?php

mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

if (isset($_GET['busca_venta'])) {
	$busqueda_venta = $_GET['busca_venta'];
	$q_venta=mysql_query("SELECT * FROM venta
	INNER JOIN empleado ON empleado_idempleado=idempleado
	INNER JOIN cliente ON cliente_idcliente=idcliente
	LEFT JOIN venta_has_pago ON venta_idventa=idventa
	LEFT JOIN pago ON pago_idpago=idpago
	WHERE nombreorsocial LIKE '%$busqueda_venta%' AND idventa!=1 ORDER BY fechaventa DESC");	
}
else{
	$q_venta=mysql_query("SELECT * FROM venta
	INNER JOIN empleado ON empleado_idempleado=idempleado
	INNER JOIN cliente ON cliente_idcliente=idcliente
	WHERE idventa!=1 ");
}
?>
