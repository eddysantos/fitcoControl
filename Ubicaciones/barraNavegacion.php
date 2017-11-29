<?php
  $pv = $_SESSION['user']['produccion_ver'];
  $cv =  $_SESSION['user']['cobranza_ver'];
  $clv = $_SESSION['user']['cliente_ver'];
  $admin = $_SESSION['user']['privilegiosUsuario'] == "Administrador";
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
  <nav class="nav_animate">

    <ul class="nav nav-pills nav-fill">
      <!-- <li class="nav-item">
        <a class="noborder"><h1 id="logo" style="">FIT&amp;CO</h1></a>
      </li> -->

      <?php if ($admin): ?>
        <li class="nav-item"><a href="/fitcoControl/Ubicaciones/Usuarios/Usuarios.php">USUARIOS <span class="barra">DIVISIÓN 1</span></a></li>
      <?php else: ?>
        <li class="nav-item"><a class="bloqueo w-95">USUARIOS (DIV 1)</a></li>
      <?php endif; ?>

      <?php if ($clv == 1 || $admin): ?>
        <li class="nav-item"><a href="/fitcoControl/Ubicaciones/Clientes/Clientes.php" >CLIENTES <span class="barra">DIVISIÓN 2</span></a></li>
      <?php else: ?>
        <li class="nav-item"><a class="bloqueo w-95">CLIENTES (DIV 2)</a></li>
      <?php endif; ?>

      <?php if ($cv == 1 || $admin): ?>
        <li class="nav-item"><a href="/fitcoControl/Ubicaciones/Cobranza/cobranza.php" >TESORERÍA <span class="barra">DIVISIÓN 3</span></a></li>
      <?php else: ?>
        <li class="nav-item"><a class="bloqueo w-95">TESORERÍA (DIV 3)</a></li>
      <?php endif; ?>

      <?php if ($pv == 1 || $admin): ?>
        <li class="nav-item"><a href="/fitcoControl/Ubicaciones/Produccion/produccion.php">PRODUCCIÓN <span class="barra">DIVISIÓN 4</span></a></li>
      <?php else: ?>
        <li class="nav-item"><a class="bloqueo w-95">PRODUCCIÓN (DIV 4)</a></li>
      <?php endif; ?>

      <li class="nav-item"><a href="#" >CONTROL DE CALIDAD <span class="barra">DIVISIÓN 5</span></a></li>
      <li class="nav-item"><a href="/fitcoControl/Ubicaciones/Ventas/Ventas.php" >VENTAS <span class="barra">DIVISIÓN 6</span></a></li>
      <!-- <li class="nav-item"><a class="noborder" href="/fitcoControl/Resources/PHP/Login/CerrarSesion.php" ><img src="/fitcoControl/Resources/iconos/001-close-1.svg" alt="Cerrar Sesión"></a></li> -->
    </ul>
  </nav>
</div>
