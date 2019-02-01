<?php
session_start();

$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';

$system_callback = [];
$data = $_POST;

$data['string'];
$text = "%" . $data['string'] . "%";
$andWhere = 'WHERE (folio_corte LIKE ?)  OR (proveedor LIKE ?) OR (cod_proveedor LIKE ?)';
$query = "SELECT
inv.pk_inventario,
inv.cod_proveedor,
inv.proveedor,
inv.color,
inv.composicion,
inv.ancho,
inv.precio,
inv.metros,
inv.folio_corte,
inv.fecha,
SUM(ut.utilizado) as utilizado
FROM ct_inventario inv
LEFT JOIN ct_inv_utilizado ut ON inv.pk_inventario = ut.fk_inventario
$andWhere
GROUP BY inv.pk_inventario
ORDER BY fecha DESC";

$stmt = $conn->prepare($query);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error durante la preparacion del query [$conn->errno]: $conn->error";
  exit_script($system_callback);
}

$stmt->bind_param('sss',$text,$text,$text);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error al pasar variables [$stmt->errno]: $stmt->error";
  exit_script($system_callback);
}

if (!($stmt->execute())) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error durante la ejecucion [$stmt->errno]: $stmt->error";
  exit_script($system_callback);
}

$rslt = $stmt->get_result();

if ($rslt->num_rows == 0) {
  $system_callback['code'] = 1;
  $system_callback['data'] ="<p db-id=''>No se encontraron resultados</p>";
  $system_callback['message'] = "Script called successfully but there are no rows to display.";
  exit_script($system_callback);
}

while ($row = $rslt->fetch_assoc()) {
  $id = $row['pk_inventario'];
  $cod_proveedor = $row['cod_proveedor'];
  $proveedor = $row['proveedor'];
  $color = $row['color'];
  $composicion = $row['composicion'];
  $ancho = $row['ancho'];
  $precio = $row['precio'];
  $metros = $row['metros'];
  $folio_corte = $row['folio_corte'];
  $utilizado = $row['utilizado'];
  $restante = $metros - $utilizado;
  $fecha = $row['fecha'];
  $admin = $_SESSION['user']['privilegiosUsuario'] == 'Administrador';
  $invEditar = $_SESSION['user']['pro_invEditar'];


  if ($admin || $invEditar == 1) {
    $editar = "href='#editarInventario' class='editar ml-3' style='text-decoration:none'";
    $bloqueo="";
  }else {
    $editar = "href='#' class='bn bloqueo'";
    $bloqueo = "bn bloqueo";
  }

  if (($metros >= 15) && ($restante <= 15)) {
    $background = "rojo";
  }elseif ($utilizado > $metros) {
    $background = "rojo";
  }else {
    $background = "";
  }

  $system_callback['data'] .="<tr class='$background row text-center m-0 borderojo'>
    <td class='col-md-3'>
      <b>$proveedor</b> -- $cod_proveedor
      <p class='visibilidad'>Fecha : $fecha</p>
    </td>
    <td class='col-md-3'>
      <b>Ancho</b> -- $ancho
      <b>Precio</b> -- $precio
      <p class='visibilidad'>Composicion : $composicion</p>
    </td>
    <td class='col-md-1'>$metros</td>
    <td class='col-md-1'>$utilizado</td>
    <td class='col-md-1'>$restante</td>
    <td class='col-md-2'>$folio_corte</td>
    <td class='col-md-1 pl-0 pr-0'>
      <a href='#mostrar_inv_utilizado' id='ver_inventario' class='ver_inventario' db-id='$id'><img src='/fitcoControl/Resources/iconos/003-add.svg' class='spand-icon'></a>

      <a $editar db-id='$id'>
        <img src='/fitcoControl/Resources/iconos/001-edit-1.svg' class='$bloqueo spand-icon'>
      </a>
    </td>
  </tr>";

}

$system_callback['code'] = 1;
$system_callback['message'] = "Script called successfully!";
exit_script($system_callback);
 ?>
