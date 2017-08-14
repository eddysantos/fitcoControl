<?php
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
?>

  <div style="margin-top:100px;padding-right:50px">
    <div class="functions">
      <div class="add">
        <div class="icon">
          <i class="fa fa-plus fa-3x"></i>
        </div>
        <a id="adduser" class="ancla"><span class="span">Agregar Usuario</span></a>
      </div>
    </div>
    
  </div>

  <form id="usuarios" class="container-fluid page p0">
    <table class="table table-hover">
      <tbody>
        <tr class="row bordelateral m0" id="item">
          <td class="col-md-1">
            <img src="/fitcoControl/Resources/iconos/social.svg" class="icono">
          </td>
          <td class="col-md-5">
            <h4><b>Azeneth Estefania Pinales Avalos</b></h4>
            <a class="visibilidad" href="mailto:ae_pinales@hotmail.com">ae_pinales@hotmail.com</a>
          </td>
          <td class="col-md-3">
            <h4><b>Sistemas</b></h4>
            <p class="visibilidad">Auxiliar Sistemas</p>
          </td>
          <td class="col-md-1 offset-md-1 text-center">
            <div class="funcion">
              <div class="add">
                <div class="rotar">
                  <a href="#EditarUsuario" data-toggle="modal"><i class="fa fa-pencil fa-3x"></i></a>
                </div>
              </div>
            </div>
          </td>
          <td class="col-md-1 text-center">
            <div class="funcion">
              <div class="add">
                <div class="rotar">
                  <a href="#"><i class="fa fa-trash fa-3x"></i></a>
                </div>
              </div>
            </div>
          </td>
        </tr>
        <tr class="row bordelateral m0" id="item">
          <td class="col-md-1">
            <img src="/fitcoControl/Resources/iconos/social.svg" class="icono">
          </td>
          <td class="col-md-5">
            <h4><b>Claudia Ramos Colorado</b></h4>
            <a class="visibilidad" href="mailto:claudia@mail.com">claudia@mail.com</a>
          </td>
          <td class="col-md-3">
            <h4><b>Administración</b></h4>
            <p class="visibilidad">Auxliar Contable</p>
          </td>
          <td class="col-md-1 offset-md-1 text-center">
            <div class="funcion">
              <div class="add">
                <div class="rotar">
                  <a href="#EditarUsuario" data-toggle="modal"><i class="fa fa-pencil fa-3x"></i></a>
                </div>
              </div>
            </div>
          </td>
          <td class="col-md-1 text-center">
            <div class="funcion">
              <div class="add">
                <div class="rotar">
                  <a href="#"><i class="fa fa-trash fa-3x"></i></a>
                </div>
              </div>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </form>

  <form id="NuevoUsuario" class="container-fluid agregarnuevo" style="display:none">
    <table class="table">
      <tbody>
        <tr class="row m20">
          <td class="col-md-12 input-effect p0">
            <input class="effect-17" type="text">
              <label>Nombre (s)</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p0">
            <input class="effect-17" type="text">
              <label>Apellidos</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p0">
            <input class="effect-17" type="text">
              <label>Correo</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p0">
            <input class="effect-17" type="text">
              <label>Departamento</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p0">
            <input class="effect-17" type="text">
              <label>Puesto</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p0">
            <input class="effect-17" type="text">
              <label>Usuario</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p0">
            <input class="effect-17" type="text">
              <label>Contraseña</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p0">
            <input class="effect-17" list="priv" style="width: -webkit-fill-available;">
            <datalist id="priv">
              <option value="Usuario"></option>
              <option value="Administrador"></option>
            </datalist>
              <label>Privilegios</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row">
          <td class="col-md-4 offset-md-4">
            <button type="button" name="button" class="btn boton btn-block">AGREGAR</button>
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
