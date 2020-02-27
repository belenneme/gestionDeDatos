<?php

  $num_total_registros = mysql_num_rows($q_consulta);
  $importe=0;
  if ($num_total_registros>0) {?>
    <?php

      while ($row_consulta=mysql_fetch_array($q_consulta)) { ?>
      <tr>
        <td><?php echo $row_consulta['idproducto'] ?></td>
        <td><?php echo $row_consulta['nombreproducto'] ?><?php echo $row_consulta['marca'] ?><?php echo " "?></td>
        <td><?php echo $row_consulta['precioventa'] ?></td>
        <td><?php echo $row_consulta['cantidad'] ?></td>
        <td><?php echo $row_consulta['subtotallineaventa'] ?></td>
        <td align="center"><a href="venta_borrar_linea.php?idlineaventa=<?php echo $row_consulta['idlineaventa'] ?>"><button type="button" class= "btn btn-primary btn-xs"><span class="glyphicon glyphicon-trash"></span></button></a></td>
      </tr>
      <?php $importe=$importe + $row_consulta['subtotallineaventa'];?>
   <?php  }
   }
   else { ?>
   <td colspan="6">No hay productos cargados</td>
   <?php }?>
