<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("Location: /fitcoControl/index.php");
}
$root = $_SERVER['DOCUMENT_ROOT'];
require  $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';


$date_from = date('Y-m-d', strtotime('last week monday'));
$date_to = date('Y-m-d', strtotime('today'));
?>


<h4 class="sub-grafica">GRAFICA DE PRODUCCIÓN</h4>
<div class="container border" style='border-radius:10px;margin-bottom:100px!important'>
  <div class="d-flex justify-content-between font12 m-0 py-3" style="border-radius:10px">
    <div class="">
      <select class="c-select efecto" id="pro_periodo">
        <option value="">Periodo</option>
        <option value="0" selected>Diario</option>
        <option value="1">Semanal</option>
        <option value="2">Mensual</option>
      </select>
      <div id="dates_pro_chart" class='d-inline'>
        <div class="d-inline">
          <input class="efecto date-from" type="date" style="width: auto" value="<?php echo $date_from ?>">
        </div>
        <div class="d-inline">
          <input class="efecto date-to" type="date" style="width: auto" value="<?php echo $date_to ?>">
        </div>
      </div>
      <a href="#" id="pro_load" class="rotate-link reload-pro ml-4" style="font-size: larger; text-decoration:none">
        <img src="/fitcoControl/Resources/iconos/refresh.svg" class="icon1 rotate-icon" style="width:30px;">
      </a>
    </div>
  </div>
  <div id="g-produccion" style="margin-top:100px"></div>
</div>



<?php
require $root . '/fitcoControl/Ubicaciones/Comunicaciones/Estadisticas/actions/footer.php';
?>
