<?php mysql_select_db($database_conexion_compucentro,$conexion_compucentro);
$q_empleado=mysql_query("SELECT idempleado,nombreempleado,apellidoempleado FROM empleado");
?>
<form class="form" method="POST" action="inc_liquidaciones/boleta_pdf.php" role="form" >

  <div class="row control-group">
    <div class="form-group controls col-xs-12 col-sm-6 col-md-6 col-lg-3 col-sm-offset-6 col-md-offset-6 col-lg-offset-9">
        <input type="text" name="fechaliquidacion" id="inputFechaLiquidacion" class="form-control" value="<?php echo date("Y-m-d h:i:s");?>" required="required" readonly>
    </div>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="row control-group">
      <div class="form-group controls col-xs-12 col-sm-6 col-md-6 col-lg-6">
          Apellido y nombre del empleado
          <div class="clearfix"></div>
          <?php include "includes/chosen/index_select_empleado.php" ?>
      </div>
    </div>
    <div class="row control-group">
      <div class="form-group controls col-xs-12 col-sm-6 col-md-6 col-lg-6">
          Tipo de Liquidacion
          <div class="clearfix"></div>
          <?php include "includes/chosen/index_select_liquidacion.php" ?>
      </div>
    </div>
    <div class="row control-group">
    <div class="form-group col-xs-12 floating-label-form-group controls">
        Mes Liquidacion
        <div class="clearfix"></div>
        <select name="desde" id="" class="form-control">
          <option value="01" selected>Enero</option>
          <option value="02">Febrero</option>
          <option value="03">Marzo</option>
          <option value="04">Abril</option>
          <option value="05">Mayo</option>
          <option value="06">Junio</option>
          <option value="07">Julio</option>
          <option value="08">Agosto</option>
          <option value="09">Septiembre</option>
          <option value="10">Octubre</option>
          <option value="11">Noviembre</option>
          <option value="12">Diciembre</option>
        </select>
    </div>
  </div>
    


  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
  <br>
  <br>

  <button type="submit" class="btn boton-send btn-info pull-right btn-md" >Generar Reporte</button>

    </div>
</form>
