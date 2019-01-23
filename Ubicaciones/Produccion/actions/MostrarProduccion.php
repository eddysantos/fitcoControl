<?php
// session_start();
//
// $root = $_SERVER['DOCUMENT_ROOT'];
// require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
//
// $data = array(
//   'code' => "",
//   'response' => "",
//   'infoTabla' => ""
// );
//
// $query = "SELECT
// p.pk_programacion AS idprogram,
// p.title AS cliente,
// p.end AS ffin,
// year(p.end) AS anio,
// p.piezasRequeridas AS piezas,
// p.color AS color,
// SUM(pr.cantidadProduccion) AS total
//
// FROM ct_program p
//
// LEFT JOIN ct_produccion pr ON p.pk_programacion = pr.fk_programacion
//
// GROUP BY p.pk_programacion
// 
// ORDER BY anio DESC, ffin DESC";
//
// if (isset($_POST['produccion'])) {
//   $q = $conn->real_escape_string($_POST['produccion']);
//   $query = "SELECT
//   p.pk_programacion AS idprogram,
//   p.title AS cliente,
//   p.end AS ffin,
//   year(p.end) AS anio,
//   p.piezasRequeridas AS piezas,
//   p.color AS color,
//   SUM(pr.cantidadProduccion) AS total
//
//   FROM ct_program p
//
//   LEFT JOIN ct_produccion pr ON p.pk_programacion = pr.fk_programacion
//
//   WHERE p.pk_programacion LIKE '%$q%' OR
//   c.nombreCliente LIKE '%$q%' OR
//   p.end LIKE '%$q%' OR
//   p.piezasRequeridas LIKE '%$q%' OR
//   pr.cantidadProduccion LIKE '%$q%'
//
//
//   GROUP BY p.pk_programacion
//
//   ORDER BY anio DESC, ffin DESC";
// }

// $buscarDatos = $conn->query($query);
// if ($buscarDatos->num_rows > 0) {
//   $tabla.="
//   <form class='page p-0'>
//     <table class='table table-hover fixed-table'>
//       <thead>
//         <tr class='row m-0 encabezado'>
//           <td class='col-md-1'></td>
//           <td class='col-md-3 text-center'><h3>PRODUCCIÓN</h3></td>
//           <td class='col-md-2 text-center'><h3>REQUERIDO</h3></td>
//           <td class='col-md-2 text-center'><h3>FABRICADO</h3></td>
//           <td class='col-md-2 text-center'><h3>FINALIZAR</h3></td>
//           <td class='col-md-2'></td>
//         </tr>
//       </thead>
//       <tbody id='mostrarProduccion'>";
//
//       while ($row = $buscarDatos->fetch_assoc()){
//         $idprog = $row['idprogram'];
//         $cliente = $row['cliente'];
//         $ffin = $row['ffin'];
//         $piezas = $row['piezas'];
//         $color = $row['color'];
//         $total = $row['total'];
//         $hoy = date('Y-m-d');
//         $iconocaja = "";
//         $background = "";
//         $numerosemana = date("W",strtotime($ffin));
//         $admin = $_SESSION['user']['privilegiosUsuario'];
//         $pe = $_SESSION['user']['produccion_editar'];

  //si fecha vencimiento es mayor a la fecha de hoy y mis piezas requeridas son igual a
        // if (($ffin > $hoy)  && ($piezas == $total)) {
        //   $iconocaja = "001-check.svg";
        //   $background = "verde";
        // } elseif (($ffin < $hoy) && ($piezas == $total)) {
        //   $iconocaja = "001-check.svg";
        //   $background = "verde";
        // }elseif (($ffin < $hoy) && ($piezas > $total)) {
        //   $iconocaja = "003-shipping.svg";
        //   $background = "rojo";
        // }else {
        //   $iconocaja = "002-delivery.svg";
        // }

        // si es negro no tomar en cuenta
  //       if ($color === '#000000') {
  //         $displaynone = "display:none";
  //       }else {
  //         $displaynone = "";
  //       }
  //
  //
  //   $tabla.="
  //     <tr style='$displaynone' class='$background row bordelateral  m-0' id='item'>
  //       <td class='col-md-1'>
  //         <img src='/fitcoControl/Resources/iconos/$iconocaja' class='icono'>
  //       </td>
  //         <td class='col-md-3'>
  //           <h4><b><input type='color' value='$color'>$cliente</b></h4>
  //         </td>
  //         <td class='col-md-2 text-center'>
  //           <h4><b>$piezas</b></h4>
  //         </td>
  //         <td class='col-md-2 text-center'>
  //           <h4><b>$total</b></h4>
  //         </td>
  //         <td class='col-md-2 text-center'>
  //           <h4><b>$ffin</b></h4>
  //         </td>
  //
  //         <td class='col-md-2 text-right'>
  //           <a href='#' class='agregarproduccion spand-link' program-id='$idprog'><img src='/fitcoControl/Resources/iconos/003-add.svg' class='spand-icon'></a>
  //
  //           <a href='#' class='visualizarproduccion spand-link ml-3' data-toggle='modal' data-target='#VisualizarTablaProduccion' program-id='$idprog'><img src='/fitcoControl/Resources/iconos/magnifier.svg' class='spand-icon'></a>
  //         </td>
  //       </tr>";
  //   }
  //   $tabla.="
  //   </tbody>
  //  </table>
  // </form>";
  // }else {
  //   $tabla="No se encontraron coincidencias";
  // }
  // echo $tabla;

?>
