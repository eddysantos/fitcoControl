<div class="modal fade" id="agregarVendedor">
  <div class="modal-dialog modal-med1">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">Agregar Vendedor</h5>
      </div>
      <div class="modal-body p-0 pt-4">
        <table class="table">
          <tbody id="contenidomodal">
            <tr class="row m20">
              <input class="modal-efecto-17 has-content" id="add_usuario_add" type="hidden" value="<?php echo $_SESSION['user']['nombreUsuario']; ?>">
              <input class="modal-efecto-17 has-content" id="add_fecha_add" type="hidden" value="<?php echo $fecha_reg ?>">


              <td class="col-md-5 input-effect p-0">
                <input class="modal-efecto-17 has-content" id="add_vendedor" type="text">
                  <label for="add_vendedor">Vendedor</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col-md-1"></td>
              <td class="col-md-3 input-effect p-0">
                <input class="modal-efecto-17 has-content" id="add_mes" type="text" list="month">
                <datalist id="month">
                  <option value="Enero">Enero</option>
                  <option value="Febrero">Febrero</option>
                  <option value="Marzo">Marzo</option>
                  <option value="Abril">Abril</option>
                  <option value="Mayo">Mayo</option>
                  <option value="Junio">Junio</option>
                  <option value="Julio">Julio</option>
                  <option value="Agosto">Agosto</option>
                  <option value="Septiembre">Septiembre</option>
                  <option value="Octubre">Octubre</option>
                  <option value="Noviembre">Noviembre</option>
                  <option value="Diciembre">Diciembre</option>
                </datalist>
                  <label for="add_mes">Mes</label>
                  <span class="focus-border"></span>
              </td>

              <td class="col-md-1"></td>
              <td class="col-md-2 input-effect p-0">
                <input class="modal-efecto-17 has-content importeClass" id="add_tipoCambio" type="text">
                  <label for="add_tipoCambio">Tipo Cambio</label>
                  <span class="focus-border"></span>
              </td>
            </tr>

            <tr class="row sub-azul  m-0">
              <td class="col-md-12 p-1">Clientes Nuevos</td>
            </tr>
            <tr class="row m20">
              <td class="col-md-2 input-effect p-0">
                <input class="modal-efecto-17 has-content numeroClass" id="add_clt_metaClientes" type="text">
                  <label for="add_clt_metaClientes">Meta Prospectos</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col"></td>
              <td class="col-md-2 input-effect p-0">
                <input class="modal-efecto-17 has-content numeroClass" id="add_clt_prospectos" type="text">
                  <label for="add_clt_prospectos">Prospectos</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col"></td>
              <td class="col-md-1 input-effect p-0">
                <input class="modal-efecto-17 has-content numeroClass" id="add_clt_cotizados" type="text">
                  <label for="add_clt_cotizados">Cotizados</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col"></td>
              <td class="col-md-2 input-effect p-0">
                <input class="modal-efecto-17 has-content numeroClass" id="add_clt_nuevo" type="text">
                  <label for="add_clt_nuevo">Clientes Nuevos</label>
                  <span class="focus-border"></span>
              </td>

              <td class="col"></td>
              <td class="col-md-1 input-effect p-0">
                <input class="modal-efecto-17 has-content read-only rounded-top" id="add_clt_factor" type="text" readonly>
                  <label for="add_clt_factor">Factor %</label>
                  <span class="focus-border"></span>
              </td>

              <td class="col"></td>
              <td class="col-md-2 input-effect p-0">
                <input class="modal-efecto-17 has-content importeClass" id="add_clt_meta" type="text">
                  <label for="add_clt_meta">Meta %</label>
                  <span class="focus-border"></span>
              </td>
            </tr>




            <tr class="row sub-azul  m-0">
              <td class="col-md-12 p-1">Cantidad Cotizaciones</td>
            </tr>
            <tr class="row m20">
              <td class="col-md-2 input-effect p-0">
                <input class="modal-efecto-17 has-content numeroClass" id="add_ccot_emitidas" type="text">
                  <label for="add_ccot_emitidas">Emitidas</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col"></td>
              <td class="col-md-2 input-effect p-0">
                <input class="modal-efecto-17 has-content numeroClass" id="add_ccot_pedidos" type="text">
                  <label for="add_ccot_pedidos">Pedidos Recibidos</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col"></td>
              <td class="col-md-3 input-effect p-0">
                <input class="modal-efecto-17 has-content importeClass read-only rounded-top" id="add_ccot_factor" type="text" readonly>
                  <label for="add_ccot_factor">Factor de Conversión %</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col"></td>
              <td class="col-md-2 input-effect p-0">
                <input class="modal-efecto-17 has-content importeClass" id="add_ccot_meta" type="text">
                  <label for="add_ccot_meta">Meta %</label>
                  <span class="focus-border"></span>
              </td>
            </tr>




            <tr class="row sub-azul  m-0">
              <td class="col-md-12 p-1">Monto Cotizaciones ($)</td>
            </tr>
            <tr class="row m20">
              <td class="col-md-4 input-effect p-0">
                <input class="modal-efecto-17 has-content importeClass read-only rounded-top" id="add_mcot_emTotal" type="text" readonly>
                  <label for="add_mcot_emTotal">Cotizaciones Emitidas Total ($)</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col"></td>
              <td class="col-md-4 input-effect p-0">
                <input class="modal-efecto-17 has-content importeClass" id="add_mcot_emPesos" type="text">
                  <label for="add_mcot_emPesos">Cotizaciones Emitidas Pesos ($)</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col"></td>
              <td class="col-md-3 input-effect p-0">
                <input class="modal-efecto-17 has-content importeClass" id="add_mcot_emUsd" type="text" value="0">
                  <label for="add_mcot_emUsd">Cotizaciones Emitidas USD ($)</label>
                  <span class="focus-border"></span>
              </td>
            </tr>




            <tr class="row sub-azul  m-0">
              <td class="col-md-12 p-1">Pedidos Cotizaciones</td>
            </tr>

            <tr class="row m20">
              <td class="col-md-4 input-effect p-0">
                <input class="modal-efecto-17 has-content importeClass read-only rounded-top" id="add_pcot_ventotal" type="text" readonly>
                  <label for="add_pcot_ventotal">Cotizaciones Vendidas Total ($)</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col"></td>
              <td class="col-md-4 input-effect p-0">
                <input class="modal-efecto-17 has-content importeClass" id="add_pcot_venPesos" type="text">
                  <label for="add_pcot_venPesos">Cotizaciones Vendidas Pesos ($)</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col"></td>
              <td class="col-md-3 input-effect p-0">
                <input class="modal-efecto-17 has-content importeClass" id="add_pcot_venUsd" type="text" value="0">
                  <label for="add_pcot_venUsd">Cotizaciones Vendidas USD ($)</label>
                  <span class="focus-border"></span>
              </td>
            </tr>



            <tr class="row sub-azul  m-0">
              <td class="col-md-12 p-1">Factor de Conversion</td>
            </tr>

            <tr class="row m20 justify-content-center">
              <td class="col-md-4 input-effect p-0">
                <input class="modal-efecto-17 has-content read-only rounded-top" id="add_fact_conversion" type="text" readonly>
                  <label for="add_fact_conversion">Factor de Conversión %</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col-md-1"></td>
              <td class="col-md-2 input-effect p-0">
                <input class="modal-efecto-17 has-content importeClass" id="add_fact_meta" type="text">
                  <label for="add_fact_meta">Meta %</label>
                  <span class="focus-border"></span>
              </td>
            </tr>


            <tr class="row sub-azul  m-0">
              <td class="col-md-12 p-1">Metas de Ventas</td>
            </tr>
            <tr class="row m20">
              <td class="col-md-4 input-effect p-0">
                <input class="modal-efecto-17 has-content" id="add_ven_meta" type="text">
                  <label for="add_ven_meta">Ventas Meta ($)</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col"></td>
              <td class="col-md-4 input-effect p-0">
                <input class="modal-efecto-17 has-content read-only rounded-top" id="add_ven_reales" type="text" readonly>
                  <label for="add_ven_reales">Ventas Reales ($)</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col"></td>
              <td class="col-md-3 input-effect p-0">
                <input class="modal-efecto-17 has-content read-only rounded-top" id="add_ven_balance" type="text" readonly>
                  <label for="add_ven_balance">Balance</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="justify-content-center modal-footer">
        <button type="submit" class="add-vendedor w-50 btnsub btn boton btn-block">AGREGAR</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="agregarMetrica">
  <div class="modal-dialog modal-med1">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">Agregar Metrica</h5>
      </div>
      <div class="modal-body p-0 pt-4">
        <table class="table">
          <tbody id="contenidosubmodal">
            <tr class="row m20 justify-content-center">
              <td class="col-md-1"></td>
              <td class="col-md-3 input-effect p-0">
                <input id="a_fk_venMet" type="hidden">
                <input class="modal-efecto-17 has-content" id="a_mes" type="text" list="month">
                <datalist id="month">
                  <option value="Enero">Enero</option>
                  <option value="Febrero">Febrero</option>
                  <option value="Marzo">Marzo</option>
                  <option value="Abril">Abril</option>
                  <option value="Mayo">Mayo</option>
                  <option value="Junio">Junio</option>
                  <option value="Julio">Julio</option>
                  <option value="Agosto">Agosto</option>
                  <option value="Septiembre">Septiembre</option>
                  <option value="Octubre">Octubre</option>
                  <option value="Noviembre">Noviembre</option>
                  <option value="Diciembre">Diciembre</option>
                </datalist>
                  <label for="add_mes">Mes</label>
                  <span class="focus-border"></span>
              </td>

              <td class="col-md-1"></td>
              <td class="col-md-2 input-effect p-0">
                <input class="modal-efecto-17 has-content" id="a_tipoCambio" type="text">
                  <label for="add_tipoCambio">Tipo Cambio</label>
                  <span class="focus-border"></span>
              </td>
            </tr>

            <tr class="row sub-azul  m-0">
              <td class="col-md-12 p-1">Clientes Nuevos</td>
            </tr>
            <tr class="row m20">
              <td class="col-md-2 input-effect p-0">
                <input class="modal-efecto-17 has-content numeroClass" id="a_clt_metaClientes" type="text">
                  <label for="a_clt_metaClientes">Meta Prospectos</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col"></td>
              <td class="col-md-2 input-effect p-0">
                <input class="modal-efecto-17 has-content numeroClass" id="a_clt_prospectos" type="text">
                  <label for="a_clt_prospectos">Prospectos</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col"></td>
              <td class="col-md-1 input-effect p-0">
                <input class="modal-efecto-17 has-content numeroClass" id="a_clt_cotizados" type="text">
                  <label for="a_clt_cotizados">Cotizados</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col"></td>
              <td class="col-md-2 input-effect p-0">
                <input class="modal-efecto-17 has-content numeroClass" id="a_clt_nuevo" type="text">
                  <label for="a_clt_nuevo">Clientes Nuevos</label>
                  <span class="focus-border"></span>
              </td>

              <td class="col"></td>
              <td class="col-md-1 input-effect p-0">
                <input class="modal-efecto-17 has-content read-only rounded-top" id="a_clt_factor" type="text" readonly>
                  <label for="a_clt_factor">Factor %</label>
                  <span class="focus-border"></span>
              </td>

              <td class="col"></td>
              <td class="col-md-2 input-effect p-0">
                <input class="modal-efecto-17 has-content importeClass" id="a_clt_meta" type="text">
                  <label for="a_clt_meta">Meta %</label>
                  <span class="focus-border"></span>
              </td>
            </tr>




            <tr class="row sub-azul  m-0">
              <td class="col-md-12 p-1">Cantidad Cotizaciones</td>
            </tr>
            <tr class="row m20">
              <td class="col-md-2 input-effect p-0">
                <input class="modal-efecto-17 has-content numeroClass" id="a_ccot_emitidas" type="text">
                  <label for="a_ccot_emitidas">Emitidas</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col"></td>
              <td class="col-md-2 input-effect p-0">
                <input class="modal-efecto-17 has-content numeroClass" id="a_ccot_pedidos" type="text">
                  <label for="a_ccot_pedidos">Pedidos Recibidos</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col"></td>
              <td class="col-md-3 input-effect p-0">
                <input class="modal-efecto-17 has-content read-only rounded-top" id="a_ccot_factor" type="text" readonly>
                  <label for="a_ccot_factor">Factor de Conversión</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col"></td>
              <td class="col-md-2 input-effect p-0">
                <input class="modal-efecto-17 has-content importeClass" id="a_ccot_meta" type="text">
                  <label for="a_ccot_meta">Meta</label>
                  <span class="focus-border"></span>
              </td>
            </tr>




            <tr class="row sub-azul  m-0">
              <td class="col-md-12 p-1">Monto Cotizaciones ($)</td>
            </tr>
            <tr class="row m20">
              <td class="col-md-4 input-effect p-0">
                <input class="modal-efecto-17 has-content importeClass read-only rounded-top" id="a_mcot_emTotal" type="text" readonly>
                  <label for="a_mcot_emTotal">Cotizaciones Emitidas Total ($)</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col"></td>
              <td class="col-md-4 input-effect p-0">
                <input class="modal-efecto-17 has-content importeClass" id="a_mcot_emPesos" type="text">
                  <label for="a_mcot_emPesos">Cotizaciones Emitidas Pesos ($)</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col"></td>
              <td class="col-md-3 input-effect p-0">
                <input class="modal-efecto-17 has-content importeClass" id="a_mcot_emUsd" type="text" value="0">
                  <label for="a_mcot_emUsd">Cotizaciones Emitidas USD ($)</label>
                  <span class="focus-border"></span>
              </td>
            </tr>




            <tr class="row sub-azul  m-0">
              <td class="col-md-12 p-1">Pedidos Cotizaciones</td>
            </tr>

            <tr class="row m20">
              <td class="col-md-4 input-effect p-0">
                <input class="modal-efecto-17 has-content importeClass read-only rounded-top" id="a_pcot_ventotal" type="text" readonly>
                  <label for="a_pcot_ventotal">Cotizaciones Vendidas Total ($)</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col"></td>
              <td class="col-md-4 input-effect p-0">
                <input class="modal-efecto-17 has-content importeClass" id="a_pcot_venPesos" type="text">
                  <label for="a_pcot_venPesos">Cotizaciones Vendidas Pesos ($)</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col"></td>
              <td class="col-md-3 input-effect p-0">
                <input class="modal-efecto-17 has-content importeClass" id="a_pcot_venUsd" type="text" value="0">
                  <label for="a_pcot_venUsd">Cotizaciones Vendidas USD ($)</label>
                  <span class="focus-border"></span>
              </td>
            </tr>



            <tr class="row sub-azul  m-0">
              <td class="col-md-12 p-1">Factor de Conversion</td>
            </tr>

            <tr class="row m20 justify-content-center">
              <td class="col-md-4 input-effect p-0">
                <input class="modal-efecto-17 has-content read-only rounded-top" id="a_fact_conversion" type="text" readonly>
                  <label for="a_fact_conversion">Factor de Conversión %</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col-md-1"></td>
              <td class="col-md-2 input-effect p-0">
                <input class="modal-efecto-17 has-content importeClass" id="a_fact_meta" type="text">
                  <label for="a_fact_meta">Meta %</label>
                  <span class="focus-border"></span>
              </td>
            </tr>


            <tr class="row sub-azul  m-0">
              <td class="col-md-12 p-1">Metas de Ventas</td>
            </tr>
            <tr class="row m20">
              <td class="col-md-4 input-effect p-0">
                <input class="modal-efecto-17 has-content importeClass" id="a_ven_meta" type="text">
                  <label for="a_ven_meta">Ventas Meta ($)</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col"></td>
              <td class="col-md-4 input-effect p-0">
                <input class="modal-efecto-17 has-content importeClass read-only rounded-top" id="a_ven_reales" type="text" readonly>
                  <label for="a_ven_reales">Ventas Reales ($)</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col"></td>
              <td class="col-md-3 input-effect p-0">
                <input class="modal-efecto-17 has-content importeClass read-only rounded-top" id="a_ven_balance" type="text" readonly>
                  <label for="a_ven_balance">Balance</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="justify-content-center modal-footer">
        <button type="submit" class="add-metrica w-50 btnsub btn boton btn-block">AGREGAR</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="editarMetrica">
  <div class="modal-dialog modal-med1">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">Editar Metrica</h5>
      </div>
      <div class="modal-body p-0 pt-4">
        <table class="table">
          <tbody id="contenidoEditmodal">
            <tr class="row m20 justify-content-center">
              <td class="col-md-1"></td>
              <td class="col-md-3 input-effect p-0">
                <input id="pk_metrica" type="hidden">
                <input id="fk_venMet" type="hidden">
                <input class="modal-efecto-17" id="mes" type="text" list="month">
                <datalist id="month">
                  <option value="Enero">Enero</option>
                  <option value="Febrero">Febrero</option>
                  <option value="Marzo">Marzo</option>
                  <option value="Abril">Abril</option>
                  <option value="Mayo">Mayo</option>
                  <option value="Junio">Junio</option>
                  <option value="Julio">Julio</option>
                  <option value="Agosto">Agosto</option>
                  <option value="Septiembre">Septiembre</option>
                  <option value="Octubre">Octubre</option>
                  <option value="Noviembre">Noviembre</option>
                  <option value="Diciembre">Diciembre</option>
                </datalist>
                  <label for="mes">Mes</label>
                  <span class="focus-border"></span>
              </td>

              <td class="col-md-1"></td>
              <td class="col-md-2 input-effect p-0">
                <input class="modal-efecto-17 importeClass" id="tipoCambio" type="text">
                  <label for="add_tipoCambio">Tipo Cambio</label>
                  <span class="focus-border"></span>
              </td>
            </tr>

            <tr class="row sub-azul  m-0">
              <td class="col-md-12 p-1">Clientes Nuevos</td>
            </tr>
            <tr class="row m20">
              <td class="col-md-2 input-effect p-0">
                <input class="modal-efecto-17 numeroClass" id="clt_metaClientes" type="text">
                  <label for="clt_metaClientes">Meta Prospectos</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col"></td>
              <td class="col-md-2 input-effect p-0">
                <input class="modal-efecto-17 numeroClass" id="clt_prospectos" type="text">
                  <label for="clt_prospectos">Prospectos</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col"></td>
              <td class="col-md-1 input-effect p-0">
                <input class="modal-efecto-17 numeroClass" id="clt_cotizados" type="text">
                  <label for="clt_cotizados">Cotizados</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col"></td>
              <td class="col-md-2 input-effect p-0">
                <input class="modal-efecto-17 numeroClass" id="clt_nuevo" type="text">
                  <label for="clt_nuevo">Clientes Nuevos</label>
                  <span class="focus-border"></span>
              </td>

              <td class="col"></td>
              <td class="col-md-1 input-effect p-0">
                <input class="modal-efecto-17 read-only rounded-top" id="clt_factor" type="text" readonly>
                  <label for="clt_factor">Factor %</label>
                  <span class="focus-border"></span>
              </td>

              <td class="col"></td>
              <td class="col-md-2 input-effect p-0">
                <input class="modal-efecto-17 importeClass" id="clt_meta" type="text">
                  <label for="clt_meta">Meta %</label>
                  <span class="focus-border"></span>
              </td>
            </tr>




            <tr class="row sub-azul  m-0">
              <td class="col-md-12 p-1">Cantidad Cotizaciones</td>
            </tr>
            <tr class="row m20">
              <td class="col-md-2 input-effect p-0">
                <input class="modal-efecto-17 numeroClass" id="ccot_emitidas" type="text">
                  <label for="ccot_emitidas">Emitidas</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col"></td>
              <td class="col-md-2 input-effect p-0">
                <input class="modal-efecto-17 numeroClass" id="ccot_pedidos" type="text">
                  <label for="ccot_pedidos">Pedidos Recibidos</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col"></td>
              <td class="col-md-3 input-effect p-0">
                <input class="modal-efecto-17 read-only rounded-top" id="ccot_factor" type="text" readonly>
                  <label for="ccot_factor">Factor de Conversión %</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col"></td>
              <td class="col-md-2 input-effect p-0">
                <input class="modal-efecto-17 importeClass" id="ccot_meta" type="text">
                  <label for="ccot_meta">Meta %</label>
                  <span class="focus-border"></span>
              </td>
            </tr>




            <tr class="row sub-azul  m-0">
              <td class="col-md-12 p-1">Monto Cotizaciones ($)</td>
            </tr>
            <tr class="row m20">
              <td class="col-md-4 input-effect p-0">
                <input class="modal-efecto-17 read-only rounded-top importeClass" id="mcot_emTotal" type="text" readonly>
                  <label for="mcot_emTotal">Cotizaciones Emitidas Total ($)</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col"></td>
              <td class="col-md-4 input-effect p-0">
                <input class="modal-efecto-17 importeClass" id="mcot_emPesos" type="text">
                  <label for="mcot_emPesos">Cotizaciones Emitidas Pesos ($)</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col"></td>
              <td class="col-md-3 input-effect p-0">
                <input class="modal-efecto-17 importeClass" id="mcot_emUsd" type="text" value="0">
                  <label for="mcot_emUsd">Cotizaciones Emitidas USD ($)</label>
                  <span class="focus-border"></span>
              </td>
            </tr>




            <tr class="row sub-azul  m-0">
              <td class="col-md-12 p-1">Pedidos Cotizaciones</td>
            </tr>

            <tr class="row m20">
              <td class="col-md-4 input-effect p-0">
                <input class="modal-efecto-17 importeClass read-only rounded-top" id="pcot_venTotal" type="text" readonly>
                  <label for="pcot_venTotal">Cotizaciones Vendidas Total ($)</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col"></td>
              <td class="col-md-4 input-effect p-0">
                <input class="modal-efecto-17 importeClass" id="pcot_venPesos" type="text">
                  <label for="pcot_venPesos">Cotizaciones Vendidas Pesos ($)</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col"></td>
              <td class="col-md-3 input-effect p-0">
                <input class="modal-efecto-17 importeClass" id="pcot_venUsd" type="text" value="0">
                  <label for="pcot_venUsd">Cotizaciones Vendidas USD ($)</label>
                  <span class="focus-border"></span>
              </td>
            </tr>



            <tr class="row sub-azul  m-0">
              <td class="col-md-12 p-1">Factor de Conversion</td>
            </tr>

            <tr class="row m20 justify-content-center">
              <td class="col-md-4 input-effect p-0">
                <input class="modal-efecto-17 importeClass read-only rounded-top" id="fact_conversion" type="text" readonly>
                  <label for="fact_conversion">Factor de Conversión %</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col-md-1"></td>
              <td class="col-md-2 input-effect p-0">
                <input class="modal-efecto-17 importeClass" id="fact_meta" type="text">
                  <label for="fact_meta">Meta %</label>
                  <span class="focus-border"></span>
              </td>
            </tr>


            <tr class="row sub-azul  m-0">
              <td class="col-md-12 p-1">Metas de Ventas</td>
            </tr>
            <tr class="row m20">
              <td class="col-md-4 input-effect p-0">
                <input class="modal-efecto-17 importeClass" id="ven_meta" type="text">
                  <label for="ven_meta">Ventas Meta ($)</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col"></td>
              <td class="col-md-4 input-effect p-0">
                <input class="modal-efecto-17 importeClass read-only rounded-top" id="ven_reales" type="text" readonly>
                  <label for="ven_reales">Ventas Reales ($)</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col"></td>
              <td class="col-md-3 input-effect p-0">
                <input class="modal-efecto-17 importeClass read-only rounded-top" id="ven_balance" type="text" readonly>
                  <label for="ven_balance">Balance</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="justify-content-center modal-footer">
        <button type="submit" class="edit-metrica w-50 btnsub btn boton btn-block">ACTUALIZAR</button>
      </div>
    </div>
  </div>
</div>
