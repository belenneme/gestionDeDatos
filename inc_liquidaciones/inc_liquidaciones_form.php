<?php require_once('Connections/conexion_compucentro.php'); ?>
<?php include('sis_acceso_ok.php'); ?>
<?php
    mysql_select_db($database_conexion_compucentro, $conexion_compucentro);
    $q_empleado=mysql_query("SELECT idempleado,nombreempleado,apellidoempleado FROM empleado");
    $q_concepto=mysql_query("SELECT idconcepto,descripcionconcepto FROM concepto");
?>
<form class="" action="liquidacion_alta_ok.php" method="POST" class="form-inline" role=form onsubmit="return verificar();" onsubmit="validad();">

<div id="selectempleado" class="form-group">
		<label>Empleados:</label>
		<select name="idempleado" id="idempleado" multiple class='form-control'>
		<?php
		while ($row_empleado=mysql_fetch_array($q_empleado)) {
				?>
				 <option value="<?php echo $row_empleado['idempleado'] ?>"><?php echo $row_empleado['nombreempleado'] ?><?php echo  $row_empleado['apellidoempleado']?></option>
		 <?php } ?>
		</select>
</div>

<div id="selectconcepto" class="form-group">
		<label>Conceptos:</label>
		<select name="idconcepto" id="idconcepto" multiple class='form-control'>
		<?php
		while ($row_concepto=mysql_fetch_array($q_concepto)) {
				?>
				 <option value="<?php echo $row_concepto['idconcepto'] ?>"><?php echo $row_concepto['descripcionconcepto'] ?></option>
		 <?php } ?>
		</select>
</div>
<div class="form-group">
											<label class="sr-only" for="">Fecha de Liquidacion:</label>
											<input type="date" class="form-control" id="fechaliquidacion" name="fechaliquidacion" placeholder="Input field">
                      <input type="hidden" name="verifica" id="inputverifica" class="form-control" value="">


</div>

<div id="success"></div>
<button id="reset" class="btn btn-default">Limpiar</button>
<button id="habilitar" type='submit' class="btn btn-default pull-right" onclick="liquidar()">Aceptar</button>
</div>
</div>

</form>


    <script type="text/javascript">

    function liquidar(){
      var fechaliquidacionjs = $('#fechaliquidacion').val();
      $.post("includes/validarperiodo.php", { fechaliquidacionjs: fechaliquidacionjs }, function(data){
                  $("#inputverifica").val(data);

              });
      var selectedempleado= $('#idempleado').val();
      var selectedconcepto= $('#idconcepto').val();
      $post("includes/inc_liquidacion_alta_ok.php", {fechaliquidacion: fechaliquidacion, selectedempleado: selectedempleado, selectedconcepto:selectedconcepto})
    );
    }

    $('#fechaliquidacion').on('change',function(){
    var fechaliquidacionjs = $('#fechaliquidacion').val();
    alert (fechaliquidacion);
    $.post("includes/validarperiodo.php", { fechaliquidacionjs: fechaliquidacionjs }, function(data){
                $("#inputverifica").val(data);
            });
    });
    </script>
