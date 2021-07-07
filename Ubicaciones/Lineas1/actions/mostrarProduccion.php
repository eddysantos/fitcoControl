<?php
session_start();

$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';

$system_callback = [];
$data = $_POST;


$query = "SELECT * FROM ct_lineaProd WHERE fk_linea = ?";

$stmt = $conn->prepare($query);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error during query prepare [$conn->errno]: $conn->error";
  exit_script($system_callback);
}

$stmt->bind_param('s',$data['dbid']);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error during variables binding [$stmt->errno]: $stmt->error";
  exit_script($system_callback);
}

if (!($stmt->execute())) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error during query execution [$stmt->errno]: $stmt->error";
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
  $pk_ProdLin = $row['pk_ProdLin'];
  $operacion = utf8_encode($row['operacion']);
  $meta = $row['meta'];
  $prod1 = $row['prod1'];
  $prod2 = $row['prod2'];
  $prod3 = $row['prod3'];
  $prod4 = $row['prod4'];
  $prod5 = $row['prod5'];
  $prod6 = $row['prod6'];
  $prod7 = $row['prod7'];
  $prod8 = $row['prod8'];
  $prod9 = $row['prod9'];
  $prod10 = $row['prod10'];

  //sumar progreso
  $sp2 = ($prod1 + $prod2);
  $sp3 = ($sp2 + $prod3);
  $sp4 = ($sp3 + $prod4);
  $sp5 = ($sp4 + $prod5);
  $sp6 = ($sp5 + $prod6);
  $sp7 = ($sp6 + $prod7);
  $sp8 = ($sp7 + $prod8);
  $sp9 = ($sp8 + $prod9);
  $sp10 = ($sp9 + $prod10);

  //calcular avance
  if ($prod1 == 0) {
    $av1 = 0;
  }else {
    $av1 = ($prod1/1 * 10);
    $av1 = number_format($av1,0,',','.');
  }

  if ($prod2 == 0) {
    $av2 = 0;
  }else {
    $av2 = ($sp2/2 * 10);
    $av2 = number_format($av2,0,',','.');
  }

  if ($prod3 == 0) {
    $av3 = 0;
  }else {
    $av3 = ($sp3/3 * 10);
    $av3 = number_format($av3,0,',','.');
  }

  if ($prod4 == 0) {
    $av4 = 0;
  }else {
    $av4 = ($sp4/4 * 10);
    $av4 = number_format($av4,0,',','.');
  }

  if ($prod5 == 0) {
    $av5 = 0;
  }else {
    $av5 = ($sp5/5 * 10);
    $av5 = number_format($av5,0,',','.');
  }

  if ($prod6 == 0) {
    $av6 = 0;
  }else {
    $av6 = ($sp6/6 * 10);
    $av6 = number_format($av6,0,',','.');
  }

  if ($prod7 == 0) {
    $av7 = 0;
  }else {
    $av7 = ($sp7/7 * 10);
    $av7 = number_format($av7,0,',','.');
  }

  if ($prod8 == 0) {
    $av8 = 0;
  }else {
    $av8 = ($sp8/8 * 10);
    $av8 = number_format($av8,0,',','.');
  }

  if ($prod9 == 0) {
    $av9 = 0;
  }else {
    $av9 = ($sp9/9 * 10);
    $av9 = number_format($av9,0,',','.');
  }

  if ($prod10 == 0) {
    $av10 = 0;
  }else {
    $av10 = ($sp10/10 * 10);
    $av10 = number_format($av10,0,',','.');
  }
  //
  //calcular % EFICIENCIA
  $ef1 = ($av1/$meta);
  $efi1 = number_format($ef1 * 100, 2, ",", ".")." %";

  $ef2 = ($av2/$meta);
  $efi2 = number_format($ef2 * 100, 2, ",", ".")." %";

  $ef3 = ($av3/$meta);
  $efi3 = number_format($ef3 * 100, 2, ",", ".")." %";

  $ef4 = ($av4/$meta);
  $efi4 = number_format($ef4 * 100, 2, ",", ".")." %";

  $ef5 = ($av5/$meta);
  $efi5 = number_format($ef5 * 100, 2, ",", ".")." %";

  $ef6 = ($av6/$meta);
  $efi6 = number_format($ef6 * 100, 2, ",", ".")." %";

  $ef7 = ($av7/$meta);
  $efi7 = number_format($ef7 * 100, 2, ",", ".")." %";

  $ef8 = ($av8/$meta);
  $efi8 = number_format($ef8 * 100, 2, ",", ".")." %";

  $ef9 = ($av9/$meta);
  $efi9 = number_format($ef9 * 100, 2, ",", ".")." %";

  $ef10 = ($av10/$meta);
  $efi10 = number_format($ef10 * 100, 2, ",", ".")." %";

  //
  $pro_liEditar= $_SESSION['user']['pro_liEditar'];
  $admin = $_SESSION['user']['privilegiosUsuario'] == 'Administrador';

  if ($admin || $pro_liEditar == 1) {
    $editar = "href='#editarProducc' data-toggle='modal' class='editar-lineaProd spand-link'";
    $eliminar = "href='#' class='EliminarProd spand-link'";
    $bloqueo="";
  }else {
    $editar = "href='#' class='bn bloqueo'";
    $eliminar = "href='#' class='bn bloqueo'";
    $bloqueo = "bn bloqueo";
  }


  $system_callback['data'] .="<tr class='row text-center m-0 bsha'>
    <td class='col-md-1 text-left'><b>$operacion</b></td>
    <td class='col-md-1'><b>$prod1</b> </td>
    <td class='col-md-1'><b>$prod2</b></td>
    <td class='col-md-1'><b>$prod3</b> </td>
    <td class='col-md-1'><b>$prod4</b></td>
    <td class='col-md-1'><b>$prod5</b> </td>
    <td class='col-md-1'><b>$prod6</b> </td>
    <td class='col-md-1'><b>$prod7</b></td>
    <td class='col-md-1'><b>$prod8</b></td>
    <td class='col-md-1'><b>$prod9</b> </td>
    <td class='col-md-1'><b>$prod10</b> </td>
    <td class='col-md-1'>
      <a $editar db-id='$pk_ProdLin'>
        <img class='$bloqueo spand-iconm' src='/fitcoControl/Resources/iconos/001-edit-1.svg'>
      </a>
      <a $eliminar db-id='$pk_ProdLin'>
        <img class='$bloqueo spand-iconm ml-3' src='/fitcoControl/Resources/iconos/004-delete-1.svg'>
      </a>
    </td>
    <td class='col-md-1 text-left'>Avance</td>
    <td class='col-md-1 m'>$av1</td>
    <td class='col-md-1 m'>$av2</td>
    <td class='col-md-1 m'>$av3</td>
    <td class='col-md-1 m'>$av4</td>
    <td class='col-md-1 m'>$av5</td>
    <td class='col-md-1 m'>$av6</td>
    <td class='col-md-1 m'>$av7</td>
    <td class='col-md-1 m'>$av8</td>
    <td class='col-md-1 m'>$av9</td>
    <td class='col-md-1 m'>$av10</td>
    <td class='col-md-1 m'></td>


    <td class='col-md-1 text-left'>Eficiencia</td>
    <td class='col-md-1 m ef'>$efi1</td>
    <td class='col-md-1 m ef'>$efi2</td>
    <td class='col-md-1 m ef'>$efi3</td>
    <td class='col-md-1 m ef'>$efi4</td>
    <td class='col-md-1 m ef'>$efi5</td>
    <td class='col-md-1 m ef'>$efi6</td>
    <td class='col-md-1 m ef'>$efi7</td>
    <td class='col-md-1 m ef'>$efi8</td>
    <td class='col-md-1 m ef'>$efi9</td>
    <td class='col-md-1 m ef'>$efi10</td>
    <td class='col-md-1 m'></td>

    <td class='col-md-1 text-left'>Meta</td>
    <td class='col-md-10 m text-left'>$meta</td>
    <td class='col-md-1 m'></td>
  </tr>";

}

$system_callback['code'] = 1;
$system_callback['message'] = "Script called successfully!";
exit_script($system_callback);
 ?>
