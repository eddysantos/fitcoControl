<div class="modal fade" id="ModalAgregarProgram">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">AGREGAR PROGRAMACIÓN</h5>
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
      </div>
      <div class="modal-body">
        <form id="formAgregar">
          <table class="table">
            <tr class="row m20" style="display:none">
              <td class="col-md-6 input-effect p-0">
                <input class="modal-efecto-17 w-100 has-content" id="pk_programacion" type="hidden">
                <label>ID</label>
                <span class="focus-border"></span>
                </div>
              </td>
              <td class="col-md-1"></td>
            </tr>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input class="w-100 modal-efecto-17 has-content" id="color" type="color" value="#4f8f00">
                <!-- <input class="w-100 modal-efecto-17 has-content" id="color" type="hide" value="#ffffff"> -->
                  <label>Color de Programación</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
            <tr class="row m20">
              <td class="col-md-6 input-effect p-0">
                <input class="modal-efecto-17 has-content popup-input w-100 border-0" id="title" type="text" id-display="#popup-display-listaClientesAprog" action="listaClientes" db-id="" autocomplete="off">
                <div class="popup-list" id="popup-display-listaClientesAprog" style="display:none"></div>
                <label for="txtDescripcion">Cliente</label>
                <span class="focus-border"></span>
              </td>
              <td class="col-md-1"></td>
              <!-- <td class="col-md-5 input-effect p-0">
                <input class="w-100 modal-efecto-17 has-content" id="piezasRequeridas" type="text">
                  <label for="_txtDescripcion">Requerido (Pzas)</label>
                  <span class="focus-border"></span>
              </td> -->
              <td class="col-md-5 input-effect p-0">
                <input class="w-100 modal-efecto-17 has-content" id="add_piezasRequeridas" type="text">
                  <label for="add_piezasRequeridas">Requerido (Pzas)</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
            <tr class="row m20">
              <td class="col-md-6">
                <input class="w-100 modal-efecto-17 has-content border-0" id="add_corte" type="text">
                  <label>Corte</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col-md-1"></td>
              <td class="col-md-5">
                <input class="w-100 modal-efecto-17 has-content border-0" id="add_piezasDiarias" type="text" onblur="calculo()">
                  <label>Piezas Diarias</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
            <tr class="row m20">
              <td class="col-md-6">
                <input class="w-100 modal-efecto-17 has-content border-0" id="add_piezasHora" type="text">
                  <label>Piezas x hora</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col-md-1"></td>
              <td class="col-md-5">
                <input class="w-100 modal-efecto-17 has-content border-0" id="add_horasNecesarias" type="text">
                  <label>Horas necesarias</label>
                  <span class="focus-border"></span>
              </td>
            </tr>

            <tr class="row m20">
              <td class="col-md-6 input-effect p-0">
                <input class="w-100 modal-efecto-17 has-content" id="add_start" type="date" onblur="fechadias()">
                  <label for="start">Fecha de Inicio</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col-md-1"></td>
              <td class="col-md-5 input-effect p-0">
                <input class="w-100 modal-efecto-17 has-content" id="add_HoraStart" type="time" value="08:00">
                  <label for="HoraStart">Hora de Inicio</label>
                  <span class="focus-border"></span>
              </td>
            </tr>

            <tr class="row m20">
              <td class="col-md-6 input-effect p-0">
                <input class="w-100 modal-efecto-17 has-content" id="add_end" type="date">
                  <label for="end">Fecha Final</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col-md-1"></td>
              <td class="col-md-5 input-effect p-0">
                <input class="w-100 modal-efecto-17 has-content" id="add_HoraEnd" type="time" value="18:00">
                  <label for="HoraEnd">Hora Final</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
          </table>
        </form>
      </div>
      <div class="modal-footer">
        <button id="AgregarProgram" type="button" class="btn btn-success">Agregar</button>
      </div>
    </div>
  </div>
</div>
