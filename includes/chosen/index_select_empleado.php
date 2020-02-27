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


