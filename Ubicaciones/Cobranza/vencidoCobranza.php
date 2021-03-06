<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("Location: /fitcoControl/index.php");
}
  $root = $_SERVER['DOCUMENT_ROOT'];

  $tc_ver = $_SESSION['user']['tc_ver'];
  $admin = $_SESSION['user']['privilegiosUsuario'] == "Administrador";
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
  <link rel="icon" href="/fitcoControl/Resources/iconos/fit.ico">


  <script src="/fitcoControl/Resources/bootstrap/alertifyjs/alertify.min.js"></script>
  <script src="/fitcoControl/Resources/jquery/sweetalert.min.js"></script>
  <script src="/fitcoControl/Resources/jquery/jquery.min.js"></script>
  <script src="/fitcoControl/Resources/jquery/popper.min.js"></script>
  <script src="/fitcoControl/Resources/bootstrap/js/bootstrap.min.js"></script>
  <script src="/fitcoControl/Resources/jquery/tether.min.js"></script>
  <!-- <script src="/fitcoControl/Resources/librerias/dataTables/jquery.DataTable.min.js"></script>
  <script src="/fitcoControl/Resources/librerias/dataTables/dataTables.bootstrap4.min.js"></script> -->

</head>


<?php if ($tc_ver == 1 || $admin): ?>
  <div class="m-5">
    <a href="/fitcoControl/Ubicaciones/Cobranza/cobranza.php" class="consultar" accion="backRepo" status="cerrado" id="backRepo"><img style="width: 100px;" src='/fitcoControl/Resources/iconos/logoFitco.png'></a>
  </div>

  <form id="DetalleCobranza" class="page p-0" onsubmit="return false">
    <table class="table table-bordered">
      <thead id='font'>
        <tr>
          <td width='20%'>
            <input class="effect-17 popup-input w-100 border-0" id="cob_cli" type="text" id-display="#popup-display-listaClientes" action="listaClientes" db-id="" autocomplete="off" placeholder="CLIENTES">
            <div class="popup-list" id="popup-display-listaClientes" style="display:none"></div>
          </td>
          <td width='8%'>#FACT.</td>
          <td width='8%'>CONCEPTO</td>
          <td width='10%'>TOTAL DE FACT.</td>
          <td width='10%'>ABONADO</td>
          <td width='10%'>VENCIDO</td>
          <td width='10%'>VENCIMIENTO</td>
        </tr>
      </thead>
      <tbody id="mostrarReporte" class="font12">
        <tr>
          <td colspan="9">No hay resultados</td>
        </tr>
      </tbody>
    </table>
  </form>
<?php else:?>

  <div id='SinRegistros' class='container-fluid pantallaRegistros'>
    <div class='tituloSinRegistros' style="font-size:25px; color:red">SOLICITA PERMISO PARA ENTRAR EN ESTA SECCIÓN</div>
  </div>
<?php endif; ?>



<?php
  require $root . '/fitcoControl/Ubicaciones/Cobranza/Cobranza/actions/footer.php';
  require $root . '/fitcoControl/Ubicaciones/Cobranza/Comentarios/modales/comentarios.php';
?>
