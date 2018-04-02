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
pk_produccion AS id,
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

    $id = $row['id'];
    $fecha = $row['fecha'];
    $meta = $row['meta'];
    $cantidad = $row['cant'];
    $pe =  $_SESSION['user']['produccion_editar'];
    $admin = $_SESSION['user']['privilegiosUsuario'] == "Administrador";


  if ($pe == 1 || $admin){
    $data["infoTabla"].= "
    <tr class='row bordelateral' id='item'>
      <td class='col-md-3 text-center'>
        <h4><b>$fecha</b></h4>
      </td>
      <td class='col-md-3 text-center'>
        <h4><b>$meta pzs</b></h4>
      </td>
      <td class='col-md-3 text-center'>
        <h4><b>$cantidad pzs</b></h4>
      </td>
      <td class='col-md-3 text-right'>
        <a href='#' class='editarProduc spand-link' data-toggle='modal' data-target='#EdProd' pro-id='$id'><img src='/fitcoControl/Resources/iconos/001-edit-1.svg' class='spand-iconm'></a>

        <a href='#' class='eliminarProduc spand-link ml-3' pro-id='$id'><img src='/fitcoControl/Resources/iconos/004-delete-1.svg' class='spand-iconm'></a>
      </td>
    </tr>";
  }elseif ($pe == 0){
    $data["infoTabla"].= "
    <tr class='row bordelateral' id='item'>
      <td class='col-md-3 text-center'>
        <h4><b>$fecha</b></h4>
      </td>
      <td class='col-md-3 text-center'>
        <h4><b>$meta pzs</b></h4>
      </td>
      <td class='col-md-3 text-center'>
        <h4><b>$cantidad pzs</b></h4>
      </td>
      <td class='col-md-3 text-right'>
        <a href='#' class='bloqueo spand-link' pro-id='$id'><img src='/fitcoControl/Resources/iconos/001-edit-1.svg' class='spand-iconm'></a>

        <a href='#' class='bloqueo spand-link ml-3' pro-id='$id'><img src='/fitcoControl/Resources/iconos/004-delete-1.svg' class='spand-iconm'></a>
      </td>
    </tr>";
    }
  }
}

$json = json_encode($data);

echo $json;
?>
