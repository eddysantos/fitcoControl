// $(document).ready(function(){
//   det_ctasxcobrar();
//
//   });

//MOSTRAR TABLA
// function det_ctasxcobrar(){
//   $.ajax({
//     method: 'POST',
//     url:'/fitcoControl/Ubicaciones/CuentasxPagar/actions/mostrar.php',
//     success: function(r){
//       console.log(r);
//       r = JSON.parse(r);
//       if (r.code == 1) {
//         $('#mostrarCtasxCobrar').html(r.data);
//       } else {
//         console.error(r.message);
//       }
//     }
//   })
// }

$(document).ready(function(){
  fetchVencidocxc();
  // fetchTablaCobranza();

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
