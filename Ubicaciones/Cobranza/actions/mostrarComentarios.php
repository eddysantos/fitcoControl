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
*

FROM  comen_cobranza

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


    $pk_coment = $row['pk_coment'];
    $fecha = $row['fecha'];
    $comentario = $row['comentario'];
      $data["infoTabla"].= "
      <tr class='row' id='item'>

        <td class='col-md-3 text-center'>
          <h4><b>$fecha</b></h4>
        </td>
        <td class='col-md-8 left'>
          <h4><b>$comentario</b></h4>
        </td>
        <td class='col-md-1 text-center pr-0 pl-0'>
        <a href='' id='btnEditarCom' class='editarComen spand-linkm' data-toggle='modal' data-target='#edit_coment' comen-id='$pk_coment'><img src='/fitcoControl/Resources/iconos/001-edit-1.svg' class='mr-4 spand-iconm'></a>
        </td>
      </tr>";
  }
}

$json = json_encode($data);

echo $json;

?>
