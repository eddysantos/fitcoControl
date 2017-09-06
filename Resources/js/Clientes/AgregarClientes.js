$(document).ready(function(){
  $('.consultar').click(function(){
    var accion = $(this).attr('accion');
    var status = $(this).attr('status');

    switch (accion) {
      case "acliente":
      if (status == 'cerrado') {
        $('.span').css('display', 'inherit');
        $(this).attr('status', 'abierto');
        $('#clientes').animate({"right": "36%"}, "slow");
        $('#NuevoCliente').fadeIn(2500);
      }else {
        $('.span').css('display', '');
        $(this).attr('status', 'cerrado');
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


  /*$('#btnEditarCliente').click(function(){
    var clienteId = $(this).attr('client-id');
    $.ajax({
      method: 'POST',
      url: '/fitcoControl/Resources/PHP/Clientes/fetchClientData.php'
      data: {clienteId: clienteId},
      success: function(result){
        var rsp = JSON.parse(result);
        if (rsp.code == 1) {
          $('#mclt_id').val(rsp.data.pk_cliente);
          $('#mclt_cliente').val(rsp.data.nombreCliente);
          $('#mclt_correo').val(rsp.data.correoCliente);
          $('#mclt_telefono').val(rsp.data.telefonoCliente);
          $('#mclt_credito').val(rsp.data.creditoCliente);
          $('#mclt_fingreso').val(rsp.data.fingresoCliente);
          $('#mclt_color').val(rsp.data.colorCliente);
          $('#mclt_prendas').val(rsp.data.prendasCliente);
          $('#mclt_nosotros').val(rsp.data.nosotrosCliente);

        } else {
          console.error("Hubo un error al jalar la informacion del cliente.");
        }
      },
      error: function(exception){
        console.error(exception);
      }
    })
  });*/


});
