
<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("Location: /fitcoControl/index.php");
}
$root = $_SERVER['DOCUMENT_ROOT'];
require  $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/fitcoControl/Resources/css/Pagina.css">
    <title>En Mantenimiento</title>
  </head>
  <body>

    <div class="container-fluid pantallaGris">
      <div class="tituloMantenimiento">EN MANTENIMIENTO</div>
    </div>

  </body>
</html>
