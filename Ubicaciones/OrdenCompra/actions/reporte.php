<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';

$system_callback = [];
// $data = $_POST;

// $data['string'];
// $text = "%" . $data['string'] . "%";
// $variable = $data['variable'];
// $andWhere = 'WHERE (item LIKE ?)  OR (fechaRequerido LIKE ?) OR (descripcion LIKE ?)';
$query = "SELECT *
FROM ct_ordenCompra com
LEFT JOIN ct_ordenCotizaciones co ON com.pk_orden = co.fk_orden
GROUP BY com.pk_orden";

$stmt = $conn->prepare($query);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error durante la preparacion del query [$conn->errno]: $conn->error";
  exit_script($system_callback);
}

// $stmt->bind_param('sss',$text,$text,$text);
// if (!($stmt)) {
//   $system_callback['code'] = "500";
//   $system_callback['message'] = "Error al pasar variables [$stmt->errno]: $stmt->error";
//   exit_script($system_callback);
// }

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

while ($row = $rslt->fetch_assoc()) {
  $item = utf8_encode($row['item']);
  $pk_orden = utf8_encode($row['pk_orden']);
  $descripcion = utf8_encode($row['descripcion']);
  $fechaRequerido = utf8_encode($row['fechaRequerido']);
  $cantidad = utf8_encode($row['cantidad']);
  $vitalDesechable = utf8_encode($row['vitalDesechable']);
  $usuarioSolicitud = utf8_encode($row['usuarioSolicitud']);
  $usuario_add = utf8_encode($row['usuario_add']);
  $fecha_add = utf8_encode($row['fecha_add']);
  $aprobado = utf8_encode($row['aprobado']);
  $pagado = utf8_encode($row['pagado']);
  $notaAprobado = utf8_encode($row['notaAprobado']);

  // $admin = $_SESSION['user']['privilegiosUsuario'] == 'Administrador';

  // PROVEEDOR
  $precio = utf8_encode($row['precio']);
  $iva = utf8_encode($row['iva']);
  $rfc = utf8_encode($row['rfc']);
  $clabe = utf8_encode($row['clabe']);
  $nombreBanco = utf8_encode($row['nombreBanco']);
  $razonSocial = utf8_encode($row['razonSocial']);
  $condicionPago = utf8_encode($row['condicionPago']);
  $sugerencia = utf8_encode($row['sugerencia']);
  $numCuenta = utf8_encode($row['numCuenta']);





if (($aprobado == 1) && ($pagado == 1)) {
    $displaynone = "";
    $editar = "href='#mostrar_cot_autorizada' data-toggle='modal' class='ver_cot_aut'";
    $checked = "checked";
  }else {
    $displaynone = "display:none";
    $checked = "";
  }





  $system_callback['data'] .="<tr style='$displaynone' class='row m-0 bordeblue'>
    <td class='p-1 col-md-1 text-right'><b>Item :</b></td> <td class='p-1 col-md-5 text-left' style='border-right: 2px solid #ccc;'><b>#$pk_orden</b>  -- $item</td>
    <td class='p-1 col-md-1 text-right'><b>Razón Social : </b></td> <td class='p-1 col-md-4 text-left'>$razonSocial</td>    <td class='p-1 col-md-1'></td>


    <td class='p-1 col-md-1 text-right'><b>Descripción :</b></td> <td class='p-1 col-md-5 text-left' style='border-right: 2px solid #ccc;'>$descripcion</td>
    <td class='p-1 col-md-1 text-right'><b>RFC : </b></td> <td class='p-1 col-md-4 text-left'>$rfc</td>    <td class='p-1 col-md-1'></td>

    <td class='p-1 col-md-1 text-right'><b>Usuario :</b></td> <td class='p-1 col-md-5 text-left' style='border-right: 2px solid #ccc;'>$usuarioSolicitud</td>
    <td class='p-1 col-md-1 text-right'><b>Banco : </b></td> <td class='p-1 col-md-4 text-left'>$nombreBanco</td>    <td class='p-1 col-md-1'><label class='switch m-0'>
      <input db-id='$pk_orden' id='nopagado' type='checkbox' value='$pagado' class='nopagado success' $checked>
      <span class='slider round'></span>
    </label></td>

    <td class='p-1 col-md-1 text-right'><b>Requerido :</b></td> <td class='p-1 col-md-5 text-left' style='border-right: 2px solid #ccc;'>$fechaRequerido</td>
    <td class='p-1 col-md-1 text-right'><b>Cuenta : </b></td> <td class='p-1 col-md-4 text-left'>$numCuenta</td>    <td class='p-1 col-md-1'></td>

    <td class='p-1 col-md-1 text-right'><b>Cantidad :</b></td> <td class='p-1 col-md-5 text-left' style='border-right: 2px solid #ccc;'>$cantidad</td>
    <td class='p-1 col-md-1 text-right'><b>Precio : </b></td> <td class='p-1 col-md-4 text-left'>$precio $iva</td>    <td class='p-1 col-md-1'></td>

  </tr>";

}

$system_callback['code'] = 1;
$system_callback['message'] = "Script called successfully!";
exit_script($system_callback);
 ?>
