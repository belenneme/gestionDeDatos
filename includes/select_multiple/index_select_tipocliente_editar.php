<?php
	mysql_select_db($database_conexion_compucentro,$conexion_compucentro);
	$tipo = "SELECT * FROM tipo";
	$q_tipo = mysql_query($tipo);
?>
	<select name="tipo" id="input" class="form-control" required="required">
    <?php
		while ($row_tipo = mysql_fetch_array($q_tipo)) {
			if ($row_cliente['tipo_idtipo']==$row_tipo['idtipo']) {?>
				<option value="<?php echo $row_tipo['idtipo']?>" selected> <?php echo $row_tipo['tiponombre'] ?> </option>
	<?php 	} else{ ?>
<option value="<?php echo $row_tipo['idtipo']?>"> <?php echo $row_tipo['tiponombre'] ?> </option>
	<?php }
		}?>
    </select>
