$(document).ready(function(){
  $('#addcliente').click(function(){
    $('.span').css('display', 'inherit');
    $('#clientes').animate({"right": "36%"}, "slow");
    $('#NuevoCliente').fadeIn(2500);
  });

  $('#submitNewClient').click(function(){
    var cn = $('#ncNombre').val();
    var fi = $('#ncFechaIngreso').val();
    var cc = $('#ncColor').val();
    var ce = $('#ncCorreo').val();
    var tc = $('#ncTelefono').val();

    $.ajax({
      method: 'POST',
      url: '/fitcoControl/Resources/PHP/Clientes/agregarCliente.php',
      data: {
        nombreCliente: cn,
        colorCliente: cc,
        fechaIngreso: fi,
        correoContacto: ce,
        telefonoContacto: tc
      },
      success: function(result){
        console.log(result);
      },
      error: function(exception){
        console.log(exception);
      }
    })
  });

});
