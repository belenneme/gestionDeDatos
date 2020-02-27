<?php

mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

if (isset($_GET['busca_liquidaciones'])) {
	//echo('asdaksjd asd ');
	$busqueda_liquidacion = $_GET['busca_liquidaciones'];
	$q_liquidacion=mysql_query("SELECT idliquidacion, fechaliquidacion, desde, hasta, descripcion  FROM liquidacion 
	INNER JOIN tipoliquidacion ON tipoliquidacion_idtipoliquidacion=idtipoliquidacion
	WHERE idliquidacion LIKE '%$busqueda_liquidacion%' OR descripcion LIKE '%$busqueda_liquidacion%");
}
else{
	$q_liquidacion=mysql_query("SELECT idliquidacion, fechaliquidacion, desde, hasta, descripcion  FROM liquidacion 
	INNER JOIN tipoliquidacion ON tipoliquidacion_idtipoliquidacion=idtipoliquidacion");
	//echo($q_liquidacion);

}


