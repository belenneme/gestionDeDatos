<?php
 mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

  $q_clientes=mysql_query("SELECT * FROM cliente
  INNER JOIN tipo ON tipo_idtipo=idtipo
  INNER JOIN direccion ON direccion_iddireccion=iddireccion
  INNER JOIN localidad ON localidad_idlocalidad=idlocalidad
  INNER JOIN provincia ON provincia_idprovincia=idprovincia
  WHERE estado=1
  ORDER BY nombreorsocial");
?>
  <select data-placeholder="Clientes" class="form-control chosen-select" tabindex="4" name="idcliente" id="inputidcliente">
      <option value="">Seleccione un Cliente</option>
      <?php
      while ($row_cliente=mysql_fetch_array($q_clientes)){
        if ($row_cliente['idcliente']==1) {?>
          <option value="<?php echo $row_cliente['idcliente']?>" selected><?php echo $row_cliente['nombreorsocial']?></option>
       <?php }
       else{
        ?>
        <option value="<?php echo $row_cliente['idcliente']?>"><?php echo $row_cliente['nombreorsocial']?></option>
      <?php } 
      } ?>
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
    $('select#inputidcliente').on('change',function(){
    var idclientejs = $(this).val();
    $.post("includes/obtenercliente.php", { idclientejs: idclientejs }, function(data){
                var devuelve=data.split(",");
                var cuil = devuelve[0];
                var tipo = devuelve[1];
                $("#inputcuilcliente").val(cuil);
                $("#inputtipo").val(tipo);
            });
    });
    </script>
