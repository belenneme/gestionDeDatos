<?php

mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

if (isset($_GET['busca_producto']) && $_GET['busca_producto']!='') {
	$busca_producto = $_GET['busca_producto'];

	if (is_numeric($busca_producto)) {
		$q_producto=mysql_query("SELECT * FROM producto INNER JOIN categoriaproducto ON categoriaproducto_idcategoriaproducto = idcategoriaproducto
			WHERE idproducto=$busca_producto");
	}
	else {
		$q_producto=mysql_query("SELECT * FROM producto INNER JOIN categoriaproducto ON categoriaproducto_idcategoriaproducto = idcategoriaproducto
			WHERE nombreproducto LIKE '%$busca_producto%' ");
	}
}
else{
	$q_producto=mysql_query("SELECT * FROM producto INNER JOIN categoriaproducto ON categoriaproducto_idcategoriaproducto = idcategoriaproducto");
}

?>