<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("Location: /fitcoControl/index.php");
}
$root = $_SERVER['DOCUMENT_ROOT'];
require  $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
?>

<link rel="stylesheet" href="/fitcoControl/Resources/fullcalendar/fullcalendar.min.css">


<nav class="w-100 mb-3">
  <ul class="nav nav-pills nav-fill mt-3">
    <li class="nav-item">
      <a href="/fitcoControl/Ubicaciones/Programacion/Calendario.php" class="nav-link pills w-100 border-0 bt">Calendario</a>
    </li>
  </ul>
</nav>

<div id="registrarProg">
  <div class="pl-75 pr-57">
    <div class="row clt_usr">
      <div class="col align-self-end">
        <a href="#ModalAgregarProgram" data-toggle="modal" class="rotate-link ancla" style="font-size: larger;text-decoration: none!important;">
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
  require $root . '/fitcoControl/Ubicaciones/Programacion/modales/agregarProgram.php';
  require $root . '/fitcoControl/Ubicaciones/Programacion/actions/footer.php';
?>
