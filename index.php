<?php require_once('Connections/conexion_compucentro.php'); ?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" type="image/jpg" href="images/logo1.jpg" />
  <title>El Pasaje Materiales</title>
  <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Open+Sans:600'>
  <link rel="stylesheet" href="lib/css/style.css">

</head>

<body>
  <div class="login-wrap">
  <div class="login-html">
    <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Inicio de sesi&oacute;n</label>
    <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
    <div class="login-form">
      <div class="sign-in-htm">
        <div class="group">
         <form ACTION="sis_acceso_control.php" METHOD="POST" id="conecta">
          <label for="user" class="label">Usuario</label>
          <input name="usuario" type="text" class="input" id="usuario">
        </div>
        <div class="group">
          <label for="pass" class="label">Contraseña</label>
          <input name="pass" type="password" class="input" data-type="password" id="pass">
        </div>
        <div class="group">
          <input id="check" type="checkbox" class="check" checked>
          <label for="check"><span class="icon"></span> Recuerdame</label>
        </div>
        <div class="group">
          <input type="submit" class="button" value="Sign In">
        </div>
        <div class="hr"></div>
        <center> <img src="images/logo1.jpg" width="150" height="150"> </center>
      </div>
    </div>
  </div>
</div>


</body>
</html>
