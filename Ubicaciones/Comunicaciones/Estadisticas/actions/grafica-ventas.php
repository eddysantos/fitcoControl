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
// $chart_data = array(['x'],['Total']);

$b_date = date('Y-m-d', strtotime($data['date_from']));
$e_date = date('Y-m-d', strtotime($data['date_to']));
$peroid = "";
$consulta = "";

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


switch ($data['grafico']) {
  case 0:
    $consulta = "sum(numeroPrendas)";
    $x_tag = "Numero Prendas";
    break;

  case 1:
    $consulta = "sum(numeroPrendas * precioXprenda)";
    $x_tag = "total en dinero";
    break;

  case 2:
    $consulta = "sum(ingresoBanco)";
    $x_tag = "Ingreso en Banco";
    break;

  case 3:
    $consulta = "sum(precioXprenda - costoPrenda)";
    $x_tag = "Margen de Ganancia";
    break;

  default:
    $consulta = "sum(numeroPrendas * precioXprenda)";
    $x_tag = "total en dinero";
    break;
}

$and_where = "";
$vendedor = $_POST['vendedor'];
if (isset($_POST['vendedor'])) {
  $and_where = "WHERE nombreVendedor = ? AND fecha BETWEEN ? AND ?";
}else {
  $and_where = "WHERE fecha BETWEEN ? AND ?";
}


$query = "SELECT  $consulta total, $period agrupamiento, fecha FROM ct_ventas_copy1 $and_where GROUP BY agrupamiento";


$stmt = $conn->prepare($query);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error durante preparacion de query GRAPH DISENO [$conn->errno]: $conn->error";
  exit_script($system_callback);
}


if (isset($_POST['vendedor'])) {
  $stmt->bind_param('sss', $vendedor,$b_date, $e_date);
}else {
  $stmt->bind_param('ss', $b_date, $e_date);
}


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
  $results[$row['agrupamiento']]['total'] += $row['total'];
}

$var = $arrayName = array('agrupamiento' => ['fecha', 'total']);
$chart_data = array(['x'],[$x_tag]);



switch ($data['period']) {
  case 0:
    foreach ($results as $date_group => $result) {
      $total = $result['total'];
      array_push($chart_data[0], $date_group);
      array_push($chart_data[1], $total);
    }
    break;


  case 1:
    foreach ($results as $date_grouping => $result) {
      $total = $result['total'];
      $year = date('Y', strtotime($result['fecha']));
      $week_day = get_monday($year, $date_grouping);
      array_push($chart_data[0], $week_day);
      array_push($chart_data[1], $total);

    }
    break;

  case 2:
  foreach ($results as $date_grouping => $result) {
    $total = $result['total'];
    $month = date('M', strtotime($result['fecha']));
    array_push($chart_data[0], $month);
    array_push($chart_data[1], $total);

  }
    break;
}




$system_callback['code'] = 1;
$system_callback['query'] = $query;
$system_callback['data'] = $data;
$system_callback['to_chart'] = $chart_data;
exit_script($system_callback);

 ?>
