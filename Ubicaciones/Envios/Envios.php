<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("Location: /fitcoControl/index.php");
}
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
  // require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";

?>


<div class="container-fluid" style="width:1350px;margin-top:60px">
  <div class="colapso p-0">
    <div class="collapse show">
      <div class="card-1 card-block mt-2">
        <table class="table table-hover fixed-program">
          <thead class="encabezado" style="letter-spacing:0px">
            <tr class="row m-0 text-center">
            <td class="col-md-2">Cliente</td>
            <td class="col-md-1">Requerido</td>
            <td class="col-md-3">Status</td>
            <td class="col-md-2">Fecha y Hora de Arribos</td>
            <td class="col-md-3">Notas</td>
            <td class="col-md-1"></td>
            </tr>
          </thead>
          <tbody id="MostrarEnvio"></tbody>
        </table>
      </div>
    </div>
  </div>
</div>



<?php
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/Modales/Envios/ModalEnvios.php';
  require $root . '/fitcoControl/Resources/PHP/Envios/pieEnvios.php';
?>
