<?php
 
  $num_total_registros = mysql_num_rows($q_liquidacion);
  if ($num_total_registros>0) {?>
  <table class="table">
      <tr>
        <th class="col-xs-1 col-sm-1 col-md-1 col-lg-1">id</th>
        <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Fecha</th>
        <th class="col-xs-3 col-sm-3 col-md-3 col-lg-3">Desde</th>
        <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Hasta`</th>
        <th class="col-xs-1 col-sm-1 col-md-1 col-lg-1">Tipo</th>
        <th class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></th>
      </tr>
    <?php

      while ($row_consulta=mysql_fetch_array($q_liquidacion)) {
        ?>
      <tr>
        <td><?php echo $row_consulta['idliquidacion'] ?></td>
        <td><?php echo $row_consulta['fechaliquidacion'] ?></td>
        <td><?php echo $row_consulta['desde'] ?></td>
        <td><?php echo $row_consulta['hasta'] ?></td>
        <td align="center"><?php echo $row_consulta['descripcion'] ?></td>
      </tr>
   <?php  } ?>
   </table>


   <?php }?>

   