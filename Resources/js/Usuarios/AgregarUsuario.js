$(document).ready(function(){
  $('#adduser').click(function(){
    $('.span').css('display', 'inherit');
    $('#usuarios').animate({"right": "36%"}, "slow");
    $('#NuevoUsuario').fadeIn(2500);
  });
});
