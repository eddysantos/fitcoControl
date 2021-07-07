<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';


$queryMes = "SELECT * FROM vendedores";
$stmt = $conn->prepare($queryMes);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error during query prepare [$conn->errno]: $conn->error";
  exit_script($system_callback);
}
if (!($stmt->execute())) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error during query execution [$stmt->errno]: $stmt->error";
  exit_script($system_callback);
}
$rslt = $stmt->get_result();
$rows = $rslt->num_rows;

if ($rows > 0) {
  $option = "<option db-id='' selected>Vendedores</option>";
  while ($row = $rslt->fetch_assoc()) {
    $pk_vendedor = $row['pk_vendedor'];
    $nombre = $row['nombreVendedor'];

    $option .= '<option db-id="'.$pk_vendedor.'">'.$nombre.'</option>';
  }
}

$date_from = date('Y-m-d', strtotime('last month monday'));
$date_to = date('Y-m-d', strtotime('today'));
 ?>

<div class="modal fade" id="ModalGraficaVentas">
  <div class="modal-dialog modal-grande">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">GRAFICAS DE VENTAS</h5>
      </div>
      <div class="modal-body pt-0">
        <div class="container border" style='border-radius:10px;margin-top:2rem!important'>
          <div class="d-flex justify-content-between font12 m-0 py-3" style="border-radius:10px">
            <div class="">
              <select class="c-select efecto" id="ven_periodo">
                <option value="">Periodo</option>
                <option value="0" selected>Diario</option>
                <option value="1">Semanal</option>
                <option value="2">Mensual</option>
              </select>
              <select class="c-select efecto" id="ven_grafico">
                <option value="">Graficas</option>
                <option value="0">Cantidad Prendas Vendidas</option>
                <option value="1" selected>Venta total en Dinero</option>
                <option value="2">Ingreso en Banco</option>
                <option value="3">Margen de ganancia</option>
              </select>
              <div id="dates_ven_chart" class='d-inline'>
                <div class="d-inline">
                  <input id="" class="efecto date-from" type="date" style="width: auto" value="<?php echo $date_from ?>">
                </div>
                <div class="d-inline">
                  <input id="" class="efecto date-to" type="date" style="width: auto" value="<?php echo $date_to ?>">
                </div>
              </div>
              <a href="#" id="ven_load" class="rotate-link reload-chart ml-4" style="font-size: larger; text-decoration:none">
                <img src="/fitcoControl/Resources/iconos/refresh.svg" class="icon1 rotate-icon" style="width:30px;">
              </a>
            </div>
            <div class="justify-content-end">
              <select class="c-select efecto ven_vendedores" id="ven_vendedores">
                <?php echo $option ?>
              </select>
            </div>
          </div>
          <div id="g-ventas" style="margin-top:100px"></div>
        </div>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="EditarVentas">
  <div class="modal-dialog modal-med">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">EDITAR DATOS VENTA</h5>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <table class="table">
            <tbody>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input type="hidden" id="pk_ventas" db-id="">
                  <input class="modal-efecto-17" id="nombreCliente" type="text">
                    <label>Nombre Cliente</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="modal-efecto-17" id="nombreVendedor" type="text">
                    <label>Nombre Vendedor</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="modal-efecto-17 numeroClass" id="numeroPrendas" type="text">
                    <label>No. de Prendas</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="modal-efecto-17 importeClass" id="precioXprenda" type="text">
                    <label>Precio por Prenda</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="modal-efecto-17 importeClass" id="costoPrenda" type="text">
                    <label>Costo de Prenda (incluye tela,avíos y costo producción)</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="modal-efecto-17 importeClass" id="ingresoBanco" type="text">
                    <label>Ingreso en bancos</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="modal-efecto-17" id="acuerdoPago" type="text">
                    <label>Acuerdo de Pago</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="modal-efecto-17" id="fecha" type="date">
                    <label>Fecha de Ingreso</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="justify-content-center modal-footer">
        <button id="ActualizarVenta" type="submit" class="ActualizarVenta w-50 btnsub btn boton btn-block">ACTUALIZAR</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="ModalAddVendedor">
  <div class="modal-dialog modal-med">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">Agregar Vendedor</h5>
      </div>
      <div class="modal-body">
        <table class="table">
          <tr class="row m20">
            <td class="col-md-12 input-effect p-0">
              <input class="modal-efecto-17  w-100" id="nVendedor" type="text">
                <label for="nVendedor">Nombre del Vendedor</label>
                <span class="focus-border"></span>
            </td>
          </tr>
        </table>
      </div>
      <div class="justify-content-center modal-footer">
        <button id="add-Vendedor" type="submit" class="addVendedor w-50 btnsub btn boton btn-block">Agregar</button>
      </div>
    </div>
  </div>
</div>
