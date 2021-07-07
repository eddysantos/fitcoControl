<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("Location: /fitcoControl/index.php");
}
$root = $_SERVER['DOCUMENT_ROOT'];
require  $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
?>

<link rel="stylesheet" href="/fitcoControl/Resources/fullcalendar/fullcalendar.min.css">

<div id="registrarProg">
  <div class="mt-5 mr-5">
    <div class="row clt_usr">
      <div class="col align-self-end mt-5 mr-5">
        <a href="/fitcoControl/Ubicaciones/Programacion/Calendario.php" class="rotate-link mod ancla" style="font-size:larger;text-decoration:none;">
          <img src="/fitcoControl/Resources/iconos/002-calendar.svg" class="icon1 rotate-icon" style="width:30px;">
          <span class="spanA">Calendario</span>
        </a>


        <a href="#ModalAgregarProgram" data-toggle="modal" class="rotate-link mod ancla" style="font-size:larger;text-decoration:none;">
          <img src="/fitcoControl/Resources/iconos/add.svg" class="icon1 rotate-icon" style="width:30px;">
          <span class="spanA">Agregar</span>
        </a>
      </div>
    </div>
  </div>

  <form class="page p-0">
    <table class="table fixed-table font12">
      <thead>
        <tr class="row m-0 encabezado text-center">
          <td class="col-md-2">Cliente</td>
          <td class="col-md-1">Corte</td>
          <td class="col-md-1">Requerido (pzs)</td>
          <td class="col-md-1">Diario (pzs)</td>
          <td class="col-md-1">Hora (pzs)</td>
          <td class="col-md-1">Horas Necesarias</td>
          <td class="col-md-2">Inicio</td>
          <td class="col-md-2">Fin</td>
        </tr>
      </thead>
      <tbody id="tabla_Programacion">
        <tr>
          <td colspan="9">No hay resultados</td>
        </tr>
      </tbody>
    </table>
  </form>
</div>


<?php
  require $root . '/fitcoControl/Ubicaciones/Programacion/modales/modalCalendario.php';
  require $root . '/fitcoControl/Ubicaciones/Programacion/modales/modalReporte.php';
  require $root . '/fitcoControl/Ubicaciones/Programacion/actions/footer.php';
?>
