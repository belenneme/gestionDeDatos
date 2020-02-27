<?php
    mysql_select_db($database_conexion_compucentro, $conexion_compucentro);
    $idliquidacion=$_GET['idliquidacion'];
    $idtipoliquidacion=$_GET['idtipoliquidacion'];

    $q_liquidacion= mysql_query("SELECT * FROM liquidacion
    INNER JOIN tipoliquidacion ON tipoliquidacion_idtipoliquidacion=idtipoliquidacion
    WHERE idliquidacion=$idliquidacion");
    $q_empleado=mysql_query("SELECT idempleado, nombreempleado, apellidoempleado FROM empleado");
    $q_tipoliquidacion=mysql_query("SELECT descripcion FROM tipoliquidacion
      WHERE idtipoliquidacion=$idtipoliquidacion");
    $row_liquidacion=mysql_fetch_array($q_liquidacion);
    $row_tipoliquidacion=mysql_fetch_array($q_tipoliquidacion);
?>
<table class='table table-bordered table-striped'>
<form class="" action="liquidacion_editar_ok_nuevo.php" method="POST" onsubmit="return validar();">
  <input type="hidden" name="idliquidacion" id="" class="form-control" value="<?php echo $idliquidacion; ?>">
  <input type="hidden" name="idtipoliquidacion" id="" class="form-control" value="<?php echo $idtipoliquidacion; ?>">

  <div class="form-group">
    <tr>

      <td><div align='right'>Descripcion</td>
      <td>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <input type="text" name="descripcionliq" id="inputDescripcionliq" class="form-control" value="<?php echo $row_liquidacion['descripcionliq'] ?>" required="required" readonly>
        </div>
      </td>
    </tr>

    <tr>

      <td><div align='right'>Tipo Liquidacion</td>
      <td>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <input type="text" name="descripcion" id="inputDescripcion" class="form-control" value="<?php echo $row_tipoliquidacion['descripcion'] ?>" required="required" readonly>
        </div>
      </td>
    </tr>

    <tr>

      <td><div align='right'>Fecha Desde</td>
      <td>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <input type="date" name="fechadesde" id="inputFechaDesde" class="form-control" value="<?php echo $row_liquidacion['desde'] ?>" required="required" readonly>
        </div>
      </td>
    </tr>

    <tr>

      <td><div align='right'>Fecha Hasta</td>
      <td>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <input type="date" name="fechahasta" id="inputFechaHasta" class="form-control" value="<?php echo $row_liquidacion['hasta'] ?>" required="required" readonly>
        </div>
      </td>
    </tr>

  <tr>
    <tr>

      <td><div align='right'>Fecha Deposito</td>
      <td>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <input type="date" class="form-control" id="fechadeposito" name="fechadeposito" placeholder="Input field">
        </div>
      </td>
    </tr>

  <tr>
      <td><div align='right'>Empleados</td>
      <td>
       <select multiple class='form-control' name="idempleado[]">
    <?php
    while ($row_empleado=mysql_fetch_array($q_empleado)){
      ?>
      <option value="<?php echo $row_empleado['idempleado']?>"><?php echo $row_empleado['apellidoempleado'].", ".$row_empleado['nombreempleado'] ?></option>
    <?php      }?>
    ...
    </select><br>
</td>
</tr>
<tr>
  <td><button type="submit" class="btn boton-send btn-info pull-right btn-md">Liquidar</button></td>
<tr>
    </div>
</form>
</table>


 
