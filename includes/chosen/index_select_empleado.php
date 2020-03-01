<?php
 mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

  $q_empleados=mysql_query("SELECT * FROM empleado ORDER BY idempleado");
?>
  <select data-placeholder="Empleados" class="form-control chosen-select" tabindex="4" name="idempleado" id="inputidempleado">
      <option value="">Seleccione un empleado</option>
      <?php
      while ($row_empleado=mysql_fetch_array($q_empleados)){
        ?>
          <option value="<?php echo $row_empleado['idempleado']?>"> 
    <?php echo $row_empleado['apellidoempleado'] ?><?php echo ", " ?><?php echo $row_empleado['nombreempleado'] ?> </option>
    
<?php } ?>
  </select>


  <script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'No encontrado'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
  </script>

      <script type="text/javascript">
    $('select#inputidempleado').on('change',function(){
    var idproveedorjs = $(this).val();
    $.post("includes/obtenerempleado.php", { idempleadojs: idempleadojs }, function(data){
                $("#inputcuilempleado").val(data);
            });
    });
    </script>


