
<?php

// session_start();

$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';



if ($_POST['request'] || $_POST['linea'] || $_POST['emp'] || $_POST['ope']) {
  $system_callback = [];
  $data = $_POST;
  $fini = $data['request'];
  $ffin = $data['ffin'];
  $linea = $data['linea'];
  $emp = $data['emp'];
  $ope = $data['ope'];
  $query = "SELECT * FROM ct_linea

WHERE (fecha BETWEEN '$fini' AND '$ffin' AND nombre = '$emp')
  OR (nombre = '$emp')
  OR (linea = '$linea')
  OR (fecha BETWEEN '$fini' AND '$ffin' AND linea = '$linea' AND operacion = '$ope')
  OR (operacion = '$ope')";

  $stmt = $conn->prepare($query);
  if (!($stmt)) {
    $system_callback['code'] = "500";
    $system_callback['message'] = "Error during query prepare [$conn->errno]: $conn->error";
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
    $idlinea = $row['pk_linea'];
    $linea = $row['linea'];
    $ope = $row['operacion'];
    $meta = $row['meta'];
    $fecha = $row['fecha'];
    $nombre = $row['nombre'];
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


    $sp2 = ($prod1 + $prod2);
    $sp3 = ($sp2 + $prod3);
    $sp4 = ($sp3 + $prod4);
    $sp5 = ($sp4 + $prod5);
    $sp6 = ($sp5 + $prod6);
    $sp7 = ($sp6 + $prod7);
    $sp8 = ($sp7 + $prod8);
    $sp9 = ($sp8 + $prod9);
    $sp10 = ($sp9 + $prod10);


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




    $system_callback['data'] .=
    "<p db-id='$idlinea'>$idlinea - $operacion</p>";
    $id = $idlinea;

    $system_callback['data'] .=
    "<tr id='item' class='encabezado' style='letter-spacing: 0px;'>
      <td width='5%' class='p-0 pt-2'></td>
      <td width='5%' class='p-0 pt-2'></td>
      <td width='5%' class='p-0 pt-2' style='text-align: right!important;''>fecha :</td>
      <td width='5%' class='p-0 pt-2'>$fecha</td>
      <td width='5%' class='p-0 pt-2' style='text-align: right!important;''>Empleado :</td>
      <td width='5%' class='p-0 pt-2'>$nombre</td>
      <td width='5%' class='p-0 pt-2' style='text-align: right!important;''>Operacion :</td>
      <td width='5%' class='p-0 pt-2'>$ope</td>
      <td width='5%' class='p-0 pt-2'></td>
      <td width='5%' class='p-0 pt-2'>$linea</td>
      <td width='5%' class='p-0 pt-2'></td>
    </tr>

    <tr>
      <td width='5%' class='m lin p-0'></td>
      <td width='5%' class='m lin p-0'>1 hra</td>
      <td width='5%' class='m lin p-0'>2 hras</td>
      <td width='5%' class='m lin p-0'>3 hras</td>
      <td width='5%' class='m lin p-0'>4 hras</td>
      <td width='5%' class='m lin p-0'>5 hras</td>
      <td width='5%' class='m lin p-0'>6 hras</td>
      <td width='5%' class='m lin p-0'>7 hras</td>
      <td width='5%' class='m lin p-0'>8 hras</td>
      <td width='5%' class='m lin p-0'>9 hras</td>
      <td width='5%' class='m lin p-0'>10 hras</td>
    </tr>

    <tr>
      <td width='5%' class='m p-0'></td>
      <td width='5%' class='m p-0'>$prod1</td>
      <td width='5%' class='m p-0'>$prod2/$sp2</td>
      <td width='5%' class='m p-0'>$prod3/$sp3</td>
      <td width='5%' class='m p-0'>$prod4/$sp4</td>
      <td width='5%' class='m p-0'>$prod5/$sp5</td>
      <td width='5%' class='m p-0'>$prod6/$sp6</td>
      <td width='5%' class='m p-0'>$prod7/$sp7</td>
      <td width='5%' class='m p-0'>$prod8/$sp8</td>
      <td width='5%' class='m p-0'>$prod9/$sp9</td>
      <td width='5%' class='m p-0'>$prod10/$sp10</td>
    </tr>

    <tr>
      <td width='5%' class='m p-0' style='text-align: left!important;'>Avance</td>
      <td width='5%' class='m p-0'>$av1</td>
      <td width='5%' class='m p-0'>$av2</td>
      <td width='5%' class='m p-0'>$av3</td>
      <td width='5%' class='m p-0'>$av4</td>
      <td width='5%' class='m p-0'>$av5</td>
      <td width='5%' class='m p-0'>$av6</td>
      <td width='5%' class='m p-0'>$av7</td>
      <td width='5%' class='m p-0'>$av8</td>
      <td width='5%' class='m p-0'>$av9</td>
      <td width='5%' class='m p-0'>$av10</td>
    </tr>

    <tr>
      <td width='5%' class='m p-0' style='text-align: left!important;'>Eficiencia</td>
      <td width='5%' class='m p-0 ef'>$efi1</td>
      <td width='5%' class='m p-0 ef'>$efi2</td>
      <td width='5%' class='m p-0 ef'>$efi3</td>
      <td width='5%' class='m p-0 ef'>$efi4</td>
      <td width='5%' class='m p-0 ef'>$efi5</td>
      <td width='5%' class='m p-0 ef'>$efi6</td>
      <td width='5%' class='m p-0 ef'>$efi7</td>
      <td width='5%' class='m p-0 ef'>$efi8</td>
      <td width='5%' class='m p-0 ef'>$efi9</td>
      <td width='5%' class='m p-0 ef'>$efi10</td>
    </tr>

    <tr class='bordeAbajo'>
        <td width='5%' class='m p-0' style='text-align: left!important;'>Meta</td>
        <td width='5%' class='m p-0'>$meta</td>
        <td width='5%' class='m p-0'></td>
        <td width='5%' class='m p-0'></td>
        <td width='5%' class='m p-0'></td>
        <td width='5%' class='m p-0'></td>
        <td width='5%' class='m p-0'></td>
        <td width='5%' class='m p-0'></td>
        <td width='5%' class='m p-0'></td>
        <td width='5%' class='m p-0'></td>
        <td width='5%' class='m p-0'></td>
    </tr>";
  }

  $system_callback['code'] = 1;
  $system_callback['message'] = "Script called successfully!";
  exit_script($system_callback);

};


 ?>
