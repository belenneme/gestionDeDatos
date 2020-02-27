
<?php 
  mysql_select_db($database_conexion_compucentro,$conexion_compucentro);
  $provincia="SELECT * FROM provincia ORDER BY nombreprovincia";
  $q_provincia=mysql_query($provincia);  

?>    
    <select name="inputProvincia" id="inputProvincia" class="form-control" required="required">
    <option value="0">Provincia</option>
    <?php 
      while ($row_provincia=mysql_fetch_array($q_provincia)) { ?>
          <option value="<?php echo $row_provincia['idprovincia']?>"><?php echo $row_provincia['nombreprovincia']?></option>
      <?php }
      ?>
    </select> 
        
  <script type="text/javascript">
    $('select#inputProvincia').on('change',function(){
    var idprovinciajs = $(this).val();
    $.post("includes/select_multiple/localidades.php", { idprovinciajs: idprovinciajs }, function(data){
                $("#inputlocalidad").html(data);
            });
    });
    </script>

