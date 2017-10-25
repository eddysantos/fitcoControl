<?php
  session_start();

  if (!isset($_SESSION['user'])) {
    header("Location: /fitcoControl/index.php");
  }

  $pv = $_SESSION['user']['produccion_ver'];
  $cv =  $_SESSION['user']['cobranza_ver'];
  $clv = $_SESSION['user']['cliente_ver'];
  $admin = $_SESSION['user']['privilegiosUsuario']== "Administrador";

  // $priv_produccion = $pv == "1" && $cv == "0" && $clv == "0";
  // $priv_clientes =  $clv == "1" && $pv == "0" && $cv == "0";
  // $priv_cobranza =  $cv == "1" && $clv == "0" && $pv == "0";
  // $priv_pcl = $pv && $clv == "1"  && $cv == "0";
  // $priv_cp = $cv && $pv == "1" && $clv == "0";
  // $priv_ccl = $clv && $cv == "1" && $pv == "0";
  // $priv_todos = $clv && $cv && $pv == "1";
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Fit&amp;Co Solutions</title>
    <link rel="stylesheet" href="/fitcoControl/Resources/css/barranavegacion.css">
    <link rel="stylesheet" href="/fitcoControl/Resources/bootstrap/css/bootstrap.min.css">
    <link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css'>


  </head>
  <style media="screen">
    body{
      background-color: rgb(66, 98, 119)!important;
    }
  </style>
  <body>
    <div id="bienvenida">
      <h1 id="logo">FIT&amp;CO</h1>

      <ul class="nav nav-pills nav-fill">
      <?php if ($pv == 1 || $admin): ?>
        <li class="nav-item">
          <a href="/fitcoControl/Ubicaciones/Produccion/produccion.php" class="transicion">PRODUCCIÓN</a>
        </li>
      <?php else: ?>
        <li class="nav-item">
          <a class="bloqueo">PRODUCCION</a>
        </li>
      <?php endif; ?>


      <?php if ($cv == 1 || $admin): ?>
        <li class="nav-item">
          <a href="/fitcoControl/Ubicaciones/Cobranza/cobranza.php" class="transicion">COBRANZA</a>
        </li>
      <?php else: ?>
        <li class="nav-item">
          <a class="bloqueo">COBRANZA</a>
        </li>
      <?php endif; ?>

      <?php if ($cv == 1 || $admin): ?>
        <li class="nav-item">
          <a href="/fitcoControl/Ubicaciones/Clientes/Clientes.php" class="transicion">CLIENTES</a>
        </li>
      <?php else: ?>
        <li class="nav-item">
          <a class="bloqueo">CLIENTES</a>
        </li>
      <?php endif; ?>

      <?php if ($admin): ?>
        <li class="nav-item">
          <a href="/fitcoControl/Ubicaciones/Usuarios/Usuarios.php" class="transicion">USUARIOS</a>
        </li>
      <?php else: ?>
        <li class="nav-item">
          <a class="bloqueo">USUARIOS</a>
        </li>
      <?php endif; ?>

        <li class="nav-item">
          <a href="/fitcoControl/Resources/PHP/Login/CerrarSesion.php" class="transicion">CERRAR SESION</a>
        </li>
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
