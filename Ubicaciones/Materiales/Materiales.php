<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("Location: /fitcoControl/index.php");
}
$root = $_SERVER['DOCUMENT_ROOT'];
require  $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
?>


<div class="container-fluid pr-57">
  <div class="clt_usr  mt-5 mb-5">
    <a class="rotate-link consultar ancla" style="font-size: larger;" accion="amaterial" status="cerrado">
      <img src="/fitcoControl/Resources/iconos/001-computer.svg" class="icon1 rotate-icon" style="width:30px;">
      <span class="spanM">Nuevo Registro</span>
    </a>
    <a class="ml-3 rotate-link consultar ancla">
      <img src="/fitcoControl/Resources/iconos/search.svg" class=" icon rotate-icon" style="width:30px">
      <span class="spanB"><input class="buscar" type="text" name="busqueda"  id="busqueda" placeholder="Buscar"></span>
    </a>

    <div class="container-fluid mt-3" style="max-width:1300px">
      <section id="MostrarMateriales"></section>
    </div>

    <form id="NuevoMaterial" onsubmit="return false" class="agregarnuevo" style="display:none">
      <table class="table">
        <tbody>
          <tr class="row m20">
            <td class="col-md-12 input-effect p-0">
              <input type="text" id="mat_id" style="display:none">
              <input id="mat_material" class="effect-17" type="text" required>
                <label>Material</label>
                <span class="focus-border"></span>
            </td>
          </tr>
          <tr class="row m20">
            <td class="col-md-12 input-effect p-0">
              <input id="mat_fcompra" class="effect-17 has-content" type="date" required>
                <label>Fecha de Compra</label>
                <span class="focus-border"></span>
            </td>
          </tr>
          <tr class="row m20">
            <td class="col-md-12 input-effect p-0">
              <input  id="mat_serie" class="effect-17" type="text" required>
                <label>Numero de Serie</label>
                <span class="focus-border"></span>
            </td>
          </tr>
          <tr class="row m20">
            <td class="col-md-12 input-effect p-0">
              <input  id="mat_precio" class="effect-17" type="text" required>
                <label>Precio</label>
                <span class="focus-border"></span>
            </td>
          </tr>
          <tr class="row m20">
            <td class="col-md-12 input-effect p-0">
              <input id="mat_persona" class="effect-17" type="text" required>
                <label>Persona a la que s ele Entrega</label>
                <span class="focus-border"></span>
            </td>
          </tr>
          <tr class="row m20">
            <td class="col-md-12 input-effect p-0">
              <input id="mat_fentrega" class="effect-17 has-content" type="date" required>
                <label>Fecha de Entrega</label>
                <span class="focus-border"></span>
            </td>
          </tr>
          <tr class="row m20">
            <td class="col-md-12 input-effect p-0">
              <input id="mat_condiciones" class="effect-17" type="text" required>
                <label>Condiciones del Material</label>
                <span class="focus-border"></span>
            </td>
          </tr>
          <tr class="row justify-content-center mb-3">
            <td class="col-md-4">
              <button type="submit" id="NuevoRegistroMat" class="btnsub btn boton btn-block ">AGREGAR</button>
            </td>
          </tr>
        </tbody>
      </table>
    </form>
  </div>
</div>



<?php
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/Modales/Materiales/ModalMateriales.php';
  require $root . '/fitcoControl/Resources/PHP/Materiales/pieMaterial.php';
?>
