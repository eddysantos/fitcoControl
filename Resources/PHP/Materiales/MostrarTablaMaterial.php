<?php

session_start();

$root = $_SERVER['DOCUMENT_ROOT'];
require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";

$data = array(
  'code' => "",
  'response' => "",
  'infoTabla' => ""
);

$query ="SELECT

m.pk_material AS idMaterial,
m.material AS material,
m.personaEntrega AS personaEntrega,
m.fechaEntrega AS fechaEntrega,
m.precioMaterial AS precio,
m.numeroSerie AS serie,
m.fechaCompra AS compra,
m.condicionEntrega AS condicion

FROM ct_materiales m

ORDER BY fechaEntrega";


$resultado = mysqli_query($conn,$query);

if (!$resultado) {
  $data['code'] = 2;
  $data['response'] = mysqli_error($conn);
  die();
}else {
  while($row = mysqli_fetch_assoc($resultado)){
    $data["data"][]= $row;


    $idMat = $row['idMaterial'];
    $condicion = $row['condicion'];
    $fcompra = $row['compra'];
    $material = $row['material'];
    $serie = $row['serie'];
    $persona = $row['personaEntrega'];
    $fechaEntrega = $row['fechaEntrega'];
    $precio = number_format($row['precio'], 2);
    $ce =  $_SESSION['user']['cobranza_editar'];
    $admin = $_SESSION['user']['privilegiosUsuario'] == "Administrador";

    if ($ce == 1 || $admin) {
      $data["infoTabla"].= "
      <tr class='row bordelateral m-0' id='item'>
        <td class='col-md-3 text-center'>
          <h4>$material</h4>
          <p class='visibilidad'>Serie: $serie</p>
        </td>

        <td class='col-md-2 text-center pr-0 pl-0'>
          <h4>$ $precio</h4>
          <p class='visibilidad'>Fecha compra: $fcompra</p>
        </td>
        <td class='col-md-3 text-center'>
          <h4>$persona</h4>
          <p class='visibilidad'>Fecha: $fechaEntrega</p>
        </td>
        <td class='col-md-3 text-center'>$condicion</td>


        <td class='col-md-1 text-center pl-0 pr-0'>
          <a href='#' class='editMat spand-link' data-toggle='modal' data-target='#EditarMaterial' mat-id='$idMat'><img src='/fitcoControl/Resources/iconos/001-edit.svg' class='spand-icon'></a>

          <a href='#' class='eliminarMat spand-link' mat-id='$idMat'><img src='/fitcoControl/Resources/iconos/002-delete.svg' class='spand-icon'></a>
        </td>
        </tr>";
    }elseif ($ce == 0) {
      $data["infoTabla"].= "
      <tr class='row bordelateral m-0' id='item'>
        <td class='col-md-3 text-center'>
          <h4>$material</h4>
          <p class='visibilidad'>Serie: $serie</p>
        </td>

        <td class='col-md-2 text-center pr-0 pl-0'>
          <h4>$ $precio</h4>
          <p class='visibilidad'>Fecha compra: $fcompra</p>
        </td>
        <td class='col-md-3 text-center'>
          <h4>$persona</h4>
          <p class='visibilidad'>Fecha: $fechaEntrega</p>
        </td>
        <td class='col-md-3 text-center'>$condicion</td>


        <td class='col-md-1 text-center pl-0 pr-0'>
          <a href='#' class='bloqueo  editMat spand-link'><img src='/fitcoControl/Resources/iconos/001-edit.svg' class='spand-icon'></a>

          <a href='#' class='bloqueo spand-link'><img src='/fitcoControl/Resources/iconos/002-delete.svg' class='spand-icon'></a>
        </td>
        </tr>";
      }
    }
  }


  echo json_encode($data);

mysqli_free_result($resultado);
mysqli_close($conn);

?>
