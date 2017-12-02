<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("Location: /fitcoControl/index.php");
}
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
  require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";

?>


<div class="container-fluid" style="width:1350px;margin-top:60px">
  <div class="colapso p-0">
    <div class="collapse show">
      <div class="card-1 card-block mt-2">
        <table class="table table-hover fixed-program">
          <thead class="encabezado" style="letter-spacing:0px">
            <tr class="row m-0 text-center">
            <td class="col-md-2">CLIENTE</td>
            <td class="col-md-3">DÍAS/ HRS PROYECTADOS</td>
            <!-- <td class="col-md-2">TIEMPO ACTUAL</td> -->
            <td class="col-md-2">TIEMPO DE CORTE</td>
            <td class="col-md-4">NOTAS</td>
            <td class="col-md-1"></td>
            </tr>
          </thead>
          <tbody id="MostrarCorte"></tbody>
        </table>
      </div>
    </div>
  </div>
</div>



<?php
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/Modales/Corte/ProgramCorte.php';
  require $root . '/fitcoControl/Resources/PHP/Corte/pieCorte.php';
?>
