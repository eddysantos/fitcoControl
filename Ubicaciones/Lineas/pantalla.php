<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("Location: /fitcoControl/index.php");
}
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
?>

<div class="container-fluid pl-75 pr-57">
  <div class="row clt_usr  mt-5 mb-5">
    <div class="col align-self-end">
      <select class="custom-select mr-4">
        <option value="">Linea 1</option>
        <option value="">Linea 2</option>
        <option value="">Linea 3</option>
        <option value="">Linea 4</option>
        <option value="">Linea 5</option>
        <option value="">Linea 6</option>
      </select>
      <a class="rotate-link consultar ancla" style="font-size: larger;" accion="aproduccion" status="cerrado">
        <img src="/fitcoControl/Resources/iconos/001-computer.svg" class="icon1 rotate-icon" style="width:30px;">
        <span>Agregar Produccion</span>
      </a>

      <a class="rotate-link buscador ancla" >
        <img src="/fitcoControl/Resources/iconos/search.svg" class="icon rotate-icon" style="width:30px">
        <span class="spanB"><input class="real-time-search" type="text" name="search" placeholder="Buscar..." table-body="#tabla_lineas"  action="mostrar"></span>
      </a>
    </div>
  </div>
</div>

<!--MOSTRAR TABLA  -->
<form class="page p-0" id="tablaLineas">
  <table class="table table-hover fixed-table">
    <thead>
      <tr class='row m-0 encabezado text-center'>
        <td class='col-md-2'><h3>Fecha</h3></td>
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
          <input id="lin_linea" class="effect-17" type="text" required>
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
          <input id="lin_ope" class="effect-17" type="text" required>
            <label>Operación</label>
            <span class="focus-border"></span>
        </td>
      </tr>
      <tr class="row m20">
        <td class="col-md-12 input-effect p-0">
          <input  id="lin_empleado" class="effect-17" type="text" required>
            <label>Empleado</label>
            <span class="focus-border"></span>
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
  require $root . '/fitcoControl/Ubicaciones/Lineas/actions/footer.php';
 ?>
