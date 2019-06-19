<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';

$system_callback = [];
$query = "SELECT * FROM ct_ventasMetricas LEFT JOIN ct_ventasVendedor ON pk_venMet = fk_venMet ORDER BY fecha";

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
$vendedores = array();
while ($row = $rslt->fetch_assoc()) {
  $vendedores[$row['pk_venMet']]['datos_generales'] = array(
    'nombre' => $row['nombreVendedor'],
    'id' => $row['pk_venMet']
  );
  $vendedores[$row['pk_venMet']]['metricas'][$row['mes']] = array(
    'mes'=>$row['mes'],
    'id'=>$row['pk_metrica'],
    'clt_metaClientes'=>$row['clt_metaClientes'],
    'clt_prospectos'=>$row['clt_prospectos'],
    'clt_cotizados'=>$row['clt_cotizados'],
    'clt_nuevo'=>$row['clt_nuevo'],
    'clt_factor'=>$row['clt_factor'],
    'clt_meta'=>$row['clt_meta'],
    'ccot_emitidas'=>$row['ccot_emitidas'],
    'ccot_pedidos'=>$row['ccot_pedidos'],
    'ccot_factor'=>$row['ccot_factor'],
    'ccot_meta'=>$row['ccot_meta'],
    'mcot_emTotal'=>$row['mcot_emTotal'],
    'mcot_emPesos'=>$row['mcot_emPesos'],
    'mcot_emUsd'=>$row['mcot_emUsd'],
    'pcot_venTotal'=>$row['pcot_venTotal'],
    'pcot_venPesos'=>$row['pcot_venPesos'],
    'pcot_venUsd'=>$row['pcot_venUsd'],
    'fact_conversion'=>$row['fact_conversion'],
    'fact_meta'=>$row['fact_meta'],
    'ven_meta'=>$row['ven_meta'],
    'ven_reales'=>$row['ven_reales'],
    'ven_balance'=>$row['ven_balance']
  );
}

foreach ($vendedores as $vendedor) {
  $data .= "<div class='row text-center m-0'>
      <div class='col-md-11 text-left' style='background-color: #eee;'>
        <a href='#agregarMetrica' data-toggle='modal' class='agregarMetrica spand-link' db-id='".$vendedor['datos_generales']['id']."'><img src='/fitcoControl/Resources/iconos/003-add.svg' class=' spand-icon '></a>

        <b style='color:#2a608e;font-size:18px!important'>".$vendedor['datos_generales']['nombre']."</b>
      </div>
      <div class='col-md-1' style='background-color: #eee;'>
        <a href='#' class='eliminarVendedor spand-link ml-3' db-id='".$vendedor['datos_generales']['id']."'>
          <img src='/fitcoControl/Resources/iconos/004-delete-1.svg' class='img spand-icon'>
        </a>
      </div>
    </div> ";

    foreach ($vendedor['metricas'] as $mes) {
      $row_count++;
      $data .= "
      <div class='row m-0 text-center'>
        <div class='col-md-6 text-right p-0' style='background-color: whitesmoke;'>
          <a data-toggle='collapse' href='#multiCollapse$row_count' role='button' aria-expanded='false' aria-controls='multiCollapse$row_count' style='text-decoration:none'>".$mes['mes']."</a>
        </div>

        <div class='col-md-6 text-left p-0' style='background-color: whitesmoke;'>
          <a href='#editarMetrica' class='editarMetrica spand-linkm' db-id='".$mes['id']."'><img src='/fitcoControl/Resources/iconos/001-edit-1.svg' class='ml-4 spand-iconxs'></a>

          <a href='#' class='eliminarMetrica spand-linkm' db-id='".$mes['id']."'><img src='/fitcoControl/Resources/iconos/delete.svg' class='ml-2 spand-iconxs'></a>
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
          <div class='col-md-1 text-left p-0 pl-3'>".$mes['clt_metaClientes']."</div>
          <div class='col-md-1 p-0 text-right'><b>Cot. Emitidas:</b> </div>
          <div class='col-md-1 text-left p-0 pl-3'>".$mes['ccot_emitidas']."</div>
          <div class='col-md-1 p-0 text-right'><b>Emitidas Total:</b> </div>
          <div class='col-md-1 text-left p-0 pl-3'>".$mes['mcot_emTotal']."</div>
          <div class='col-md-1 p-0 text-right'><b>Vendidas Total:</b> </div>
          <div class='col-md-1 text-left p-0 pl-3'>".$mes['pcot_venTotal']."</div>
          <div class='col-md-1 p-0 text-right'><b>Factor:</b> </div>
          <div class='col-md-1 text-left p-0 pl-3'>".$mes['fact_conversion']."</div>
          <div class='col-md-1 p-0 text-right'><b>Meta:</b> </div>
          <div class='col-md-1 text-left p-0 pl-3'>".$mes['ven_meta']."</div>


          <div class='col-md-1 p-0 text-right'><b>Prospectos:</b> </div>
          <div class='col-md-1 text-left p-0 pl-3'>".$mes['clt_prospectos']."</div>
          <div class='col-md-1 p-0 text-right'><b>Ped. Recibidos:</b> </div>
          <div class='col-md-1 text-left p-0 pl-3'>".$mes['ccot_pedidos']."</div>
          <div class='col-md-1 p-0 text-right'><b>Emitidas Pesos:</b> </div>
          <div class='col-md-1 text-left p-0 pl-3'>".$mes['mcot_emPesos']."</div>
          <div class='col-md-1 p-0 text-right'><b>Vendidas Pesos:</b> </div>
          <div class='col-md-1 text-left p-0 pl-3'>".$mes['pcot_venPesos']."</div>
          <div class='col-md-1 p-0 text-right'><b>Meta:</b> </div>
          <div class='col-md-1 text-left p-0 pl-3'>".$mes['fact_meta']."</div>
          <div class='col-md-1 p-0 text-right'><b>Real:</b> </div>
          <div class='col-md-1 text-left p-0 pl-3'>".$mes['ven_reales']."</div>


          <div class='col-md-1 p-0 text-right'><b>Cotizados:</b> </div>
          <div class='col-md-1 text-left p-0 pl-3'>".$mes['clt_cotizados']."</div>
          <div class='col-md-1 p-0 text-right'><b>Factor Conv:</b> </div>
          <div class='col-md-1 text-left p-0 pl-3'>".$mes['ccot_factor']."</div>
          <div class='col-md-1 p-0 text-right'><b>Emitidas USD:</b> </div>
          <div class='col-md-1 text-left p-0 pl-3'>".$mes['mcot_emUsd']."</div>
          <div class='col-md-1 p-0 text-right'><b>Vendidas USD:</b> </div>
          <div class='col-md-1 text-left p-0 pl-3'>".$mes['pcot_venUsd']."</div>
          <div class='col-md-2'></div>
          <div class='col-md-1 p-0 text-right'><b>Balance:</b> </div>
          <div class='col-md-1 text-left p-0 pl-3'>".$mes['ven_balance']."</div>


          <div class='col-md-1 p-0 text-right'><b>Clts Nuevos:</b> </div>
          <div class='col-md-1 text-left p-0 pl-3'>".$mes['clt_nuevo']."</div>
          <div class='col-md-1 p-0 text-right'><b>Meta:</b> </div>
          <div class='col-md-1 text-left p-0 pl-3'>".$mes['ccot_meta']."</div>
          <div class='col-md-1 p-0 text-right'><b>Factor:</b> </div>
          <div class='col-md-1 text-left p-0 pl-3'>".$mes['clt_factor']."%</div>
          <div class='col-md-1 p-0 text-right'><b>Meta:</b> </div>
          <div class='col-md-1 text-left p-0 pl-3'>".$mes['clt_meta']."%</div>
        </div>
      </div>
      ";
    }
}


$system_callback['data'] .= $data;
$system_callback['code'] = 1;
$system_callback['message'] = "Script called successfully!";
$system_callback['vendedores'] = $vendedores;
exit_script($system_callback);


 ?>
