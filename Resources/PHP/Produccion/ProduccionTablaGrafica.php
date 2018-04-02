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
//
//
// p.pk_programacion AS idprogram,
// c.nombreCliente AS cliente,
// WEEK(p.fechaFinal) AS semana,
// c.colorCliente AS color,
// SUM(pr.cantidadProduccion) AS total
//
// FROM ct_programacion p
//
// LEFT JOIN ct_cliente c ON c.pk_cliente = p.fk_cliente
// LEFT JOIN ct_produccion pr ON p.pk_programacion = pr.fk_programacion
//
// GROUP BY cliente, semana
//
// ORDER BY cliente";
//
//
// $resultado = mysqli_query($conn,$query);
//
// if (!$resultado) {
//   $data['code'] = 2;
//   $data['response'] = mysqli_error($conn);
//   die();
// }else {
//   while($row = mysqli_fetch_assoc($resultado)){
//     $data["data"][]= $row;
//
//     $idprog = $row['idprogram'];
//     $cliente = $row['cliente'];
//     $numerosemana = $row['semana'];
//     $color = $row['color'];
//     $total = $row['total'];
//
//     $data["infoTabla"].= "<tr class='row bordelateral m-0' id='item'>
//         <td class='col-md-4'>
//           <h4><b><input type='color' value='$color'>$cliente</b></h4>
//         </td>
//         <td class='col-md-4 text-center'>
//           <h4><b>$numerosemana</b></h4>
//         </td>
//         <td class='col-md-4 text-center'>
//           <h4><b>$total</b></h4>
//         </td>
//       </tr>";
//
//
//   }
//   echo json_encode($data);
// }
// mysqli_free_result($resultado);
// mysqli_close($conn);

?>
