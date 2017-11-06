<?php
  $pv = $_SESSION['user']['produccion_ver'];
  $cv =  $_SESSION['user']['cobranza_ver'];
  $clv = $_SESSION['user']['cliente_ver'];
  $admin = $_SESSION['user']['privilegiosUsuario'] == "Administrador";

  // $priv_produccion = $pv == "1" && $cv == "0" && $clv == "0";
  // $priv_clientes =  $clv == "1" && $pv == "0" && $cv == "0";
  // $priv_cobranza =  $cv == "1" && $clv == "0" && $pv == "0";
  // $priv_pcl = $pv && $clv == "1"  && $cv == "0";
  // $priv_cp = $cv && $pv == "1" && $clv == "0";
  // $priv_ccl = $clv && $cv == "1" && $pv == "0";
  // $priv_todos = $clv && $cv && $pv == "1";


  $priv_todos = true;

?>
  <head>
    <meta charset="utf-8">
    <title>Fit&amp;Co Solutions</title>
    <link rel="stylesheet" href="/fitcoControl/Resources/bootstrap/css/reset.css">
    <link rel="stylesheet" href="/fitcoControl/Resources/css/barranavegacion.css">
    <link rel="stylesheet" href="/fitcoControl/Resources/fontAwesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/fitcoControl/Resources/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/fitcoControl/Resources/css/Pagina.css">
    <link rel="stylesheet" href="/fitcoControl/Resources/css/Inputs.css">
    <link rel="stylesheet" href="/fitcoControl/Resources/css/modales.css">
    <link rel="stylesheet" href="/fitcoControl/Resources/css/sweetalert.css">

    <link rel="stylesheet" href="/fitcoControl/Resources/bootstrap/alertifyjs/css/alertify.min.css">
    <link rel="stylesheet" href="/fitcoControl/Resources/bootstrap/alertifyjs/css/themes/default.css">


    <script src="/fitcoControl/Resources/bootstrap/alertifyjs/alertify.min.js"></script>
    <script src="/fitcoControl/Resources/jquery/sweetalert.min.js"></script>
    <script src="/fitcoControl/Resources/jquery/jquery.min.js"></script>
    <script src="/fitcoControl/Resources/jquery/popper.min.js"></script>
    <script src="/fitcoControl/Resources/bootstrap/js/bootstrap.min.js"></script>
    <script src="/fitcoControl/Resources/jquery/tether.min.js"></script>
  </head>

  <div id="nav_wrap" class="sticky">
    <h1 id="logo" style="left: 3%; transition: 0.5s;">FIT&amp;CO</h1>
    <nav class="nav_animate">

    <ul class="nav nav-pills nav-fill">

      <?php if ($pv == 1 || $admin): ?>
        <li class="nav-item"><a href="/fitcoControl/Ubicaciones/Produccion/produccion.php" class="w-95">PRODUCCION</a></li>
      <?php else: ?>
        <li class="nav-item"><a class="bloqueo w-95">PRODUCCION</a></li>
      <?php endif; ?>

      <?php if ($cv == 1 || $admin): ?>
        <li class="nav-item"><a href="/fitcoControl/Ubicaciones/Cobranza/cobranza.php" class="w-95">TESORERÍA</a></li>
      <?php else: ?>
        <li class="nav-item"><a class="bloqueo w-95">COBRANZA</a></li>
      <?php endif; ?>

      <?php if ($clv == 1 || $admin): ?>
        <li class="nav-item"><a href="/fitcoControl/Ubicaciones/Clientes/Clientes.php" class="w-95">CLIENTES</a></li>
      <?php else: ?>
        <li class="nav-item"><a class="bloqueo w-95">CLIENTES</a></li>
      <?php endif; ?>

      <?php if ($admin): ?>
        <li class="nav-item"><a href="/fitcoControl/Ubicaciones/Usuarios/Usuarios.php" class="w-95">USUARIOS</a></li>
      <?php else: ?>
        <li class="nav-item"><a class="bloqueo w-95">USUARIOS</a></li>
      <?php endif; ?>



      <li class="nav-item"><a href="/fitcoControl/Resources/PHP/Login/CerrarSesion.php" class="w-95">CERRAR SESION</a></li>
    </ul>
  </nav>
</div>
