
$(document).ready(function(){
  $('.consultar').click(function(){
        var accion = $(this).attr('accion');

        switch (accion) {
          case "acobranza":
          $('.spanA').css('display', 'inherit');
          $('.spanD').css('display', 'inline-block');
          $('#cobranza').animate({"right": "38%"}, "slow");
          $('#Agregarcobranza').fadeIn(1000);
          $('#Detallecobranza').fadeOut();
          break;

          case "dcobranza":
          $('.spanD').css('display', 'inherit');
          $('.spanA').css('display', 'inline-block');
          $('#cobranza').animate({"right": "48%"}, "slow");
          $('#Detallecobranza').fadeIn(1000);
          $('#Agregarcobranza').fadeOut();
          break;

          default:
          console.error("Something went terribly wrong...");

        }

    });

  });
