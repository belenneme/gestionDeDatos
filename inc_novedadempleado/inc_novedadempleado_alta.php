<?php mysql_select_db($database_conexion_compucentro,$conexion_compucentro);
  
  $novedad=mysql_query("SELECT * FROM novedad ORDER BY idNovedad DESC LIMIT 0,1");
  $row_novedad=mysql_fetch_array($novedad);

  $ult_novedad=$row_novedad['idNovedad']+1;

?>
<form action="novedadempleado_alta_ok.php" method="POST" role="form">
<legend>Datos Nueva Novedad</legend>

<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
  <div class="row control-group">
       <div class="form-group floating-label-form-group controls col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <label for="">Fecha Novedad</label>
        <input type="date" class="form-control" id="fechanovedad" name="fechanovedad" placeholder="Input field">
        </div>
    
        <div class="row control-group">
      <div class="form-group controls col-xs-12 col-sm-6 col-md-6 col-lg-6">
          Nombre Empleado
          <div class="clearfix"></div>
          <?php include "includes/chosen/index_select_empleado.php" ?>
      </div>
    </div>
        <div class="form-group floating-label-form-group controls col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <label for="">Falta</label>
        <input type="text" class="form-control" placeholder="Cantidad Faltas" id="" name="falta" required>
        </div>
        <div class="form-group floating-label-form-group controls col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <label for="">Llegada Tarde</label>
        <input type="text" class="form-control" placeholder="Cantidad LLegada Tarde" id="" name="llegadaTarde" required>
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