<div class="modal" tabindex="-1" role="dialog" id="VerProdLineas">
  <div class="modal-dialog modal-grande" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">Producción</h5>
      </div>
      <div class="modal-body">
        <table class="table table-fixed">
          <thead>
            <tr class='row m-0 encabezado text-center'>
              <td class='col-md-1'><p>Operacion</p></td>
              <td class='col-md-1'><p>1 Hra</p></td>
              <td class='col-md-1'><p>2 Hras</p></td>
              <td class='col-md-1'><p>3 Hras</p></td>
              <td class='col-md-1'><p>4 Hras</p></td>
              <td class='col-md-1'><p>5 Hras</p></td>
              <td class='col-md-1'><p>6 Hras</p></td>
              <td class='col-md-1'><p>7 Hras</p></td>
              <td class='col-md-1'><p>8 Hras</p></td>
              <td class='col-md-1'><p>9 Hras</p></td>
              <td class='col-md-1'><p>10 Hras</p></td>
              <td class='col-md-1'></td>
            </tr>
          </thead>
          <tbody id="produccionLineas" class="font12">
            <tr>
              <td colspan="9">No hay resultados</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="editarProducc">
  <div class="modal-dialog modal-med">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">Editar Producción</h5>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <table class="table">
            <tbody>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input type="hidden" id="fk_linea" db-id="">
                  <input type="hidden" id="pk_ProdLin" db-id="">
                  <input type="text" class="modal-efecto-17 popup-input" id="operacion" id-display="#popup-display-listaOperacion" action="listaOperacion" db-id="" autocomplete="off">
                  <div class="popup-list" id="popup-display-listaOperacion" style="display:none"></div>
                  <label for="operacion">Operación</label>
                  <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-3 input-effect p-0">
                  <input type="text" class="modal-efecto-17 numeroClass" id="meta" onkeypress="nextFocus('meta','prod1')">
                  <label for="meta">Meta</label>
                  <span class="focus-border"></span>
                </td>
                <td class="col-md-1"></td>
                <td class="col-md-3 input-effect p-0">
                  <input id="prod1" class="modal-efecto-17 numeroClass" type="text" required onkeypress="nextFocus('prod1','prod2')">
                    <label for="prod1">1 hra</label>
                    <span class="focus-border"></span>
                </td>
                <td class="col-md-1"></td>
                <td class="col-md-3 input-effect p-0">
                  <input id="prod2" class="modal-efecto-17 numeroClass" type="text" required onkeypress="nextFocus('prod2','prod3')">
                    <label for="prod2">2 hra</label>
                    <span class="focus-border"></span>
                </td>
              </tr>

              <tr class="row m20">
                <td class="col-md-3 input-effect p-0">
                  <input id="prod3" class="modal-efecto-17 numeroClass" type="text" required onkeypress="nextFocus('prod3','prod4')">
                    <label for="prod3">3 hras</label>
                    <span class="focus-border"></span>
                </td>
                <td class="col-md-1"></td>
                <td class="col-md-3 input-effect p-0">
                  <input id="prod4" class="modal-efecto-17 numeroClass" type="text" required onkeypress="nextFocus('prod4','prod5')">
                    <label for="prod4">4 hras</label>
                    <span class="focus-border"></span>
                </td>
                <td class="col-md-1"></td>
                <td class="col-md-3 input-effect p-0">
                  <input id="prod5" class="modal-efecto-17 numeroClass" type="text" required onkeypress="nextFocus('prod5','prod6')">
                    <label for="prod5">5 hras</label>
                    <span class="focus-border"></span>
                </td>
              </tr>

              <tr class="row m20">
                <td class="col-md-3 input-effect p-0">
                  <input id="prod6" class="modal-efecto-17 numeroClass" type="text" required onkeypress="nextFocus('prod6','prod7')">
                    <label for="prod6">6 hras</label>
                    <span class="focus-border"></span>
                </td>
                <td class="col-md-1"></td>
                <td class="col-md-3 input-effect p-0">
                  <input id="prod7" class="modal-efecto-17 numeroClass" type="text" required onkeypress="nextFocus('prod7','prod8')">
                    <label for="prod7">7 hras</label>
                    <span class="focus-border"></span>
                </td>
                <td class="col-md-1"></td>
                <td class="col-md-3 input-effect p-0">
                  <input id="prod8" class="modal-efecto-17 numeroClass" type="text" required onkeypress="nextFocus('prod8','prod9')">
                    <label for="prod8">8 hras</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-3 input-effect p-0">
                  <input id="prod9" class="modal-efecto-17 numeroClass" type="text" required onkeypress="nextFocus('prod9','prod10')">
                    <label for="prod9">9 hras</label>
                    <span class="focus-border"></span>
                </td>
                <td class="col-md-1"></td>
                <td class="col-md-3 input-effect p-0">
                  <input id="prod10" class="modal-efecto-17 numeroClass" type="text" required onkeypress="nextFocus('prod10', 'medit-producc')">
                    <label for="prod10">10 hras</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="justify-content-center modal-footer">
        <button id="medit-producc" type="submit" class="w-50 btnsub btn boton btn-block" db-id="">ACTUALIZAR</button>
      </div>
    </div>
  </div>
</div>
