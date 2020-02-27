<?php
mysql_select_db($database_conexion_compucentro,$conexion_compucentro);
$idempleado=$_GET['idempleado'];
$iddireccion=$_GET['iddireccion'];
$q_parentezco=mysql_query("SELECT * FROM parentesco");
?>

<table class='table table-bordered table-striped'>
<form action="empleado_grupo_agregar_ok.php" method="POST">
    <input type="hidden" name="idempleado" id="" class="form-control" value="<?php echo $idempleado; ?>">
    <input type="hidden" name="iddireccion" id="" class="form-control" value="<?php echo $iddireccion; ?>">

<tr>
  <td><div align='right'>Apellido(*): </div></td>
  <td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><input class="form-control" type="text" name="apellido_pariente" value="" required></div></td>
</tr>

<tr>
  <td><div align='right'>Nombre(*): </div></td>
  <td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><input class="form-control" type="text" name="nombre_pariente" value="" required></div></td>
</tr>

<tr>
  <td><div align='right'>Dni(*): </div></td>
  <td><div class="col-xs-8 col-sm-8 col-md-8 col-lg-8"><input class="form-control" type="number" min="0" name="dni_pariente" size="25" value="" required></div></td>
</tr>

<tr>
  <td><div align='right'>Fecha de Nacimiento (*): </div></td>
  <td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><input type="date" name="fechanacimiento_pariente" id="inputFechanacimientogrupo" class="form-control" value="" required="required" title=""></div></td>
</tr>

<tr>
  <td><div align='right'>Parentezco: </div></td>
  <td>
    <div class="row control-group">
      <div class="form-group col-xs-12 floating-label-form-group controls">
          <div class="clearfix"></div>
          <select class='form-control' name="idparentesco">
          <?php
          while ($row_parentesco=mysql_fetch_array($q_parentezco)){
            ?>
            <option value="<?php echo $row_parentesco['idparentesco']?>"><?php echo $row_parentesco['descripcion'] ?></option>
          <?php      }?>
          </select>
      </div>

</tr>

<tr>
  <td></td>
  <td><input type="submit" class="btn btn-info pull-right" name="button" id="button" value="Enviar"></td>
</tr>
</form>
</table>
