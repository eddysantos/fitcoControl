<?php

$root = $_SERVER['DOCUMENT_ROOT'];
require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";

$data = array(
  'code' => "",
  'response' => "",
  'infoTabla' => ""
);
$query = "SELECT
fechaIntroduccion AS fecha,
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

    $fecha = $row['fecha'];
    $cantidad = $row['cant'];


    $data["infoTabla"].= "<tr class='row bordelateral m-0' id='item'>
      <td class='col-md-6 text-center'>
        <h4><b>$fecha</b></h4>
      </td>
      <td class='col-md-6 text-center'>
        <h4><b>$cantidad piezas</b></h4>
      </td>
    </tr>";


  }
}

$json = json_encode($data);

echo $json;

?>
