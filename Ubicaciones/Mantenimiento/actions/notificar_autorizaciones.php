<?php



/*

1. Vas a encontrar que gastos estan autorizados y no notificados.
2. Vas a meter esa info en un array.
3. Generar el correo de notificacion.

*/


$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';

require $root . '/fitcoControl/Resources/vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$registros = array();
$mail_body = "";
$ids_noticados = array();
$query = "SELECT mant_Inv mantenimiento, area, proveedor, costo, fechaRequerido, pk_mantenimiento id FROM ct_mantenimiento WHERE autorizacion = 1 AND pagado = 0";
// $query = "SELECT mant_Inv mantenimiento, area, proveedor, costo, fechaRequerido, notificado, pk_mantenimiento id FROM ct_mantenimiento WHERE autorizacion = 1 AND pagado = 0 AND notificado = 0";


$stmt = $conn->prepare($query);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error during query prepare [$conn->errno]: $conn->error";
  exit_script($system_callback);
}

// $stmt->bind_param();
// if (!($stmt)) {
//   $system_callback['code'] = "500";
//   $system_callback['message'] = "Error during variables binding [$stmt->errno]: $stmt->error";
//   exit_script($system_callback);
// }

if (!($stmt->execute())) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error during query execution [$stmt->errno]: $stmt->error";
  exit_script($system_callback);
}

$rslt = $stmt->get_result();
$rows = $rslt->num_rows;
$system_callback['affected'] = $affected;
$system_callback['datos'] = $_POST;

if ($rows == 0) {
  $system_callback['code'] = 2;
  $system_callback['message'] = "No hay ningún registro para enviar.";
  exit_script($system_callback);
}


 $mail_body .="
 <table style='background='#ccc' cellspacing='0' cellpadding='25' border='10' style='font-family: Arial, sans-serif; text-align: center;'>
 <thead>
   <tr>
     <th style='border: 1px solid rgba(227, 227, 227, 0.68);'>Area</th>
     <th style='border: 1px solid rgba(227, 227, 227, 0.68);'>Mantenimiendo</th>
     <th style='border: 1px solid rgba(227, 227, 227, 0.68);'>Proveedor</th>
     <th style='border: 1px solid rgba(227, 227, 227, 0.68);'>Costo</th>
     <th style='border: 1px solid rgba(227, 227, 227, 0.68);'>Fecha Requerido</th>
   </tr>
 </thead>
 <tbody>
 ";

while ($row =$rslt->fetch_assoc()) {
  $registros[] = $row;
  $mail_body .="<tr>
      <td style='border: 1px solid rgba(227, 227, 227, 0.68);'> $row[area] </td>
      <td style='border: 1px solid rgba(227, 227, 227, 0.68);'> $row[mantenimiento] </td>
      <td style='border: 1px solid rgba(227, 227, 227, 0.68);'> $row[proveedor] </td>
      <td style='border: 1px solid rgba(227, 227, 227, 0.68);'> $row[costo] </td>
      <td style='border: 1px solid rgba(227, 227, 227, 0.68);'> $row[fechaRequerido] </td>
    </tr>
  </tbody>";
  $ids_noticados[] = $row['id'];
}

$mail_body .= "</table>";

$mail = new PHPMailer();

try {
  $mail->isSMTP();
  $mail->CharSet = 'UTF-8';

  $mail->Host       = "smtp.office365.com";
  $mail->SMTPDebug  = 0;
  $mail->SMTPAuth   = true;
  $mail->Port       = 587;
  $mail->Username   = 'no_reply@prolog-mex.com';
  $mail->Password   = 'Abcd1234';

  $mail->setFrom('no_reply@fitco.com.mx', 'Fitco Automated System');
  $mail->addAddress('cuentasporpagar@fitco.com.mx', 'Cuentas por Pagar');
  $mail->AddBCC('epinales@prolog-mex.com', 'Estefania Pinales');

  $mail->isHTML(true);

  $mail->Subject    = "Se han autorizado elementos de mantenimiento";

  // $mail->Body       = $mail_body;
  $mail->Body = stripslashes($mail_body);

  $mail->SMTPOptions = array(
  'ssl' => array(
  'verify_peer' => false,
  'verify_peer_name' => false,
  'allow_self_signed' => true
  )
  );

  $mail->Send();

  //Query para cambiar notificado a 1.

  /*
  !. Prepare...
  2. Foreach ids_notificados -> bind_param -> execute.
  */
} catch (phpmailerException $e) {
  echo "PHP Mailer Exception: " . $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
  echo "Unidentified Exception: " . $e->getMessage(); //Boring error messages from anything else!
}



$system_callback['code'] = 1;
$system_callback['message'] = "Script called successfully!";
exit_script($system_callback);

 ?>
