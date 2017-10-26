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
        $('#NuevoCliente').fadeIn(2500);
      }else {
        $('.span').css('display', '');
        $(this).attr('status', 'cerrado');
        $('#Eclientes').animate({"right": "4%"}, "slow");
        $('#NuevoCliente').hide();
      }
      break;

      case "acobranza":
      if (status == 'cerrado') {
        $(this).attr('status', 'abierto');
        $('.spanA').css('display', 'inherit');
        $('.spanD').css('display', '');
        $('#Ecobranza').animate({"right": "38%"}, "slow");
        $('#Agregarcobranza').fadeIn(1000);
        $('#Detallecobranza').hide();
      }else {
        $('.spanA').css('display', '');
        $(this).attr('status', 'cerrado');
        $('#Ecobranza').animate({"right": "4%"}, "slow");
        $('#Agregarcobranza').hide();
      }
      break;

      case "eproduccion":
      if (status == 'cerrado') {
        $('.span').css('display', 'inherit');
        $(this).attr('status', 'abierto');
        $('#tablaProduccion').fadeIn(2500);
        $('#colapsoNuevaProduc').removeClass("show");
      }else {
        $('.span').css('display', '');
        $(this).attr('status', 'cerrado');
        $('#tablaProduccion').fadeOut();
        $('#colapsoNuevaProduc').addClass("show");
      }
      break;

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

      case "eproduccion":
      if (status == 'cerrado') {
        $('.span').css('display', 'inherit');
        $(this).attr('status', 'abierto');
        $('#tablaProduccion').fadeIn(2500);
        $('#colapsoNuevaProduc').removeClass("show");
      }else {
        $('.span').css('display', '');
        $(this).attr('status', 'cerrado');
        $('#tablaProduccion').fadeOut();
        $('#colapsoNuevaProduc').addClass("show");
      }
      break;

      default:
        console.error("Something went terribly wrong...");
    }
  });
});
