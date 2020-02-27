<?php

mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

if (isset($_GET['busca_tipoliquidacion']) && $_GET['busca_tipoliquidacion']!='') {
	$busca_tipoliquidacion = $_GET['busca_tipoliquidacion'];

	if (is_numeric($busca_tipoliquidacion)) {
		$q_tipoliquidacion=mysql_query("SELECT * FROM tipoliquidacion
			WHERE idtipoliquidacion=$busca_tipoliquidacion OR descripcion LIKE '%$q_tipoliquidacion%'  ORDER BY descripcion");
	}
	else {
		$q_tipoliquidacion=mysql_query("SELECT * FROM tipoliquidacion
			WHERE descripcion LIKE '%$busca_tipoliquidacion%' ");
	}
}
else{
	$q_tipoliquidacion=mysql_query("SELECT * FROM tipoliquidacion");
}

?>
