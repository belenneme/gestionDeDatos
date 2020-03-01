<?php
mysql_select_db($database_conexion_compucentro,$conexion_compucentro);
$idtipoliquidacion=$_GET['idtipoliquidacion'];

?>

<table class='table table-bordered table-striped'>
<form action="tipoliquidacion_conceptos_agregar_ok.php" method="POST">
    <input type="hidden" name="idtipoliquidacion" id="" class="form-control" value="<?php echo $idtipoliquidacion; ?>">
    
<tr>
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
    <div class="row control-group floating-label-form-group controls">
      <label for="">Tipo de concepto</label>
      <div class="form-group col-xs-12 floating-label-form-group controls">
      <select placeholder="Seleccionar concepto" name="tipoconcepto" id="inputTipoconcepto" class="form-control " required="required">
        <option value="0">Haber con Aporte</option>
        <option value="1">Haber sin Aporte</option>
        <option value="2">Deducci&oacute;n</option>
      </select>
      </div>
  </div>
</tr>

<tr>
  <td><div align='right'>Descripcion(*): </div></td>
  <td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><input class="form-control" type="text" name="nombre_concepto" value="" required></div></td>
</tr>

<tr>
  <td><div align='right'>Monto Fijo(*): </div></td>
  <td><div class="col-xs-8 col-sm-8 col-md-8 col-lg-8"><input class="form-control" type="number" min="0" name="monto_fijo" size="25" value="" required></div></td>
</tr>

<tr>
  <td><div align='right'>Monto Variable (*): </div></td>
  <td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><input type="text" class="form-control" placeholder="Monto variable (%)" id="" name="montovariable"></div></td>
</tr>


<tr>
  <td></td>
  <td><input type="submit" class="btn btn-info pull-right" name="button" id="button" value="Enviar"></td>
</tr>
</form>
</table>
