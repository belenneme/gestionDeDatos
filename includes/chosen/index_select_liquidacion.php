<?php

 mysql_select_db($database_conexion_compucentro,$conexion_compucentro);
    
  $q_liquidaciones=mysql_query("SELECT * FROM liquidacion 
                
                                ORDER BY idliquidacion");
?>
  <select data-placeholder="Liquidacion" class="form-control chosen-select" tabindex="4" name="idliquidacion" id="inputididliquidacion">
      <option value="">Seleccione una Liquidacion</option>
      <?php
      while ($row_liquidaciones=mysql_fetch_array($q_liquidaciones)){
        ?>
          <option value="<?php echo $row_liquidaciones['idliquidacion']?>"> 
            <?php echo $row_liquidaciones['descripcionliq'] ?> </option>
    
<?php } ?>
  </select>