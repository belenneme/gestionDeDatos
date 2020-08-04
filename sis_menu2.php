<?php require_once('Connections/conexion_compucentro.php'); ?>
<?php 
$nivelUsuario=($_SESSION["nivel"]);
mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

$q_accesos= mysql_query("SELECT nivel, modulo FROM acceso
    WHERE $nivelUsuario>=nivel");

      while ($row_accesos=mysql_fetch_array($q_accesos)){ ?>
    <li><a href="#" data-target=".premium-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-shopping-basket"></i> <? echo ($row_accesos['modulo'])?><i class="fa fa-collapse"></i></a></li>
    <li>
    <ul class=" premium-menu nav nav-list collapse">
    <li><a href="<?php echo ($row_accesos['modulo'].'.php')?>"><span class="fa fa-caret-right"></span><? echo ($row_accesos['modulo'])?> </a></li>
    
  </ul>
  </li>
<?php } ?>