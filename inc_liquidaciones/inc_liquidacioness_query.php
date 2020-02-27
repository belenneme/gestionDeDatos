<?php

mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

if (isset($_GET['busca_liqui'])) {
	$busqueda_detalleliquidacion = $_GET['busca_liqui'];
	$q_detalleliquidacion=mysql_query("SELECT * FROM detalleliquidacion 
	INNER JOIN liquidacion ON liquidacion_idliquidacion=idliquidacion
	INNER JOIN empleado ON empleado_idempleado=idempleado
	WHERE idliquidacion LIKE '%$busqueda_detalleliquidacion%' AND estado>=1");
	
}
else{
	$q_detalleliquidacion=mysql_query("SELECT * FROM detalleliquidacion 
	INNER JOIN liquidacion ON liquidacion_idliquidacion=idliquidacion
	INNER JOIN empleado ON empleado_idempleado=idempleado
	WHERE idliquidacion>=1 ORDER BY idliquidacion DESC");
}

?>