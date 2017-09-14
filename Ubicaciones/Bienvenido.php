<?php
  session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Fit&Co Solutions</title>
    <link rel="stylesheet" href="/fitcoControl/Resources/css/reset.css">
    <link rel="stylesheet" href="/fitcoControl/Resources/css/barranavegacion.css">
    <link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css'>

  </head>
  <body>
    <div id="bienvenida">
      <h1 id="logo">FIT&CO</h1>
      <nav>
        <a href="/fitcoControl/Ubicaciones/Produccion/produccion.php" class="transicion">PRODUCCIÓN</a>
        <a href="/fitcoControl/Ubicaciones/Cobranza/cobranza.php" class="transicion">COBRANZA</a>
        <a href="/fitcoControl/Ubicaciones/Clientes/Clientes.php" class="transicion">CLIENTES</a>
        <a href="/fitcoControl/Ubicaciones/Usuarios/Usuarios.php" class="transicion">USUARIOS</a>
        <a href="/fitcoControl/Resources/PHP/Login/CerrarSesion.php" class="transicion">CERRAR SESION</a>
      </nav>
    </div>

    <section id="homesec">
      <div id="mainlogo">FIT&CO<br>
        <div id="mainsocial">
          Bienvenido, <?php echo $_SESSION['u_usuario']; ?>
        </div>
      </div>
    </section>


    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="/fitcoControl/Resources/js/index.js"></script>
    <script src="/fitcoControl/Resources/jquery/popper.min.js"></script>

  </body>
</html>
