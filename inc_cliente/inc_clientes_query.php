<?php

mysql_select_db($database_conexion_compucentro,$conexion_compucentro) or die("Error, no pudo conectarce a la base de datos ");

if (isset($_GET['busca_cliente'])) {
	$busca_cliente = $_GET['busca_cliente'];

	if (is_numeric($busca_cliente)) {
		
	$q_cliente=mysql_query("SELECT * FROM cliente 
		INNER JOIN direccion ON direccion_iddireccion = iddireccion
		INNER JOIN localidad ON localidad_idlocalidad = idlocalidad
		INNER JOIN provincia ON provincia_idprovincia = idprovincia
		LEFT JOIN cuenta ON  cliente_idcliente=idcliente
		WHERE idcliente=$busca_cliente OR nombreorsocial LIKE '%$busca_cliente%' AND cliente.estado=1 GROUP BY idcliente
		ORDER BY idcliente"); //or die("Error, no pudo ejecutarce la consulta");

	}
	else{
		$q_cliente=mysql_query("SELECT * FROM cliente 
			INNER JOIN direccion ON direccion_iddireccion = iddireccion
			INNER JOIN localidad ON localidad_idlocalidad = idlocalidad
			INNER JOIN provincia ON provincia_idprovincia = idprovincia
			LEFT JOIN cuenta ON cliente_idcliente=idcliente
			WHERE nombreorsocial LIKE '%$busca_cliente%' AND cliente.estado=1 GROUP BY idcliente 
			ORDER BY idcliente");
	}
}
else{
	$q_cliente=mysql_query("SELECT * FROM cliente 
		INNER JOIN direccion ON direccion_iddireccion = iddireccion
		INNER JOIN localidad ON localidad_idlocalidad = idlocalidad
		INNER JOIN provincia ON provincia_idprovincia = idprovincia
		LEFT JOIN cuenta ON cliente_idcliente=idcliente 
		WHERE cliente.estado=1 ORDER BY idcliente");
}
?>