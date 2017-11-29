<?php

$root = $_SERVER['DOCUMENT_ROOT'];
require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";

function utf8ize($d) {
    if (is_array($d)) {
        foreach ($d as $k => $v) {
            $d[$k] = utf8ize($v);
        }
    } else if (is_string ($d)) {
        return utf8_encode($d);
    }
    return $d;
}

$data = array(
  'code' => "",
  'response' => "",
  'infoTabla' => ""
);
$query = "SELECT
pk_ventas AS idVentas,
nombreCliente AS cliente,
nombreVendedor AS vendedor,
fechaIngreso AS ingreso,
fechaBaja AS baja,
precioXprenda AS precioXprenda,
acuerdoPago AS acuerdo,
numeroPrendas AS prendas

FROM ct_ventas";

$resultado = mysqli_query($conn,$query);

if (!$resultado) {
  $data['code'] = 2;
  $data['response'] = mysqli_error($conn);
  //echo json_encode($data);
}else {
  while($row = mysqli_fetch_assoc($resultado)){
    $data["data"][]= $row;

    $idVentas = $row['idVentas'];
    $nombreCliente = $row['cliente'];
    $nombreVendedor = $row['vendedor'];
    $fechaIngreso = $row['ingreso'];
    $fechaBaja = $row['baja'];
    $precioXprenda = $row['precioXprenda'];
    $numeroPrendas = $row['prendas'];
    $acuerdo = $row['acuerdo'];

    $data["infoTabla"].= "
    <tr class='row bordelateral m-0' id='item'>
      <td class='col-md-1'>
        <img src='/fitcoControl/Resources/iconos/users.svg' class='icono'>
      </td>
      <td class='col-md-3'>
        <h4><b>$nombreCliente</b></h4>
        <p class='visibilidad'>Prendas x Mes: $numeroPrendas</p>
      </td>
      <td class='col-md-3 text-center'>
        <h4><b>$nombreVendedor</b></h4>
        <p class='visibilidad'>Acuerdo de Pago: $acuerdo</p>
      </td>
      <td class='col-md-2 text-center'>
        <h4><b>$fechaIngreso</b></h4>
      </td>
      <td class='col-md-1'></td>
      <td class='col-md-2 text-center'>
        <a href='#' class='EditVentas spand-link' data-toggle='modal' data-target='#EditarVentas' ventas-id='$idVentas'><img src='/fitcoControl/Resources/iconos/001-edit.svg' class='ml-5 spand-icon'></a>

        <a href='#' class='EliminarVenta spand-link' ventas-id='$idVentas'><img  src='/fitcoControl/Resources/iconos/002-delete.svg' class='ml-5 spand-icon'></a>
      </td>
    </tr>";


  }
  //echo json_encode($data);
}

echo json_encode(utf8ize($data));

mysqli_free_result($resultado);
mysqli_close($conn);

?>
