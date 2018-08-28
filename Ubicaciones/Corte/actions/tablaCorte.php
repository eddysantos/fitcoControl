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
pk_CorteDiario AS id,
DATE_FORMAT(fechaIntroduccion,'%d-%m-%Y') AS fecha,
metaCorte AS meta,
cantidadCorte AS cant,
notas

FROM ct_CorteDiario

WHERE fk_CorteCalendario =?";

$stmt = $conn->prepare($query);
$stmt->bind_param('s', $_POST['idCor']);
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
    $notas = $row['notas'];
    $fecha = $row['fecha'];
    $meta = $row['meta'];
    $cantidad = $row['cant'];
    $pro_corEditar = $_SESSION['user']['pro_corEditar'];
    $admin = $_SESSION['user']['privilegiosUsuario'] == 'Administrador';


    if ($admin || $pro_corEditar == 1) {
      $editar = "href='#EdCor' class='editarCor spand-linkm' data-toggle='modal'";
      $eliminar = "href='#' class='eliminarCor spand-linkm ml-3'";
      $bloqueo="";
    }else {
      $editar = "href='#' class='bn bloqueo'";
      $eliminar = "href='#' class='bn bloqueo'";
      $bloqueo = "bn bloqueo";
    }


    $data["infoTabla"].= "
    <tr class='row text-center bordelateral' id='item'>
      <td class='col-md-3'>
        <h4><b>$fecha</b></h4>
      </td>
      <td class='col-md-2'>
        <h4><b>$meta pzs</b></h4>
      </td>
      <td class='col-md-2'>
        <h4><b>$cantidad pzs</b></h4>
      </td>
      <td class='col-md-3'>
        <h4><b>$notas</b></h4>
      </td>
      <td class='col-md-2 text-right'>
        <a $editar db-id='$id'><img src='/fitcoControl/Resources/iconos/001-edit-1.svg' class='spand-iconm'></a>

        <a $eliminar  db-id='$id'><img src='/fitcoControl/Resources/iconos/004-delete-1.svg' class='spand-iconm'></a>
      </td>
    </tr>";
  }
}

$json = json_encode($data);

echo $json;
?>
