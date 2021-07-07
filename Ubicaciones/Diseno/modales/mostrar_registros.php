<div class="modal fade" id="RegistrosDiseno">
  <div class="modal-dialog modal-med1">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">Registros de Diseño</h5>
      </div>
      <div class="modal-body">
        <form onsubmit="return false">
          <table class="table">
            <tr class="row m-0 justify-content-center" id="contenido">
              <td class="col-md-4">
                <input class="efecto" type="date" id="d_fecha">
              </td>
              <td class="col-md-2">
                <input class="efecto numeroClass" type="text" id="d_requerido" placeholder="Requerido">
              </td>
              <td class="col-md-2">
                <input class="efecto numeroClass" type="text" id="d_entregados" placeholder="Entregado">
              </td>
              <td class="col-md-2">
                <input style="background-color: #eee;" class="efecto" type="text" id="d_porcentaje" placeholder="Porcentaje" readonly>
              </td>
              <td class="col-md-2 text-left">
                <a href="#" id="nuevo_Reg_Dis" class="rotate-link consultar ancla" style="font-size: larger; text-decoration:none">
                  <img src="/fitcoControl/Resources/iconos/add.svg" class="icon1 rotate-icon" style="width:30px;">
                </a>

              </td>
            </tr>
          </table>
        </form>

        <div class="mt-5" style="border: 1px solid #ccc;border-radius: 9px;">
          <table class="table table-fixed">
            <thead>
              <tr class='row m-0 encabezado text-center'>
                <td class='col-md-3'><p>Fecha</p></td>
                <td class='col-md-3'><p>Requerido</p></td>
                <td class='col-md-3'><p>Entregados</p></td>
                <td class='col-md-3'></td>
              </tr>
            </thead>
            <tbody id="tabla_diseno" class="font12">
              <tr>
                <td colspan="9">No hay resultados</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
