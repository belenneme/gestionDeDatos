<?php

mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

$nivelUsuario=($_SESSION["nivel"]);

$q_accesos= mysql_query("SELECT nivel, modulo FROM acceso
    WHERE $nivelUsuario>=nivel");

?>

 
