<?php
  header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
  header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado
?>
 <div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
        <!-- MENU DESDE EL CELULAR -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
           <span class="sr-only">Navegación</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a href="principal.php"><span class="navbar-brand"><strong>Ferreteria El Pasaje Materiales </strong>| Sistema de Gesti&oacute;n</span></a>
        </div>

        <div class="navbar-collapse collapse" style="height: 2px;">
          <ul id="main-menu" class="nav navbar-nav navbar-right">
            <li class="dropdown hidden-xs">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-user padding-right-small" style="position:relative;top: 1px;"></span>
                    <font style="text-transform: uppercase;"><STRONG><?php echo $_SESSION["usuarioactual"]; ?></STRONG></font>

                    <i class="fa fa-caret-down"></i>
                </a>

              <ul class="dropdown-menu">
                <!--<li><a href="#">Mi cuenta</a></li>-->
                <!--<li class="divider"></li>-->
                <!--<li class="dropdown-header">Mis Datos</li>-->
                <li><a href="usuario_perfil.php">Perfil</a></li>
                <li class="divider"></li>
                <li><a href="sis_logout.php">Salir</a></li>
              </ul>
            </li>
          </ul>

        </div>
  </div>
