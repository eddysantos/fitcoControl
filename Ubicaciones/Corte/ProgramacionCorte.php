<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("Location: /fitcoControl/index.php");
}

  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
?>


<div class="container-fluid pl-75 pr-57">
  <div class="row clt_usr mt-5 mb-5">
    <div class="text-left alert alert-info w-75" role="alert" >
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Nota: </strong> En esta sección se podran registrar el termino de cada programacion, se podra agregar fecha, hora y notas de finalización en este icono <img src='/fitcoControl/Resources/iconos/003-add.svg' class='iconoNota'>, tambien se podra editar en <img src='/fitcoControl/Resources/iconos/001-edit-1.svg' class='iconoNota'> y eliminar registro en el icono <img src='/fitcoControl/Resources/iconos/004-delete-1.svg' class='iconoNota'>.
    </div>

    <div class="col align-self-end">
      <a class="rotate-link consultar ancla" accion="btesoreria" status="cerrado">
        <img src="/fitcoControl/Resources/iconos/search.svg" class=" icon rotate-icon" style="width:30px">
        <span class="spanB"><input class="buscar" type="text" name="busqueda"  id="busqueda" placeholder="Buscar"></span>
      </a>
    </div>
  </div>


  <div class="container-fluid mt-3" style="max-width:1300px">
    <section id="MostrarCorte"></section>
  </div>
</div>


<?php
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/Modales/Corte/ProgramCorte.php';
  require $root . '/fitcoControl/Resources/PHP/Corte/pieCorte.php';
?>
