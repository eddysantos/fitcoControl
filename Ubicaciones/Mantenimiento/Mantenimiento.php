<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("Location: /fitcoControl/index.php");
}
$root = $_SERVER['DOCUMENT_ROOT'];
require  $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';

if ($admin || $pro_miVer == 1):
?>


<div class="container-fluid pl-75 pr-57">
  <div class="row clt_usr  mt-5 mb-5">
    <div class="col align-self-end">
      <a class="rotate-link consultar ancla" style="font-size: larger;" accion="amantenimiento" status="cerrado">
<<<<<<< Updated upstream
        <img src="/fitcoControl/Resources/iconos/001-wrench.svg" class="icon1 rotate-icon" style="width:30px;">
        <span class="spanA">Nuevo Registro</span>
      </a>

      <a href="/fitcoControl/Ubicaciones/Mantenimiento/reporte.php"
       class="consultar rotate-link ancla" style="text-decoration:none;">
        <img  src="/fitcoControl/Resources/iconos/money.svg" class="icon rotate-icon" style="width:30px">
        <span class="spanA">Terminado</span>
      </a>

      <a id="correo" href="#"
       class="consultar rotate-link ancla" style="text-decoration:none;">
        <img  src="/fitcoControl/Resources/iconos/mail.svg" class="icon rotate-icon" style="width:30px">
        <span class="spanA">Enviar Correo</span>
      </a>

      <a class="rotate-link buscador ancla">
        <img src="/fitcoControl/Resources/iconos/search.svg" class="icon rotate-icon" style="width:30px">
        <span class="spanB"><input class="effect-17 real-time-search" type="text" name="search"  placeholder="Buscar..." table-body="#tabla_Mantenimiento" action="mostrar"></span>
=======
        <img src="/fitcoControl/Resources/iconos/001-computer.svg" class="icon1 rotate-icon" style="width:30px;">
        <span class="spanA">Nuevo Registro</span>
      </a>

      <a class="rotate-link buscador ancla" accion="busc" status="cerrado">
        <img src="/fitcoControl/Resources/iconos/search.svg" class="icon rotate-icon" style="width:30px">
        <span class="spanB"><input class="buscar" type="text" name="busqueda"  id="busqueda" placeholder="Buscar"></span>
>>>>>>> Stashed changes
      </a>
    </div>
  </div>
</div>


<<<<<<< Updated upstream
=======


>>>>>>> Stashed changes
<!--MOSTRAR TABLA  -->
<form class="page p-0" id="tablaMantenimiento" onsubmit="return false">
  <table class="table table-hover fixed-table">
    <thead>
      <tr class='row m-0 encabezado text-center'>
<<<<<<< Updated upstream
        <td class='col-md-1'><p>Orden</p></td>
        <td class='col-md-5'><p>Datos de Mantenimiento / Inversion</p></td>
        <td class='col-md-4'><p>Datos de la Compra / Gasto </p></td>
=======
        <td class='col-md-2'>
          <h3><a class="consultar" accion="verEfi" status="cerrado">
          <img  src='/fitcoControl/Resources/iconos/002-order.svg' class='img ml-3 spand-icon'>
        </a>Fecha</h3>
      </td>
        <td class='col-md-4'><h3>Nombre de Empleado</h3></td>
        <td class='col-md-3'><h3>Operación</h3></td>
        <td class='col-md-1'><h3>Linea</h3></td>
>>>>>>> Stashed changes
        <td class='col-md-2'></td>
      </tr>
    </thead>
    <tbody id="tabla_Mantenimiento" class="font12">
      <tr>
        <td colspan="9">No hay resultados</td>
      </tr>
    </tbody>
  </table>
</form>

<<<<<<< Updated upstream
=======


>>>>>>> Stashed changes
<!-- AGREGAR REGISTRO  -->
<form id="NuevoMantenimiento" onsubmit="return false" class="agregarnuevo" style="display:none;margin-bottom:80px">
  <table class="table">
    <tbody>
      <tr class="row m20">
        <td class="col-md-12 input-effect p-0">
<<<<<<< Updated upstream
          <input id="man_pagado" type="hidden" value="0">
          <input id="man_aut" type="hidden" value="0" >
          <input id="man_orden" class="effect-17 numeroClass" type="text" required>
=======
          <input id="man_orden" class="effect-17" type="text" required>
>>>>>>> Stashed changes
            <label>Orden de Importancia</label>
            <span class="focus-border"></span>
        </td>
      </tr>
      <tr class="row m20">
        <td class="col-md-12 input-effect p-0">
<<<<<<< Updated upstream
          <input id="man_inversion" class="effect-17" type="text" required>
            <label>Mantenimiento / Inversión</label>
            <span class="focus-border"></span>
        </td>
      </tr>
      <tr class="row m20">
        <td class="col-md-12 input-effect p-0">
          <input id="man_area" class="effect-17" type="text" required>
            <label>Area</label>
            <span class="focus-border"></span>
        </td>
      </tr>
      <tr class="row m20">
        <td class="col-md-12 input-effect p-0">
          <input id="man_descripcion" class="effect-17" type="text" required>
            <label>Descripción</label>
=======
          <input id="man_orden" class="effect-17" type="text" required>
            <label>Orden de Importancia</label>
>>>>>>> Stashed changes
            <span class="focus-border"></span>
        </td>
      </tr>
      <tr class="row m20">
        <td class="col-md-12 input-effect p-0">
<<<<<<< Updated upstream
          <input id="man_proveedor" class="effect-17" type="text" required>
            <label>Proveedor</label>
=======
          <input id="man_orden" class="effect-17" type="text" required>
            <label>Orden de Importancia</label>
>>>>>>> Stashed changes
            <span class="focus-border"></span>
        </td>
      </tr>
      <tr class="row m20">
        <td class="col-md-12 input-effect p-0">
<<<<<<< Updated upstream
          <input id="man_costo" class="effect-17 importeClass" type="text">
            <label>Costo con IVA</label>
=======
          <input id="man_orden" class="effect-17" type="text" required>
            <label>Orden de Importancia</label>
>>>>>>> Stashed changes
            <span class="focus-border"></span>
        </td>
      </tr>
      <tr class="row m20">
        <td class="col-md-12 input-effect p-0">
          <input id="man_fecha" class="effect-17 has-content" type="date" required>
            <label>Fecha Requerido</label>
            <span class="focus-border"></span>
        </td>
      </tr>

      <tr class="row justify-content-center mb-3">
        <td class="col-md-4">
<<<<<<< Updated upstream
          <button type="submit" id="NuevoRegistroMan" class="btnsub btn boton btn-block ">AGREGAR</button>
=======
          <button type="submit" id="NuevoRegistroLin" class="btnsub btn boton btn-block ">AGREGAR</button>
>>>>>>> Stashed changes
        </td>
      </tr>
    </tbody>
  </table>
</form>


<<<<<<< Updated upstream
=======



>>>>>>> Stashed changes
<?php else:?>
  <div id='SinRegistros' class='container-fluid pantallaRegistros'>
    <div class='tituloSinRegistros' style="font-size:25px; color:red">SOLICITA PERMISO PARA ENTRAR EN ESTA SECCIÓN</div>
  </div>
<?php endif; ?>


<<<<<<< Updated upstream


<?php
  // $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/Mantenimiento/modales/editar.php';
  require $root . '/fitcoControl/Ubicaciones/Mantenimiento/actions/footer.php';
=======
<?php
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/Modales/Materiales/ModalMateriales.php';
  require $root . '/fitcoControl/Resources/PHP/Materiales/pieMaterial.php';
>>>>>>> Stashed changes
?>
