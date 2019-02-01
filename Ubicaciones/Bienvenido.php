<?php
  session_start();
  if (!isset($_SESSION['user'])) {
    header("Location: /fitcoControl/index.php");
  }

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
$pro_corVerCal = $_SESSION['user']['pro_corVerCal'];
//**************** MANTENIMIENTO E INVERSIONES
$pro_miVer = $_SESSION['user']['pro_miVer'];
//**************** PRODUCCION DIARIA
$pro_pdver = $_SESSION['user']['pro_pdVer'];
//**************** CORTE
$pro_corVer = $_SESSION['user']['pro_corVer'];
//**************** LINEAS
$pro_liVer = $_SESSION['user']['pro_liVer'];

//**************** INVENTARIO
$pro_invVer = $_SESSION['user']['pro_invVer'];
//**************** DISEÑO
$dis_ver = $_SESSION['user']['dis_ver'];
//**************** DISEÑO
$mat_ver = $_SESSION['user']['mat_ver'];
//**************** ENVIOS
$en_ver = $_SESSION['user']['en_ver'];


// DIVISION 5 //
//**************** CONTROL DE CALIDAD
$cc_ver = $_SESSION['user']['cc_ver'];

// DIVISION 6 //
//**************** VENTAS
$ve_ver = $_SESSION['user']['ve_ver'];
  // cliente
  // $cliente = $_SESSION['user']['c_ver'];


  // tesoreria


  // produccion


  // ventas
  $admin = $_SESSION['user']['privilegiosUsuario']== "Administrador";
  $admonGlobal = $_SESSION['user']['admonGlobal'];
  $dejecutivo = $_SESSION['user']['dejecutivo'];
  date_default_timezone_set('America/Mexico_City');

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
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
      <?php if ($admin || $e_ventas == 1 || $e_tesoreria == 1 || $e_produc == 1 || $e_rhVer == 1 || $e_usVer == 1): ?>
        <li class="nav-item">
          <a href="/fitcoControl/Ubicaciones/Comunicaciones/menuComunicaciones.php" class="bn transicion">COMUNICACION<span class="barra gris">DIVISION 1</span></a>
        </li>
      <?php else: ?>
        <li class="nav-item">
          <a class="bn bloqueo">COMUNICACION<span class="barra gris">DIVISION 1</span></a>
        </li>
      <?php endif; ?>


      <?php if ($admin || $c_ver == 1): ?>
        <li class="nav-item">
          <a href="/fitcoControl/Ubicaciones/Clientes/Clientes.php" class="bn transicion">CLIENTES<span class="barra gris">DIVISION 2</span></a>
        </li>
      <?php else: ?>
        <li class="nav-item">
          <a class="bn bloqueo">CLIENTES<span class="barra gris">DIVISION 2</span></a>
        </li>
      <?php endif; ?>


      <?php if ($admin || $tc_ver ==1 || $tcxp_ver == 1 || $tm_ver ==1 || $tr_ver ==1): ?>
        <li class="nav-item">
          <a href="/fitcoControl/Ubicaciones/Cobranza/menuTesoreria.php" class="bn transicion">TESORERÍA<span class="barra gris">DIVISION 3</span></a>
        </li>
      <?php else: ?>
        <li class="nav-item">
          <a class="bn bloqueo">TESORERÍA<span class="barra gris">DIVISION 3</span></a>
        </li>
      <?php endif; ?>


      <?php if ($admin || $pro_pgVer ==1 || $pro_miVer == 1 || $pro_pdver == 1 || $pro_corVer == 1 || $pro_liVer == 1  || $en_ver == 1 || $dis_ver == 1 || $mat_ver == 1 || $pro_corVerCal == 1 || $pro_invVer == 1): ?>

        <li class="nav-item">
          <!-- <a href="/fitcoControl/Ubicaciones/Produccion/produccion.php" class="bn transicion">PRODUCCIÓN<span class="barra gris">DIVISION 4</span></a> -->
          <a href="/fitcoControl/Ubicaciones/Produccion/menuProduccion.php" class="bn transicion">PRODUCCIÓN<span class="barra gris">DIVISION 4</span></a>
        </li>
      <?php else: ?>
        <li class="nav-item">
          <a class="bn bloqueo">PRODUCCIÓN<span class="barra gris">DIVISION 4</span></a>
        </li>
      <?php endif; ?>

      <?php if ($admin || $cc_ver == 1): ?>
        <li class="nav-item">
          <a class="bn bloqueo">CONTROL DE CALIDAD<span class="barra gris">DIVISION 5</span></a>
        </li>
      <?php endif; ?>


      <?php if ($admin || $ve_ver == 1): ?>
        <li class="nav-item">
          <a href="/fitcoControl/Ubicaciones/Ventas1/Ventas.php" class="bn transicion">VENTAS<span class="barra gris">DIVISION 6</span></a>
          <!-- <a href="/fitcoControl/Ubicaciones/Ventas/Ventas.php" class="bn transicion">VENTAS<span class="barra gris">DIVISION 6</span></a> -->
        </li>
      <?php else: ?>
        <li class="nav-item">
          <a class="bn bloqueo">VENTAS<span class="barra gris">DIVISION 6</span></a>
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
