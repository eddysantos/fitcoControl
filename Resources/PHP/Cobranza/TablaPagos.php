<?php

// $root = $_SERVER['DOCUMENT_ROOT'];
// require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
//
// $data = array(
//   'code' => "",
//   'response' => "",
//   'infoTabla' => ""
// );
// $query = "SELECT
// p.fechaPago AS fecha,
// p.importePago As pagado
//
// FROM ct_pagos p
//
// WHERE fk_cobranza =?";
//
// $stmt = $conn->prepare($query);
// $stmt->bind_param('s', $_POST['cobranzaId']);
// $stmt->execute();
//
// $resultados = $stmt->get_result();
// $num_rows = $stmt->num_rows;
//
// if (false) {
//   $data['code'] = 2;
//   $data['response'] = $num_rows;
// }else {
//   $data['code'] = 1;
//   while($row = mysqli_fetch_assoc($resultados)){
//     $data["data"][]= $row;
//
//     $fecha = $row['fecha'];
//     $importe = number_format($row['pagado'], 2);
//
//
//     $data["infoTabla"].= "
//     <tr class='row bordelateral' id='item'>
//       <td class='col-md-6 text-center'>
//         <h4><b>$fecha</b></h4>
//       </td>
//       <td class='col-md-6 text-center'>
//         <h4><b>$ $importe</b></h4>
//       </td>
//     </tr>";
//   }
// }
//
// $json = json_encode($data);
//
// echo $json;

?>
