
<!-- MODAL AGREGAR-->
<div class="modal fade" id="agregarCorte">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">AGREGAR CORTE</h5>
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
      </div>
      <div class="modal-body">
        <table class="table">
          <tbody>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input type="hidden" id="mcor_id">
                <input class="w-100 modal-efecto-17 has-content"  id="mcor_fint" type="date" required>
                <label>Fecha</label>
                <span class="focus-border"></span>
              </td>
            </tr>

            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input class="w-100 modal-efecto-17 has-content numeroClass" id="mcor_meta" type="text" required>
                <label>Meta Diaria</label>
                <span class="focus-border"></span>
              </td>
            </tr>

            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input class="w-100 modal-efecto-17 has-content numeroClass" id="mcor_cant" type="text" required>
                  <label>Cantidad Elaborada</label>
                  <span class="focus-border"></span>
              </td>
            </tr>

            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input class="w-100 modal-efecto-17 has-content" id="mcor_not" type="text">
                  <label>Notas</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="justify-content-center modal-footer">
        <button type="submit" class="AgregarCor w-50 btnsub btn boton btn-block">Agregar</button>
      </div>
    </div>
  </div>
</div>






<div class="modal fade" id="VisualizarTablaCorte">
  <div class="modal-dialog modal-grande">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">Tabla Corte</h5>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <table class="table table-hover">
            <thead>
              <tr class="row encabezado">
                <td class='col-md-3 text-center'><h4>FECHA</h4></td>
                <td class='col-md-2 text-center'><h4>META</h4></td>
                <td class='col-md-2 text-center'><h4>ELABORADO</h4></td>
                <td class='col-md-3 text-center'><h4>NOTA</h4></td>
                <td class='col-md-2 text-center'></td>
              </tr>
            </thead>
            <tbody id="visualizarCorte"></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- EDITAR -->
<div class="modal fade" id="EdCor">
  <div class="modal-dialog modal-med">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">EDITAR</h5>
      </div>
      <div class="modal-body">
        <table class="table">
          <tbody>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input type="hidden" id="pk_CorteDiario">
                <input class="modal-efecto-17 has-content" id="fechaIntroduccion" type="date">
                <label>Fecha <span>*</span></label>
                <span class="focus-border"></span>
              </td>
            </tr>

            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input class="modal-efecto-17 has-content numeroClass" id="metaCorte" type="text">
                <label>Meta <span>*</span></label>
                <span class="focus-border"></span>
              </td>
            </tr>

            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input class="modal-efecto-17 has-content numeroClass" id="cantidadCorte" type="text">
                <label>Elaborado <span>*</span></label>
                <span class="focus-border"></span>
              </td>
            </tr>

            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input class="modal-efecto-17 has-content" id="notas" type="text">
                <label>Nota</label>
                <span class="focus-border"></span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="justify-content-center modal-footer">
        <button type="submit" class="ActualizarCor w-50 btnsub btn boton btn-block">ACTUALIZAR</button>
      </div>
    </div>
  </div>
</div>
