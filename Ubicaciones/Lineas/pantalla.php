<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("Location: /fitcoControl/index.php");
}
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
?>

<div class="container-fluid pl-75 pr-57">
<!-- PRUEBA  -->
  <table class="table">
    <thead>
      <tr class="row clt_usr mt-5 mb-5">
        <td class="col-md-2">
          <input id="fechaval" class="c-select" type="date" required style="letter-spacing:3px;color: rgba(62, 109, 140, 0.85);">
        </td>
        <td class="col-md-2 text-left">
          <select id="fetchval" class="c-select" style="letter-spacing: 3px;color: rgba(62, 109, 140, 0.85);">
            <option value="">Selecciona Linea</option>
            <option value="Linea 1">Linea 1</option>
            <option value="Linea 2">Linea 2</option>
            <option value="Linea 3">Linea 3</option>
            <option value="Linea 4">Linea 4</option>
            <option value="Linea 5">Linea 5</option>
            <option value="Linea 6">Linea 6</option>
          </select>
        </td>
        <td class="col-md-1 text-left pl-0">
          <a href="#" class="rotate-link ancla" id="filter">
            <img src="/fitcoControl/Resources/iconos/searchF.svg" class="icon1 rotate-icon" style="width:30px;">
          </a>
        </td>
        <td class="col-md-2"></td>
        <td class="col-md-5">
          <a href="#AgregarLista" data-toggle="modal" class="rotate-link mod ancla" style="font-size:larger;text-decoration:none;">
            <img src="/fitcoControl/Resources/iconos/add.svg" class="icon1 rotate-icon" style="width:30px;">
            <span class="spanA">Agregar Lista</span>
          </a>

          <a class="rotate-link consultar ancla" style="font-size: larger;" accion="agproduccion" status="cerrado">
            <img src="/fitcoControl/Resources/iconos/001-computer.svg" class="icon1 rotate-icon" style="width:30px;">
            <span>Agregar Produccion</span>
          </a>

          <a class="rotate-link buscador ancla"  accion="msearch" status="cerrado">
            <img src="/fitcoControl/Resources/iconos/search.svg" class="icon rotate-icon" style="width:30px">
            <span class="spanB"><input class="effect-17 real-time-search" type="text" name="search"  placeholder="Buscar..." table-body="#tabla_lineas" action="mostrar"></span>
          </a>
        </td>
      </tr>
    </thead>
  </table>
</div>

<!--MOSTRAR TABLA  -->
<form class="page p-0" id="tablaLineas" onsubmit="return false">
  <table class="table table-hover fixed-table">
    <thead>
      <tr class='row m-0 encabezado text-center'>
        <td class='col-md-2'>
          <h3><a class="consultar" accion="verEfi" status="cerrado">
          <img  src='/fitcoControl/Resources/iconos/002-order.svg' class='img ml-3 spand-icon'>
        </a>Fecha</h3>
      </td>
        <td class='col-md-4'><h3>Nombre de Empleado</h3></td>
        <td class='col-md-3'><h3>Operación</h3></td>
        <td class='col-md-1'><h3>Linea</h3></td>
        <td class='col-md-2'></td>
      </tr>
    </thead>
    <tbody id="tabla_lineas" class="font12">
      <tr>
        <td colspan="9">No hay resultados</td>
      </tr>
    </tbody>
  </table>
</form>



<!-- AGREGAR REGISTRO  -->
<form id="NuevaProduccion" onsubmit="return false" class="agregarnuevo" style="display:none;margin-bottom:80px">
  <table class="table">
    <tbody>
      <tr class="row m20">
        <td class="col-md-12 input-effect p-0">
          <input type="hidden" id="lin_id">
          <input id="lin_linea" class="w-100 effect-17" list="lin" required>
          <datalist id="lin">
            <option value="Linea 1">Linea 1</option>
            <option value="Linea 2">Linea 2</option>
            <option value="Linea 3">Linea 3</option>
            <option value="Linea 4">Linea 4</option>
            <option value="Linea 5">Linea 5</option>
            <option value="Linea 6">Linea 6</option>
          </datalist>
          <label>Linea</label>
          <span class="focus-border"></span>
        </td>
      </tr>
      <tr class="row m20">
        <td class="col-md-12 input-effect p-0">
          <input id="lin_fecha" class="effect-17 has-content" type="date" required>
            <label>Fecha</label>
            <span class="focus-border"></span>
        </td>
      </tr>
      <tr class="row m20">
        <td class="col-md-12 input-effect p-0">
          <input class="effect-17 popup-input" id="lin_ope" type="text" id-display="#popup-display-listaOperacion" action="listaOperacion" db-id="" autocomplete="off">
          <div class="popup-list" id="popup-display-listaOperacion" style="display:none"></div>
          <label for="lin_ope">Operacion</label>
        </td>
      </tr>
      <tr class="row m20">
        <td class="col-md-12 input-effect p-0">
          <input class="effect-17 popup-input" id="lin_empleado" type="text" id-display="#popup-display-listaEmpleados" action="listaEmpleados" db-id="" autocomplete="off">
          <div class="popup-list" id="popup-display-listaEmpleados" style="display:none"></div>
          <label for="lin_empleado">Nombre Empleado</label>
        </td>
      </tr>
      <tr class="row m20">
        <td class="col-md-12 input-effect p-0">
          <input  id="lin_meta" class="effect-17" type="text" required>
            <label>Meta</label>
            <span class="focus-border"></span>
        </td>
      </tr>
      <tr class="row m20">
        <td class="col-md-12 input-effect p-0">
          <input id="lin_pro" class="effect-17" type="text" required>
            <label>Produccion</label>
            <span class="focus-border"></span>
        </td>
      </tr>

      <tr class="row justify-content-center mb-3">
        <td class="col-md-4">
          <button type="submit" id="NuevoRegistroLin" class="btnsub btn boton btn-block ">AGREGAR</button>
        </td>
      </tr>
    </tbody>
  </table>
</form>



<?php
  require $root . '/fitcoControl/Ubicaciones/Lineas/modales/editar.php';
  require $root . '/fitcoControl/Ubicaciones/Lineas/modales/listas.php';
  require $root . '/fitcoControl/Ubicaciones/Lineas/modales/agregarProduccion.php';
  require $root . '/fitcoControl/Ubicaciones/Lineas/actions/footer.php';
 ?>
