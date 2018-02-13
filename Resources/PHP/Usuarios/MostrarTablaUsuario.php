<?php

$root = $_SERVER['DOCUMENT_ROOT'];
require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";

function utf8ize($d) {
    if (is_array($d)) {
        foreach ($d as $k => $v) {
            $d[$k] = utf8_encode($v);
        }
    } else if (is_string ($d)) {
        return utf8_encode($d);
    }
    return $d;
}

$data = array(
  'code' => "",
  'response' => "",
  'infoTabla' => ""
);
$query = "SELECT
pk_usuario AS idUsuario,
nombreUsuario AS nombre,
apellidosUsuario AS apellidos,
correoUsuario AS correo,
departamentoUsuario AS depa,
puestoUsuario AS puesto,
privilegiosUsuario AS privilegios

FROM usuarios
ORDER BY nombreUsuario ASC";

$resultado = mysqli_query($conn,$query);

if (!$resultado) {
  $data['code'] = 2;
  $data['response'] = mysqli_error($conn);
  echo json_encode($data);
}else {
  while($row = mysqli_fetch_assoc($resultado)){
    $data["data"][]= $row;

    $idusuario = $row['idUsuario'];
    $nombreUsuario = $row['nombre'];
    $apellidosUsuario = $row['apellidos'];
    $correoUsuario = $row['correo'];
    $departamentoUsuario = $row['depa'];
    $puestoUsuario = $row['puesto'];
    $privilegiosUsuario = $row['privilegios'];

    $data["infoTabla"].= "
    <tr class='row bordelateral m-0' id='item'>
      <td class='col-md-1'>
        <img src='/fitcoControl/Resources/iconos/users.svg' class='icono'>
      </td>
      <td class='col-md-4'>
        <h4><b>$nombreUsuario  $apellidosUsuario</b></h4>
        <a class='visibilidad' href='mailto:$correoUsuario'>$correoUsuario</a>
      </td>
      <td class='col-md-3 text-center'>
        <h4><b>$puestoUsuario</b></h4>
        <p class='visibilidad'>$departamentoUsuario</p>
      </td>
      <td class='col-md-2 text-center'>
        <h4><b>$privilegiosUsuario</b></h4>
      </td>
      <td class='col-md-2 text-right'>
        <a href='#' class='EditUsuario spand-link' data-toggle='modal' data-target='#EditarUsuario' usuario-id='$idusuario'><img src='/fitcoControl/Resources/iconos/001-edit.svg' class='spand-icon'></a>

        <a href='#' class='eliminarUser spand-link ml-3'  usuario-id='$idusuario'><img src='/fitcoControl/Resources/iconos/002-delete.svg' class='spand-icon'></a>
      </td>
    </tr>";


  }
  // echo json_encode($data);
}
// $data['infoTabla'] = utf8ize($data['infoTabla']);
echo json_encode($data);
// echo json_encode(utf8ize($data));

mysqli_free_result($resultado);
mysqli_close($conn);

?>
