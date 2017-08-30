<?php
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
?>

  <div class="mt-100 pr-50" style="padding-right:50px">

  <div class="links  mr-5">
    <a id="adduser" class="rotate-link consultar ancla" style="font-size: larger;">
      <img src="/fitcoControl/Resources/iconos/003-add.svg" class="icon rotate-icon" style="width:30px;">
      <span class="span">AGREGAR USUARIO</span>
    </a>
  </div>


  <form id="usuarios" class="page p-0">
    <table class="table table-hover">
      <tbody>

        <?php
          require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
          $query = "SELECT * FROM usuarios";
          $resultado = $conn->query($query);
          while($row = $resultado->fetch_assoc()){
        ?>

        <tr class="row bordelateral m-0" id="item">
          <td class="col-md-1">
            <img src="/fitcoControl/Resources/iconos/users.svg" class="icono">
          </td>
          <td class="col-md-4">
            <h4><b><?php echo $row['nombre'];?>  <?php echo $row['apellidos']; ?></b></h4>
            <a class="visibilidad"><?php echo $row['correo']; ?></a>
          </td>
          <td class="col-md-3">
            <h4><b><?php echo $row['puesto']; ?></b></h4>
            <p class="visibilidad"><?php echo $row['departamento']; ?></p>
          </td>
          <td class="col-md-2"><?php echo $row['privilegios']; ?></td>
          <td class="col-md-2 text-center">
            <a href="#EditarUsuario" class="rotate-link" data-toggle="modal"><img src="/fitcoControl/Resources/iconos/pencil1.svg" class="rotate-icon"   style="width:30px"></a>
            <a class="rotate-link ml-5" onclick="return confirm('¿Estas seguro?');"  href="/fitcoControl/Resources/PHP/Usuarios/EliminarUsuario.php?id=<?php echo $row['id']; ?>"><img src="/fitcoControl/Resources/iconos/trash.svg" style="width:30px" class="rotate-icon"></a>
          </td>
        </tr>
        <?php
          }
        ?>
      </tbody>
    </table>
  </form>

  <form action="/fitcoControl/Resources/PHP/Usuarios/Agregarusuario.php"  id="NuevoUsuario" class="agregarnuevo" style="display:none" method="POST">
    <table class="table">
      <tbody>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input type="text" name="usr_id" style="display:none">
            <input name="usr_nombre" class="effect-17" type="text" required>
              <label>Nombre (s)</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input  name="usr_apellidos" class="effect-17" type="text" required>
              <label>Apellidos</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input name="usr_correo" class="effect-17" type="text" required>
              <label>Correo</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input name="usr_departamento" class="effect-17" type="text" required>
              <label>Departamento</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input name="usr_puesto" class="effect-17" type="text" required>
              <label>Puesto</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input name="usr_usuario" class="effect-17" type="text" required>
              <label>Usuario</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input  name="usr_contra" class="effect-17" type="text" required>
              <label>Contraseña</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input name="usr_privilegios" class="w-100 effect-17" type="text" required>
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
            <button type="submit" name="usr_button" class="btnsub btn boton btn-block ">AGREGAR</button>
          </td>
        </tr>
      </tbody>
    </table>
  </form>





  <?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    require $root . '/fitcoControl/Ubicaciones/footer.php';
    require $root . '/fitcoControl/Ubicaciones/Modales/Usuarios/Editar.php';
  ?>
