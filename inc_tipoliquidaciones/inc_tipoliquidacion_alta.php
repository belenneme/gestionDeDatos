<?php mysql_select_db($database_conexion_compucentro,$conexion_compucentro);
$q_conceptos=mysql_query("SELECT idconcepto,descripcionconcepto FROM concepto WHERE estado=1");
?>
<form action="tipoliquidacion_alta_ok.php" method="POST" role="form">
<legend>Tipo de Liquidacion</legend>

<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

  <div class="row control-group">
    <div class="form-group col-xs-12 floating-label-form-group controls">
        <label for="">Descripcion</label>
Descripcion de Tipo Liquidacion
        <input class="form-control" name="descripcion" id="inputDescripcion" class="form-control" required="required" placeholder="Descripcion" required>
    </div>
  </div>

  <div class="form-group">
    Conceptos: <br>
    <select multiple class='form-control' name="selectedconcepto[]">
    <?php
    while ($row_concepto=mysql_fetch_array($q_conceptos)){
      ?>
      <option value="<?php echo $row_concepto['idconcepto']?>"><?php echo $row_concepto['descripcionconcepto'] ?></option>
    <?php      }?>
    </select><br>
  </div>
</div>
  <div id="success"></div>
      <div class="row">
        <div class="form-group col-xs-12">
          <button type="submit" class="btn boton-send btn-info pull-right btn-lg">Enviar</button>
        </div>
      </div>
</form>
