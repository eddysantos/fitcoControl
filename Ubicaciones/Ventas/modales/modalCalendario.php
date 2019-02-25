
<!-- MODAL AGREGAR-->
<div class="modal fade" id="ModalAgregar">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">AGREGAR CITA</h5>
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
      </div>
      <div class="modal-body">
        <form id="formAgregar">
          <table class="table">
            <tr class="row m20" >
              <td class="col-md-12 input-effect p-0" style="display:none">
                <input class="modal-efecto-17 w-100 has-content" id="_pk_agenda" type="hidden">
                <label>ID</label>
                <span class="focus-border"></span>
                </div>
              </td>
            </tr>

            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input class="w-100 modal-efecto-17 has-content" id="_title" type="text">
                  <label for="_vendedor">Nombre Vendedor</label>
                  <span class="focus-border"></span>
              </td>
            </tr>

            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input class="modal-efecto-17 has-content popup-input w-100 border-0" id="_cliente" type="text" id-display="#popup-display-listaClientesCor" action="listaClientes" db-id="" autocomplete="off" >
                <div class="popup-list" id="popup-display-listaClientesCor" style="display:none"></div>
                <label for="txtDescripcion">Cliente</label>
                <span class="focus-border"></span>
              </td>
            </tr>

            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input class="w-100 modal-efecto-17 has-content" id="_contacto" type="text">
                  <label for="_contacto">Contacto</label>
                  <span class="focus-border"></span>
              </td>
            </tr>

            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input class="w-100 modal-efecto-17 has-content numeroClass" id="_telefono" type="text">
                  <label for="_telefono">Telefono</label>
                  <span class="focus-border"></span>
              </td>
            </tr>

            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input class="w-100 modal-efecto-17 has-content" id="_motivo" type="text">
                  <label for="_motivo">Motivo de la Visita / Cotizaciones Enviadas</label>
                  <span class="focus-border"></span>
              </td>
            </tr>

            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input class="w-100 modal-efecto-17 has-content" id="_start" type="datetime">
                  <label for="_start">Fecha de Inicio</label>
                  <span class="focus-border"></span>
              </td>
            </tr>

            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input class="w-100 modal-efecto-17 has-content" id="_end" type="datetime">
                  <label for="_end">Fecha Final</label>
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
            <tr class="row m20" >
              <td class="col-md-12 input-effect p-0" style="display:none">
                <input class="modal-efecto-17 w-100 has-content" id="pk_agenda" type="hidden">
                <label>ID</label>
                <span class="focus-border"></span>
                </div>
              </td>
            </tr>

            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input class="w-100 modal-efecto-17 has-content" id="title" type="text">
                  <label for="_vendedor">Nombre Vendedor</label>
                  <span class="focus-border"></span>
              </td>
            </tr>

            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input class="modal-efecto-17 has-content popup-input w-100 border-0" id="cliente" type="text" id-display="#popup-display-listaClientesCor" action="listaClientes" db-id="" autocomplete="off" >
                <div class="popup-list" id="popup-display-listaClientesCor" style="display:none"></div>
                <label for="txtDescripcion">Cliente</label>
                <span class="focus-border"></span>
              </td>
            </tr>

            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input class="w-100 modal-efecto-17 has-content" id="contacto" type="text">
                  <label for="_contacto">Contacto</label>
                  <span class="focus-border"></span>
              </td>
            </tr>

            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input class="w-100 modal-efecto-17 has-content numeroClass" id="telefono" type="text">
                  <label for="_telefono">Telefono</label>
                  <span class="focus-border"></span>
              </td>
            </tr>

            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input class="w-100 modal-efecto-17 has-content" id="motivo" type="text">
                  <label for="_motivo">Motivo de la Visita / Cotizaciones Enviadas</label>
                  <span class="focus-border"></span>
              </td>
            </tr>

            <tr class="row m20">
              <td class="col-md-6 input-effect p-0">
                <input class="w-100 modal-efecto-17 has-content" id="start" type="date">
                  <label for="_start">Fecha de Inicio</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col-md-1"></td>

              <td class="col-md-5 input-effect p-0">
                <input class="w-100 modal-efecto-17 has-content" id="startHora" type="time">
                  <label for="startHora">Hora de Inicio</label>
                  <span class="focus-border"></span>
              </td>
            </tr>

            <tr class="row m20">
              <td class="col-md-6 input-effect p-0">
                <input class="w-100 modal-efecto-17 has-content" id="end" type="date">
                  <label for="_end">Fecha Final</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col-md-1"></td>

              <td class="col-md-5 input-effect p-0">
                <input class="w-100 modal-efecto-17 has-content" id="endHora" type="time">
                  <label for="endHora">Hora Final</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
          </table>
        </form>
      </div>
      <div class="modal-footer">
        <?php if ($_SESSION['user']['ve_editar'] ==  1 || $admin): ?>
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
