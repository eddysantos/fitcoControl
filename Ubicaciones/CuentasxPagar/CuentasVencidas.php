<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("Location: /fitcoControl/index.php");
}
  $root = $_SERVER['DOCUMENT_ROOT'];
  // require $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
  $tcxp_ver = $_SESSION['user']['tcxp_ver'];
  $admin = $_SESSION['user']['privilegiosUsuario'] == "Administrador";
?>

<link rel="stylesheet" href="/fitcoControl/Resources/bootstrap/css/reset.css">
<link rel="stylesheet" href="/fitcoControl/Resources/css/Pagina.css">
<link rel="stylesheet" href="/fitcoControl/Resources/bootstrap/css/bootstrap.min.css">
<script src="/fitcoControl/Resources/jquery/jquery.min.js"></script>

<?php if ($tcxp_ver == 1 || $admin): ?>
  <div class="container-fluid mt-4">
    <div class='m-5'>
      <a href='/fitcoControl/Ubicaciones/CuentasxPagar/CuentasxPagar.php' class='consultar'><img style='width: 100px;' src='/fitcoControl/Resources/iconos/logoFitco.png'></a>
    </div>
    <form class='page p-0' onsubmit="return false">
     <table class='table table-bordered'>
      <thead id='font'>
        <tr>
          <td width='20%'>
            <input class='effect-17 popup-input w-100 border-0' id='cxp_pro' type='text' id-display='#popup-display-listaProveedor' action='listaProveedor' db-id='' autocomplete='off' placeholder='PROVEEDOR'>
            <div class='popup-list' id='popup-display-listaProveedor' style='display:none'></div>
          </td>
          <td width='10%'>#FACT.</td>
          <td width='10%'>CONCEPTO</td>
          <td width='8%'>TOTAL DE FACT</td>
          <td width='8%'>PAGADO</td>
          <td width='10%'>VENCIDO</td>
          <td width='10%'>VENCIMIENTO</td>
        </tr>
        </thead>
        <tbody id='mostrarCuentasVencidas'></tbody>
      </table>
    </form>
  </div>

<?php else:?>
  <div id='SinRegistros' class='container-fluid pantallaRegistros'>
    <div class='tituloSinRegistros' style="font-size:25px; color:red">SOLICITA PERMISO PARA ENTRAR EN ESTA SECCIÓN</div>
  </div>
<?php endif; ?>

<script src="/fitcoControl/Ubicaciones/CuentasxPagar/js/CuentasxPagar.js"></script>
<script src="/fitcoControl/Resources/js/popup-list-plugin.js"></script>
<script src="/fitcoControl/Resources/js/table-fetch-plugin.js"></script>
