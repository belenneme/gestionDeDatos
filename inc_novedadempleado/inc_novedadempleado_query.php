<?php

mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

if (isset($_GET['busca_novedadempleado']) && $_GET['busca_novedadempleado']!='') {
	$busca_novedadempleado = $_GET['busca_novedadempleado'];

	if (is_numeric($busca_novedadempleado)) {
		$q_novedadempleado=mysql_query("SELECT * FROM novedad 
			WHERE idNovedad=$busca_novedadempleado ");
	}
	
}
else{
	$q_novedadempleado=mysql_query("SELECT * FROM novedad");
}

?>