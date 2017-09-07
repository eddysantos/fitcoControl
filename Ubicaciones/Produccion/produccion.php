<?php
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
?>



<div class="container-fluid" style="display: -webkit-box; height: 100%">
  <!--div class="row">
    <div class="col">
      <a href="/fitcoControl/Ubicaciones/Produccion/ProgramacionProduc.php" class="iconos"><h2 class="text-center">Programar</h2><img src="/fitcoControl/Resources/iconos/007-box-1.svg"><h2 class="text-center">Producción</h2></a>
    </div>
    <div class="col">
      <a href="/fitcoControl/Ubicaciones/Produccion/ProduccionDiaria.php" class="iconos"><h2 class="text-center">Producción</h2><img  src="/fitcoControl/Resources/iconos/003-shirt.svg"><h2 class="text-center">Diaria</h2></a>
    </div>
    <div class="col">
      <a href="/fitcoControl/Ubicaciones/Produccion/ConsultarProgramacion.php" class="iconos"><h2 class="text-center">Consultar</h2><img  src="/fitcoControl/Resources/iconos/boxes.svg"><h2 class="text-center">Programación</h2></a>
    </div>
  </div-->

  <div class="row align-items-center w-100">
    <div class="col">
      <div class="card">
        <img class="card-img-top w-50 align-self-center m-5" src="/fitcoControl/Resources/iconos/new-task.svg" alt="Card image cap">
        <div class="card-body">
          <a href="/fitcoControl/Ubicaciones/Produccion/ProgramacionProduc.php" class="btn btn-outline-info w-100" style="font-size: 2em">Agregar Programación Nueva</a>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
        <img class="card-img-top w-50 align-self-center m-5" src="/fitcoControl/Resources/iconos/shirt.svg" alt="Card image cap">
        <div class="card-body">
          <a href="#" class="btn btn-outline-success w-100" style="font-size: 2em">Introducir Producción</a>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
        <img class="card-img-top w-50 align-self-center m-5" src="/fitcoControl/Resources/iconos/boxes.svg" alt="Card image cap">
        <div class="card-body">
          <a href="#" class="btn btn-outline-dark w-100" style="font-size: 2em">Programación Vs. Producción</a>
        </div>
      </div>
    </div>
  </div>


<!-- <div class="container mt-250">
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

</div> -->
<div class="fixed-bottom">Icons made by <a href="http://www.freepik.com" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
