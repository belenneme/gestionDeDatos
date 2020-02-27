<form class="form" method="POST" action="inc_liquidaciones/libro_sueldo_pdf.php" role="form" >
  <br></br>
  <div class="row control-group">
    <div class="form-group controls col-xs-12 col-sm-6 col-md-6 col-lg-3 col-sm-offset-6 col-md-offset-6 col-lg-offset-9">
        <input type="text" name="fechaliquidacion" id="inputFechaLiquidacion" class="form-control" value="<?php echo date("Y-m-d h:i:s");?>" required="required" readonly>
    </div>
  </div>


    <div class="form-group controls col-xs-12 col-sm-6 col-md-6 col-lg-4">
Desde
    											<label class="sr-only" for="">Desde:</label>
    											<input type="date" class="form-control" id="fechaliquidacion" name="fechadesde" placeholder="Input field">
                          <input type="hidden" name="verifica" id="inputverificafechainicio" class="form-control" value="">

    </div>
    <div class="form-group controls col-xs-12 col-sm-6 col-md-6 col-lg-4">
Hasta
   										   	<label class="sr-only" for="">Hasta:</label>
    											<input type="date" class="form-control" id="fechaliquidacion" name="fechahasta" placeholder="Input field">
                          <input type="hidden" name="verifica" id="inputverificafechafin" class="form-control" value="">

    </div>
<br></br>

  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
  <br>
  <br>

  <button type="submit" class="btn boton-send btn-info pull-right btn-md" >Generar Reporte</button>
    </div>
</form>
