
<div class="modal fade" id="EditarUsuario">
  <div class="modal-dialog modal-med" style="margin-top:65px!important">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">EDITAR DATOS DE USUARIO</h5>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <table class="table">
            <tbody>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input type="hidden"  id="pk_usuario" db-id="">
                  <input class="modal-efecto-17 has-content"  id="nombreUsuario" type="text">
                    <label>Nombre (s)</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="modal-efecto-17 has-content"  id="apellidosUsuario" type="text">
                    <label>Apellidos</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="modal-efecto-17 has-content" id="correoUsuario" type="text">
                    <label>Correo</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="modal-efecto-17 has-content" id="departamentoUsuario" type="text">
                    <label>Departamento</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="modal-efecto-17 has-content" id="puestoUsuario" type="text">
                    <label>Puesto</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="modal-efecto-17 has-content" id="usrUsuario" type="text">
                    <label>Usuario</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="modal-efecto-17 has-content w-100" id="contraUsuario" type="password">
                    <label>Contraseña</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="w-100 modal-efecto-17 has-content" id="privilegiosUsuario" list="priv">
                  <datalist id="priv">
                    <option value="Usuario"></option>


                    <option value="Administrador"></option>
                  </datalist>
                    <label>Privilegios</label>
                    <span class="focus-border"></span>
                </td>
              </tr>

              <tr class="row m20 edit_priv" style="">
                <td class="col-md-12">
                  <a href="#edit_priv_privilegios" data-toggle="modal" class="btn w-100 font12">Ver privilegios</a>
                </td>
              </tr>
            </tbody>
          </table>

        </div><!--termina el Container-Fluid-->
      </div><!--termina el Cuerpo del Modal-->
      <div class="justify-content-center modal-footer">
        <button id="ActualizarUsuario" type="submit" class="ActualizarUsuario w-50 btnsub btn boton btn-block">ACTUALIZAR</button>
      </div>
    </div><!--termina el COntenido del Modal-->
  </div>
</div>
