
<?php 
  mysql_select_db($database_conexion_compucentro,$conexion_compucentro);
  $categoria="SELECT * FROM categoriaproducto ORDER BY idcategoriaproducto";
  $q_categoria=mysql_query($categoria);  

?>    
    <select name="idcacategoriaproducto" class="form-control" required="required">
    <option value="0">Selecciona una categoria</option>
    <?php 
      while ($row_categoria=mysql_fetch_array($q_categoria)) { ?>
          <option value="<?php echo $row_categoria['idcategoriaproducto'] ?>"><?php echo $row_categoria['nombrecategoria'] ?></option>
      <?php } ?>
    </select> 