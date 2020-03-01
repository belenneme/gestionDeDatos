<?php

mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

if (isset($_GET['busca_compra'])) {
	$busqueda_compra = $_GET['busca_compra'];
	$q_compra=mysql_query("SELECT * FROM compra 
	LEFT JOIN empleado ON empleado_idempleado=idempleado
	INNER JOIN proveedor ON proveedor_idproveedor=idproveedor
	WHERE razonsocialproveedor LIKE '%$busqueda_compra%' AND idcompra>=1 ORDER BY fechacompra DESC");
	
}
else{
	$q_compra=mysql_query("SELECT * FROM compra 
	LEFT JOIN empleado ON empleado_idempleado=idempleado
	INNER JOIN proveedor ON proveedor_idproveedor=idproveedor
	WHERE idcompra>=1 ORDER BY fechacompra DESC");
}

?>