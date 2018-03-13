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

if (isset($_POST['materiales'])) {
  $q = $conn->real_escape_string($_POST['materiales']);

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
    <table class='table table-hover'>
      <thead>
        <tr class='row m-0 encabezado'>
          <td class='col-md-3 text-center'><h3>MATERIAL</h3></td>
          <td class='col-md-2 text-center'><h3>PRECIO</b></td>
          <td class='col-md-3 text-center'><h3>SE ENTREGO A:</h3></td>
          <td class='col-md-3 text-center'><h3>CONDICIONES</h3></td>
        </tr>
      </thead>";

      while ($row = $buscarDatos->fetch_assoc()) {
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
          $tabla.= "
          <tbody id='MostrarMateriales'>
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
            <td class='col-md-3 text-center'><h4><b>$condicion</h4></b></td>


            <td class='col-md-1 text-right'>
              <a href='#' class='editMat spand-link' data-toggle='modal' data-target='#EditarMaterial' mat-id='$idMat'><img src='/fitcoControl/Resources/iconos/001-edit-1.svg' class='spand-icon'></a>

              <a href='#' class='eliminarMat spand-link ml-3' mat-id='$idMat'><img src='/fitcoControl/Resources/iconos/004-delete-1.svg' class='spand-icon'></a>
            </td>
          </tr>
        </tbody>";
        }elseif ($ce == 0) {
          $tabla.= "
          <tbody id='MostrarMateriales'>
            <tr class='row bordelateral m-0' id='item'>
              <td class='col-md-3 text-center'>
                <h4><b>$material</b></h4>
                <p class='visibilidad'>Serie: $serie</p>
              </td>

              <td class='col-md-2 text-center pr-0 pl-0'>
                <h4><b>$ $precio</b></h4>
                <p class='visibilidad'>Fecha compra: $fcompra</p>
              </td>
              <td class='col-md-3 text-center'>
                <h4><b>$persona</b></h4>
                <p class='visibilidad'>Fecha: $fechaEntrega</p>
              </td>
              <td class='col-md-3 text-center'><b>$condicion</b></td>


              <td class='col-md-1 text-right'>
              <a href='#' class='bloqueo  editMat spand-link'><img src='/fitcoControl/Resources/iconos/001-edit-1.svg' class='spand-icon'></a>

              <a href='#' class='bloqueo spand-link ml-3'><img src='/fitcoControl/Resources/iconos/004-delete-1.svg' class='spand-icon'></a>
              </td>
            </tr>
          </tbody>";
        }
      }

      $tabla.="
     </table>
    </form>";

    }else {
      $tabla="No se encontraron coincidencias";
    }
    echo $tabla;


?>
