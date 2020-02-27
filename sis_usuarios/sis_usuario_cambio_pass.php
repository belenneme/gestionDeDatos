<?php 
mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

$idusuario=$_SESSION["idusuario"];
$usuario = "SELECT * FROM usuario WHERE idusuario=$idusuario";
$q_usuario = mysql_query($usuario);
$row_usuario = mysql_fetch_array($q_usuario);

     if (MD5($_POST["pass_actual"]) == $row_usuario['password']) {
          if(MD5($_POST["pass_nuevo"]) == MD5($_POST["pass_nuevo_conf"])){
               $pass=MD5($_POST['pass_nuevo_conf']); 
               $actualizar = "UPDATE usuario SET password='$pass' WHERE idusuario = $idusuario";
               mysql_query($actualizar);               
               ?>
               <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="knob-container">
                               <img src="images/icono_ok_grande.png">
                                <h3 class="text-muted text-center"></h3>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="knob-container">
                                <h3 class="text-muted text-center">Edici&oacuten exitosa!</h3>
                            </div>
                        </div>                    
                    </div>
               <?php  
          }
          else{
               echo"<script>alert('Las contrase\u00f1as nuevas no coniciden.');
               window.location.href=\"usuario_contrasena.php\"</script>";     
          }     
                      
     }     
     else{
          echo"<script>alert('La contrase\u00f1a del usuario es incorrecta.');
               window.location.href=\"usuario_contrasena.php\"</script>";
     }


?>
