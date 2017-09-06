<?php
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
?>



<div class="container mt-250">
  <table class="table">
    <tr class="row">
      <td class="col-md-4 text-center">
        <a href="/fitcoControl/Ubicaciones/Produccion/ProgramacionProduc.php" class="iconos4"><img src="/fitcoControl/Resources/iconos/005-agregar.svg"><h2><b>NUEVA PRODUCCIÓN</b></h2></a>
      </td>
      <td class="col-md-4 text-center">
        <a href="/fitcoControl/Ubicaciones/Produccion/ProduccionDiaria.php" class="iconos4"><img  src="/fitcoControl/Resources/iconos/camisa.svg"><h2><b>PRODUCCIÓN DIARIA</b></h2></a>
      </td>
      <td class="col-md-4 text-center">
        <a href="/fitcoControl/Ubicaciones/Produccion/ConsultarProgramacion.php" class="iconos4"><img  src="/fitcoControl/Resources/iconos/004-buscar.svg"><h2><b>CONSULTAR PROGRAMACIÓN</b></h2></a>
      </td>
    </tr>
  </table>
</div>
