<?php
session_start();

$root = $_SERVER['DOCUMENT_ROOT'];
require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";

$data = array(
  'code' => "",
  'response' => "",
  'infoTabla' => ""
);


if (isset($_POST['envios'])) {
  $q = '"%' . $_POST['envios'] . '%"';
} else {
  $q = "'%%'";
}

$query = "CALL pruebaEnvios($q)";

$buscarDatos = $conn->query($query);

if (true) {
  $tabla.="
  <form class='page p-0'>
  <table class='table table-hover fixed-table'>
    <thead class='encabezado' style='letter-spacing:0px'>
      <tr class='row m-0 text-center'>
      <td class='col-md-2'>Cliente</td>
      <td class='col-md-1'>Requerido</td>
      <td class='col-md-3'>Status</td>
      <td class='col-md-2'>Fecha y Hora de Arribos</td>
      <td class='col-md-3'>Notas</td>
      <td class='col-md-1'></td>
      </tr>
    </thead>
    <tbody id='MostrarEnvio'>";

    if (!$buscarDatos) {
      echo $conn->error;
      $conn->close();
      die();
    }

    while ($row = $buscarDatos->fetch_assoc()) {
      $piezas = $row['piezas'];
      $status = $row['status_envio'];
      $fechaEnvio = $row['Ultimo_Envio'];
      $notas = $row['notas'];
      $idEnvios = $row['idEnvio'];

      $cliente = $row['cliente'];
      $color = $row['color'];

      if ($status == "Arribo con el Cliente") {
        $background = "verde";
      }else {
        $background= "";
      }



      $tabla.="
      <tr class='$background row bordelateral m-0'>
       <td class='col-md-2'><input type='color' value='$color'>$cliente</td>
       <td class='col-md-1 text-center'>$piezas pzs</td>
       <td class='col-md-3 text-center'>$status</td>
       <td class='col-md-2 text-center'>$fechaEnvio</td>
       <td class='col-md-3 text-center'>$notas</td>


       <td class='col-md-1 text-right'>
         <a href='#' class='aEnvio spand-link mr-3' db-id='$idEnvios'><img src='/fitcoControl/Resources/iconos/003-add.svg' class='spand-icon'></a>

         <a href='#' class='aVerTabla spand-link mr-3'  data-toggle='modal' data-target='#VisualizarEnvio' db-id='$idEnvios'><img src='/fitcoControl/Resources/iconos/magnifier.svg' class='spand-icon'></a>
       </td>
     </tr>";
    }
    $tabla.="
    </tbody>
   </table>
  </form>";
}else {
  $tabla= "No se encontraron coincidencias";
}
echo $tabla;




?>
