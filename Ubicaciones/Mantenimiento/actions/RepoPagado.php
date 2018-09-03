<?php
session_start();

$root = $_SERVER['DOCUMENT_ROOT'];
require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";


$tabla = "";
// $suma = 0;
// $pago = 0;
// $diferencia = 0;
$query = "SELECT
*

 FROM ct_mantenimiento

 WHERE pagado = 1

 ORDER BY fechaRequerido ASC";

  $result = $conn->query($query);
  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $idMant = utf8_encode($row['pk_mantenimiento']);
        $orden = utf8_encode($row['orden']);
        $mant_Inv = utf8_encode($row['mant_Inv']);
        $area = utf8_encode($row['area']);
        $descripcion = utf8_encode($row['descripcion']);
        $proveedor = utf8_encode($row['proveedor']);
        $costo = utf8_encode($row['costo']);
        $fechaRequerido = utf8_encode($row['fechaRequerido']);
        $pagado = utf8_encode($row['pagado']);
        $autorizacion = utf8_encode($row['autorizacion']);
        $pro_miVer = utf8_encode($_SESSION['user']['pro_miVer']);
        $admin = $_SESSION['user']['privilegiosUsuario'] == 'Administrador';


        if ($admin || $pro_miVer == 1) {
          $editar = "href='#EditarMantenimiento' class='EditMantenimiento spand-link mr-3' data-toggle='modal' ";
          $bloqueo="";
        }else {
          $editar = "href='#' class='bn bloqueo'";
          $bloqueo = "bn bloqueo";
        }

        $id = $idMant;


        $tabla.=
        "<div class='bordelateral m-0 font12 bordebottom'>
          <div class='row'>
            <div class='text-right p-0 col-md-2 gris'>Mant / Inv: </div>
            <div class='col-md-4'>$mant_Inv</div>
            <div class='text-right p-0 col-md-2 gris'>Proveedor: </div>
            <div class='col-md-4'>$proveedor</div>

          </div>
          <div class='row'>
            <div class='text-right p-0 col-md-2 pt-1 gris'>Area : </div>
            <div class='col-md-4 pt-1'> $area</div>
            <div class='text-right p-0 col-md-2 pt-1 gris'>Costo con IVA : </div>
            <div class='col-md-3 pt-2'>$ $costo</div>
            <div class='col-md-1 text-right'>
              <a $editar db-id='$id'><img src='/fitcoControl/Resources/iconos/001-edit-1.svg' class='$bloqueo spand-icon'></a>
            </div>


          </div>
          <div class='row'>
            <div class='text-right p-0 col-md-2 gris'>Descripcion: </div>
            <div class='col-md-4'> $descripcion</div>
            <div class='text-right p-0 col-md-2 gris'>Fecha Requerido: </div>
            <div class='col-md-4'>$fechaRequerido</div>
          </div>
        </div>";
      }


   }else {
     $tabla="<div id='SinRegistros' class='container-fluid pantallaRegistros'>
       <div class='tituloSinRegistros'>NO HAY REGISTROS</div>
     </div>";
   }
   echo $tabla;

?>
