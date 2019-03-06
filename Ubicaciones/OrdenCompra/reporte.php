<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("Location: /fitcoControl/index.php");
}
  $root = $_SERVER['DOCUMENT_ROOT'];

  $pro_miVer = $_SESSION['user']['pro_miVer'];
  $admin = $_SESSION['user']['privilegiosUsuario'] == "Administrador";
?>

<link rel="stylesheet" href="/fitcoControl/Resources/css/barranavegacion.css">
<link rel="stylesheet" href="/fitcoControl/Resources/fontAwesome/css/font-awesome.min.css">
<link rel="stylesheet" href="/fitcoControl/Resources/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/fitcoControl/Resources/css/Pagina.css">
<link rel="stylesheet" href="/fitcoControl/Resources/css/Inputs.css">
<link rel="stylesheet" href="/fitcoControl/Resources/css/modales.css">
<link rel="stylesheet" href="/fitcoControl/Resources/css/sweetalert.css">
<link rel="stylesheet" href="/fitcoControl/Resources/bootstrap/alertifyjs/css/alertify.min.css">
<link rel="stylesheet" href="/fitcoControl/Resources/bootstrap/alertifyjs/css/themes/default.css">
<link rel="icon" href="/fitcoControl/Resources/iconos/fit.ico">




<script src="/fitcoControl/Resources/bootstrap/alertifyjs/alertify.min.js"></script>
<script src="/fitcoControl/Resources/jquery/sweetalert.min.js"></script>
<script src="/fitcoControl/Resources/jquery/jquery.min.js"></script>

<script src="/fitcoControl/Resources/jquery/popper.min.js"></script>
<script src="/fitcoControl/Resources/bootstrap/js/bootstrap.min.js"></script>
<script src="/fitcoControl/Resources/jquery/tether.min.js"></script>

<?php if ($pro_miVer == 1 || $admin): ?>
  <div class="m-5">
    <a href="/fitcoControl/Ubicaciones/OrdenCompra/OrdenesCompra.php" class="consultar"><img style="width: 100px;" src='/fitcoControl/Resources/iconos/logoFitco.png'></a>
  </div>

  <form class="page p-0" onsubmit="return false">
    <table class="table">
      <thead>
        <tr class='row m-0 encabezado text-center'>
          <td class='col-md-5'><p>Datos de Orde de Compra</p></td>
          <td class='col-md-6'><p>Datos bancarios </p></td>
        </tr>
      </thead>
      <tbody id="tabla_reporte" class="font12">
        <tr>
          <td colspan="9">No hay resultados</td>
        </tr>
      </tbody>
    </table>
  </form>
<?php else:?>

  <div id='SinRegistros' class='container-fluid pantallaRegistros'>
    <div class='tituloSinRegistros' style="font-size:25px; color:red">SOLICITA PERMISO PARA ENTRAR EN ESTA SECCIÓN</div>
  </div>
<?php endif;

?>



<script src="/fitcoControl/Ubicaciones/OrdenCompra/js/ordencompra.js"></script>

<?php
  // require $root . '/fitcoControl/Ubicaciones/Mantenimiento/modales/editar.php';
?>
