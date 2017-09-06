<?php

$root = $_SERVER['DOCUMENT_ROOT'];
require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
$query = "SELECT * FROM ct_cliente ORDER BY nombreCliente ASC";
$resultado = mysqli_query($conn,$query);

if (!$resultado) {
  die("Error");
}else {
  while($data = mysqli_fetch_assoc($resultado)){
    $arreglo["data"][]= $data;

    $id = $data['pk_cliente'];
    $cliente = $data['nombreCliente'];
    $correo = $data['correoCliente'];
    $telefono = $data['telefonoCliente'];
    $credito = $data['creditoCliente'];
    $fingreso = $data['fingresoCliente'];
    $color = $data['colorCliente'];
    $prendas = $data['prendasCliente'];
    $nosotros = $data['nosotrosCliente'];

    $arreglo["infoTabla"].= "<tr class='row bordelateral m-0' id='item'>
      <td class='col-md-1'>
        <img src='/fitcoControl/Resources/iconos/team.svg' class='icono'>
      </td>
      <td class='col-md-3'>
        <h2><b><input type='color' value='$color'>$cliente</b></h2>
        <p class='visibilidad'>Ingreso : $fingreso</p>
      </td>
      <td class='col-md-4'>
        <h2><b>Contacto : <a href='mailto:$correo'>$correo</a></b></h2>
        <p class='visibilidad'>Credito : $credito Días</p>
      </td>
      <td class='col-md-3'></td>
      <td class='col-md-1 text-center'>
        <a class='spand-link' data-toggle='modal' data-target='#EditarCliente' id='btnEditarCliente' client-id='$id'><img src='/fitcoControl/Resources/iconos/pencil1.svg' class='spand-icon'></a>


        <!--a id='btnEliminarCliente' class='spand-link ml-5' onclick='return confirm('¿Estas seguro?');'><img src='/fitcoControl/Resources/iconos/trash.svg'  class='spand-icon'></a-->
      </td>
    </tr>";


  }
  echo json_encode($arreglo);
}

mysqli_free_result($resultado);
mysqli_close($conn);

?>
