<?php
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
?>

  <div class="mt-100 pr-50" style="padding-right:50px">

  <div class="clt_usr  mr-5">
    <a class="rotate-link consultar ancla" style="font-size: larger;" accion="ausuario" status="cerrado">
      <img src="/fitcoControl/Resources/iconos/003-add.svg" class="icon1 rotate-icon" style="width:30px;">
      <span class="span">AGREGAR USUARIO</span>
    </a>
  </div>

  <form id="Eusuarios" class="page p-0" style="margin-top:130px">
    <table class="table table-hover">
      <thead>
        <tr class="row m-0 encabezado">
          <td class="col-md-1"></td>
          <td class="col-md-4 text-center">
            <h3>EMPLEADO</h3>
          </td>
          <td class="col-md-3 text-center">
            <h3>DEPARTAMENTO</h3>
          </td>
          <td class="col-md-2 text-center">
            <h3>PRIVILEGIOS</h3>
          </td>
          <td class="col-md-2"></td>
        </tr>
      </thead>
    </table>
  </form>
  <form id="usuarios" class="page p-0" style="margin-top:180px">
    <table class="table table-hover">
      <tbody id="mostrarUsuarios">
      </tbody>
    </table>
  </form>

  <form id="NuevoUsuario" onsubmit="return false;" class="agregarnuevo" style="display:none">
    <table class="table">
      <tbody>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input type="text" id="usr_id" style="display:none">
            <input id="usr_nombre" class="effect-17" type="text" required>
              <label>Nombre (s)</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input  id="usr_apellidos" class="effect-17" type="text" required>
              <label>Apellidos</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input id="usr_correo" class="effect-17" type="text" required>
              <label>Correo</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input id="usr_departamento" class="effect-17" type="text" required>
              <label>Departamento</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input id="usr_puesto" class="effect-17" type="text" required>
              <label>Puesto</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input id="usr_usuario" class="effect-17" type="text" required>
              <label>Usuario</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input  id="usr_contra" class="effect-17" type="text" required>
              <label>Contraseña</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input id="usr_privilegios" class="w-100 effect-17" list="ingr" required>
            <datalist id="ingr">
              <option value="Administrador">Administrador</option>
              <option value="Usuario">Usuario</option>
            </datalist>
            <label>Privilegios</label>
            <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row justify-content-center mb-3">
          <td class="col-md-4">
            <button id="NuevoRegistroUsuario" class="btnsub btn boton btn-block ">AGREGAR</button>
          </td>
        </tr>
      </tbody>
    </table>
  </form>


  <?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    require $root . '/fitcoControl/Ubicaciones/Modales/Usuarios/EditarUsuario.php';
    require $root . '/fitcoControl/Resources/PHP/Usuarios/pieUsuario.php';
  ?>
