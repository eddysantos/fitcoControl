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
$peroid = "";

switch ($data['period']) {
  case 0:
    $period = 'DATE(pr.fechaIntroduccion)';
    break;

  case 1:
    $period = "WEEK(pr.fechaIntroduccion, 1)";
    break;

  case 2:
    $period = "MONTH(pr.fechaIntroduccion)";
    break;

  default:
    $period = "DATE(pr.fechaIntroduccion)";
    break;
}
// $and_where = "";
$and_where = "WHERE pr.fechaIntroduccion BETWEEN ? AND ?";

$query = "SELECT $period agrupamiento,
SUM(pr.cantidadProduccion) AS produccion,
SUM(pr.metaProduccion) AS meta,
pr.fechaIntroduccion AS fecha

FROM ct_program p LEFT JOIN ct_produccion pr ON pr.fk_programacion = p.pk_programacion $and_where GROUP BY agrupamiento";


$stmt = $conn->prepare($query);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error durante preparacion de query GRAPH DISENO [$conn->errno]: $conn->error";
  exit_script($system_callback);
}

$stmt->bind_param('ss', $b_date, $e_date);
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
  $results[$row['agrupamiento']]['fecha'] = $row['fecha'];
  $results[$row['agrupamiento']]['meta'] += $row['meta'];
  $results[$row['agrupamiento']]['produccion'] += $row['produccion'];
}

$var = $arrayName = array('agrupamiento' => ['fecha', 'meta','produccion']);
$x_tag = "Meta";
$chart_data = array(['x'],['Meta'], ['Produccion']);



switch ($data['period']) {
  case 0:
    foreach ($results as $date_group => $result) {
      $meta = $result['meta'];
      $produccion = $result['produccion'];
      array_push($chart_data[0], $date_group);
      array_push($chart_data[1], $meta);
      array_push($chart_data[2], $produccion);
    }
    break;


  case 1:
    foreach ($results as $date_grouping => $result) {
      $meta = $result['meta'];
      $produccion = $result['produccion'];
      $year = date('Y', strtotime($result['fecha']));
      $week_day = get_monday($year, $date_grouping);
      array_push($chart_data[0], $week_day);
      array_push($chart_data[1], $meta);
      array_push($chart_data[2], $produccion);

    }
    break;

  case 2:
  foreach ($results as $date_grouping => $result) {
    $meta = $result['meta'];
    $produccion = $result['produccion'];
    $month = date('M', strtotime($result['fecha']));
    array_push($chart_data[0], $month);
    array_push($chart_data[1], $meta);
    array_push($chart_data[2], $produccion);

  }
    break;
}


$system_callback['code'] = 1;
$system_callback['query'] = $query;
$system_callback['data'] = $data;
$system_callback['to_chart'] = $chart_data;
exit_script($system_callback);

 ?>
