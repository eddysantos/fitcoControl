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
    <a href="/fitcoControl/Ubicaciones/Cobranza/cobranza.php" class="consultar" accion="backRepo" status="cerrado" id="backRepo"><img style="width: 100px;" src='/fitcoControl/Resources/iconos/logoFitco.png'></a>
  </div>

  <form id="DetalleCobranza" class="page p-0" onsubmit="return false">
    <table class="table table-bordered">
      <thead id='font'>
        <tr>
          <td width='20%'>PROVEEDOR</td>
          <td width='10%'>#FACT.</td>
          <td width='10%'>CONCETO</td>
          <td width='10%'>VENCIDO</td>
          <td width='10%'>VENCIMIENTO</td>
        </tr>
      </thead>
      <tbody id="mostrarCobranza" class="font12">
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
  require $root . '/fitcoControl/Ubicaciones/Cobranza/actions/footer.php';
  require $root . '/fitcoControl/Ubicaciones/Modales/Cobranza/ModalGraficaCobranza.php';
  require $root . '/fitcoControl/Ubicaciones/Modales/Cobranza/ModalCobranza.php';
  require $root . '/fitcoControl/Ubicaciones/Modales/Cobranza/ModalPagos.php';
?>
