<?php

mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

if (isset($_GET['busca_proveedor'])) {
	$busqueda_proveedor = $_GET['busca_proveedor'];

	if (is_numeric($busqueda_proveedor)) {
		$q_proveedor=mysql_query("SELECT * FROM proveedor
		LEFT JOIN direccion ON idproveedor=proveedor_idproveedor
		LEFT JOIN localidad ON localidad_idlocalidad=idlocalidad
		LEFT JOIN provincia ON provincia_idprovincia=idprovincia
			WHERE idproveedor=$busqueda_proveedor OR razonsocialproveedor LIKE '%$busqueda_proveedor%' AND estado=1 GROUP BY idproveedor ORDER BY razonsocialproveedor ");
	}
	else{
		$q_proveedor=mysql_query("SELECT * FROM proveedor
			LEFT JOIN direccion ON idproveedor=proveedor_idproveedor
			LEFT JOIN localidad ON localidad_idlocalidad=idlocalidad
			LEFT JOIN provincia ON provincia_idprovincia=idprovincia
			WHERE razonsocialproveedor LIKE '%$busqueda_proveedor%' AND estado=1 GROUP BY idproveedor ORDER BY razonsocialproveedor");
	}
}
else{
	$q_proveedor=mysql_query("SELECT * FROM proveedor
		LEFT JOIN direccion ON idproveedor=proveedor_idproveedor
		LEFT JOIN localidad ON localidad_idlocalidad=idlocalidad
		LEFT JOIN provincia ON provincia_idprovincia=idprovincia
		WHERE estado=1
		GROUP BY idproveedor ORDER BY razonsocialproveedor");
}

?>
