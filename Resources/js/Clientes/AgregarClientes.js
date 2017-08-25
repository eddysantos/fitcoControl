$(document).ready(function(){
  $('#addcliente').click(function(){
    $('.span').css('display', 'inherit');
    $('#clientes').animate({"right": "36%"}, "slow");
    $('#NuevoCliente').fadeIn(2500);
  });
});
