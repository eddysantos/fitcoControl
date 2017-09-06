
$(document).ready(function(){
  $('.ver').click(function(){
    var accion = $(this).attr('accion');
    var status = $(this).attr('status');

    switch (accion) {
      case "acobranza":
      if (status == 'cerrado') {
        $(this).attr('status', 'abierto');
        $('.spanA').css('display', 'inherit');
        $('.spanD').css('display', '');
        $('#cobranza').animate({"right": "38%"}, "slow");
        $('#Ecobranza').animate({"right": "38%"}, "slow");
        $('#Agregarcobranza').fadeIn(1000);
        $('#Detallecobranza').hide();
      }else {
        $('.spanA').css('display', '');
        $(this).attr('status', 'cerrado');
        $('#cobranza').animate({"right": "4%"}, "slow");
        $('#Ecobranza').animate({"right": "4%"}, "slow");
        $('#Agregarcobranza').hide();
      }
      break;


      /*case "dcobranza":
      if (status == 'cerrado') {
        $(this).attr('status', 'abierto');
        $('.spanD').css('display', 'inherit');
        $('.spanA').css('display', '');
        $('#cobranza').animate({"right": "48%"}, "slow");
        $('#Detallecobranza').fadeIn(1000);
        $('#Agregarcobranza').hide();

      }else {
        $('.spanD').css('display', '');
        $(this).attr('status', 'cerrado');
        $('#cobranza').animate({"right": "4%"}, "slow");
        $('#Detallecobranza').hide();
      }
      break;*/

      default:
      console.error("Something went terribly wrong...");

    }
  });
});
