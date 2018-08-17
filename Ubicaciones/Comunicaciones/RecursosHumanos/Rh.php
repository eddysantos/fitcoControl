<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("Location: /fitcoControl/index.php");
}
$root = $_SERVER['DOCUMENT_ROOT'];
require  $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
?>


  <?php if ($admin || $e_rhVer == 1): ?>
    <div class="container-fluid pantallaGris">
      <div class="tituloMantenimiento">PROXIMAMENTE</div>
    </div>
  <?php else: ?>
    <div id='SinRegistros' class='container-fluid pantallaRegistros'>
      <div class='tituloSinRegistros' style="font-size:25px; color:red">SOLICITA PERMISO PARA ENTRAR EN ESTA SECCIÓN</div>
    </div>
  <?php endif;?>
