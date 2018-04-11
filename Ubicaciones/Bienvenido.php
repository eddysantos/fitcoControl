<?php
  session_start();
  if (!isset($_SESSION['user'])) {
    header("Location: /fitcoControl/index.php");
  }

  $pv = $_SESSION['user']['produccion_ver'];
  $cv =  $_SESSION['user']['cobranza_ver'];
  $vv = $_SESSION['user']['verVentas'];
  $clv = $_SESSION['user']['cliente_ver'];
  $admin = $_SESSION['user']['privilegiosUsuario']== "Administrador";
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <!-- <meta charset="utf-8"> -->
    <title>Fit&amp;Co Solutions</title>
    <link rel="stylesheet" href="/fitcoControl/Resources/css/barranavegacion.css">
    <link rel="stylesheet" href="/fitcoControl/Resources/bootstrap/css/bootstrap.min.css">


  </head>
  <style media="screen">
    body{
      background-color: rgb(66, 98, 119)!important;
    }
  </style>
  <body>
    <div id="bienvenida">


      <ul class="nav nav-pills nav-fill">

        <!-- <li class="nav-item"><h1 id="logo">FIT&amp;CO</h1></li> -->
      <?php if ($admin): ?>
        <li class="nav-item">
          <a href="/fitcoControl/Ubicaciones/Usuarios/Usuarios.php" class="transicion">USUARIOS<span class="barra gris">DIVISION 1</span></a>
        </li>
      <?php else: ?>
        <li class="nav-item">
          <a class="bloqueo">USUARIOS<span class="barra gris">DIVISION 1</span></a>
        </li>
      <?php endif; ?>


      <?php if ($clv == 1 || $admin): ?>
        <li class="nav-item">
          <a href="/fitcoControl/Ubicaciones/Clientes/Clientes.php" class="transicion">CLIENTES<span class="barra gris">DIVISION 2</span></a>
        </li>
      <?php else: ?>
        <li class="nav-item">
          <a class="bloqueo">CLIENTES<span class="barra gris">DIVISION 2</span></a>
        </li>
      <?php endif; ?>


      <?php if ($cv == 1 || $admin): ?>
        <li class="nav-item">
          <a href="/fitcoControl/Ubicaciones/Cobranza/tesoreria.php" class="transicion">TESORERÍA<span class="barra gris">DIVISION 3</span></a>
        </li>
      <?php else: ?>
        <li class="nav-item">
          <a class="bloqueo">TESORERÍA<span class="barra gris">DIVISION 3</span></a>
        </li>
      <?php endif; ?>


      <?php if ($pv == 1 || $admin): ?>
        <li class="nav-item">
          <a href="/fitcoControl/Ubicaciones/Cobranza/Mantenimiento.php" class="transicion">PRODUCCIÓN<span class="barra gris">DIVISION 4</span></a>
        </li>
      <?php else: ?>
        <li class="nav-item">
          <a class="bloqueo">PRODUCCIÓN<span class="barra gris">DIVISION 4</span></a>
        </li>
      <?php endif; ?>


      <li class="nav-item">
        <a class="bloqueo">CONTROL DE CALIDAD<span class="barra gris">DIVISION 5</span></a>
      </li>

      <?php if ($vv == 1 || $admin): ?>
        <li class="nav-item">
          <a href="/fitcoControl/Ubicaciones/Ventas/Ventas.php" class="transicion">VENTAS<span class="barra gris">DIVISION 6</span></a>
        </li>
      <?php else: ?>
        <li class="nav-item">
          <a class="bloqueo">VENTAS<span class="barra gris">DIVISION 6</span></a>
        </li>
      <?php endif; ?>
      </ul>
    </div>

    <section id="homesec">
      <div id="mainlogo">FIT&amp;CO<br>
        <div id="mainsocial">
          Bienvenido, <?php echo $_SESSION['user']['nombreUsuario']; ?>
        </div>
      </div>
    </section>


    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="/fitcoControl/Resources/js/index.js"></script>
    <script src="/fitcoControl/Resources/jquery/popper.min.js"></script>

  </body>
</html>
