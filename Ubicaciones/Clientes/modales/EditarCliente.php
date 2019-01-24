<!--
<div class="modal fade" id="EditarCliente">
  <div class="modal-dialog modal-med">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">EDITAR DATOS DEL CLIENTE</h5>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <table class="table">
            <tbody>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input type="hidden" name="mclt_id" id="mclt_id">
                  <input class="modal-efecto-17 has-content" name="mclt_cliente" id="mclt_cliente" type="text">
                    <label>Nombre del Cliente</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="modal-efecto-17 has-content" id="mclt_ncontacto" type="text">
                    <label>Nombre de Contacto</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="w-100 modal-efecto-17 has-content" name="mclt_correo" id="mclt_correo" type="text">
                    <label>Correo Cliente</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-6 input-effect p-0">
                  <input class="w-100 modal-efecto-17 has-content numeroClass" name="mclt_telefono" id="mclt_telefono" type="text">
                    <label>Telefono Cliente</label>
                    <span class="focus-border"></span>
                </td>
                <td class="col-md-1"></td>
                <td class="col-md-5 input-effect p-0">
                  <input class="w-100 modal-efecto-17 has-content numeroClass" name="mclt_credito" id="mclt_credito" type="text">
                    <label>Credito Cliente</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-6 input-effect p-0">
                  <input class="w-100 modal-efecto-17 has-content" name="mclt_fingreso" id="mclt_fingreso" type="date">
                    <label>Fecha Ingreso</label>
                    <span class="focus-border"></span>
                </td>
                <td class="col-md-1"></td>
                <td class="col-md-5 input-effect p-0">
                  <input class="modal-efecto-17 has-content w-100" name="mclt_color" id="mclt_color" type="color">
                    <label>Color Cliente</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="modal-efecto-17 has-content numeroClass"  type="text" name="mclt_prendas" id="mclt_prendas">
                    <label>Prendas Solicitadas por Mes</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input id="mclt_precio" class="modal-efecto-17 has-content importeClass" type="text" required>
                    <label>Precio por prendas sin tela</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="w-100 modal-efecto-17 has-content " list="priv" name="mclt_nosotros" id="mclt_nosotros">
                  <datalist id="priv">
                    <option value="Referido"></option>
                    <option value="Asesor de Ventas"></option>
                    <option value="Medios Publicitarios"></option>
                  </datalist>
                    <label>Cómo supo de Nosotros?</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="modal-efecto-17 has-content" type="text" name="mclt_vendedor" id="mclt_vendedor">
                    <label>Nombre del Vendedor</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
            </tbody>
          </table>

        </div>
      </div>
      <div class="justify-content-center modal-footer">
        <button id="ActualizarCliente" type="submit" class="ActualizarCliente w-50 btnsub btn boton btn-block">ACTUALIZAR</button>
      </div>
    </div>
  </div>
</div> -->




<div class="modal fade" id="EditarCliente">
  <div class="modal-dialog modal-med">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">EDITAR DATOS DEL CLIENTE</h5>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <table class="table">
            <tbody>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input type="hidden" id="pk_cliente">
                  <input class="modal-efecto-17 has-content" id="nombreCliente" type="text">
                    <label>Nombre del Cliente</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="modal-efecto-17 has-content" id="nombreContacto" type="text">
                    <label>Nombre de Contacto</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="w-100 modal-efecto-17 has-content" id="correoCliente" type="text">
                    <label>Correo Cliente</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-6 input-effect p-0">
                  <input class="w-100 modal-efecto-17 has-content numeroClass" id="telefonoCliente" type="text">
                    <label>Telefono Cliente</label>
                    <span class="focus-border"></span>
                </td>
                <td class="col-md-1"></td>
                <td class="col-md-5 input-effect p-0">
                  <input class="w-100 modal-efecto-17 has-content numeroClass" id="creditoCliente" type="text">
                    <label>Credito Cliente</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-6 input-effect p-0">
                  <input class="w-100 modal-efecto-17 has-content" id="fingresoCliente" type="date">
                    <label>Fecha Ingreso</label>
                    <span class="focus-border"></span>
                </td>
                <td class="col-md-1"></td>
                <td class="col-md-5 input-effect p-0">
                  <input class="modal-efecto-17 has-content w-100" id="colorCliente" type="color">
                    <label>Color Cliente</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="modal-efecto-17 has-content numeroClass"  type="text" id="prendasCliente">
                    <label>Prendas Solicitadas por Mes</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input id="precioPrenda" class="modal-efecto-17 has-content importeClass" type="text" required>
                    <label>Precio por prendas sin tela</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="w-100 modal-efecto-17 has-content " list="priv" id="nosotrosCliente">
                  <datalist id="priv">
                    <option value="Referido"></option>
                    <option value="Asesor de Ventas"></option>
                    <option value="Medios Publicitarios"></option>
                  </datalist>
                    <label>Cómo supo de Nosotros?</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="modal-efecto-17 has-content" type="text" id="vendedorCliente">
                    <label>Nombre del Vendedor</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
            </tbody>
          </table>

        </div>
      </div>
      <div class="justify-content-center modal-footer">
        <button id="ActualizarCliente" type="submit" class="ActualizarCliente w-50 btnsub btn boton btn-block">ACTUALIZAR</button>
      </div>
    </div>
  </div>
</div>
