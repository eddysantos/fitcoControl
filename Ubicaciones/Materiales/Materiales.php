<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("Location: /fitcoControl/index.php");
}
$root = $_SERVER['DOCUMENT_ROOT'];
require  $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
?>


<div class="container-fluid pl-75 pr-57">
  <div class="row clt_usr  mt-5 mb-5">

    <div class="text-left alert alert-info w-65" role="alert" >
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Nota: </strong> La función de esta sección es llevar el control de los articulos electronicos entregados a los empleados, (ej.computadoras, laptops, celulares, etc). En el icono <img src='/fitcoControl/Resources/iconos/001-edit-1.svg' class='iconoNota'> se podra editar la información en caso de que asi se requiera.
      En el icono <img src='/fitcoControl/Resources/iconos/004-delete-1.svg' class='iconoNota'> se eliminaría la información de manera permanente.
    </div>

    <div class="col align-self-end">
      <a class="rotate-link consultar ancla" style="font-size: larger;" accion="amaterial" status="cerrado">
        <img src="/fitcoControl/Resources/iconos/001-computer.svg" class="icon1 rotate-icon" style="width:30px;">
        <span class="spanA">Nuevo Registro</span>
      </a>

      <a class="rotate-link buscador ancla" accion="busc" status="cerrado">
        <img src="/fitcoControl/Resources/iconos/search.svg" class="icon rotate-icon" style="width:30px">
        <span class="spanB"><input class="buscar" type="text" name="busqueda"  id="busqueda" placeholder="Buscar"></span>
      </a>
    </div>
  </div>
</div>

  <div class="container-fluid mt-3">
    <section id="MostrarMateriales"></section>
  </div>

  <form id="NuevoMaterial" onsubmit="return false" class="agregarnuevo" style="display:none;margin-bottom:80px">
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




<?php
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/Modales/Materiales/ModalMateriales.php';
  require $root . '/fitcoControl/Resources/PHP/Materiales/pieMaterial.php';
?>
