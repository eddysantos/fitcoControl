<?php

$root = $_SERVER['DOCUMENT_ROOT'];
require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";

$data = array(
  'code' => "",
  'response' => "",
  'infoTabla' => ""
);
$query = "SELECT
pk_cliente AS idCliente,
nombreCliente AS nombre,
correoCliente AS correo,
telefonoCliente AS telefono,
creditoCliente AS credito,
fingresoCliente AS ingreso,
colorCliente AS color

 FROM ct_cliente

 ORDER BY nombreCliente ASC";

$resultado = mysqli_query($conn,$query);

if (!$resultado) {
  die("Error");
}else {
  while($row = mysqli_fetch_assoc($resultado)){
    $data["data"][]= $row;

    $id = $row['idCliente'];
    $cliente = $row['nombre'];
    $correo = $row['correo'];
    $telefono = $row['telefono'];
    $credito = $row['credito'];
    $fingreso = $row['ingreso'];
    $color = $row['color'];

    $data["infoTabla"].= "
    <tr class='row bordelateral m-0' id='item'>
      <td class='col-md-1'>
        <img src='/fitcoControl/Resources/iconos/team.svg' class='icono'>
      </td>
      <td class='col-md-3'>
        <h2><b><input type='color' value='$color'>$cliente</b></h2>
        <p class='visibilidad'>Ingreso : $fingreso</p>
      </td>
      <td class='col-md-3 text-center'>
        <h2><b><a href='mailto:$correo'>$correo</a></b></h2>
        <p class='visibilidad'>Credito : $credito Días</p>
      </td>
      <td class='col-md-3 text-center'>
        <h2><b>$telefono</a></b></h2>
      </td>
      <td class='col-md-1'></td>
      <td class='col-md-1 text-center'>
        <a class='EditCliente spand-link' data-toggle='modal' data-target='#EditarCliente' id='btnEditarCliente' client-id='$id'><img src='/fitcoControl/Resources/iconos/pencil1.svg' class='spand-icon'></a>


        <!--a id='btnEliminarCliente' class='spand-link ml-5' onclick='return confirm('¿Estas seguro?');'><img src='/fitcoControl/Resources/iconos/trash.svg'  class='spand-icon'></a-->
      </td>
    </tr>";


  }
  echo json_encode($data);
}

mysqli_free_result($resultado);
mysqli_close($conn);

?>