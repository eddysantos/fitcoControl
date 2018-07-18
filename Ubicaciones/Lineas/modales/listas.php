<div class="modal fade" id="AgregarLista">
  <div class="modal-dialog modal-med">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">EDITAR DATOS DE LA LINEA</h5>
      </div>
      <div class="modal-body pt-0">
        <div class="row submenuMed">
          <ul class="nav nav-pills nav-fill w-100">
            <li class="nav-item">
              <a class="nav-link lt-lin" id="submenuchico" accion="empleado" status="cerrado">Lista Empleado</a>
            </li>
            <li class="nav-item">
              <a class="nav-link lt-lin" id="submenuchico" accion="operacion" status="cerrado">Lista Operación</a>
            </li>
          </ul>
        </div>

        <div class="text-center mt-5" id="lis-empleado" style="display:none">
          <table class="table">
            <tbody>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input id="a-numEmp" class="modal-efecto-17" type="text" required>
                    <label for="a-numEmp">Numero de Empleado</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input id="a-nombre" class="modal-efecto-17" type="text" required>
                    <label for="a-nombre">Nombre de Empleado</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input id="a-apellido" class="modal-efecto-17" type="text" required>
                    <label for="a-apellido">Apellido de Empleado</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="text-center mt-5" id="lis-operacion" style="display:none">
          <table class="table">
            <tbody>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input id="a-operacion" class="modal-efecto-17" type="text" required>
                    <label for="a-operacion">Operación</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="justify-content-center modal-footer">
        <button id="add-empleado" type="submit" class="w-50 btnsub btn boton btn-block" style="display:none">AGREGAR</button>
        <button id="add-operacion" type="submit" class="w-50 btnsub btn boton btn-block" style="display:none">AGREGAR</button>
      </div>
    </div>
  </div>
</div>
