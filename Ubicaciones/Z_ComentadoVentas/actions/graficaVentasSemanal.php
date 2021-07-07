<?php
// $root = $_SERVER['DOCUMENT_ROOT'];
// require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';
//
// $and_where = "";
// $vendedor = $_POST['vendedor'];
// if (isset($_POST['vendedor'])) {
//   $and_where = "WHERE  nombreVendedor = ?";
// }
//
// $querySemanalVentas = "SELECT
// WEEK(fechaIngreso) AS semana,
// fechaIngreso AS fingreso,
// nombreVendedor AS vendedor,
// year(fechaIngreso) AS anio,
// SUM(numeroPrendas * precioXprenda) AS total
// FROM ct_ventas $and_where GROUP BY semana";
//
// $stmt = $conn->prepare($querySemanalVentas);
// if (!($stmt)) {
//   $system_callback['code'] = "500";
//   $system_callback['message'] = "Error during query prepare [$conn->errno]: $conn->error";
//   exit_script($system_callback);
// }
//
// if (isset($_POST['vendedor'])) {
//   $stmt->bind_param('s', $vendedor);
// }
//
// if (!($stmt->execute())) {
//   $system_callback['code'] = "500";
//   $system_callback['message'] = "Error during query execution [$stmt->errno]: $stmt->error";
//   exit_script($system_callback);
// }
//
// $rslt = $stmt->get_result();
//
// if ($rslt->num_rows == 0) {
//   $system_callback['code'] = 1;
//   $system_callback['data'] ="<p db-id=''>No se encontraron resultados</p>";
//   $system_callback['message'] = "Script called successfully but there are no rows to display.";
//   exit_script($system_callback);
// }
//
// $charter = [['x'],['Ventas']];
//
//   $totalVentas[] = 'Total';
//   $semanalVentas[] = 'x';
//
//   while ($row = $rslt->fetch_assoc()) {
//     $sem = strftime("%W %Y", strtotime($row['fingreso']));
//
//     array_push($charter[0], $sem);
//     array_push($charter[1], $row['total']);
//   }
//
//   $system_callback['code'] = 1;
//   $system_callback['to_chart'] = $charter;
//   exit_script($system_callback);


?>
