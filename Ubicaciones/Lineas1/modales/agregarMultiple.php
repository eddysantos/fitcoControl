<div class="modal" tabindex="-1" role="dialog" id="agregarMultiple">
  <div class="modal-dialog modal-grande" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">Agregar Multiple</h5>
      </div>
      <div class="modal-body">
        <form method="" id="insertMultiple">
          <div class="row fechaSelect">
            <div class="col-md-8 text-right mt-2 p-0 font14"><b>Cambiar fecha :</b></div>
            <div class="col-md-3">
              <input type="date" class="efecto" id="fechaSelect">
            </div>
            <div class="col-md-1">
              <a href="#" class="rotate-link ancla" id="updateFecha">
                <img src="/fitcoControl/Resources/iconos/refresh.svg" class="icon1 rotate-icon" style="width:30px;">
              </a>
            </div>
          </div>
          <table class="table fixed-table mt-5">
            <tbody id="Emp_produc"></tbody>
            <tfoot>
              <tr class="row justify-content-center">
                <td class="col-md-3">
                  <button type="submit" name="insertar" id="" class="btnsub btn boton btn-block">AGREGAR</button>
                </td>
              </tr>
            </tfoot>
          </table>
        </form>
      </div>
    </div>
  </div>
</div>
