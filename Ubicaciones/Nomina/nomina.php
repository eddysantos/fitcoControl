<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("Location: /fitcoControl/index.php");
}
$root = $_SERVER['DOCUMENT_ROOT'];
require  $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
?>


<?php if ($tr_ver == 1 || $admin): ?>
<div class="container-fluid pl-75 pr-57">
  <div class="row clt_usr  mt-4">
    <div class="col align-self-end">
      <a class="rotate-link consultar ancla" accion="anomina" status="cerrado">
        <img src="/fitcoControl/Resources/iconos/money.svg" class="icon rotate-icon" style="width:30px;">
        <span class="spanA">Agregar Nomina</span>
      </a>

      <!-- <a class="rotate-link buscador ancla" accion="busc" status="cerrado">
        <img src="/fitcoControl/Resources/iconos/search.svg" class="icon rotate-icon" style="width:30px">
        <span class="spanB"><input class="buscar" type="text" name="busqueda"  id="busqueda" placeholder="Buscar"></span>
      </a> -->

      <a class="rotate-link buscador ancla" accion="busc" status="cerrado">
        <img src="/fitcoControl/Resources/iconos/search.svg" class="icon rotate-icon" style="width:30px">
        <span class="spanB"><input class="buscar" type="text" name="busqueda"  id="busqueda" placeholder="Buscar"></span>
      </a>
    </div>
  </div>
</div>

<div class="container-fluid mt-4">
  <section id="MostrarNomina"></section>
</div>

<form id="NuevoNomina" class="agregarnuevo mb-10" style="display:none;margin-bottom:80px">
  <table class="table">
    <tbody>
      <tr class="row m20">
        <td class="col-md-12 input-effect p-0">
          <input  id="nom_fecha" class="effect-17 has-content" type="date" required>
            <label>Fecha Nomina</label>
            <span class="focus-border"></span>
        </td>
      </tr>
      <tr class="row m20">
        <td class="col-md-12 input-effect p-0">
          <input id="nom_serv" class="effect-17" type="text" required>
            <label>Servicios</label>
            <span class="focus-border"></span>
        </td>
      </tr>
      <tr class="row m20">
        <td class="col-md-12 input-effect p-0">
          <input id="nom_nom" class="effect-17" type="text" required>
            <label>Nomina</label>
            <span class="focus-border"></span>
        </td>
      </tr>
      <tr class="row m20">
        <td class="col-md-12 input-effect p-0">
          <input id="nom_cantNom" class="effect-17 importeClass" type="text" required>
            <label>Cantidad Nomina ($)</label>
            <span class="focus-border"></span>
        </td>
      </tr>
      <tr class="row m20">
        <td class="col-md-12 input-effect p-0">
          <input id="nom_hrExtras" class="effect-17" type="text" required>
            <label>Horas Extras Laboradas</label>
            <span class="focus-border"></span>
        </td>
      </tr>
      <tr class="row m20">
        <td class="col-md-12 input-effect p-0">
          <input id="nom_cantHr" class="effect-17 importeClass" type="text" required>
            <label>Cantidad de Dinero en horas extras ($)</label>
            <span class="focus-border"></span>
        </td>
      </tr>
      <tr class="row justify-content-center mb-3">
        <td class="col-md-4">
          <button type="submit" id="NuevoRegistroNomina" class="btnsub btn boton btn-block ">AGREGAR</button>
        </td>
      </tr>
    </tbody>
  </table>
</form>


<?php else:?>
  <div id='SinRegistros' class='container-fluid pantallaRegistros'>
    <div class='tituloSinRegistros' style="font-size:25px; color:red">SOLICITA PERMISO PARA ENTRAR EN ESTA SECCIÓN</div>
  </div>
<?php endif; ?>

<?php
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/Nomina/modales/ModalNomina.php';
  require $root . '/fitcoControl/Resources/PHP/Nomina/pieNomina.php';
?>
