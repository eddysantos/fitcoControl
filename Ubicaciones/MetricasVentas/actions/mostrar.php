<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';

$system_callback = [];
$query = "SELECT * FROM ct_ventasVendedor";

$stmt = $conn->prepare($query);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error durante la preparacion del query [$conn->errno]: $conn->error";
  exit_script($system_callback);
}

if (!($stmt->execute())) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error durante la ejecucion [$stmt->errno]: $stmt->error";
  exit_script($system_callback);
}

$rslt = $stmt->get_result();

if ($rslt->num_rows == 0) {
  $system_callback['code'] = 1;
  $system_callback['data'] ="<p db-id=''>No se encontraron resultados</p>";
  $system_callback['message'] = "Script called successfully but there are no rows to display.";
  exit_script($system_callback);
}


$row_count = 0;

while ($row = $rslt->fetch_assoc()) {
  $pk_venMet = $row['pk_venMet'];

  $nombreVendedor = "
  <div class='row text-center m-0'>
    <div class='col-md-12 text-left' style='background-color: #eee;'>
      <a href='#agregarMetrica' data-toggle='modal' class='agregarMetrica spand-link' db-id='$pk_venMet'><img src='/fitcoControl/Resources/iconos/003-add.svg' class=' spand-icon '></a>

      <b style='color:#2a608e;font-size:18px!important'>".$row['nombreVendedor']."</b>
    </div>
  </div>";





  $query_metrica = "SELECT * FROM ct_ventasMetricas WHERE fk_venMet = ? ";
    $stmt_metrica = $conn->prepare($query_metrica);
    if (!($stmt_metrica)) {die("Error en la preparacion del query Metrica $conn->errno]: $conn->error");}
    $stmt_metrica->bind_param('s',$pk_venMet);
    if (!($stmt_metrica)) {die("Error during variables binding [$stmt_metrica->errno]: $stmt_metrica->error"); }
    if (!($stmt_metrica->execute())) { die("error en la ejecucion Metrica [$stmt_metrica->errno]: $stmt_metrica->error"); }
    $rslt_metrica = $stmt_metrica->get_result();
    $rows_metrica = $rslt_metrica->num_rows;
if ($rows_metrica > 0) {
  while ($row = $rslt_metrica->fetch_assoc()) {
    $row_count  ++;
    $pk_metrica = $row['pk_metrica'];

      $metrica .= "<div class='row m-0 text-center'>
        <div class='col-md-6 text-right p-0' style='background-color: whitesmoke;'>
          <a data-toggle='collapse' href='#multiCollapse$row_count' role='button' aria-expanded='false' aria-controls='multiCollapse$row_count' style='text-decoration:none'>".$row['mes']."</a>
        </div>

        <div class='col-md-6 text-left p-0' style='background-color: whitesmoke;'>
          <a href='#editarMetrica' class='editarMetrica spand-link' db-id='$pk_metrica'><img src='/fitcoControl/Resources/iconos/001-edit-1.svg' class='ml-4 spand-iconm'></a>
        </div>
      </div>

      <div class='collapse multi-collapse multiCollapseExample1' id='multiCollapse$row_count'>
        <div class='row text-center m-0'>

          <div class='col-md-2' style='background-color: aliceblue; border: 1px solid floralwhite;'>Clientes Nuevos</div>
          <div class='col-md-2' style='background-color: aliceblue; border: 1px solid floralwhite;'>Cantidad Cotizaciones</div>
          <div class='col-md-2' style='background-color: aliceblue; border: 1px solid floralwhite;'>Monto Cotizaciones</div>
          <div class='col-md-2' style='background-color: aliceblue; border: 1px solid floralwhite;'>Pedidos Cotizaciones</div>
          <div class='col-md-2' style='background-color: aliceblue; border: 1px solid floralwhite;'>Factor de Conversion</div>
          <div class='col-md-2' style='background-color: aliceblue; border: 1px solid floralwhite;'>Metas Ventas</div>

          <div class='col-md-1 p-0 text-right'><b>Meta:</b> </div>
          <div class='col-md-1 text-left p-0 pl-3'>".$row['clt_metaClientes']."</div>
          <div class='col-md-1 p-0 text-right'><b>Cot. Emitidas:</b> </div>
          <div class='col-md-1 text-left p-0 pl-3'>".$row['ccot_emitidas']."</div>
          <div class='col-md-1 p-0 text-right'><b>Emitidas Total:</b> </div>
          <div class='col-md-1 text-left p-0 pl-3'>".$row['mcot_emTotal']."</div>
          <div class='col-md-1 p-0 text-right'><b>Vendidas Total:</b> </div>
          <div class='col-md-1 text-left p-0 pl-3'>".$row['pcot_venTotal']."</div>
          <div class='col-md-1 p-0 text-right'><b>Factor:</b> </div>
          <div class='col-md-1 text-left p-0 pl-3'>".$row['fact_conversion']."</div>
          <div class='col-md-1 p-0 text-right'><b>Meta:</b> </div>
          <div class='col-md-1 text-left p-0 pl-3'>".$row['ven_meta']."</div>


          <div class='col-md-1 p-0 text-right'><b>Prospectos:</b> </div>
          <div class='col-md-1 text-left p-0 pl-3'>".$row['clt_prospectos']."</div>
          <div class='col-md-1 p-0 text-right'><b>Ped. Recibidos:</b> </div>
          <div class='col-md-1 text-left p-0 pl-3'>".$row['ccot_pedidos']."</div>
          <div class='col-md-1 p-0 text-right'><b>Emitidas Pesos:</b> </div>
          <div class='col-md-1 text-left p-0 pl-3'>".$row['mcot_emPesos']."</div>
          <div class='col-md-1 p-0 text-right'><b>Vendidas Pesos:</b> </div>
          <div class='col-md-1 text-left p-0 pl-3'>".$row['pcot_venPesos']."</div>
          <div class='col-md-1 p-0 text-right'><b>Meta:</b> </div>
          <div class='col-md-1 text-left p-0 pl-3'>".$row['fact_meta']."</div>
          <div class='col-md-1 p-0 text-right'><b>Real:</b> </div>
          <div class='col-md-1 text-left p-0 pl-3'>".$row['ven_reales']."</div>


          <div class='col-md-1 p-0 text-right'><b>Cotizados:</b> </div>
          <div class='col-md-1 text-left p-0 pl-3'>".$row['clt_cotizados']."</div>
          <div class='col-md-1 p-0 text-right'><b>Factor Conv:</b> </div>
          <div class='col-md-1 text-left p-0 pl-3'>".$row['ccot_factor']."</div>
          <div class='col-md-1 p-0 text-right'><b>Emitidas USD:</b> </div>
          <div class='col-md-1 text-left p-0 pl-3'>".$row['mcot_emUsd']."</div>
          <div class='col-md-1 p-0 text-right'><b>Vendidas USD:</b> </div>
          <div class='col-md-1 text-left p-0 pl-3'>".$row['pcot_venUsd']."</div>
          <div class='col-md-2'></div>
          <div class='col-md-1 p-0 text-right'><b>Balance:</b> </div>
          <div class='col-md-1 text-left p-0 pl-3'>".$row['ven_balance']."</div>


          <div class='col-md-1 p-0 text-right'><b>Clts Nuevos:</b> </div>
          <div class='col-md-1 text-left p-0 pl-3'>".$row['clt_nuevo']."</div>
          <div class='col-md-1 p-0 text-right'><b>Meta:</b> </div>
          <div class='col-md-1 text-left p-0 pl-3'>".$row['ccot_meta']."</div>
          <div class='col-md-1 p-0 text-right'><b>Factor:</b> </div>
          <div class='col-md-1 text-left p-0 pl-3'>".$row['clt_factor']."%</div>
          <div class='col-md-1 p-0 text-right'><b>Meta:</b> </div>
          <div class='col-md-1 text-left p-0 pl-3'>".$row['clt_meta']."%</div>
        </div>
      </div>";

  }// fin del while metrica


}

$system_callback['data'] .= $nombreVendedor.$metrica;

} //fin del while vendedor



$system_callback['code'] = 1;
$system_callback['message'] = "Script called successfully!";
exit_script($system_callback);


 ?>
