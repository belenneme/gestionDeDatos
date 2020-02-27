
<form action="producto_alta_ok.php" method="POST" role="form">
<legend>Datos de Producto</legend>

<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 ">

  <div class="row control-group">
      <div class="form-group col-xs-12 floating-label-form-group controls">
          <label for="">Categoria</label>
          <?php  include "includes/select_multiple/index_select_categoria.php" ?>
      </div>
  </div>

  <div class="row control-group">
    <div class="form-group col-xs-12 floating-label-form-group controls">
        <label for="">Nombre (*)</label>
        <input  type="text" placeholder="Nombre de Producto" class="form-control" id="" name="nombreproducto" required>
    </div>
  </div>

    <div class="row control-group">
    <div class="form-group col-xs-12 floating-label-form-group controls">
        <label for="">Marca (*)</label>
        <input  type="text" placeholder="Marca de Producto" class="form-control" id="" name="marcaproducto" required>
    </div>
  </div>


  <div class="row control-group">
    <div class="form-group col-xs-12 floating-label-form-group controls">
        <label for="">Stock</label>
        <input placeholder="Stock" type="number" step="any" min="0" class="form-control" id="" name="stockproducto">
    </div>
  </div>

<div class="row control-group">
    <div class="form-group col-xs-12 floating-label-form-group controls">
        <label for="">Stock M&iacute;nimo (*)</label>
        <input placeholder="Stock m&iacute;nimo" type="number" step="any" min="0" class="form-control" id="" name="stockcritico" required>
    </div>
  </div>

  <div class="row control-group">
    <div class="form-group col-xs-12 floating-label-form-group controls">
        <label for="">Precio de compra (*)</label>
        <input placeholder="Precio de compra" type="number" step="any" min="0" class="form-control" id="" name="preciocompra" required>
    </div>
  </div>
  <div class="row control-group">
    <div class="form-group col-xs-12 floating-label-form-group controls">
        <label for="">Porcentaje de ganancia (*)</label>
        <input placeholder="Porcentaje de ganancia" type="number" step="any" min="0" class="form-control" id="" name="porcganancia" required  >
    </div>
  </div>
</div>
<br>

  <legend></legend>
  <div id="success"></div>
    <div class="row">
      <div class="form-group col-xs-12">
        <button type="submit" class="btn boton-send btn-info pull-left btn-lg">Enviar</button>
      </div>
    </div>
</form>
