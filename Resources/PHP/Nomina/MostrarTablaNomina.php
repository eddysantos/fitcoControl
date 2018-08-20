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
n.pk_nomina AS idNomina,
WEEK(n.fechaNomina) AS semana,
n.dineroNomina AS dineroNomina,
n.servicios AS servicios,
n.nomina AS nomina,
n.horasExtras AS horasExtras,
DATE_FORMAT(n.fechaNomina, '%d-%m-%Y') AS fechaNomina,
n.dineroHoras AS dineroHoras

FROM ct_nomina n
ORDER BY semana DESC, fechaNomina DESC";

if (isset($_POST['nomina'])) {
  $q = $conn->real_escape_string($_POST['nomina']);
  $query ="SELECT
  n.pk_nomina AS idNomina,
  WEEK(n.fechaNomina) AS semana,
  n.dineroNomina AS dineroNomina,
  n.servicios AS servicios,
  n.nomina AS nomina,
  n.horasExtras AS horasExtras,
  DATE_FORMAT(n.fechaNomina, '%d-%m-%Y') AS fechaNomina,
  n.dineroHoras AS dineroHoras

  FROM ct_nomina n

  WHERE servicios LIKE '%$q%' OR
  nomina LIKE '%$q%' OR
  fechaNomina LIKE '%$q%' OR
  dineroNomina LIKE '%$q%' OR
  dineroHoras LIKE '%$q%' OR
  horasExtras LIKE '%$q%'


  ORDER BY semana DESC, fechaNomina DESC";
}

$buscarDatos = $conn->query($query);
if ($buscarDatos->num_rows > 0) {
  $tabla.="<form id='Enomina' class='page p-0'>
    <table class='table table-hover table-fixed'>
      <thead>
        <tr class='row m-0 encabezado'>
          <td class='col-md-1 text-center'><h4>Sem</h4></td>
          <td class='col-md-2 text-center'><h4>Servicios</h4></td>
          <td class='col-md-2 text-center'><h4>Nomina</h4></td>
          <td class='col-md-2 text-center'><h4>Total de Nomina</b></td>
          <td class='col-md-1 text-center'><h4>Hrs Extras</h4></td>
          <td class='col-md-2 text-center'><h4>Total Horas Extras</h4></td>
        </tr>
      </thead>
      <tbody id='MostrarNomina'>";

      while ($row = $buscarDatos->fetch_assoc()) {
        $idNom = $row['idNomina'];
        $servicio = $row['servicios'];
        $nomina = $row['nomina'];
        $semana = $row['semana']+1;
        $dineroNomina = number_format($row['dineroNomina'],2);
        $horasExtras = $row['horasExtras'];
        $dineroHoras = number_format($row['dineroHoras'],2);
        $fechaNomina = $row['fechaNomina'];

        $tr_editar = $_SESSION['user']['tr_editar'];
        $admin = $_SESSION['user']['privilegiosUsuario'] == 'Administrador';


        if ($admin || $tr_editar == 1) {
          $editar = "href='#' class='editNom spand-link' data-toggle='modal' data-target='#EditarNomina'";
          $eliminar = "href='#' class='eliminarNom spand-link ml-3'";
          $bloqueo="";
        }else {
          $editar = "href='#' class='bn bloqueo'";
          $eliminar = "href='#' class='bn bloqueo'";
          $bloqueo = "bn bloqueo";
        }

        $tabla.= "
          <tr class='row bordelateral m-0' id='item'>
            <td class='col-md-1 text-center'>
              <h4><b>Sem $semana</b></h4>
              <p class='visibilidad'>$fechaNomina</p>
            </td>

            <td class='col-md-2 text-center pr-0 pl-0'>
              <h4><b>$servicio</b></h4>
            </td>
            <td class='col-md-2 text-center pr-0 pl-0'>
              <h4><b>$nomina</b></h4>
            </td>

            <td class='col-md-2 text-center pr-0 pl-0'>
              <h4><b>$ $dineroNomina</b></h4>
            </td>
            <td class='col-md-1 text-center'>
              <h4><b>$horasExtras horas</b></h4>
            </td>
            <td class='col-md-2 text-center'>
              <h4><b>$ $dineroHoras</b></h4>
            </td>

            <td class='col-md-2 text-right'>
              <a $editar nom-id='$idNom'><img src='/fitcoControl/Resources/iconos/001-edit-1.svg' class='$bloqueo img spand-icon'></a>

              <a $eliminar nom-id='$idNom'><img src='/fitcoControl/Resources/iconos/004-delete-1.svg' class='$bloqueo img spand-icon'></a>
            </td>
          </tr>";
      }

      $tabla.="
      </tbody>
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
