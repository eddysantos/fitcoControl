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

<!-- <form class="" action="index.html" method="post"> -->
  <form id='Eusuarios' class='page p-0'>
    <table class='table table-hover'>
      <thead>
        <tr class='row m-0 encabezado'>
          <td class='col-md-1'></td>
          <td class='col-md-4 text-center'><h3>EMPLEADO</h3></td>
          <td class='col-md-3 text-center'><h3>DEPARTAMENTO</h3></td>
          <td class='col-md-2 text-center'><h3>PRIVILEGIOS</h3></td>
          <td class='col-md-2'></td>
        </tr>
      </thead>
      <tbody id="mostrarUsuarios"></tbody>
    </table>
  </form>

<!-- <div class="container-fluid mt-4">
  <section id="mostrarUsuarios"></section>
</div> -->


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

          <select id="usr_privilegios" class="w-100 effect-17" required>
            <option value="">Seleccionar Priv</option>
            <option value="Administrador">Administrador</option>
            <option value="Usuario">Usuario</option>
          </select>
        </td>
      </tr>

      <tr class="row m20 privusuarios" style="display:none">
        <td class="col-md-12"><a href="#privilegios" data-toggle="modal">Agregar Privilegios</a></td>
      </tr>

        <tr class="row justify-content-center mb-3 agregarNuevoRegistro" style="display:none">
          <td class="col-md-4">
            <button type="submit" id="NuevoRegistroUsuario" class="NuevoRegistroUsuario btnsub btn boton btn-block ">AGREGAR</button>
          </td>
        </tr>
    </tbody>
  </table>
</form>

<?php
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/Usuarios/modales/privilegios.php';
  require $root . '/fitcoControl/Ubicaciones/Usuarios/modales/editarUsuario.php';

?>
<footer class="footer">
  <li class="nav-item"><a  class="bn noborder w-100" href="/fitcoControl/Resources/PHP/Login/CerrarSesion.php" >
    <div class="row justify-content-center">
      <div class="col-md-3">
        Cerrar <img class="m-3" style="width:30px" src="/fitcoControl/Resources/iconos/001-close-1.svg"> Sesión</a>
      </div>
    </div>
  </li>



  <script src="/fitcoControl/Ubicaciones/Usuarios/js/usuarios.js"></script>
  <script src="/fitcoControl/Resources/js/Inputs.js"></script>
  <script src="/fitcoControl/Resources/js/MostrarDivsAgregar.js"></script>
</footer>
