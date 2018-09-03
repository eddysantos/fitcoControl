
<!-- MODAL AGREGAR-->
<div class="modal fade" id="ModalAgregar">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">AGREGAR CORTE</h5>
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
      </div>
      <div class="modal-body">
        <form id="formAgregar">
          <table class="table">
            <tr class="row m20" >
              <td class="col-md-6 input-effect p-0" style="display:none">
                <input class="modal-efecto-17 w-100 has-content" id="_txtID" type="hidden">
                <label>ID</label>
                <span class="focus-border"></span>
                </div>
              </td>
              <!-- <td class="col-md-1"></td> -->
              <td class="col-md-12 input-effect p-0">
                <input class="w-100 modal-efecto-17 has-content" id="_txtColor" type="color" value="#4f8f00">
                  <label>Color de Programación</label>
                  <span class="focus-border"></span>
              </td>
            </tr>

            <tr class="row m20">
              <td class="col-md-6 input-effect p-0">
                <input class="modal-efecto-17 has-content popup-input w-100 border-0" id="_cliente" type="text" id-display="#popup-display-listaClientesCor" action="listaClientes" db-id="" autocomplete="off" >
                <div class="popup-list" id="popup-display-listaClientesCor" style="display:none"></div>
                <label for="txtDescripcion">Cliente</label>
                <span class="focus-border"></span>
              </td>

              <!-- <td class="col-md-6 input-effect p-0">
                <input class="modal-efecto-17 w-100 has-content" id="_cliente" type="text">
                <label for="_cliente">Cliente</label>
                <span class="focus-border"></span>
                <div class="client-list" id="mpgr_ClientList" style="display: none"></div>
              </td> -->


              <td class="col-md-1"></td>

              <td class="col-md-5 input-effect p-0">
                <input class="w-100 modal-efecto-17 has-content" id="_txtDescripcion" type="text">
                  <label for="_txtDescripcion">Requerido (Pzas)</label>
                  <span class="focus-border"></span>
              </td>
            </tr>

            <tr class="row m20">
              <td class="col-md-6 input-effect p-0">
                <input class="w-100 modal-efecto-17 has-content" id="_txtFecha" type="date">
                  <label for="_txtFecha">Fecha de Inicio</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col-md-1"></td>

              <td class="col-md-5 input-effect p-0">
                <input class="w-100 modal-efecto-17 has-content" id="_txtHora" type="time" value="08:00">
                  <label for="_txtHora">Hora de Inicio</label>
                  <span class="focus-border"></span>
              </td>
            </tr>

            <tr class="row m20">
              <td class="col-md-6 input-effect p-0">
                <input class="w-100 modal-efecto-17 has-content" id="_txtFin" type="date">
                  <label for="_txtFin">Fecha Final</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col-md-1"></td>

              <td class="col-md-5 input-effect p-0">
                <input class="w-100 modal-efecto-17 has-content" id="_txtHoraFin" type="time" value="18:00">
                  <label for="_txtHoraFin">Hora Final</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
          </table>
        </form>
      </div>
      <div class="modal-footer">
        <button id="btnAgregar" type="button" class="btn btn-success">Agregar</button>
        <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>


<!-- MODAL EDITAR-->
<div class="modal fade" id="ModalEventos">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tituloEvento"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <table class="table">

            <tr class="row m20">
              <td class="col-md-5 input-effect p-0" style="display:none">
                <input class="modal-efecto-17 w-100 has-content" id="txtID" type="text">
                <label>ID</label>
                <span class="focus-border"></span>
                </div>
              </td>
              <!-- <td class="col-md-1"></td> -->
              <td class="col-md-12 input-effect p-0">
                <input class="w-100 modal-efecto-17 has-content" id="txtColor" type="color">
                  <label>Color de Programación</label>
                  <span class="focus-border"></span>
              </td>
            </tr>

            <tr class="row m20">
              <td class="col-md-6 input-effect p-0">
                <!-- <input class="modal-efecto-17 w-100 has-content" id="cliente" type="text">
                <label for="cliente">Cliente</label>
                <span class="focus-border"></span>
                <div class="client-list" id="Epgr_ClientList" style="display: none">
                </div> -->


                <input class="modal-efecto-17 has-content popup-input w-100 border-0" id="cliente" type="text" id-display="#popup-display-listaClientesCorED" action="listaClientes" db-id="" autocomplete="off">
                <div class="popup-list" id="popup-display-listaClientesCorED" style="display:none"></div>
                <label for="txtDescripcion">Cliente</label>
                <span class="focus-border"></span>
              </td>
              <td class="col-md-1"></td>

              <td class="col-md-5 input-effect p-0">
                <input class="w-100 modal-efecto-17 has-content"id="txtDescripcion" type="text">
                  <label for="txtDescripcion">Requerido (Pzas)</label>
                  <span class="focus-border"></span>
              </td>
            </tr>

            <tr class="row m20">
              <td class="col-md-6 input-effect p-0">
                <input class="w-100 modal-efecto-17 has-content" id="txtFecha" type="date">
                  <label for="txtFecha">Fecha de Inicio</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col-md-1"></td>

              <td class="col-md-5 input-effect p-0">
                <input class="w-100 modal-efecto-17 has-content" id="txtHora" type="time" value="08:00">
                  <label for="txtHora">Hora de Inicio</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
            <tr class="row m20">
              <td class="col-md-6 input-effect p-0">
                <input class="w-100 modal-efecto-17 has-content" id="txtFin" type="date">
                  <label for="txtFin">Fecha Final</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col-md-1"></td>

              <td class="col-md-5 input-effect p-0">
                <input class="w-100 modal-efecto-17 has-content" id="txtHoraFin" type="time" value="18:00">
                  <label for="txtHoraFin">Hora Final</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
          </table>
        </form>
      </div>
      <div class="modal-footer">
        <?php if ($_SESSION['user']['pro_corEditar'] ==  1 || $admin): ?>
          <button id="btnModificar" type="button" class="btn btn-primary">Modificar</button>
          <button id="btnEliminar" type="button" class="btn btn-danger">Borrar</button>
          <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
        <?php else: ?>
          <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>

        <?php endif; ?>

      </div>
    </div>
  </div>
</div>
