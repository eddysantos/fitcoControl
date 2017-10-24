<?php
  session_start();

  if (!isset($_SESSION['user'])) {
    header("Location: /fitcoControl/index.php");
  }

  $pv = $_SESSION['user']['produccion_ver'];
  $cv =  $_SESSION['user']['cobranza_ver'];
  $clv = $_SESSION['user']['cliente_ver'];
  $admin = $_SESSION['user']['privilegiosUsuario']== "Administrador";

  // $priv_produccion = $pv == "1" && $cv == "0" && $clv == "0";
  // $priv_clientes =  $clv == "1" && $pv == "0" && $cv == "0";
  // $priv_cobranza =  $cv == "1" && $clv == "0" && $pv == "0";
  // $priv_pcl = $pv && $clv == "1"  && $cv == "0";
  // $priv_cp = $cv && $pv == "1" && $clv == "0";
  // $priv_ccl = $clv && $cv == "1" && $pv == "0";
  // $priv_todos = $clv && $cv && $pv == "1";
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Fit&amp;Co Solutions</title>
    <link rel="stylesheet" href="/fitcoControl/Resources/css/barranavegacion.css">
    <link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css'>
  </head>
  <body>
    <div id="bienvenida">
      <h1 id="logo">FIT&amp;CO</h1>
      <nav>
        <?php if ($pv == 1): ?>
          <a href="/fitcoControl/Ubicaciones/Produccion/produccion.php" class="transicion">PRODUCCIÓN</a>
        <?php else: ?>
          <a class="bloqueo">PRODUCCION</a>
        <?php endif; ?>


        <?php if ($cv == 1): ?>
          <a href="/fitcoControl/Ubicaciones/Cobranza/cobranza.php" class="transicion">COBRANZA</a>
        <?php else: ?>
          <a class="bloqueo">COBRANZA</a>
        <?php endif; ?>



        <?php if ($clv == 1): ?>
          <a href="/fitcoControl/Ubicaciones/Clientes/Clientes.php" class="transicion">CLIENTES</a>
        <?php else: ?>
          <a class="bloqueo">CLIENTES</a>
        <?php endif; ?>


        <?php if ($admin): ?>
            <a href="/fitcoControl/Ubicaciones/Usuarios/Usuarios.php" class="transicion">USUARIOS</a>
        <?php else: ?>
          <a class="bloqueo">USUARIOS</a>
        <?php endif; ?>

        <a href="/fitcoControl/Resources/PHP/Login/CerrarSesion.php" class="transicion">CERRAR SESION</a>
      </nav>
    </div>

    <section id="homesec">
      <div id="mainlogo">FIT&amp;CO<br>
        <div id="mainsocial">
          Bienvenido, <?php echo $_SESSION['user']['nombreUsuario']; ?>
        </div>
      </div>
    </section>


    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="/fitcoControl/Resources/js/index.js"></script>
    <script src="/fitcoControl/Resources/jquery/popper.min.js"></script>

  </body>
</html>
