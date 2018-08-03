<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("Location: /fitcoControl/index.php");
}
  $root = $_SERVER['DOCUMENT_ROOT'];

  $cv =  $_SESSION['user']['cobranza_ver'];
  $admin = $_SESSION['user']['privilegiosUsuario'] == "Administrador";
?>

<link rel="stylesheet" href="/fitcoControl/Resources/bootstrap/css/reset.css">
<link rel="stylesheet" href="/fitcoControl/Resources/css/Pagina.css">
<link rel="stylesheet" href="/fitcoControl/Resources/bootstrap/css/bootstrap.min.css">
<script src="/fitcoControl/Resources/jquery/jquery.min.js"></script>

<?php if ($cv == 1 || $admin): ?>
  <div class="m-5">
    <a href="/fitcoControl/Ubicaciones/CuentasxPagar/CuentasxPagar.php" class="consultar"><img style="width: 100px;" src='/fitcoControl/Resources/iconos/logoFitco.png'></a>
  </div>

  <form class="page p-0" onsubmit="return false">
    <table class="table table-bordered">
      <thead>
        <tr>
          <td width='20%'>PROVEEDOR</td>
          <td width='10%'>#FACT.</td>
          <td width='10%'>CONCETO</td>
          <td width='10%'>VENCIDO</td>
          <td width='10%'>VENCIMIENTO</td>
        </tr>
      </thead>
      <tbody id="mostrarCtasxCobrar" class="font12">
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


<script src="/fitcoControl/Ubicaciones/CuentasxPagar/js/CuentasxPagar.js"></script>
<script src="/fitcoControl/Resources/js/popup-list-plugin.js"></script>
<script src="/fitcoControl/Resources/js/table-fetch-plugin.js"></script>