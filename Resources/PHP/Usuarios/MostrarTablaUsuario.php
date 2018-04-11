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
pk_usuario AS idUsuario,
nombreUsuario AS nombre,
apellidosUsuario AS apellidos,
correoUsuario AS correo,
departamentoUsuario AS depa,
puestoUsuario AS puesto,
privilegiosUsuario AS privilegios

FROM usuarios
ORDER BY nombreUsuario ASC";


if (isset($_POST['usuario'])) {
  $q = $conn->real_escape_string($_POST['usuario']);
  $query = "SELECT
  pk_usuario AS idUsuario,
  nombreUsuario AS nombre,
  apellidosUsuario AS apellidos,
  correoUsuario AS correo,
  departamentoUsuario AS depa,
  puestoUsuario AS puesto,
  privilegiosUsuario AS privilegios

  FROM usuarios

  WHERE nombreUsuario LIKE '%$q%' OR
  apellidosUsuario LIKE '%$q%' OR
  correoUsuario LIKE '%$q%' OR
  departamentoUsuario LIKE '%$q%' OR
  puestoUsuario LIKE '%$q%' OR
  privilegiosUsuario LIKE '%$q%'

  ORDER BY nombreUsuario ASC";
}

$buscarDatos = $conn->query($query);
if ($buscarDatos->num_rows > 0) {
  $tabla.="
  <form id='Eusuarios' class='page p-0'>
    <table class='table table-hover'>
      <thead>
        <tr class='row m-0 encabezado'>
          <td class='col-md-1'></td>
          <td class='col-md-4 text-center'><h3>EMPLEADO</h3></td>
          <td class='col-md-3 text-center'><h3>DEPARTAMENTO</h3></td>
          <td class='col-md-2 text-center'><h3>PRIVILEGIOS</h3></td>
          <td class='col-md-2'></td>
        </tr>
      </thead>";

      while ($row = $buscarDatos->fetch_assoc()) {

        $idusuario = $row['idUsuario'];
        $nombreUsuario = $row['nombre'];
        $apellidosUsuario = $row['apellidos'];
        $correoUsuario = $row['correo'];
        $departamentoUsuario = $row['depa'];
        $puestoUsuario = $row['puesto'];
        $privilegiosUsuario = $row['privilegios'];


        $tabla.= "
        <tbody id='mostrarUsuarios'>
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
              <a href='#' class='EditUsuario spand-link' data-toggle='modal' data-target='#EditarUsuario' usuario-id='$idusuario'><img src='/fitcoControl/Resources/iconos/001-edit-1.svg' class='spand-icon'></a>

                <a href='#' class='eliminarUser spand-link ml-3'  usuario-id='$idusuario'><img src='/fitcoControl/Resources/iconos/004-delete-1.svg' class='spand-icon'></a>
            </td>
          </tr>
        </tbody>";
  }

  $tabla.="
 </table>
</form>";

}else {
  $tabla="
  <div id='SinRegistros' class='container-fluid pantallaRegistros'>
    <div class='tituloSinRegistros'>NO HAY REGISTROS</div>
  </div>";
}
echo $tabla;


?>
