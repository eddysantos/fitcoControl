<?php

$root = $_SERVER['DOCUMENT_ROOT'];
require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";

$data = array(
  'code' => "",
  'response' => "",
  'infoTabla' => ""
);
$query = "SELECT
pk_produccion AS idProduc,
fechaIntroduccion AS fecha,
metaProduccion AS meta,
cantidadProduccion AS cant

FROM ct_produccion

WHERE fk_programacion =?";

$stmt = $conn->prepare($query);
$stmt->bind_param('s', $_POST['idProg']);
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

    $idProduc = $row['idProduc'];
    $fecha = $row['fecha'];
    $meta = $row['meta'];
    $cantidad = $row['cant'];



    $data["infoTabla"].= "
    <tr class='row bordelateral' id='item'>
      <td class='col-md-3 text-center'>
        <h4><b>$fecha</b></h4>
      </td>
      <td class='col-md-3 text-center'>
        <h4><b>$meta piezas</b></h4>
      </td>
      <td class='col-md-3 text-center'>
        <h4><b>$cantidad piezas</b></h4>
      </td>
      <td class='col-md-3 text-center'>
        <a href='' id='btnEditarProduc' class='editarProduc spand-linkm' data-toggle='modal' data-target='#EdProd' pro-id='$idProduc'><img src='/fitcoControl/Resources/iconos/001-edit.svg' class='ml-5 mr-4 spand-iconm'></a>

        <a href='' id='EliminarProduc' class='eliminarProduc spand-linkm'  pro-id='$idProduc'><img src='/fitcoControl/Resources/iconos/002-delete.svg' class='ml-2 spand-iconm'></a>
      </td>
    </tr>";
  }
}

$json = json_encode($data);

echo $json;

?>
