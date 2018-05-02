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
  n.horasExtras AS horasExtras,
  DATE_FORMAT(n.fechaNomina, '%d-%m-%Y') AS fechaNomina,
  n.dineroHoras AS dineroHoras

  FROM ct_nomina n

  WHERE fechaNomina LIKE '%$q%' OR
  dineroNomina LIKE '%$q%' OR
  dineroHoras LIKE '%$q%' OR
  horasExtras LIKE '%$q%'


  ORDER BY semana DESC, fechaNomina DESC";
}

$buscarDatos = $conn->query($query);
if ($buscarDatos->num_rows > 0) {
  $tabla.="
  <form id='Enomina' class='page p-0'>
    <table class='table table-hover fixed-table'>
      <thead>
        <tr class='row m-0 encabezado'>
          <td class='col-md-2 text-center'><h4>Nomina</h4></td>
          <td class='col-md-3 text-center'><h4>Total de Nomina</b></td>
          <td class='col-md-2 text-center'><h4>Hrs Extras</h4></td>
          <td class='col-md-3 text-center'><h4>Total Horas Extras</h4></td>
        </tr>
      </thead>";

      while ($row = $buscarDatos->fetch_assoc()) {
        $idNom = $row['idNomina'];
        $semana = $row['semana']+1;
        $dineroNomina = number_format($row['dineroNomina'],2);
        $horasExtras = $row['horasExtras'];
        $dineroHoras = number_format($row['dineroHoras'],2);
        $fechaNomina = $row['fechaNomina'];
        $ce =  $_SESSION['user']['cobranza_editar'];
        $admin = $_SESSION['user']['privilegiosUsuario'] == "Administrador";

        if ($ce == 1 || $admin) {
          $tabla.= "
          <tbody id='MostrarNomina'>
            <tr class='row bordelateral m-0' id='item'>
              <td class='col-md-2 text-center'>
                <h4><b>Semana $semana</b></h4>
                <p class='visibilidad'>fecha: $fechaNomina</p>
              </td>

              <td class='col-md-3 text-center pr-0 pl-0'>
                <h4><b>$ $dineroNomina</b></h4>
              </td>
              <td class='col-md-2 text-center'>
                <h4><b>$horasExtras horas</b></h4>
              </td>
              <td class='col-md-3 text-center'>
                <h4><b>$ $dineroHoras</b></h4>
              </td>


              <td class='col-md-2 text-right'>
                <a href='#' class='editNom spand-link' data-toggle='modal' data-target='#EditarNomina' nom-id='$idNom'><img src='/fitcoControl/Resources/iconos/001-edit-1.svg' class='img spand-icon'></a>

                <a href='#' class='eliminarNom spand-link ml-3' nom-id='$idNom'><img src='/fitcoControl/Resources/iconos/004-delete-1.svg' class='img spand-icon'></a>
              </td>
            </tr>
          </tbody>";
        }elseif ($ce == 0) {
          $tabla.= "
          <tbody id='MostrarNomina'>
            <tr class='row bordelateral m-0' id='item'>
              <td class='col-md-2 text-center'>
                <h4><b>$semana</b></h4>
                <p class='visibilidad'>fecha: $fechaNomina</p>
              </td>

              <td class='col-md-3 text-center pr-0 pl-0'>
                <h4><b>$ $dineroNomina</b></h4>
              </td>
              <td class='col-md-2 text-center'>
                <h4><b>$horasExtras</b></h4>
              </td>
              <td class='col-md-3 text-center'>
                <h4><b>$ $dineroHoras</b></h4>
              </td>


              <td class='col-md-2 text-right'>
              <a href='#' class='bloqueo  editMat spand-link'><img src='/fitcoControl/Resources/iconos/001-edit-1.svg' class='img spand-icon'></a>

              <a href='#' class='bloqueo spand-link ml-3'><img src='/fitcoControl/Resources/iconos/004-delete-1.svg' class='img spand-icon'></a>
              </td>
            </tr>
          </tbody>";
        }
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
