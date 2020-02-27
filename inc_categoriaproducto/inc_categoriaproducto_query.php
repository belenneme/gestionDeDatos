<?php

mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

if (isset($_GET['busca_categoriaproducto']) && $_GET['busca_categoriaproducto']!='') {
	$busca_categoriaproducto = $_GET['busca_categoriaproducto'];

	if (is_numeric($busca_categoriaproducto)) {
		$q_categoriaproducto=mysql_query("SELECT * FROM categoriaproducto 
			WHERE idcategoriaproducto=$busca_categoriaproducto OR nombrecategoria LIKE '%$busca_categoriaproducto%' GROUP BY idcategoriaproducto ORDER BY nombrecategoria");
	}
	else {
		$q_categoriaproducto=mysql_query("SELECT * FROM categoriaproducto 
			WHERE nombrecategoria LIKE '%$busca_categoriaproducto%' ");
	}
}
else{
	$q_categoriaproducto=mysql_query("SELECT * FROM categoriaproducto");
}

?>