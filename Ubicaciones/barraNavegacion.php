<?php
// session_start();
// DIVISION 1 //
//**************** ESTADISTICAS
$e_ventas = $_SESSION['user']['e_ventas'];
$e_tesoreria = $_SESSION['user']['e_tesoreria'];
$e_produc = $_SESSION['user']['e_produc'];
// *************** RECURSOS HUMANOS
$e_rhVer = $_SESSION['user']['e_rhVer'];
// *************** USUARIOS
$e_usVer = $_SESSION['user']['e_usVer'];


// DIVISION 2 //
//**************** CLIENTES
$c_ver = $_SESSION['user']['c_ver'];


// DIVISION 3 //
//**************** COBRANZA
$tc_ver = $_SESSION['user']['tc_ver'];
//**************** CUENTAS POR PAGAR
$tcxp_ver = $_SESSION['user']['tcxp_ver'];
//**************** MATERIALES
$tm_ver = $_SESSION['user']['tm_ver'];
//**************** RECORDS / NOMINAS
$tr_ver = $_SESSION['user']['tr_ver'];


// DIVISION 4 //
//**************** PROGRAMACIÓN
$pro_pgVer = $_SESSION['user']['pro_pgVer'];
//**************** MANTENIMIENTO E INVERSIONES
$pro_miVer = $_SESSION['user']['pro_miVer'];
//**************** PRODUCCION DIARIA
$pro_pdver = $_SESSION['user']['pro_pdVer'];
//**************** CORTE
$pro_corVer = $_SESSION['user']['pro_corVer'];
//**************** LINEAS
$pro_liVer = $_SESSION['user']['pro_liVer'];
//**************** ENVIOS
$en_ver = $_SESSION['user']['en_ver'];


// DIVISION 5 //
//**************** CONTROL DE CALIDAD
$cc_ver = $_SESSION['user']['cc_ver'];

// DIVISION 6 //
//**************** VENTAS
$ve_ver = $_SESSION['user']['ve_ver'];

$admin = $_SESSION['user']['privilegiosUsuario']== "Administrador";
?>
  <head>
    <meta charset="utf-8">
    <title>Fit&amp;Co Solutions</title>
    <link rel="stylesheet" href="/fitcoControl/Resources/bootstrap/css/reset.css">
    <!-- <link rel="stylesheet" href="/fitcoControl/Resources/bootstrap/css/bootstrap-toggle.css"> -->

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
    <script src="/fitcoControl/Resources/librerias/dataTables/jquery.DataTable.min.js"></script>
    <script src="/fitcoControl/Resources/librerias/dataTables/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('.importeClass').keyup(function (){
          this.value = (this.value + '').replace(/[^0-9-.]/g, '');
        });

        $('.numeroClass').keyup(function (){
          this.value = (this.value + '').replace(/[^0-9]/g, '');
        });
      })
    </script>
  </head>

<div id="nav_wrap" class="sticky" style="background-color:black">
  <nav class="nav_animate">
    <ul class="nav nav-pills nav-fill">

      <?php if ($admin || $e_ventas == 1 || $e_tesoreria == 1 || $e_produc == 1 || $e_rhVer == 1 || $e_usVer == 1): ?>
        <li class="nav-item"><a class="bn" href="/fitcoControl/Ubicaciones/Comunicaciones/pagina.php">COMUNICACION <span class="barra">DIVISIÓN 1</span></a></li>
      <?php else: ?>
        <li class="nav-item"><a class="bn bloqueo w-95">COMUNICACION <span class="barra">DIVISIÓN 1</span></a></li>
      <?php endif;?>

      <?php if ($admin || $c_ver == 1): ?>
        <li class="nav-item"><a class="bn" href="/fitcoControl/Ubicaciones/Clientes/Clientes.php">CLIENTES <span class="barra">DIVISIÓN 2</span></a></li>
      <?php else: ?>
        <li class="nav-item"><a class="bn bloqueo w-95">CLIENTES <span class="barra">DIVISIÓN 2</span></a></li>
      <?php endif; ?>

      <?php if ($admin || $tc_ver ==1 || $tcxp_ver == 1 || $tm_ver ==1 || $tr_ver ==1): ?>
        <li class="nav-item"><a class="bn" href="/fitcoControl/Ubicaciones/Cobranza/tesoreria.php">TESORERÍA <span class="barra">DIVISIÓN 3</span></a></li>
      <?php else: ?>
        <li class="nav-item"><a class="bn bloqueo w-95">TESORERÍA <span class="barra">DIVISIÓN 3</span></a></li>
      <?php endif; ?>

      <?php if ($admin || $pro_pgVer ==1 || $pro_miVer == 1 || $pro_pdver == 1 || $pro_corVer ==1 || $pro_liVer == 1  || $en_ver ==1): ?>
        <li class="nav-item"><a class="bn" href="/fitcoControl/Ubicaciones/Produccion/produccion.php">PRODUCCIÓN <span class="barra">DIVISIÓN 4</span></a></li>
      <?php else: ?>
        <li class="nav-item"><a class="bn bloqueo w-95">PRODUCCIÓN <span class="barra">DIVISIÓN 4</span></a></li>
      <?php endif; ?>

      <?php if ($admin || $cc_ver == 1): ?>
        <li class="nav-item">
          <a class="bn bloqueo w-95">CONTROL DE CALIDAD
            <span class="barra">DIVISIÓN 5</span>
          </a>
        </li>
      <?php endif; ?>

      <?php if ($admin || $ve_ver == 1): ?>
        <li class="nav-item"><a class="bn" href="/fitcoControl/Ubicaciones/Ventas/Ventas.php">VENTAS <span class="barra">DIVISIÓN 6</span></a></li>
      <?php else: ?>
        <li class="nav-item"><a class="bn bloqueo w-95">VENTAS <span class="barra">DIVISIÓN 6</span></a></li>
      <?php endif; ?>
    </ul>
  </nav>
</div>
