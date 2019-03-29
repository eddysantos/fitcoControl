<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';


$queryMes = "SELECT * FROM ct_ventasVendedor";
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
    $pk_venMet = $row['pk_venMet'];
    $nombreVendedor = $row['nombreVendedor'];

    $option .= '<option db-id="'.$pk_venMet.'">'.$nombreVendedor.'</option>';
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
        <h5 class="modal-tittle">GRAFICAS DE METRICAS</h5>
      </div>
      <div class="modal-body pt-0">
        <div class="container border" style='border-radius:10px;margin-top:2rem!important'>
          <div class="d-flex justify-content-between font12 m-0 py-3" style="border-radius:10px">
            <div class="">
              <select class="c-select efecto" id="ven_periodo">
                <option value="">Mes</option>
                <option value="Enero" selected>Enero</option>
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
              </select>
              <select class="c-select efecto" id="ven_grafico">
                <option value="">Graficas</option>
                <option value="0" selected>Citas Semanales</option>
                <option value="1">Cotizaciones Enviadas</option>
                <option value="2">Total Ventas en Dinero</option>
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
