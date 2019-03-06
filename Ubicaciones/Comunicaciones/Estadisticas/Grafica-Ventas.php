<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("Location: /fitcoControl/index.php");
}
$root = $_SERVER['DOCUMENT_ROOT'];
require  $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
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


<h4 class="sub-grafica">GRAFICA DE VENTAS</h4>
<div class="container border" style='border-radius:10px;margin-bottom:100px!important'>
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
      <a href="#" id="ven_load" class="rotate-link reload-ven ml-4" style="font-size: larger; text-decoration:none">
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

<?php
require $root . '/fitcoControl/Ubicaciones/Comunicaciones/Estadisticas/actions/footer.php';
?>
