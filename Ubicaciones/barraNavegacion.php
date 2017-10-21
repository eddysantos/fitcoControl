<?php
  $pv = $_SESSION['user']['produccion_ver'];
  $pe = $_SESSION['user']['produccion_editar'];
  $cv =  $_SESSION['user']['cobranza_ver'];
  $clv = $_SESSION['user']['cliente_ver'];
  $admin = $_SESSION['user']['privilegiosUsuario'];

  $priv_produccion = $pv == "1" && $cv == "0" && $clv == "0";
  $priv_clientes =  $clv == "1" && $pv == "0" && $cv == "0";
  $priv_cobranza =  $cv == "1" && $clv == "0" && $pv == "0";
  $priv_pcl = $pv && $clv == "1"  && $cv == "0";
  $priv_cp = $cv && $pv == "1" && $clv == "0";
  $priv_ccl = $clv && $cv == "1" && $pv == "0";
  $priv_todos = $clv && $cv && $pv == "1";


  // 
  // $pe = $_SESSION['user']['produccion_editar'];
  // $ce =  $_SESSION['user']['cobranza_editar'];
  // $cle = $_SESSION['user']['cliente_editar'];
  //
  // $priv_pe = $pe == "1" && $ce == "0" && $cle == "0";
  // $priv_cle =  $cle == "1" && $pe == "0" && $ce == "0";
  // $priv_ce =  $ce == "1" && $cle == "0" && $pe == "0";
  // $priv_pcle = $pe && $cle == "1"  && $ce == "0";
  // $priv_cpe = $ce && $pe == "1" && $cle == "0";
  // $priv_ccle = $cle && $ce == "1" && $pe == "0";
  // $priv_todos = $cle && $ce && $pe == "1";
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

    <ul class="nav nav-pills nav-fill" id="selecTipoPoliza">
      <?php if ($priv_produccion): ?>
      <li class="nav-item"><a href="/fitcoControl/Ubicaciones/Produccion/produccion.php" class="w-95">PRODUCCION</a></li>
      <li class="nav-item"><a class="bloqueo w-95">COBRANZA</a></li>
      <li class="nav-item"><a class="bloqueo w-95">CLIENTES</a></li>
      <li class="nav-item"><a class="bloqueo w-95">USUARIOS</a></li>

    <?php elseif ($priv_cobranza):?>
      <li class="nav-item"><a class="bloqueo w-95">PRODUCCION</a></li>
      <li class="nav-item"><a href="/fitcoControl/Ubicaciones/Cobranza/cobranza.php" class="w-95">COBRANZA</a></li>
      <li class="nav-item"><a class="bloqueo w-95">CLIENTES</a></li>
      <li class="nav-item"><a class="bloqueo w-95">USUARIOS</a></li>


    <?php elseif ($priv_clientes):?>
      <li class="nav-item"><a class="bloqueo w-95">PRODUCCION</a></li>
      <li class="nav-item"><a class="bloqueo w-95">COBRANZA</a></li>
      <li class="nav-item"><a href="/fitcoControl/Ubicaciones/Clientes/Clientes.php" class="w-95">CLIENTES</a></li>
      <li class="nav-item"><a class="bloqueo w-95">USUARIOS</a></li>

    <?php elseif ($priv_pcl): ?>
      <li class="nav-item"><a href="/fitcoControl/Ubicaciones/Produccion/produccion.php" class="w-95">PRODUCCION</a></li>
      <li class="nav-item"><a class="bloqueo w-95">COBRANZA</a></li>
      <li class="nav-item"><a href="/fitcoControl/Ubicaciones/Clientes/Clientes.php" class="w-95">CLIENTES</a></li>
      <li class="nav-item"><a class="bloqueo w-95">USUARIOS</a></li>


    <?php elseif ($priv_cp):?>
      <li class="nav-item"><a href="/fitcoControl/Ubicaciones/Produccion/produccion.php" class="w-95">PRODUCCION</a></li>
      <li class="nav-item"><a href="/fitcoControl/Ubicaciones/Cobranza/cobranza.php" class="w-95">COBRANZA</a></li>
      <li class="nav-item"><a class="bloqueo w-95">CLIENTES</a></li>
      <li class="nav-item"><a class="bloqueo w-95">USUARIOS</a></li>

    <?php elseif ($priv_ccl): $ocultar = "ocultar";?>
      <li class="nav-item"><a class="bloqueo w-95">PRODUCCION</a></li>
      <li class="nav-item"><a href="/fitcoControl/Ubicaciones/Cobranza/cobranza.php" class="w-95">COBRANZA</a></li>
      <li class="nav-item"><a href="/fitcoControl/Ubicaciones/Clientes/Clientes.php" class="w-95">CLIENTES</a></li>
      <li class="nav-item"><a class="bloqueo w-95">USUARIOS</a></li>

    <?php elseif ($priv_todos):?>
      <li class="nav-item"><a href="/fitcoControl/Ubicaciones/Produccion/produccion.php" class="w-95">PRODUCCION</a></li>
      <li class="nav-item"><a href="/fitcoControl/Ubicaciones/Cobranza/cobranza.php" class="w-95">COBRANZA</a></li>
      <li class="nav-item"><a href="/fitcoControl/Ubicaciones/Clientes/Clientes.php" class="w-95">CLIENTES</a></li>
      <li class="nav-item"><a class="w-95 bloqueo">USUARIOS</a></li>

      <?php elseif ($admin == "Administrador"):?>
        <li class="nav-item"><a href="/fitcoControl/Ubicaciones/Produccion/produccion.php" class="w-95">PRODUCCION</a></li>
        <li class="nav-item"><a href="/fitcoControl/Ubicaciones/Cobranza/cobranza.php" class="w-95">COBRANZA</a></li>
        <li class="nav-item"><a href="/fitcoControl/Ubicaciones/Clientes/Clientes.php" class="w-95">CLIENTES</a></li>
        <li class="nav-item"><a href="/fitcoControl/Ubicaciones/Usuarios/Usuarios.php" class="w-95">USUARIOS</a></li>
      <?php endif; ?>
      <li class="nav-item"><a href="/fitcoControl/Resources/PHP/Login/CerrarSesion.php" class="w-95">CERRAR SESION</a></li>
    </ul>
  </nav>
</div>
