<form action="concepto_alta_ok.php" method="POST" role="form">
<legend>Datos del Concepto</legend>

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
  <div class="row control-group">
    <div class="form-group col-xs-12 floating-label-form-group controls">
        <label for="">Descripcion</label>
        <input class="form-control" name="descripcion" id="inputDescripcion" class="form-control" required="required" placeholder="Descripcion" required>
    </div>
  </div>
</div>
 


<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

    <div class="row control-group">
       <div class="form-group col-xs-12 floating-label-form-group controls">
        <label for="">Monto Fijo</label>
        <input type="text" class="form-control" placeholder="Monto fijo" id="" name="montofijo">
      </div>
    </div>
    <div class="row control-group">
       <div class="form-group col-xs-12 floating-label-form-group controls">
        <label for="">Monto Variable</label>
        <input type="text" class="form-control" placeholder="Monto variable (%)" id="" name="montovariable">
      </div>
    </div>
</div>
 
  <legend></legend>
  <div id="success"></div>
      <div class="row">
        <div class="form-group col-xs-12">
          <button type="submit" class="btn boton-send btn-info pull-right btn-lg">Guardar</button>
        </div>
      </div>
</form>