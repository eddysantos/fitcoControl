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

pk_envios AS idEnvio,
DATE_FORMAT(fechaEnvio,'%d-%m-%Y') AS fechaEnvio,
notas AS notas,
horaEnvio AS horaEnvio,
descripcion AS status

FROM ct_envios

WHERE fk_programacion = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param('s', $_POST['envioId']);
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

    $idEnvios = $row['idEnvio'];
    $status = $row['status'];
    $fechaEnvio = $row['fechaEnvio'];
    $horaEnvio = $row['horaEnvio'];
    $notas = $row['notas'];
    $pe = $_SESSION['user']['produccion_editar'];
    $admin = $_SESSION['user']['privilegiosUsuario'] == "Administrador";


    if ($pe == 1 || $admin) {
      $data["infoTabla"].= "<tr class='row bordelateral m-0'>

          <td class='col-md-4'>
            <h4><b>$status</b></h4>
          </td>
          <td class='col-md-2 text-center'>
            <h4><b>$fechaEnvio</b></h4>
          </td>

          <td class='col-md-2 text-center'>
            <h4><b>$horaEnvio</b></h4>
          </td>
          <td class='col-md-3 text-center'>
            <h4><b>$notas</b></h4>
          </td>

          <td class='col-md-1 text-right'>

            <a href='#' class='editarEnvio spand-linkm' data-toggle='modal' data-target='#EditarEnvio' envio-id='$idEnvios'><img src='/fitcoControl/Resources/iconos/001-edit-1.svg' class='spand-iconm'></a>

            <a href='#' class='eliminarEnvio spand-linkm ml-4' envio-id='$idEnvios'><img src='/fitcoControl/Resources/iconos/004-delete-1.svg' class='spand-iconm'></a>
          </td>
        </tr>";
    }elseif ($pe == 0) {
      $data["infoTabla"].= "<tr class='row bordelateral m-0'>

          <td class='col-md-4'>
            <h4><b>$status</b></h4>
          </td>
          <td class='col-md-2 text-center'>
            <h4><b>$fechaEnvio</b></h4>
          </td>

          <td class='col-md-2 text-center'>
            <h4><b>$horaEnvio</b></h4>
          </td>
          <td class='col-md-3 text-center'>
            <h4><b>$notas</b></h4>
          </td>

          <td class='col-md-1 text-right'>
            <a href='#' class='bloqueo spand-linkm'><img src='/fitcoControl/Resources/iconos/001-edit-1.svg' class='spand-iconm'></a>

            <a href='#' class='bloqueo spand-linkm ml-4'><img src='/fitcoControl/Resources/iconos/004-delete-1.svg' class='spand-iconm'></a>
          </td>
        </tr>";
    }
  }
}

  $json = json_encode($data);

  echo $json;

?>
