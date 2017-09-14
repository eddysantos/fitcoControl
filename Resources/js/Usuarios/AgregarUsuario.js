$(document).ready(function(){
  $('.consultar').click(function(){
    var accion = $(this).attr('accion');
    var status = $(this).attr('status');

    switch (accion) {
      case "ausuario":
      if (status == 'cerrado') {
        $('.span').css('display', 'inherit');
        $(this).attr('status', 'abierto');
        $('#Eusuarios').animate({"right": "36%"}, "slow");
        $('#usuarios').animate({"right": "36%"}, "slow");
        $('#NuevoUsuario').fadeIn(2500);
      }else {
        $('.span').css('display', '');
        $(this).attr('status', 'cerrado');
        $('#Eusuarios').animate({"right": "4%"}, "slow");
        $('#usuarios').animate({"right": "4%"}, "slow");
        $('#NuevoUsuario').hide();
      }
      break;
      default:
      console.error("Something went terribly wrong...");
    }
  });
});
