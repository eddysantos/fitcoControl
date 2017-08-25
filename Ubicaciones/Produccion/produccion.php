<?php
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
?>


<div class="container-fluid w-15 mt-250 mx-20" style="display: -webkit-box;">
  <div class="mr-6">
    <a href="/fitcoControl/Ubicaciones/Produccion/ProgramacionProduc.php" class="iconos"><h2 class="text-center">Programar</h2><img src="/fitcoControl/Resources/iconos/007-box-1.svg"><h2 class="text-center">Producción</h2></a>
  </div>

  <div class="mr-6">
    <a href="/fitcoControl/Ubicaciones/Produccion/ProduccionDiaria.php" class="iconos"><h2 class="text-center">Producción</h2><img  src="/fitcoControl/Resources/iconos/003-shirt.svg"><h2 class="text-center">Diaria</h2></a>
  </div>

  <div class="mr-6">
    <a href="/fitcoControl/Ubicaciones/Produccion/ConsultarProgramacion.php" class="iconos"><h2 class="text-center">Consultar</h2><img  src="/fitcoControl/Resources/iconos/boxes.svg"><h2 class="text-center">Programación</h2></a>
  </div>
</div>
