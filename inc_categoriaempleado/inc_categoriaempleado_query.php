<?php

mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

if (isset($_GET['busca_categoriaempleado']) && $_GET['busca_categoriaempleado']!='') {
	$busca_categoriaempleado = $_GET['busca_categoriaempleado'];

	if (is_numeric($busca_categoriaempleado)) {
		$q_categoriaempleado=mysql_query("SELECT * FROM categoriaempleado 
			WHERE idcategoriaempleado=$busca_categoriaempleado OR nombrecategoria LIKE '%$busca_categoriaempleado%' GROUP BY idcategoriaempleado ORDER BY nombrecategoria");
	}
	else {
		$q_categoriaempleado=mysql_query("SELECT * FROM categoriaempleado
			WHERE nombrecategoria LIKE '%$busca_categoriaempleado%' ");
	}
}
else{
	$q_categoriaempleado=mysql_query("SELECT * FROM categoriaempleado");
}

?>