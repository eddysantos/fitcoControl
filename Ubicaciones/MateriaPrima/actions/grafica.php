<?php


$root = $_SERVER['DOCUMENT_ROOT'];
require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";

function numberify($number){
  return number_format($number, 2);
}

function exit_script($input_array){
  $json_string = json_encode($input_array);
  echo $json_string;
  global $conn;
  $conn->close();
  die();
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
$chart_data = array(['x'],['Porcentaje']);

$b_date = date('Y-m-d', strtotime($data['date_from']));
$e_date = date('Y-m-d', strtotime($data['date_to']));
$peroid = "";

switch ($data['period']) {
  case 0:
    $period = 'DATE(fecha)';
    break;

  case 1:
    $period = "WEEK(fecha, 1)";
    break;

  case 2:
    $period = "MONTH(fecha)";
    break;

  default:
    $period = "DATE(fecha)";
    break;
}

$query = "SELECT sum(mat_ent_correctas) ent_correctas, sum(mat_entradas) entradas, $period agrupamiento, fecha fecha FROM ct_materiaPrima WHERE fecha BETWEEN ? AND ? GROUP BY agrupamiento";


$stmt = $conn->prepare($query);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error durante preparacion de query GRAPH DISENO [$db->errno]: $db->error";
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
  $results[$row['agrupamiento']]['entradas'] += $row['entradas'];
  $results[$row['agrupamiento']]['ent_correctas'] += $row['ent_correctas'];
}

$var = $arrayName = array('agrupamiento' => ['fecha', 'ent_correctas', 'entradas'] );


switch ($data['period']) {
  case 0:
    foreach ($results as $date_group => $result) {
      array_push($chart_data[0], $date_group);
      array_push($chart_data[1], numberify(($result['ent_correctas'] / $result['entradas']) * 100));
    }
    break;


  case 1:
    foreach ($results as $date_grouping => $result) {
      $year = date('Y', strtotime($result['fecha']));
      $week_day = get_monday($year, $date_grouping);
      array_push($chart_data[0], $week_day);
      array_push($chart_data[1], numberify(($result['ent_correctas'] / $result['entradas']) * 100));
    }
    break;

  case 2:
  foreach ($results as $date_grouping => $result) {
    $month = date('Y-m-01', strtotime($result['fecha']));
    array_push($chart_data[0], $month);
    array_push($chart_data[1], numberify(($result['ent_correctas'] / $result['entradas']) * 100));
  }
    break;
}



$system_callback['code'] = 1;
$system_callback['query'] = $query;
$system_callback['data'] = $data;
$system_callback['to_chart'] = $chart_data;
exit_script($system_callback);

 ?>
