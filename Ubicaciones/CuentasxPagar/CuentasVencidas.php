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

  <div class="container-fluid mt-4">
    <section id="mostrarCuentasVencidas"></section>
  </div>

<?php else:?>

  <div id='SinRegistros' class='container-fluid pantallaRegistros'>
    <div class='tituloSinRegistros' style="font-size:25px; color:red">SOLICITA PERMISO PARA ENTRAR EN ESTA SECCIÓN</div>
  </div>
<?php endif; ?>

<script src="/fitcoControl/Ubicaciones/CuentasxPagar/js/CuentasxPagar.js"></script>
<script src="/fitcoControl/Resources/js/popup-list-plugin.js"></script>
<script src="/fitcoControl/Resources/js/table-fetch-plugin.js"></script>
