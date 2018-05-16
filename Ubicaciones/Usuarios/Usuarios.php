<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("Location: /fitcoControl/index.php");
}
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
?>

<div class="container-fluid pl-75 pr-57">
  <div class="row clt_usr  mt-4">
    <div class="text-left alert alert-info w-75" role="alert" >
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
        <strong>Nota: </strong> En esta sección se podran agregar a los usuarios que utilizaran esta aplicacion, asi como sus privilegios dentro de esta, en el icono <img src='/fitcoControl/Resources/iconos/001-edit-1.svg' class='iconoNota'> se podra editar la información del usuario y privilegios.<br>
        En el icono <img src='/fitcoControl/Resources/iconos/004-delete-1.svg' class='iconoNota'> se eliminaría la información del usuario de manera permanente.
    </div>


    <div class="col align-self-end">
      <a class="rotate-link consultar ancla" accion="ausuario" status="cerrado">
        <img src="/fitcoControl/Resources/iconos/usuario.svg" class="icon rotate-icon" style="width:30px;">
        <span class="spanA">Agregar Usuario</span>
      </a>

      <a class="rotate-link buscador ancla" accion="busc" status="cerrado">
        <img src="/fitcoControl/Resources/iconos/search.svg" class="icon rotate-icon" style="width:30px">
        <span class="spanB"><input class="buscar" type="text" name="busqueda"  id="busqueda" placeholder="Buscar"></span>
      </a>
    </div>
  </div>
</div>

    <div class="container-fluid mt-4">
      <section id="mostrarUsuarios"></section>
    </div>


    <form id="NuevoUsuario" class="agregarnuevo mb-10" style="display:none;margin-bottom:80px">
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
                <label>Division o Departamento</label>
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
          <tr class="row ">
            <td class="col-md-6 text-center">
              <input type="checkbox" id="verCobranza">Ver Tesoreria
            </td>
            <td class="col-md-6 text-center">
              <input type="checkbox" id="editCobranza">Editar Tesoreria
            </td>
          </tr>
          <tr class="row">
            <td class="col-md-6 text-center">
              <input type="checkbox" id="verProduccion">Ver Producción
            </td>
            <td class="col-md-6 text-center">
              <input type="checkbox" id="editProduccion">Editar Producción
            </td>
          </tr>
          <tr class="row">
            <td class="col-md-6 text-center">
              <input type="checkbox" id="verCliente">Ver Cliente
            </td>
            <td class="col-md-6 text-center">
              <input type="checkbox" id="editCliente">Editar Cliente
            </td>
          </tr>
          <tr class="row">
            <td class="col-md-6 text-center">
              <input type="checkbox" id="verVentas">Ver Ventas
            </td>
            <td class="col-md-6 text-center">
              <input type="checkbox" id="editVentas">Editar Ventas
          </tr>
          <tr class="row justify-content-center mb-3">
            <td class="col-md-4">
              <button type="submit" id="NuevoRegistroUsuario" class="btnsub btn boton btn-block ">AGREGAR</button>
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
