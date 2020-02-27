<form action="categoriaempleado_alta_ok.php" method="POST" role="form">
<legend>Datos categoria</legend>

<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
  <div class="row control-group">
       <div class="form-group floating-label-form-group controls col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <label for="">Nombre categoria</label>
        <input type="text" class="form-control" placeholder="Nombre" id="" name="nombrecategoria" required>
        </div>
        <div class="form-group floating-label-form-group controls col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <label for="">Salario de Categoria</label>
        <input type="text" class="form-control" placeholder="Salario" id="" name="salariobasicocategoria" required>
        </div>
    </div>
</div>
  
  <legend></legend>
  <div id="success"></div>
      <div class="row">
        <div class="form-group col-xs-12">
          <button type="submit" class="btn boton-send btn-info pull-right btn-lg">Aceptar</button>
        </div>
      </div>
</form>