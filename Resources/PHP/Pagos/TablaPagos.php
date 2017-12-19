<?php
session_start();
$root = $_SERVER['DOCUMENT_ROOT'];
require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";

$data = array(
  'code' => "",
  'response' => "",
  'infoTabla' => ""
);
$query = "SELECT
p.pk_pagos AS idpagos,
DATE_FORMAT(p.fechaPago,'%d-%m-%Y') AS fecha,
p.importePago As pagado

FROM ct_pagos p

WHERE fk_cobranza =?";

$stmt = $conn->prepare($query);
$stmt->bind_param('s', $_POST['cobranzaId']);
$stmt->execute();

$resultados = $stmt->get_result();
$num_rows = $stmt->num_rows;

if (false) {
  $data['code'] = 2;
  $data['response'] = $num_rows;
}else {
  $data['code'] = 1;
  while($row = mysqli_fetch_assoc($resultados)){
    $data["data"][]= $row;


    $idpagos = $row['idpagos'];
    $fecha = $row['fecha'];
    $importe = number_format($row['pagado'], 2);
    $ce =  $_SESSION['user']['cobranza_editar'];
    $admin = $_SESSION['user']['privilegiosUsuario'] == "Administrador";


    if ($ce == 1 || $admin) {
      $data["infoTabla"].= "
      <tr class='row bordelateral' id='item'>

        <td class='col-md-5 text-center'>
          <h4><b>$fecha</b></h4>
        </td>
        <td class='col-md-5 text-center'>
          <h4><b>$ $importe</b></h4>
        </td>
        <td class='col-md-2 text-center pr-0 pl-0'>
        <a href='' id='btnEditarPago' class=' editarPago spand-linkm' data-toggle='modal' data-target='#EdPago' pago-id='$idpagos'><img src='/fitcoControl/Resources/iconos/001-edit.svg' class='mr-4 spand-iconm'></a>

        <a href='' id='EliminarPago' class=' eliminarPago spand-linkm'  pago-id='$idpagos'><img src='/fitcoControl/Resources/iconos/002-delete.svg' class='spand-iconm'></a>
        </td>
      </tr>";
    }elseif ($ce == 0) {
      $data["infoTabla"].= "
      <tr class='row bordelateral' id='item'>

        <td class='col-md-5 text-center'>
          <h4><b>$fecha</b></h4>
        </td>
        <td class='col-md-5 text-center'>
          <h4><b>$ $importe</b></h4>
        </td>
        <td class='col-md-2 text-center pr-0 pl-0'>
        <a class='bloqueo editarPago spand-linkm'><img src='/fitcoControl/Resources/iconos/001-edit.svg' class='mr-4 spand-iconm'></a>

        <a class='bloqueo spand-linkm'><img src='/fitcoControl/Resources/iconos/002-delete.svg' class='spand-iconm'></a>
        </td>
      </tr>";
    }
  }
}

$json = json_encode($data);

echo $json;

?>
