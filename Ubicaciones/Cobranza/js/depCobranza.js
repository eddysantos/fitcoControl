$(document).ready(function(){
  det_cobranza();


$(':input#cob_cli').change(function(){
  var value = $(this).val();

    $.ajax({
      url: '/fitcoControl/Ubicaciones/Cobranza/actions/RepoCobraza.php',
      method: 'POST',
      data: {request:value},
      success: function(r){
        r = JSON.parse(r);
        if (r.code == 1) {
          $('#mostrarCobranza').html(r.data);
        } else {
          console.error(r.message);
        }
      }
    });
  });
});

//MOSTRAR TABLA
function det_cobranza(){
  $.ajax({
    method: 'POST',
    url:'/fitcoControl/Ubicaciones/Cobranza/actions/mostrar.php',
    success: function(r){
      r = JSON.parse(r);
      if (r.code == 1) {
        $('#mostrarCobranza').html(r.data);
      } else {
        console.error(r.message);
      }
    }
  })
}
