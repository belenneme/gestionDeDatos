<?php

mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

if (isset($_GET['busca_empleado'])) {
	$busqueda_empleado = $_GET['busca_empleado'];
	$q_empleado=mysql_query("SELECT * FROM empleado 
	INNER JOIN categoriaempleado ON idcategoriaempleado=categoriaempleado_idcategoriaempleado
	INNER JOIN direccion ON direccion_iddireccion=iddireccion
	WHERE nombreempleado LIKE '%$busqueda_empleado%' OR apellidoempleado LIKE '%$busqueda_empleado%' AND estado=1 ORDER BY apellidoempleado");
	
}
else{
	$q_empleado=mysql_query("SELECT * FROM empleado 
	INNER JOIN categoriaempleado ON idcategoriaempleado=categoriaempleado_idcategoriaempleado
	INNER JOIN direccion ON direccion_iddireccion=iddireccion 
	WHERE estado=1
	ORDER BY apellidoempleado");
}

?>