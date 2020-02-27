<?php 
  mysql_select_db($database_conexion_naturaldiet,$conexion_naturaldiet);
  $producto="SELECT * FROM producto ORDER BY nombreproducto";
  $q_producto=mysql_query($producto);  

?> 