
<?php
$hostname_conexion_compucentro = "localhost";
$database_conexion_compucentro = "db_compu_nuevo";
$username_conexion_compucentro = "root";
$password_conexion_compucentro = "";

$conexion_compucentro = @mysql_connect($hostname_conexion_compucentro, $username_conexion_compucentro, $password_conexion_compucentro) or trigger_error(mysql_error(),E_USER_ERROR);

mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

$idprovincia = $_POST['idprovinciajs'];
$localidad="SELECT * FROM localidad WHERE provincia_idprovincia=$idprovincia";
$q_localidad=mysql_query($localidad);
?>
<select name="inputLocalidad" id="inputLocalidad" class="form-control" required="required">
    <option value="0">Localidad</option>
</select>
<?php
while ($row_localidad=mysql_fetch_array($q_localidad)) { 
               
        $html.= '<option value="'.$row_localidad['idlocalidad'].'">'.$row_localidad['nombrelocalidad'].'</option>';
    }

echo $html;
?>
