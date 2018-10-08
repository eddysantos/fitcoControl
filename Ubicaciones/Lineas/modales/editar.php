<div class="modal fade" id="EditarLinea">
  <div class="modal-dialog modal-med">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">EDITAR DATOS DE LA LINEA</h5>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <table class="table">
            <tbody>
              <tr class="row m20">
                <td class="col-md-4 input-effect p-0">
                  <input type="hidden" id="pk_linea" db-id="">
                  <input id="linea" class="modal-efecto-17 has-content" type="text" required>
                    <label>Linea</label>
                    <span class="focus-border"></span>
                </td>
                <td class="col-md-1"></td>

                <td class="col-md-7 input-effect p-0">
                  <input id="fecha" class="modal-efecto-17 has-content" type="date" required>
                    <label>Fecha</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input id="operacion" class="modal-efecto-17 has-content popup-input" type="text" id-display="#popup-display-listaOperacionm" action="listaOperacion" db-id="" autocomplete="new-password">
                  <div class="popup-list" id="popup-display-listaOperacionm" style="display:none"></div>
                  <label for="operacion">Operacion</label>
                  <span class="focus-border"></span>
                </td>
              </tr>

              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="modal-efecto-17 has-content popup-input" id="nombre" type="text" id-display="#popup-display-listaEmpleadosm" action="listaEmpleados" db-id="" autocomplete="new-password">
                  <div class="popup-list" id="popup-display-listaEmpleadosm" style="display:none"></div>
                  <label for="nombre">Nombre de Empleado</label>
                  <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-4 input-effect p-0">
                  <input  id="meta" class="modal-efecto-17 has-content numeroClass" type="text" required>
                    <label>Meta</label>
                    <span class="focus-border"></span>
                </td>
                <td class="col-md-1"></td>
                <td class="col-md-7 input-effect p-0">
                  <input id="prod1" class="modal-efecto-17 has-content numeroClass" type="text" required>
                    <label>Produccion 1ra Hora</label>
                    <span class="focus-border"></span>
                </td>
              </tr>


            </tbody>
          </table>
        </div>
      </div>
      <div class="justify-content-center modal-footer">
        <button id="medit-linea" type="submit" class="editarlinea w-50 btnsub btn boton btn-block">ACTUALIZAR</button>
      </div>
    </div>
  </div>
</div>
