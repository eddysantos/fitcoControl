<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Fit&Co Solutions</title>
    <link rel="stylesheet" href="/Fitco/Resources/css/login.css">
  </head>
  <body>
    <div id="login-button">
      <img src="/Fitco/Resources/iconos/002-user.svg">
      </img>
    </div>
    <div id="container">
      <h1>Fit&Co</h1>
      <span class="close-btn">
        <img src="/Fitco/Resources/iconos/001-cerrar.svg"></img>
      </span>

    <div class="text-center">
      <div id="loginError" class="alert alert-danger alert-dismissible fade show" style="display: none" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        Usuario o contraseña incorrectos!
      </div>
    </div>
    <div class="login-form-1">
      <form id="login-form" class="text-left" onsubmit="return false;" method="post">
        <input type="text" name="lg_usuario" placeholder="Usuario" id="lg_usuario" required>

        <input type="password" name="lg_password" placeholder="Contraseña" id="lg_password" required>

        <input type="submit" value="Ingresar">

        <div id="remember-container">
          <input type="checkbox" class="checkbox" checked="checked" id="lg_recordar" name="lg_recordar">
          <span id="remember">Recordar</span>
          <span id="forgotten">Olvidaste tu Contraseña</span>
        </div>
      </form>
    </div>

    <div id="forgotten-container">
      <h1>Ingresa</h1>
      <span class="close-btn">
        <img src="/Fitco/Resources/iconos/001-cerrar.svg"></img>
      </span>
      <form>
        <input type="email" name="email" placeholder="E-Mail">
        <a href="#" class="orange-btn">Nueva Contraseña</a>
      </form>
    </div>


    <script src="/fitcoControl/Resources/jqueryuery/jquery.min.js" charset="utf-8"></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/gsap/1.16.1/TweenMax.min.js'></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="/fitcoControl/Resources/js/login.js"></script>
    <script src="/fitcoControl/Resources/js/Ingresar.js" charset="utf-8"></script>

  </body>
</html>
