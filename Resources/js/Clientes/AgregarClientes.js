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
