<?php
 mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

  $q_tipoliquidacion=mysql_query("SELECT * FROM tipoliquidacion
  ORDER BY idtipoliquidacion");
?>
<select name="tipoliquidacion" id="input" class="form-control" required="required">
  <option value="0">Tipo de Liquidacion</option>
  <?php
  while ($row_tipoliquidacion = mysql_fetch_array($q_tipoliquidacion)) {?>
    <option value="<?php echo $row_tipoliquidacion['idtipoliquidacion']?>"> 
    <?php echo $row_tipoliquidacion['descripcion'] ?> </option>
<?php } ?>
  </select>
  <?php echo $row_tipoliquidacion['id'] ?> </option>
  