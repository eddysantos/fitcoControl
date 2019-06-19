<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';



function numberify($number){
  return number_format($number, 2);
}

function findMonday($d="",$format="Y-m-d") {
    if($d=="") $d=date("Y-m-d");
    $delta = date("w",strtotime($d)) - 1;
    if ($delta <0) $delta = 6;
    return date($format, mktime(0,0,0,date('m'), date('d')-$delta, date('Y') ));
}

function get_monday($year, $week){
  $week_start = new DateTime();
  $week_start->setISODate($year,$week, 1);
  return $week_start->format('Y-m-d');
}

$system_callback = [];
$data = $_POST;

$b_date = date('Y-m-d', strtotime($data['date_from']));
$e_date = date('Y-m-d', strtotime($data['date_to']));
// $period = $data['period'];
$consulta = "";




switch ($data['grafico']) {
  case 0:
    $consulta = "sum(clt_nuevo)";
    $x_tag = "Numero De Citas";
    break;

  case 1:
    $consulta = "sum(clt_cotizados)";
    $x_tag = "Cotizaciones Enviadas";
    break;

  case 2:
    $consulta = "sum(ven_reales)";
    $x_tag = "Total Ventas en Dinero";
    break;


  default:
    $consulta = "sum(ven_reales)";
    $x_tag = "Total Ventas en Dinero";
    break;
}

$and_where = "";
$and_where = "WHERE fecha BETWEEN ? AND ?";


$query = "SELECT  $consulta total, mes agrupamiento FROM ct_ventasMetricas  $and_where GROUP BY agrupamiento";


$stmt = $conn->prepare($query);

if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error durante preparacion de query GRAPH DISENO [$conn->errno]: $conn->error";
  exit_script($system_callback);
}


$stmt->bind_param('ss', $b_date,$e_date);


if (!($stmt)) {
  $sc['code'] = "500";
  $sc['message'] = "Error durante vinculacion de variables del query GRAPH DISENO [$stmt->errno]: $stmt->error";
  exit_script($sc);
}

if (!($stmt->execute())) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error durante la ejecucion del query GRAPH DISENO [$stmt->errno]: $stmt->error";
  exit_script($system_callback);
}

$rslt = $stmt->get_result();
$result = array();

$num_rows = $rslt->num_rows;

if ($rslt->num_rows == 0) {
  $system_callback['code'] = "2";
  $system_callback['message'] = "There was no rows to display!";
  exit_script($system_callback);
}

while ($row = $rslt->fetch_assoc()) {
  $results[$row['agrupamiento']]['mes'] = $row['mes'];
  $results[$row['agrupamiento']]['total'] += $row['total'];
}

$var = $arrayName = array('agrupamiento' => ['mes', 'total']);
$chart_data = array(['x'],[$x_tag]);


foreach ($results as $date_group => $result) {
  $total = $result['total'];
  array_push($chart_data[0], $date_group);
  array_push($chart_data[1], $total);
}



$system_callback['code'] = 1;
$system_callback['query'] = $query;
$system_callback['data'] = $data;
$system_callback['to_chart'] = $chart_data;
exit_script($system_callback);

 ?>
