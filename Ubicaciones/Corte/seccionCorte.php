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
    <!-- <div class="text-left alert alert-info w-75" role="alert" >
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Nota: </strong> En esta sección se podran registrar el tiempo de corte, se podra agregar fecha, hora y notas de finalización en este icono <img src='/fitcoControl/Resources/iconos/003-add.svg' class='iconoNota'>, tambien se podra editar en <img src='/fitcoControl/Resources/iconos/001-edit-1.svg' class='iconoNota'> y eliminar registro en el icono <img src='/fitcoControl/Resources/iconos/004-delete-1.svg' class='iconoNota'>.
    </div> -->

    <div class="col align-self-end">

      <a class="rotate-link consultar ancla" accion="acorte" status="cerrado">
        <img  src="/fitcoControl/Resources/iconos/003-analytics-2.svg" class="icon rotate-icon" style="width:30px">
        <span class="spanA">Agregar Corte</span>
      </a>

      <a class="rotate-link consultar ancla" accion="bcorte" status="cerrado">
        <img src="/fitcoControl/Resources/iconos/search.svg" class=" icon rotate-icon" style="width:30px">
        <span class="spanB"><input class="buscar" type="text" name="busqueda"  id="busqueda" placeholder="Buscar"></span>
      </a>
    </div>
  </div>


  <div class="container-fluid mt-3" style="max-width:1300px">
    <section id="MostrarSeccionCorte"></section>
  </div>


  <form  id="Agregarcorte" onsubmit="return false" class="agregarnuevo" style="display:none;left:75%">
    <table class="table">
      <tbody>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input type="text" id="cor_id" style="display:none">
            <td class="col-md-12 input-effect p-0">
              <input class="effect-17" type="text" id="npClientName" required autocomplete="off">
                <label>Cliente</label>
                <span class="focus-border"></span>
                <div class="client-list" id="npClientList" style="display: none">
                </div>
            </td>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input id="cor_fcorte" class="modal-efecto-17 has-content w-100" type="date" required>
              <label>Fecha de Corte</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input id="cor_fhprogInicio" class="effect-17 has-content w-100" type="time" value="08:00"  required>
              <label>Hora Programada de Inicio</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input id="cor_fhprogFinal" class="effect-17 has-content w-100" type="time" value="18:00" required>
              <label>Hora Programada final</label>
              <span class="focus-border"></span>
          </td>
        </tr>

        <tr class="row m20" style="display:none">
          <td class="col-md-12 input-effect p-0">
            <input id="cor_fhrealInicio" class="effect-17 has-content w-100" type="time" value="00:00">
              <label>Hora Real de Inicio</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20" style="display:none">
          <td class="col-md-12 input-effect p-0">
            <input id="cor_fhrealFinal" class="effect-17 has-content w-100" type="time" value="00:00">
              <label>Hora Real final</label>
              <span class="focus-border"></span>
          </td>
        </tr>

        <tr class="row m20" style="display:none">
          <td class="col-md-12 input-effect p-0">
            <input id="notasCorte" class="effect-17 has-content w-100" type="text">
              <label>Notas</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row justify-content-center m-0 mb-2 mt-5">
          <td class="col-md-4">
            <button type="submit" id="NuevoRegistroCorte" class="btnsub btn boton btn-block ">AGREGAR</button>
          </td>
        </tr>
      </tbody>
    </table>
  </form>
</div>


<?php
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/Modales/Corte/editarCorte.php';
  require $root . '/fitcoControl/Resources/PHP/Corte/pieCorte.php';
?>
