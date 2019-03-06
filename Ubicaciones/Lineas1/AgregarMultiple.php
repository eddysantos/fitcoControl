<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("Location: /fitcoControl/index.php");
}
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
?>

<div class="">
  <a href="#agregarMultiple1" id="agregarMult">Modal Para agregar</a>
</div>


<div class="modal" tabindex="-1" role="dialog" id="agregarMultiple1">
  <div class="modal-dialog modal-grande" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">Agregar Multiple</h5>
      </div>
      <div class="modal-body">
        <form method="post">
          <table class="table fixed-table">
            <tbody id="Emp_produc"></tbody>
            <tfoot>
              <button id="agregarMultiple" name="" type="submit"  class="w-50 btnsub btn boton btn-block">AGREGAR</button>
            </tfoot>
          </table>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
// $root = $_SERVER['DOCUMENT_ROOT'];
// // require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';
//
// $root = $_SERVER['DOCUMENT_ROOT'];
// require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
//
//
// if(isset($_POST['insertar'])){
//
//   $items1 =  ($_POST['fecha']);
//   $items2 =  ($_POST['nom']);
//   $items3 =  ($_POST['lin']);
//   // $items4 =  ($_POST['lin']);
//
//   while(true){
//     $item1 = current($items1);
//     $item2 = current($items2);
//     $item3 = current($items3);
//     // $item4 = current($items4);
//
//     // Asignar a Variables
//     // $id = (($item1 !== false) ? $item1:",&nbsp;");
//     $fecha = (($item1 !== false) ? $item1:",&nbsp;");
//     $nom = (($item2 !== false) ? $item2:",&nbsp;");
//     $lin = (($item3 !== false) ? $item3:",&nbsp;");
//
//     // $valores = '('.$id.',"'.$lin.'","'.$nom.'","'.$fecha.'"),';
//     $valores = '("'.$lin.'","'.$nom.'","'.$fecha.'"),';
//
//     $valoresQ = substr($valores,0,-1);
//
//     // $query = "INSERT INTO pruebaMultiple (pk_linea,linea,nombre,fecha) VALUES $valoresQ";
//     $query = "INSERT INTO pruebaMultiple (linea,nombre,fecha) VALUES $valoresQ";
//
//     $sqlRes = $conn->query($query);
//
//     $item1 = next($items1);
//     $item2 = next($items2);
//     $item3 = next($items3);
//
//     // if ($item1 === false && $item2 === false && $item3 === false && $item4 === false) {
//     if ($item1 === false && $item2 === false && $item3 === false) {
//      break;
//     }
//   }
// }

   require $root . '/fitcoControl/Ubicaciones/Lineas1/actions/footer.php';

  ?>
