<div class="modal fade" id="addProducc">
  <div class="modal-dialog modal-med">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">Agregar nueva producción</h5>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <table class="table">
            <tbody>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input type="hidden" id="add_pk_linea" db-id="">
                  <input class="modal-efecto-17 popup-input" id="add_operacion" type="text" id-display="#popup-display-listaOperacion1" action="listaOperacion" db-id="" autocomplete="off">
                  <div class="popup-list" id="popup-display-listaOperacion1" style="display:none"></div>
                  <label for="add_operacion">Operacion</label>
                  <!-- <span class="focus-border"></span> -->
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-3 input-effect p-0">
                  <input type="text" class="modal-efecto-17" id="add_meta">
                  <label for="add_meta">Meta</label>
                  <span class="focus-border"></span>
                </td>
                <td class="col-md-1"></td>
                <td class="col-md-3 input-effect p-0">
                  <input id="add_prod1" class="modal-efecto-17 numeroClass" type="text" required>
                    <label for="add_prod1">1 hra</label>
                    <span class="focus-border"></span>
                </td>
                <td class="col-md-1"></td>
                <td class="col-md-3 input-effect p-0">
                  <input id="add_prod2" class="modal-efecto-17 numeroClass" type="text" required>
                    <label for="add_prod2">2 hra</label>
                    <span class="focus-border"></span>
                </td>
              </tr>

              <tr class="row m20">
                <td class="col-md-3 input-effect p-0">
                  <input id="add_prod3" class="modal-efecto-17 numeroClass" type="text" required>
                    <label for="add_prod3">3 hras</label>
                    <span class="focus-border"></span>
                </td>
                <td class="col-md-1"></td>
                <td class="col-md-3 input-effect p-0">
                  <input id="add_prod4" class="modal-efecto-17 numeroClass" type="text" required>
                    <label for="add_prod4">4 hras</label>
                    <span class="focus-border"></span>
                </td>
                <td class="col-md-1"></td>
                <td class="col-md-3 input-effect p-0">
                  <input id="add_prod5" class="modal-efecto-17 numeroClass" type="text" required>
                    <label for="add_prod5">5 hras</label>
                    <span class="focus-border"></span>
                </td>
              </tr>

              <tr class="row m20">
                <td class="col-md-3 input-effect p-0">
                  <input id="add_prod6" class="modal-efecto-17 numeroClass" type="text" required>
                    <label for="add_prod6">6 hras</label>
                    <span class="focus-border"></span>
                </td>
                <td class="col-md-1"></td>
                <td class="col-md-3 input-effect p-0">
                  <input id="add_prod7" class="modal-efecto-17 numeroClass" type="text" required>
                    <label for="add_prod7">7 hras</label>
                    <span class="focus-border"></span>
                </td>
                <td class="col-md-1"></td>
                <td class="col-md-3 input-effect p-0">
                  <input id="add_prod8" class="modal-efecto-17 numeroClass" type="text" required>
                    <label for="add_prod8">8 hras</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-3 input-effect p-0">
                  <input id="add_prod9" class="modal-efecto-17 numeroClass" type="text" required>
                    <label for="add_prod9">9 hras</label>
                    <span class="focus-border"></span>
                </td>
                <td class="col-md-1"></td>
                <td class="col-md-3 input-effect p-0">
                  <input id="add_prod10" class="modal-efecto-17 numeroClass" type="text" required>
                    <label for="add_prod10">10 hras</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="justify-content-center modal-footer">
        <button id="add-producc" type="submit" class="w-50 btnsub btn boton btn-block" db-id="">ACTUALIZAR</button>
      </div>
    </div>
  </div>
</div>
