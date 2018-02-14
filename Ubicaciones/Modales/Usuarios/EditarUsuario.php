
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
                  <input type="hidden" name="musr_id" id="musr_id">
                  <input class="modal-efecto-17 has-content" name="musr_nombre" id="musr_nombre" type="text">
                    <label>Nombre (s)</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="modal-efecto-17 has-content" name="musr_apellidos" id="musr_apellidos" type="text">
                    <label>Apellidos</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="modal-efecto-17 has-content" name="musr_correo" id="musr_correo" type="text">
                    <label>Correo</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="modal-efecto-17 has-content" name="musr_departamento" id="musr_departamento" type="text">
                    <label>Departamento</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="modal-efecto-17 has-content" name="musr_puesto" id="musr_puesto" type="text">
                    <label>Puesto</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="modal-efecto-17 has-content" name="musr_usuario" id="musr_usuario" type="text">
                    <label>Usuario</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="modal-efecto-17 has-content w-100" name="musr_contra" id="musr_contra" type="password">
                    <label>Contraseña</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="w-100 modal-efecto-17 has-content" name="musr_privilegios" id="musr_privilegios" list="priv">
                  <datalist id="priv">
                    <option value="Usuario"></option>
                    <option value="Administrador"></option>
                  </datalist>
                    <label>Privilegios</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row">
                <td class="col-md-6 text-center">
                  <input type="checkbox" id="musr_verCobranza" name="musr_verCobranza">Ver Cobranza
                </td>
                <td class="col-md-6 text-center">
                  <input type="checkbox" id="musr_editCobranza" name="musr_editCobranza">Editar Cobranza
                </td>
              </tr>
              <tr class="row">
                <td class="col-md-6 text-center">
                  <input type="checkbox" id="musr_verProduccion" name="musr_verProduccion">Ver Producción
                </td>
                <td class="col-md-6 text-center">
                  <input type="checkbox" id="musr_editProduccion" name="musr_editProduccion">Editar Producción
                </td>
              </tr>
              <tr class="row">
                <td class="col-md-6 text-center">
                  <input type="checkbox" id="musr_verCliente" name="musr_verCliente">Ver Cliente
                </td>
                <td class="col-md-6 text-center">
                  <input type="checkbox" id="musr_editCliente" name="musr_editCliente">Editar Cliente
                </td>
              </tr>
              <tr class="row">
                <td class="col-md-6 text-center">
                  <input type="checkbox" id="musr_verVentas" name="musr_verVentas">Ver Ventas
                </td>
                <td class="col-md-6 text-center">
                  <input type="checkbox" id="musr_editVentas" name="musr_editVentas">Editar Ventas
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
