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
pk_cliente AS idCliente,
nombreCliente AS nombre,
nombreContacto AS contacto,
precioPrenda AS precio,
correoCliente AS correo,
telefonoCliente AS telefono,
creditoCliente AS credito,
DATE_FORMAT(fingresoCliente, '%d-%m-%Y') AS ingreso,
colorCliente AS color

 FROM ct_cliente

 ORDER BY nombreCliente ASC";


 if (isset($_POST['clientes'])) {
   $q = $conn->real_escape_string($_POST['clientes']);
   $query = "SELECT
   pk_cliente AS idCliente,
   nombreCliente AS nombre,
   nombreContacto AS contacto,
   precioPrenda AS precio,
   correoCliente AS correo,
   telefonoCliente AS telefono,
   creditoCliente AS credito,
   fingresoCliente AS ingreso,
   colorCliente AS color

    FROM ct_cliente

    WHERE nombreCliente LIKE '%$q%' OR
    correoCliente LIKE '%$q%' OR
    nombreContacto LIKE '%$q%' OR
    telefonoCliente LIKE '%$q%' OR
    creditoCliente LIKE '%$q%' OR
    fingresoCliente LIKE '%$q%'

    ORDER BY nombreCliente ASC";
}
  $buscarDatos = $conn->query($query);
  if ($buscarDatos->num_rows > 0) {
    $tabla.="
    <form id='Eclientes' class='page p-0'>
      <table class='table table-hover fixed-table'>
        <thead>
          <tr class='row m-0 encabezado'>
            <td class='col-md-1'></td>
            <td class='col-md-3 text-center'><h3>CLIENTE</h3></td>
            <td class='col-md-4 text-center'><h3>CORREO / CONTACTO</h3></td>
            <td class='col-md-2 text-center'><h3>TELEFONO</h3></td>
            <td class='col-md-2'></td>
          </tr>
        </thead>
        <tbody id='mostrarUsuarios'>";

        while ($row = $buscarDatos->fetch_assoc()) {
          $id = $row['idCliente'];
          $cliente = $row['nombre'];
          $contacto = $row['contacto'];
          $correo = $row['correo'];
          $telefono = $row['telefono'];
          $credito = $row['credito'];
          $fingreso = $row['ingreso'];
          $color = $row['color'];
          $cle = $_SESSION['user']['cliente_editar'];
          $admin = $_SESSION['user']['privilegiosUsuario'];

        if ($cle == 1 || $admin == "Administrador") {
          $tabla.= "
            <tr class='row bordelateral m-0' id='item'>
              <td class='col-md-1'>
                <img src='/fitcoControl/Resources/iconos/team.svg' class='icono'>
              </td>
              <td class='col-md-3'>
                <h2><b><input type='color' value='$color'>$cliente</b></h2>
                <p class='visibilidad'>Ingreso : $fingreso</p>
              </td>
              <td class='col-md-4'>
                <h2><b><a href='mailto:$correo'>$correo</a></b></h2>
                <p class='visibilidad'>Contacto : $contacto</p>
              </td>
              <td class='col-md-2 text-center'>
                <h2><b>$telefono</a></b></h2>
                <p class='visibilidad'>Credito : $credito día (s)</p>
              </td>
              <td class='col-md-2 text-right'>
                <a href='#' class='EditCliente spand-link' data-toggle='modal' data-target='#EditarCliente' id='btnEditarCliente' client-id='$id'>
                  <img src='/fitcoControl/Resources/iconos/001-edit-1.svg' class='img spand-icon'>
                </a>

                <a href='#' class='eliminarCliente spand-link ml-3' client-id='$id'>
                  <img src='/fitcoControl/Resources/iconos/004-delete-1.svg' class='img spand-icon'>
                </a>
              </td>

            </tr>";
        }elseif ($cle == 0) {
         $tabla.= "
           <tr class='row bordelateral m-0' id='item'>
             <td class='col-md-1'>
               <img src='/fitcoControl/Resources/iconos/team.svg' class='icono'>
             </td>
             <td class='col-md-3'>
               <h2><b><input type='color' value='$color'>$cliente</b></h2>
               <p class='visibilidad'>Ingreso : $fingreso</p>
             </td>
             <td class='col-md-4 text-center'>
               <h2><b><a href='mailto:$correo'>$correo</a></b></h2>
               <p class='visibilidad'>Credito : $credito Días</p>
             </td>
             <td class='col-md-2 text-center'>
               <h2><b>$telefono</a></b></h2>
             </td>
             <td class='col-md-2 text-right'>
               <a class='EditCliente spand-link' client-id='$id'>
                 <img src='/fitcoControl/Resources/iconos/001-edit-1.svg' class='bloqueo spand-icon'>
               </a>
               <a class='spand-link ml-3' client-id='$id'>
                 <img src='/fitcoControl/Resources/iconos/004-delete-1.svg' class='bloqueo spand-icon'>
               </a>
             </td>
           </tr>";
       }
      }
       $tabla.="
       </tbody>
      </table>
     </form>";


   }else {
     $tabla="<div id='SinRegistros' class='container-fluid pantallaRegistros'>
       <div class='tituloSinRegistros'>NO HAY REGISTROS</div>
     </div>";
   }
   echo $tabla;

?>
