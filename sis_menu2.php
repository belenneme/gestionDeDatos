<?php require_once('Connections/conexion_compucentro.php'); ?>
<?php 
$nivelUsuario=($_SESSION["nivel"]);
mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

$q_accesos= mysql_query("SELECT nivel, modulo FROM acceso
    WHERE $nivelUsuario==nivel");

      while ($row_accesos=mysql_fetch_array($q_accesos)){
        ?>
          <option value="<?php echo ($row_accesos['modulo'].'.php')?>"> </option>
    
<?php } 



?>