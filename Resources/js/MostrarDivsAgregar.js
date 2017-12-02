$(document).ready(function(){
  $('.consultar').click(function(){
    var accion = $(this).attr('accion');
    var status = $(this).attr('status');

    switch (accion) {
      case "acliente":
      if (status == 'cerrado') {
        $('.spanc').css('display', 'inherit');
        $(this).attr('status', 'abierto');
        $('#Eclientes').animate({"right": "36%"}, "slow");
        $('#NuevoCliente').fadeIn(2500);
      }else {
        $('.spanc').css('display', '');
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
        $('p').css('font-size','13px')
      }else{
        $('.spanA').css('display', '');
        $(this).attr('status', 'cerrado');
        $('#Ecobranza').animate({"right": "4%"}, "slow");
        $('p').css('font-size','1.75rem');
        $('p').css('font-weight','500');
        $('#Agregarcobranza').hide();
      }
      break;

      case  "btesoreria":
        if (status == 'cerrado') {
          $(this).attr('status','abierto');
          $('acobranza').attr('status','abierto');
          $('.spanA').css('display', '');
          $('.spanD').css('display', '');
          $('#Ecobranza').animate({"right": "4%"}, "slow");
          $('#Agregarcobranza').hide();
        }else{
          $(this).attr('status', 'cerrado');
        }
        break;

      case "eproduccion":
      if (status == 'cerrado') {
        $('.spanP').css('display', 'inherit');
        $(this).attr('status', 'abierto');
        $('#tablaProduccion').fadeIn(2500);
        $('#colapsoNuevaProduc').removeClass("show");
      }else {
        $('.spanP').css('display', '');
        $(this).attr('status', 'cerrado');
        $('#tablaProduccion').fadeOut();
        $('#colapsoNuevaProduc').addClass("show");
      }
      break;

      case "ausuario":
      if (status == 'cerrado') {
        $('.spanU').css('display', 'inherit');
        $(this).attr('status', 'abierto');
        $('#Eusuarios').animate({"right": "36%"}, "slow");
        $('#usuarios').animate({"right": "36%"}, "slow");
        $('#NuevoUsuario').fadeIn(2500);
      }else {
        $('.spanU').css('display', '');
        $(this).attr('status', 'cerrado');
        $('#Eusuarios').animate({"right": "4%"}, "slow");
        $('#usuarios').animate({"right": "4%"}, "slow");
        $('#NuevoUsuario').hide();
      }
      break;

      case "aventas":
      if (status == 'cerrado') {
        $('.spanV').css('display', 'inherit');
        $(this).attr('status', 'abierto');
        $('#Eventas').animate({"right": "36%"}, "slow");
        $('#NuevaVenta').fadeIn(2500);
      }else {
        $('.spanV').css('display', '');
        $(this).attr('status', 'cerrado');
        $('#Eventas').animate({"right": "4%"}, "slow");
        $('#NuevaVenta').hide();
      }
      break;
      default:
        console.error("Something went terribly wrong...");
    }
  });
});
