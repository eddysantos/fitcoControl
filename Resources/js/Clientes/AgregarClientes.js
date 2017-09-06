$(document).ready(function(){
  $('.consultar').click(function(){
    var accion = $(this).attr('accion');
    var status = $(this).attr('status');

    switch (accion) {
      case "acliente":
      if (status == 'cerrado') {
        $('.span').css('display', 'inherit');
        $(this).attr('status', 'abierto');
        $('#Eclientes').animate({"right": "36%"}, "slow");
        $('#clientes').animate({"right": "36%"}, "slow");
        $('#NuevoCliente').fadeIn(2500);
      }else {
        $('.span').css('display', '');
        $(this).attr('status', 'cerrado');
        $('#Eclientes').animate({"right": "4%"}, "slow");
        $('#clientes').animate({"right": "4%"}, "slow");
        $('#NuevoCliente').hide();
      }
      break;
      default:
        console.error("Something went terribly wrong...");
    }
  });


});
