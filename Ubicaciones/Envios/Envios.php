<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("Location: /fitcoControl/index.php");
}
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';

?>

<?php if ($admin || $en_ver == 1): ?>
<div class="container-fluid pl-80 pr-57">
  <div class="row clt_usr mt-5 mb-5">
    <div class="text-left alert alert-info w-75" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Nota: </strong> La función de esta sección es llevar un control de status de la mercancia, en el icono <img src='/fitcoControl/Resources/iconos/003-add.svg' class="iconoNota"> se podra agregar un status, fecha, hora y notas de dicho status.<br>
      En el icono <img src='/fitcoControl/Resources/iconos/magnifier.svg' class='iconoNota'> se podra visualizar el desglose de los diferentes status, los cuales se podran eliminar o editar.
    </div>

    <div class="col align-self-end">
      <a class="rotate-link consultar ancla" accion="busuario">
        <img src="/fitcoControl/Resources/iconos/search.svg" class="icon rotate-icon" style="width:30px">
        <span class="spanB"><input class="buscar" type="text" name="busqueda"  id="busqueda" placeholder="Buscar"></span>
      </a>
    </div>
  </div>

  <div class="container-fluid mt-3">
    <section id="MostrarEnvio"></section>
  </div>
</div>

<?php else: ?>
  <div id='SinRegistros' class='container-fluid pantallaRegistros'>
    <div class='tituloSinRegistros' style="font-size:25px; color:red">SOLICITA PERMISO PARA ENTRAR EN ESTA SECCIÓN</div>
  </div>
<?php endif;?>



<?php
  require $root . '/fitcoControl/Ubicaciones/Envios/modales/ModalEnvios.php';
  require $root . '/fitcoControl/Ubicaciones/Envios/actions/footer.php';
?>
