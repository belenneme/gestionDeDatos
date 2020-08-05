<form action="cliente_alta_ok.php" method="POST" role="form">
<legend>Datos Cliente</legend>

<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

  <div class="row control-group">
    <div class="form-group col-xs-12 floating-label-form-group controls">
        <label for="">Nombre y apellido/Raz&oacute;n social (*)</label>
        <input type="text" class="form-control" placeholder="Nombre y apellido|Raz&oacute;n Social (*)" id="" name="nombreorsocial" required>
    </div>
  </div>

  <div class="row control-group">
    <div class="form-group col-xs-12 floating-label-form-group controls">
        <label for="">Cuil|Cuit(*)</label>
        <input  type="text" placeholder="Cuil|Cuit(*)" class="form-control" id="" name="cuilcliente" required>
    </div>
  </div>

  <div class="row control-group">
    <div class="form-group col-xs-12 floating-label-form-group controls">
        <label for="">E-mail</label>
        <input placeholder="E-mail" type="email" class="form-control" id="" name="mailcliente" required>
    </div>
  </div>

  <div class="row control-group">
      <div class="form-group col-xs-12 floating-label-form-group controls">
          <label for="">Tipo de cliente</label>
          <?php  include "includes/select_multiple/index_select_tipocliente.php" ?>
      </div>
  </div>

  <div class="row control-group">
      <div class="form-group col-xs-12 floating-label-form-group controls">
          <label for="">Provincia</label>
          <?php  include "includes/select_multiple/index_select_provincia.php" ?>
      </div>
  </div>

  <div class="row control-group">
      <div class="form-group col-xs-12 floating-label-form-group controls">
          <label for="">Localidad</label>
          <select class="form-control" name="inputlocalidad" id="inputlocalidad"></select>
      </div>
  </div>

</div>

<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

 <div class="row control-group">
        <div class="form-group col-xs-12 floating-label-form-group controls">
            <label for="">Calle (*)</label>
            <input type="text" class="form-control" placeholder="Calle (*)" id="" name="calle" required>
        </div>
    </div>

    <div class="row control-group">
        <div class="form-group col-xs-12 floating-label-form-group controls">
            <label for="">N&uacute;mero (*)</label>
            <input type="text" class="form-control" placeholder="N&uacute;mero (*)" id="" name="numero" required>
        </div>
    </div>

    <div class="row control-group">
       <div class="form-group col-xs-12 floating-label-form-group controls">
        <label for="">Tel&eacute;fono</label>
        <input type="text" class="form-control" placeholder="Tel&eacute;fono" id="" name="telefonocliente">
      </div>
    </div>

    <div class="row control-group">
       <div class="form-group col-xs-12 floating-label-form-group controls">
          <label for="">Barrio</label>
          <input type="text" class="form-control" placeholder="Barrio"  id="" name="barrio">
        </div>
    </div>

  <div class="row control-group">
    <div class="form-group col-xs-12 floating-label-form-group controls">
        <label for="">Manzana</label>
        <input type="text" class="form-control" placeholder="Manzana" id="" name="manzana">
    </div>
  </div>


    <br>
  </div>
  <legend></legend>
  <div id="success"></div>
      <div class="row">
        <div class="form-group col-xs-12">
          <button type="submit" class="btn boton-send btn-info pull-right btn-lg">Aceptar</button>
        </div>
      </div>
</form>
