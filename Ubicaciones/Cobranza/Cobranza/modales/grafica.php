<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';

$date_from = date('Y-m-d', strtotime('last month monday'));
$date_to = date('Y-m-d', strtotime('today'));
?>

<div class="modal fade" id="graficaCobranza">
  <div class="modal-dialog modal-grande">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">GRAFICA DE COBRANZA</h5>
      </div>
      <div class="modal-body pt-0">
        <div class="container border" style='border-radius:10px;margin-top:2rem!important'>
          <div class="d-flex justify-content-between font12 m-0 py-3" style="border-radius:10px">
            <div class="">
              <select class="c-select efecto" id="cob_periodo">
                <option value="">Periodo</option>
                <option value="0" selected>Diario</option>
                <option value="1">Semanal</option>
                <option value="2">Mensual</option>
              </select>
              <div id="dates_cob_chart" class='d-inline'>
                <div class="d-inline">
                  <input class="efecto date-from" type="date" style="width: auto" value="<?php echo $date_from ?>">
                </div>
                <div class="d-inline">
                  <input class="efecto date-to" type="date" style="width: auto" value="<?php echo $date_to ?>">
                </div>
              </div>
              <a href="#" id="cob_load" class="rotate-link reload-chart ml-4" style="font-size: larger; text-decoration:none">
                <img src="/fitcoControl/Resources/iconos/refresh.svg" class="icon1 rotate-icon" style="width:30px;">
              </a>
            </div>
          </div>
          <div id="g-cobranza" style="margin-top:100px"></div>
        </div>
      </div>
    </div>
  </div>
</div>
