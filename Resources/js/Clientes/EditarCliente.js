$(document).ready(function(){

  $('#btnEditarCliente').click(function(){
    var clienteId = $(this).attr('client-id');
    $.ajax({
      method: 'POST',
      url: '/fitcoControl/Resources/PHP/Clientes/fetchClientData.php',
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
  });

});
