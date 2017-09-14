<?php

$root = $_SERVER['DOCUMENT_ROOT'];
require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
$data = array(
  'code' => "",
  'response' => "",
  'infoTabla' => ""
);
$query = "SELECT

co.pk_cobranza AS idcobranza,
ct.nombreCliente AS nombre,
co.facturaCobranza AS factura,
co.importeCobranza AS importe,
co.vencimientoCobranza AS vencimiento,
ct.colorCliente AS color,
ct.creditoCliente AS credito

FROM ct_cobranza co

LEFT JOIN ct_cliente ct ON co.fk_cliente = ct.pk_cliente

ORDER BY nombre ASC,vencimiento";

$resultado = mysqli_query($conn,$query);

if (!$resultado) {
  $data['code'] = 2;
  $data['response'] = mysqli_error($conn);
  //echo json_encode($data);
  die();
}else {
  while($row = mysqli_fetch_assoc($resultado)){
    $data["data"][]= $row;

    $idCobranza = $row['idcobranza'];
    $clienteCobranza = $row['nombre'];
    $facturaCobranza = $row['factura'];
    $importeCobranza = number_format($row['importe'], 2);
    $vencimientoCobranza = $row['vencimiento'];
    $colorCliente = $row['color'];
    $creditoCliente = $row['credito'];

    $data["infoTabla"].= "<tr class='row  bordelateral m-0' id='item'>
      <td class='col-md-1'>
        <img src='/fitcoControl/Resources/iconos/dinero.svg' class='icono'>
      </td>
      <td class='col-md-3'>
        <h4><b><input type='color' value='$colorCliente'>$clienteCobranza</b></h4>
        <p><a class='visibilidad'>Credito : $creditoCliente Días</a></p>
      </td>
      <td class='col-md-2 text-center'>
        <h4><b>$facturaCobranza</b></h4>
      </td>
      <td class='col-md-2 text-center'>
        <h4><b> $ $importeCobranza </b></h4>
      </td>
      <td class='col-md-2 text-center'>
        <h4><b> $vencimientoCobranza </b></h4>
      </td>

      <td class='col-md-1'></td>
      <td class='col-md-1 text-center'>
        <!--EDITAR EDITAR EDITAR EDITAR-->
        <a href='' id='btnEditarCobranza' class='editarCobranza spand-link' data-toggle='modal' data-target='#DetCobranza' cobranza-id='$idCobranza'><img src='/fitcoControl/Resources/iconos/pencil1.svg' class='spand-icon'></a>
      </td>
    </tr>";


  }
}
echo json_encode($data);

mysqli_free_result($resultado);
mysqli_close($conn);

?>