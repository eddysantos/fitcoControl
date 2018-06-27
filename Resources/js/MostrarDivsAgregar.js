$(document).ready(function(){

  // Auto close de alertas
  window.setTimeout(function() {
      $(".alert").fadeTo(2500, 0).slideUp(2500, function(){
          $(this).remove();
      });
  }, 10400);


  //al hacer hover en algun buscador de tiempo real
  $('.buscador').hover(function(){
    var accion = $(this).attr('accion');
    var status = $(this).attr('status');

    switch (accion) {
      case "busc":
      if (status == 'cerrado') {
        // $('.spanB').css('display', 'inline-table');
        $(this).attr('status', 'abierto');
        $('#Eclientes').animate({"right": "4%"}, "slow");
        $('#Eusuarios').animate({"right": "4%"}, "slow");
        $('#MMaterial').animate({"right": "4%"}, "slow");
        // $('#Ecobranza').animate({"right": "4%"}, "slow");
        $('#Ecobranza').animate({"right": "2%"}, "slow");
        $('#Eventas').animate({"right": "4%"}, "slow");
        $('#Enomina').animate({"right": "4%"}, "slow");
        $('#Ecuentas').animate({"right": "4%"}, "slow");
        $('#NuevoCliente').hide();
        $('#NuevoUsuario').hide();
        $('#NuevoMaterial').hide();
        $('#Agregarcobranza').hide();
        $('#NuevoNomina').hide();
        $('#NuevaVenta').hide();
        $('#NuevaCuenta').hide();

        $('.spanA').css('display', '');
        $('.spanV').css('display', '');
        $('p').css('font-size','1.75rem');
        $('b').css('font-size','1.75rem');
        $('p').css('font-weight','500');
        $('.img').removeClass( "spand-iconp" ).addClass( "spand-icon");
      }else {
        $('.spanB').css('display', '');
        $(this).attr('status', 'cerrado');
      }
      break;
        default:
          console.error("Something went terribly wrong...");
      }
    });


  $('.consultar').click(function(){
    var accion = $(this).attr('accion');
    var status = $(this).attr('status');

    $('#selectGrafica').find('a').css('color', "");
        $('#selectGrafica').find('a').css('font-size', "");
        $(this).attr('status', 'abierto');
        $(this).css('cssText', 'color: rgb(98, 98, 98) !important');


    switch (accion) {


//CORTE
      case "acorte":
      if (status == 'cerrado') {
        $('.spanA').css('display', 'inherit');
        $(this).attr('status', 'abierto');
        $('#tablacorte').animate({"right": "26%"}, "slow");
        $('#Agregarcorte').fadeIn(2500);
        $('#SinRegistros').fadeOut();
        $('p').css('font-size','13px');
      }else {
        $('.spanA').css('display', '');
        $(this).attr('status', 'cerrado');
        $('#tablacorte').animate({"right": "4%"}, "slow");
        $('#Agregarcorte').hide();
        $('p').css('font-size','1.75rem');
      }
      break;

//USUARIOS
      case "ausuario":
      if (status == 'cerrado') {
        $('.spanA').css('display', 'inherit');
        $(this).attr('status', 'abierto');
        $('#Eusuarios').animate({"right": "36%"}, "slow");
        $('#NuevoUsuario').fadeIn(2500);
        $('#SinRegistros').fadeOut();
      }else {
        $('.spanA').css('display', '');
        $(this).attr('status', 'cerrado');
        $('#Eusuarios').animate({"right": "4%"}, "slow");
        $('#NuevoUsuario').hide();
      }
      break;

//CLIENTES
      case "acliente":
      if (status == 'cerrado') {
        $('.spanA').css('display', 'inherit');
        $(this).attr('status', 'abierto');
        $('#Eclientes').animate({"right": "36%"}, "slow");
        $('.img').removeClass( "spand-icon" ).addClass( "spand-iconp");
        $('#NuevoCliente').fadeIn(2500);
        $('#SinRegistros').fadeOut();
        $('p').css('font-size','13px');
        $('b').css('font-size','14px');
      }else if (status == 'abierto') {
        $('.spanA').css('display', '');
        $(this).attr('status', 'cerrado');
        $('#Eclientes').animate({"right": "4%"}, "slow");
        $('.img').removeClass( "spand-iconp" ).addClass( "spand-icon");
        $('p').css('font-size','1.75rem');
        $('b').css('font-size','1.75rem');
        $('p').css('font-weight','500');
        $('#NuevoCliente').hide();
      }
      break;


//TESORERIA
      case "acobranza":
      if (status == 'cerrado') {
        $(this).attr('status', 'abierto');
        $('.spanA').css('display', 'inherit');
        $('#Ecobranza').animate({"right": "36%"}, "slow");
        $('.img').removeClass( "spand-icon" ).addClass( "spand-iconp");
        $('#Agregarcobranza').fadeIn(1000);
        $('#Detallecobranza').hide();
        $('p').css('font-size','13px');
        $('b').css('font-size','14px');
        $('#SinRegistros').fadeOut();
      }else{
        $(this).attr('status', 'cerrado');
        $('.spanA').css('display', '');
        $('#Ecobranza').animate({"right": "4%"}, "slow");
        $('.img').removeClass( "spand-iconp" ).addClass( "spand-icon");
        $('p').css('font-size','1.75rem');
        $('b').css('font-size','1.75rem');
        $('p').css('font-weight','500');
        $('#Agregarcobranza').hide();
      }
      break;

      case "semanal":
        $('#graficasemanal').fadeIn();
        $('#mostrarTablaGrafica').fadeIn();
        $('#graficamensual').hide();
        $('#graficadiaria').hide();
        break;

      case "mensual":
        $('#graficamensual').fadeIn();
        $('#mostrarTablaGrafica').hide();
        $('#graficasemanal').hide();
        $('#graficadiaria').hide();
        break;

      case "diaria":
        $('#graficadiaria').fadeIn();
        $('#mostrarTablaGrafica').hide();
        $('#graficamensual').hide();
        $('#graficasemanal').hide();
        break;

// MATERIALES
      case "amaterial":
      if (status == 'cerrado') {
        $('.spanA').css('display', 'inherit');
        $(this).attr('status', 'abierto');
        $('#MMaterial').animate({"right": "36%"}, "slow");
        $('#NuevoMaterial').fadeIn(2500);
        $( ".img" ).removeClass( "spand-icon" ).addClass( "spand-iconp");
        $('p').css('font-size','13px');
        $('b').css('font-size','14px');
        $('#SinRegistros').fadeOut();
      }else {
        $('.spanA').css('display', '');
        $(this).attr('status', 'cerrado');
        $('#MMaterial').animate({"right": "4%"}, "slow");
        $( ".img" ).removeClass( "spand-iconp" ).addClass( "spand-icon");
        $('p').css('font-size','1.75rem');
        $('b').css('font-size','1.75rem');
        $('p').css('font-weight','500');
        $('#NuevoMaterial').hide();
      }
      break;

// CUENTAS POR PAGAR
      case "acuentas":
      if (status == 'cerrado') {
        $('.spanA').css('display', 'inherit');
        $(this).attr('status', 'abierto');
        $('#Ecuentas').animate({"right": "36%"}, "slow"); //esta es el id del form en mostrar.php
        $('#NuevaCuenta').fadeIn(2500);
        $('#SinRegistros').fadeOut();
        $( ".img" ).removeClass( "spand-icon" ).addClass( "spand-iconp");
        $('p').css('font-size','13px');
        $('b').css('font-size','14px');
      }else {
        $('.spanA').css('display', '');
        $(this).attr('status', 'cerrado');
        $('#Ecuentas').animate({"right": "4%"}, "slow");
        $('#NuevaCuenta').hide();
        $( ".img" ).removeClass( "spand-iconp" ).addClass( "spand-icon");
        $('p').css('font-size','1.75rem');
        $('b').css('font-size','1.75rem');
        $('p').css('font-weight','500');
      }
      break;


// NOMINA
      case "anomina":
      if (status == 'cerrado') {
        $('.spanA').css('display', 'inherit');
        $(this).attr('status', 'abierto');
        $('#Enomina').animate({"right": "36%"}, "slow");
        $('#NuevoNomina').fadeIn(2500);
        // $( ".img" ).removeClass( "spand-icon" ).addClass( "spand-iconp");
        // $('p').css('font-size','13px');
        // $('b').css('font-size','14px');
        $('#SinRegistros').fadeOut();
      }else {
        $('.spanA').css('display', '');
        $(this).attr('status', 'cerrado');
        $('#Enomina').animate({"right": "4%"}, "slow");
        // $( ".img" ).removeClass( "spand-iconp" ).addClass( "spand-icon");
        // $('p').css('font-size','1.75rem');
        // $('b').css('font-size','1.75rem');
        // $('p').css('font-weight','500');
        $('#NuevoNomina').hide();
      }
      break;

//VENTAS
      case "aventas":
      if (status == 'cerrado') {
        $('.spanV').css('display', 'inherit');
        $(this).attr('status', 'abierto');
        $('#Eventas').animate({"right": "36%"}, "slow");
        $('#NuevaVenta').fadeIn(2500);
        $('#SinRegistros').fadeOut();
      }else {
        $('.spanV').css('display', '');
        $(this).attr('status', 'cerrado');
        $('#Eventas').animate({"right": "4%"}, "slow");
        $('#NuevaVenta').hide();
      }
      break;


      case "produccionLink":
      if (status == 'cerrado') {
        $(this).attr('status', 'abierto');
        $(this).css('cssText', 'color: rgb(120, 153, 179) !important');
        $(this).css('font-size', '14px');
        $('#dropProduccion').fadeIn(2500);
      }else {
        $(this).attr('status', 'cerrado');
        $('#dropProduccion').hide();
      }
      break;




//PRODUCCION
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

//CORTE
      default:
        console.error("Something went terribly wrong...");
    }
  });
});
