
<div class="modal fade" id="ModalGraficaCobranza">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">DETALLE Y GRAFICO DE COBRANZA</h5>
      </div>
      <div class="modal-body">
        <div id="chart_div" class=""></div>
        <table class="table table-hover table-fixed">
          <thead>
            <tr class="row m-0 encabezado">
              <td class="col-md-1"></td>
              <td class="col-md-2 text-center">
                <h3>CLIENTE</h3>
              </td>
              <td class="col-md-3 text-center">
                <h3>SEMANA</h3>
              </td>
              <td class="col-md-3 text-center">
                <h3>TOTAL</h3>
              </td>
              <td class="col-md-3 text-center">
                <h3>PAGADO</h3>
              </td>
            </tr>
          </thead>
          <tbody id="mostrarTablaGrafica"></tbody>
        </table>
      </div><!--termina el Cuerpo del Modal-->
    </div><!--termina el COntenido del Modal-->
  </div>
</div>
