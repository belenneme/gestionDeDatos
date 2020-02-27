<?php
mysql_select_db($database_conexion_compucentro,$conexion_compucentro);
    $q_banco=mysql_query("SELECT * FROM banco")
    or die(mysql_error());
?>

<form action="empleado_alta_ok.php" method="POST" role="form">
<legend>Datos del Empleado</legend>

<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
<h3>Datos Personales</h3>
  <div class="row control-group">
    <div class="form-group col-xs-12 floating-label-form-group controls">
        <label for="">Apellido (*)</label>
        <input type="text" class="form-control" placeholder="Apellido (*)" id="" name="apellidoempleado" required>
    </div>
  </div>

  <div class="row control-group">
    <div class="form-group col-xs-12 floating-label-form-group controls">
        <label for="">Nombre (*)</label>
        <input  type="text" placeholder="Nombre (*)" class="form-control" id="" name="nombreempleado" required>
    </div>
  </div>

  <div class="row control-group">
    <div class="form-group col-xs-12 floating-label-form-group controls">
        <label for="">Dni(*)</label>
        <input placeholder="Dni (*)" type="text" class="form-control" id="" name="dniempleado">
    </div>
  </div>

  <div class="row control-group">
    <div class="form-group col-xs-12 floating-label-form-group controls">
        <label for="">Cuil(*)</label>
        <input placeholder="Cuil (*)" type="text" class="form-control" id="" name="cuilempleado">
    </div>
  </div>


 <div class="row control-group">
       <div class="form-group col-xs-12 floating-label-form-group controls">
        <label for="">Tel&eacute;fono</label>
        <input type="text" class="form-control" placeholder="Tel&eacute;fono" id="" name="telefonoempleado">
      </div>
  </div>

  <div class="row control-group">
    <div class="form-group col-xs-12 floating-label-form-group controls">
        Estado Civil
        <div class="clearfix"></div>
        <select name="estadocivilempleado" id="" class="form-control">
          <option value="Soltero" selected>Soltero</option>
          <option value="Casado">Casado</option>
          <option value="Divorciado">Divorciado</option>
          <option value="Viudo">Viudo</option>
        </select>
    </div>
  </div>



  <div class="row control-group">
       <div class="form-group col-xs-12 floating-label-form-group controls">
        Fecha de nacimiento
        <input type="date" name="fechanacimiento" id="inputFecha" class="form-control" value="" required="required" title="">
      </div>
  </div>

  <div class="row control-group">
    <div class="form-group floating-label-form-group controls col-xs-12 col-sm-12 col-md-6 col-lg-6">
        Categor&iacute;a
        <?php include "includes/select_simple/inc_select_categoriaempleado.php" ?>
    </div>
  </div>

  <div class="row control-group">
    <div class="form-group col-xs-12 floating-label-form-group controls">
        Nivel
        <div class="clearfix"></div>
        <select name="nivel" id="" class="form-control">
          <option value="1" selected>1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
    </div>
  </div>

    <?php /** <div class="row control-group">
    <div class="form-group floating-label-form-group controls col-xs-12 col-sm-12 col-md-6 col-lg-6">
        Horas Trabajadas
        <?php include "includes/select_simple/inc_select_jornal.php" ?>
    </div>
  </div>
  **/?>


  </div>

<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
<h3>Domicilio</h3>
    <div class="row control-group">
      <div class="form-group col-xs-12 floating-label-form-group controls">
          <label for="">Provincia</label>
          <?php  include "includes/select_multiple/index_select_provincia.php" ?>
      </div>
  </div>

  <div class="row control-group">
      <div class="form-group col-xs-12 floating-label-form-group controls">
          <label for="">Localidad</label>
          <select class="form-control" name="inputlocalidad" id="inputlocalidad" required ></select>
      </div>
  </div>
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
  <div class="row control-group">
    <div class="form-group col-xs-12 floating-label-form-group controls">
        Banco
        <div class="clearfix"></div>
        <select class='form-control' name="idbanco">
        <?php
        while ($row_banco=mysql_fetch_array($q_banco)){
          ?>
          <option value="<?php echo $row_banco['idbanco']?>"><?php echo $row_banco['nombre'] ?></option>
        <?php      }?>
        </select>
    </div>

    <div class="row control-group">
      <div class="form-group col-xs-12 floating-label-form-group controls">
          <label for="">CBU</label>
          <input type="text" class="form-control" placeholder="Nro de Caja de Ahorro" id="" name="cajadeahorro">
      </div>
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
