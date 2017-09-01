<?php
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
?>



<div class="container mt-250">
  <table class="table">
    <tr class="row">
      <td class="col-md-4 text-center">
        <a href="/fitcoControl/Ubicaciones/Produccion/ProgramacionProduc.php" class="iconos4"><img src="/fitcoControl/Resources/iconos/002-shipping.svg"><h2>NUEVA PRODUCCIÓN</h2></a>
      </td>
      <td class="col-md-4 text-center">
        <a href="/fitcoControl/Ubicaciones/Produccion/ProduccionDiaria.php" class="iconos4"><img  src="/fitcoControl/Resources/iconos/003-shirt.svg"><h2>PRODUCCIÓN DIARIA</h2></a>
      </td>
      <td class="col-md-4 text-center">
        <a href="/fitcoControl/Ubicaciones/Produccion/ConsultarProgramacion.php" class="iconos4"><img  src="/fitcoControl/Resources/iconos/001-delivery.svg"><h2>CONSULTAR PROGRAMACIÓN</h2></a>
      </td>
    </tr>
  </table>
</div>
