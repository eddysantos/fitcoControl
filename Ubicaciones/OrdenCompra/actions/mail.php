<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';

require $root . '/fitcoControl/Resources/vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$registros = array();
$mail_body = "";
$ids_noticados = array();
$query = "SELECT * FROM ct_ordenCompra  LEFT JOIN ct_ordenCotizaciones ON pk_orden = fk_orden WHERE aprobado = 1 AND cot_aut = 1 AND pagado = 0";


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
     <td style='border: inset 0pt;border-bottom: 4px solid #536797'><b>Orden / Item</b> </td>
     <td style='border: inset 0pt;border-bottom: 4px solid #536797'><b>Persona que Solicita</b> </td>
     <td style='border: inset 0pt;border-bottom: 4px solid #536797'><b>Requerido</b> </td>
     <td style='border: inset 0pt;border-bottom: 4px solid #536797'><b>Importancia</b> </td>
     <td style='border: inset 0pt;border-bottom: 4px solid #536797'><b>Cantidad</b> </td>
     <td style='border: inset 0pt;border-bottom: 4px solid #536797'><b>Nota de Aprobación</b> </td>
   </tr>
 </thead>
 <tbody>";

while ($row =$rslt->fetch_assoc()) {
  $registros[] = $row;
  $pk_orden = $row['pk_orden'];
  $mail_body .="<tr>
      <td style='border: inset 0pt;border-bottom: 1px solid #ccc'><b>#$pk_orden</b> -- $row[item] </td>
      <td style='border: inset 0pt;border-bottom: 1px solid #ccc'> $row[usuarioSolicitud] </td>
      <td style='border: inset 0pt;border-bottom: 1px solid #ccc'> $row[fechaRequerido] </td>
      <td style='border: inset 0pt;border-bottom: 1px solid #ccc'> $row[vitalDesechable] </td>
      <td style='border: inset 0pt;border-bottom: 1px solid #ccc'> $row[cantidad] </td>
      <td style='border: inset 0pt;border-bottom: 1px solid #ccc'> $row[notaAprobado] </td>
    </tr>

    <tr style=''>
      <td style='border: inset 0pt;border-bottom: 4px solid #536797'><b>Razón Social:</b> $row[razonSocial] </td>
      <td style='border: inset 0pt;border-bottom: 4px solid #536797'><b>Precio:</b> $row[precio] $row[iva] </td>
      <td style='border: inset 0pt;border-bottom: 4px solid #536797'><b>Num Cuenta:</b> $row[numCuenta] </td>
      <td style='border: inset 0pt;border-bottom: 4px solid #536797'><b>CLABE:</b> $row[clabe] </td>
      <td style='border: inset 0pt;border-bottom: 4px solid #536797'><b>Banco:</b> $row[nombreBanco] </td>
      <td style='border: inset 0pt;border-bottom: 4px solid #536797'><b>Condición Pago:</b> $row[condicionPago] </td>
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


 // cuentasporpagar@fitco.com.mx y mvmfitco@villaverde.com
  $mail->setFrom('no_reply@fitco.com.mx', 'Fitco Automated System');
  // $mail->addAddress('ae_pinales@hotmail.com', 'Cuentas por Pagar');
  $mail->addAddress('cuentasporpagar@fitco.com.mx', 'Cuentas por Pagar');
  $mail->addAddress('mvmfitco@villaverde.com', 'Cuentas por Pagar');
  $mail->AddBCC('epinales@prolog-mex.com', 'Estefania Pinales');

  $mail->isHTML(true);

  $mail->Subject    = "Se han autorizado Ordenes de compra";
  $mail->Body = stripslashes($mail_body);

  $mail->SMTPOptions = array(
  'ssl' => array(
  'verify_peer' => false,
  'verify_peer_name' => false,
  'allow_self_signed' => true
  )
  );

  $mail->Send();
} catch (phpmailerException $e) {
  echo "PHP Mailer Exception: " . $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
  echo "Unidentified Exception: " . $e->getMessage(); //Boring error messages from anything else!
}



$system_callback['code'] = 1;
$system_callback['message'] = "Script called successfully!";
exit_script($system_callback);

 ?>
