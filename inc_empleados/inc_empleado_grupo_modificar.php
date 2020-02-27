<?php
mysql_select_db($database_conexion_compucentro,$conexion_compucentro);
$idempleado=$_GET['idempleado'];
$iddireccion=$_GET['iddireccion'];
$idgrupo=$_GET['idgrupo'];
$grupo="SELECT * FROM grupofamiliar WHERE empleado_idempleado=$idempleado AND idgrupofamiliar=$idgrupo";
$q_grupo=mysql_query($grupo);
$row_grupo= mysql_fetch_array($q_grupo);
?>

<table class='table table-bordered table-striped'>
<form action="empleado_grupo_modificar_ok.php" method="POST">
  <input type="hidden" name="idempleado" id="" class="form-control" value="<?php echo $idempleado; ?>">
  <input type="hidden" name="iddireccion" id="" class="form-control" value="<?php echo $iddireccion; ?>">
<tr>
  <td><div align='right'>id Grupo</td>
  <td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><input class="form-control" type="text" value="<?php echo $idgrupo; ?>" name="idgrupo" readonly></div></td>
</tr> 

<tr>
  <td><div align='right'>Apellido</div></td>
  <td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><input class="form-control" type="text" name="apellido_pariente" value="<?php echo $row_grupo['apellido_pariente'] ?>" required></div></td>
</tr>

<tr>
  <td><div align='right'>Nombre</div></td>
  <td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><input class="form-control" type="text" name="nombre_pariente" value="<?php echo $row_grupo['nombre_pariente'] ?>" required></div></td>
</tr>

<tr>
  <td><div align='right'>Dni</div></td>
  <td><div class="col-xs-8 col-sm-8 col-md-8 col-lg-8"><input class="form-control" type="number" min="0" name="dni_pariente" size="25" value="<?php echo $row_grupo['dni_pariente'] ?>" required></div></td>
</tr> 

<tr>
  <td><div align='right'>Fecha de Nacimiento</div></td>
  <td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><input type="date" name="fechanacimiento_pariente" id="inputFechanacimientogrupo" class="form-control" value="<?php echo $row_grupo['fechanacimiento_pariente'] ?>" required="required" title=""></div></td>
</tr>

<tr>
  <td><div align='right'>Parentezco</div></td>
  <td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><input class="form-control" type="text" name="parentesco" value="<?php echo $row_grupo['parentesco'] ?>"></div></td>
</tr>

<tr>
  <td></td>
  <td><input type="submit" class="btn btn-info pull-right" name="button" id="button" value="Modificar"></td>
</tr>
  
</form> 
</table>