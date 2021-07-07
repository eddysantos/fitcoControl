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
DATE_FORMAT(m.fechaEntrega, '%d-%m-%Y') AS fechaEntrega,
m.precioMaterial AS precio,
m.numeroSerie AS serie,
DATE_FORMAT(m.fechaCompra, '%d-%m-%Y') AS compra,
m.condicionEntrega AS condicion

FROM ct_materiales m
ORDER BY fechaEntrega";

if (isset($_POST['materiales'])) {
  $q = $conn->real_escape_string($_POST['materiales']);
  $query ="SELECT
  m.pk_material AS idMaterial,
  m.material AS material,
  m.personaEntrega AS personaEntrega,
  DATE_FORMAT(m.fechaEntrega, '%d-%m-%Y') AS fechaEntrega,
  m.precioMaterial AS precio,
  m.numeroSerie AS serie,
  DATE_FORMAT(m.fechaCompra, '%d-%m-%Y') AS compra,
  m.condicionEntrega AS condicion

  FROM ct_materiales m

  WHERE material LIKE '%$q%' OR
  personaEntrega LIKE '%$q%' OR
  fechaEntrega LIKE '%$q%' OR
  precioMaterial LIKE '%$q%' OR
  numeroSerie LIKE '%$q%' OR
  fechaCompra LIKE '%$q%' OR
  condicionEntrega LIKE '%$q%'


  ORDER BY fechaEntrega";
}

$buscarDatos = $conn->query($query);
if ($buscarDatos->num_rows > 0) {
  $tabla.="
  <form id='MMaterial' class='page p-0'>
    <table class='table table-hover fixed-table'>
      <thead>
        <tr class='row m-0 encabezado'>
          <td class='col-md-3 text-center'><h3>MATERIAL</h3></td>
          <td class='col-md-2 text-center'><h3>PRECIO</b></td>
          <td class='col-md-3 text-center'><h3>SE ENTREGO A:</h3></td>
          <td class='col-md-3 text-center'><h3>CONDICIONES</h3></td>
        </tr>
      </thead>
      <tbody id='MostrarMateriales'>";

      while ($row = $buscarDatos->fetch_assoc()) {
        $idMat = $row['idMaterial'];
        $condicion = $row['condicion'];
        $fcompra = $row['compra'];
        $material = $row['material'];
        $serie = $row['serie'];
        $persona = $row['personaEntrega'];
        $fechaEntrega = $row['fechaEntrega'];
        $precio = number_format($row['precio'], 2);
        $tm_editar = $_SESSION['user']['tm_editar'];
        $admin = $_SESSION['user']['privilegiosUsuario'] == 'Administrador';


        if ($admin || $tm_editar == 1) {
          $editar = "href='#' class='editMat spand-link' data-toggle='modal' data-target='#EditarMaterial'";
          $eliminar = "href='#' class='eliminarMat spand-link ml-3'";
          $bloqueo="";
        }else {
          $editar = "href='#' class='bn bloqueo'";
          $eliminar = "href='#' class='bn bloqueo'";
          $bloqueo = "bn bloqueo";
        }


        $tabla.= "
        <tr class='row bordelateral m-0' id='item'>
          <td class='col-md-3 text-center'>
            <h4><b>$material</b></h4>
            <p class='visibilidad'>Serie: $serie</p>
          </td>

          <td class='col-md-2 text-center pr-0 pl-0'>
            <h4><b>$ $precio</b></h4>
            <p class='visibilidad'>Compra: $fcompra</p>
          </td>
          <td class='col-md-3 text-center'>
            <h4><b>$persona</b></h4>
            <p class='visibilidad'>Entrega: $fechaEntrega</p>
          </td>
          <td class='col-md-3 text-center'><h4>$condicion</h4></td>


          <td class='col-md-1 text-right'>
            <a $editar mat-id='$idMat'><img src='/fitcoControl/Resources/iconos/001-edit-1.svg' class='$bloqueo img spand-icon'></a>

            <a $eliminar mat-id='$idMat'><img src='/fitcoControl/Resources/iconos/004-delete-1.svg' class='$bloqueo img spand-icon'></a>
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
