
$(document).ready(function(){
  fetchVencidocxc();


  $(':input#cxp_pro').change(function(){
    var value = $(this).val();

      $.ajax({
        url: '/fitcoControl/Ubicaciones/CuentasxPagar/actions/mostrar.php',
        method: 'POST',
        data: {request:value},
        success: function(r){
          r = JSON.parse(r);
          if (r.code == 1) {
            $('#mostrarCuentasVencidas').html(r.data);
          } else {
            console.error(r.message);
          }
        }
      });
    });
  });



  // function fetchVencidocxc(cuentas){
  function fetchVencidocxc(){
    $.ajax({
      url:'/fitcoControl/Ubicaciones/CuentasxPagar/actions/RepoCuentasxPagar.php',
      method: 'POST',
      // data:{cuentas:cuentas},
    })
    .done(function(resultado){
      $('#mostrarCuentasVencidas').html(resultado);
      // ActivarBotones();
    })
  }
  //
  // $(document).on('keyup', '#busqueda', function(){
  //   var valorBusqueda = $(this).val();
  //   if (valorBusqueda!= "") {
  //     fetchVencidocxc(valorBusqueda);
  //   }else {
  //     fetchVencidocxc();
  //   }
  // });
