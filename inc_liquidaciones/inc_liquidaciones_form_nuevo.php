<?php require_once('Connections/conexion_compucentro.php'); ?>
<?php include('sis_acceso_ok.php'); ?>
<?php
    mysql_select_db($database_conexion_compucentro, $conexion_compucentro);
    $q_empleado=mysql_query("SELECT idempleado,nombreempleado,apellidoempleado FROM empleado");

?>
<form ACTION="liquidacion_alta_ok_nuevo.php" METHOD="POST" class="form-"  onsubmit="return validar()">
  <div class="row control-group">
    <div class="form-group controls col-xs-12 col-sm-6 col-md-6 col-lg-3 col-sm-offset-6 col-md-offset-6 col-lg-offset-9">
        <input type="text" name="fechaliquidacion" id="inputFechaLiquidacion" class="form-control" value="<?php echo date("Y-m-d h:i:s");?>" required="required" readonly>
    </div>
  </div>
Nueva Liquidacion
<legend></legend>

  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="row control-group">
      <div class="form-group controls col-xs-12 col-sm-6 col-md-6 col-lg-6">


 <div class="row control-group">
    <div class="form-group col-xs-12 floating-label-form-group controls">
        <label for="">Descripcion</label>
  Descripcion de Liquidacion
       <input class="form-control" name="descripcion" id="inputDescripcion" class="form-control" required="required" placeholder="Descripcion" required>
    </div>
</div>


<div class="row control-group">
    <div class="form-group col-xs-12 floating-label-form-group controls">
        <label for="">Tipo de liquidación</label>
        <?php  include "includes/chosen/index_select_tipoliquidacion.php" ?>
    </div>
</div>

<div class="row control-group">

    <div class="form-group controls col-xs-12 col-sm-6 col-md-6 col-lg-4">
Desde
    											<label class="sr-only" for="">Desde:</label>
    											<input type="date" class="form-control" id="fechadesde" name="fechadesde" required="required" placeholder="Input field">

    </div>
    <div class="form-group controls col-xs-12 col-sm-6 col-md-6 col-lg-4">
Hasta
   										   	    <label class="sr-only" for="">Hasta:</label>
    											<input type="date" class="form-control" id="fechahasta" name="fechahasta" required="required" placeholder="Input field">

    </div>
  </div>

  </div>


  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
  <br>
  <br>

  <input type="submit" name="button" id="button" value="Liquidar" class="btn btn-info pull-right" />

  <button type="button" id="cancelar" class="btn btn-danger btn-primary pull-left btn-md">Cancelar</button>
    </div>
</form>

<script type="text/javascript">
    $('#cancelar').on('click',function(){
    $.post("cancelarcompra.php", {}, function(data){
                 location.reload();
            });
    });
    </script>
<script>
    function validar(){
    var fechadesde = $('#fechadesde').val();
    var fechahasta = $('#fechahasta').val();

    var desde = fechadesde.substring(0, 7);
    var hasta = fechahasta.substring(0, 7);

     if(desde != hasta){
      alert('Debe seleccionar una fechas dentro del mismo mes');
     return false
     }
     if(fechadesde > fechahasta){
       alert('La fecha "Hasta" no puede ser menor')
       return false
     }

}
</script>
