
<div class="modal fade" id="AgregarEnvio">
  <div class="modal-dialog modal-med">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">ENVIOS</h5>
      </div>
      <div class="modal-body">
        <table class="table">
          <tbody>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input id="menv_status" class="w-100 modal-efecto-17 has-content" list="descEnvios" type="text">
                <datalist id="descEnvios">
                  <option value="Salida de Fitco">Salida de Fitco</option>
                  <option value="Arribo Nuevo Laredo">Arribo Nuevo Laredo</option>
                  <option value="Arribo a Laredo">Arribo a Laredo</option>
                  <option value="Despacho de Laredo a Liberty">Despacho de Laredo a Liberty</option>
                  <option value="Arribo con el Cliente">Arribo con el Cliente</option>
                </datalist>
                <label style="top:-16;font-size:12px;color:#014c8c;">Status</label>
                <span class="focus-border"></span>
              </td>
            </tr>
            <tr class="row m20">
              <td class="col-md-5 input-effect p-0">
                <input type="hidden" id="menv_id">
                <input class="modal-efecto-17 has-content w-100" id="menv_fecha" type="date" style="letter-spacing:3px">
                <label style="top:-16;font-size: 12px;color: #014c8c;">Fecha</label>
                <span class="focus-border"></span>
              </td>
              <td class="col-md-2"></td>
              <td class="col-md-5 input-effect p-0">
                <input type="time" class="modal-efecto-17 has-content w-100" id="menv_hora">
                  <label style="top:-16;font-size: 12px;color: #014c8c;">Hora</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input class="modal-efecto-17 has-content" id="menv_notas" type="text">
                  <label>Notas</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
          </tbody>
        </table>
      </div><!--termina el Cuerpo del Modal-->
      <div class="justify-content-center modal-footer">
        <button  type="submit" class="AgregarEnvio w-50 btnsub btn boton btn-block ">AGREGAR</button>
      </div>
    </div><!--termina el COntenido del Modal-->
  </div>
</div>



<div class="modal fade" id="VisualizarEnvio">
  <div class="modal-dialog modal-grande">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">RECORRIDO DE ENVIOS</h5>
      </div>
      <div class="modal-body">
        <table class="table">
          <thead class="encabezado m-0 text-center">
            <tr class="row">
              <td class="col-md-4">Status</td>
              <td class="col-md-2">Fecha</td>
              <td class="col-md-2">Horas</td>
              <td class="col-md-3">Nota</td>
            </tr>
          </thead>
          <tbody id="tablaEnvios"></tbody>
        </table>
      </div><!--termina el Cuerpo del Modal-->
    </div><!--termina el COntenido del Modal-->
  </div>
</div>




<div class="modal fade" id="EditarEnvio">
  <div class="modal-dialog modal-med">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">ENVIOS</h5>
      </div>
      <div class="modal-body">
        <table class="table">
          <tbody>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input id="descripcion" class="w-100 modal-efecto-17 has-content" list="descEnvios" type="text">
                <datalist id="descEnvios">
                  <option value="Salida de Fitco">Salida de Fitco</option>
                  <option value="Arribo Nuevo Laredo">Arribo Nuevo Laredo</option>
                  <option value="Arribo a Laredo">Arribo a Laredo</option>
                  <option value="Despacho de Laredo a Liberty">Despacho de Laredo a Liberty</option>
                  <option value="Arribo con el Cliente">Arribo con el Cliente</option>
                </datalist>
                <label style="top:-16;font-size:12px;color:#014c8c;">Status</label>
                <span class="focus-border"></span>
              </td>
            </tr>
            <tr class="row m20">
              <td class="col-md-5 input-effect p-0">
                <input type="hidden" id="pk_envios">
                <input class="modal-efecto-17 has-content w-100" id="fechaEnvio" type="date" style="letter-spacing:3px">
                <label style="top:-16;font-size: 12px;color: #014c8c;">Fecha</label>
                <span class="focus-border"></span>
              </td>
              <td class="col-md-2"></td>
              <td class="col-md-5 input-effect p-0">
                <input type="time" class="modal-efecto-17 has-content w-100" id="horaEnvio">
                  <label style="top:-16;font-size: 12px;color: #014c8c;">Hora</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input class="modal-efecto-17 has-content" id="notas" type="text">
                  <label>Notas</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
          </tbody>
        </table>
      </div><!--termina el Cuerpo del Modal-->
      <div class="justify-content-center modal-footer">
        <button  type="submit" class="ActualizarEnvio w-50 btnsub btn boton btn-block ">ACTUALIZAR</button>
      </div>
    </div><!--termina el COntenido del Modal-->
  </div>
</div>
