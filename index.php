<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Fit&amp;Co Solutions</title>
    <link rel="stylesheet" href="/fitcoControl/Resources/css/login.css">
    <link rel="stylesheet" href="/fitcoControl/Resources/css/sweetalert.css">

  </head>
  <body>
    <div id="login-button">
      <img src="/fitcoControl/Resources/iconos/002-user.svg">
      </img>
    </div>
    <div id="container">
      <h1>Fit&amp;Co</h1>
      <span class="close-btn">
        <img src="/fitcoControl/Resources/iconos/001-cerrar.svg"></img>
      </span>

    <div class="login-form-1">
      <form id="login-form" class="text-left" onsubmit="return false;" method="post">
        <input type="text" name="lg_usuario" placeholder="Usuario" id="lg_usuario" required>

        <input type="password" name="lg_password" placeholder="Contraseña" id="lg_password" required>

        <input type="submit" value="Ingresar">
      </form>
    </div>


    <script src="/fitcoControl/Resources/jquery/jquery.min.js"></script>
    <script src="/fitcoControl/Resources/jquery/sweetalert.min.js"></script>
    <script src="/fitcoControl/Resources/jquery/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="/fitcoControl/Resources/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>

<?php
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/footer.php';
?>
