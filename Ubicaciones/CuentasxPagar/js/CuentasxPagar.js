$(document).ready(function(){
  det_ctasxcobrar();

  });

//MOSTRAR TABLA
function det_ctasxcobrar(){
  $.ajax({
    method: 'POST',
    url:'/fitcoControl/Ubicaciones/CuentasxPagar/actions/mostrar.php',
    success: function(r){
      console.log(r);
      r = JSON.parse(r);
      if (r.code == 1) {
        $('#mostrarCtasxCobrar').html(r.data);
      } else {
        console.error(r.message);
      }
    }
  })
}
