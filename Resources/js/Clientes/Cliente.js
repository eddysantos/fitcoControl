$(document).ready(function(){
  fetchClients();

  });

  $('#NuevoRegistro').click(function(){
    var nombreCliente = $('#clt_nombre').val();
    var nombreContacto = $('#clt_ncontacto').val();
    var correoCliente = $('#clt_contacto').val();
    var telefonoCliente = $('#clt_telefono').val();
    var creditoCliente = $('#clt_credito').val();
    var fingresoCliente = $('#clt_fingreso').val();
    var colorCliente = $('#clt_color').val();
    var prendasCliente = $('#clt_prendas').val();
    var precioPrenda = $('#clt_precio').val();
    var nosotrosCliente = $('#clt_nosotros').val();
    var vendedorCliente = $('#clt_vendedor').val();

    validacion = $('#clt_nombre').val() == "" ||
    $('#clt_contacto').val() == "" ||
    $('#clt_telefono').val() == "" ||
    $('#clt_credito').val() == "" ||
    $('#clt_fingreso').val() == "" ||
    $('#clt_color').val() == "" ||
    $('#clt_prendas').val() == ""||
    $('#clt_precio').val() == ""||
    $('#clt_nosotros').val() == "";

    if (validacion) {
      swal("NO PUEDE CONTINUAR","Nesesita llenar todos los campos","error");
    }else {
      $.ajax({
        method: 'POST',
        url: '/fitcoControl/Resources/PHP/Clientes/AgregarClientes.php',
        data: {
          clt_nombre: nombreCliente,
          clt_ncontacto: nombreContacto,
          clt_contacto: correoCliente,
          clt_color: colorCliente,
          clt_prendas: prendasCliente,
          clt_precio: precioPrenda,
          clt_fingreso: fingresoCliente,
          clt_nosotros: nosotrosCliente,
          clt_credito: creditoCliente,
          clt_telefono: telefonoCliente,
          clt_vendedor: vendedorCliente
        },
        success:function(result){
          var rsp = JSON.parse(result);
          if (rsp.code != 1) {
            swal("FALLO AL REGISTRAR","No se agregó el registro","error");
            console.error(rsp.response);
            fetchClients();
          } else {
            alertify.success('SE AGREGÓ CORRECTAMENTE');
            $('#NuevoCliente')[0].reset();
            $('#NuevoCliente').hide();
            $('.spanA').css('display', '');
            fetchClients();
          }
        },
        error:function(exception){
          console.error(exception)
        }
      })
    }
  });



//Muestra los registros en pantalla y los valores buscados
function fetchClients(clientes){
  $.ajax({
    url:'/fitcoControl/Resources/PHP/Clientes/MostrarDatos.php',
    method: 'POST',
    data:{clientes:clientes},
  })
  .done(function(resultado){
    $('#mostrarClientes').html(resultado);
    ActivarBotones();
  })
}

$(document).on('keyup', '#busqueda', function(){
  var valorBusqueda = $(this).val();
  if (valorBusqueda!= "") {
    fetchClients(valorBusqueda);
  }else {
    fetchClients();
  }
});


function ActivarBotones(){
  // Asociar un evento al botón que muestra la ventana modal
  $('.EditCliente').unbind(); // EVITAMOS QUE SE DUPLIQUE NUESTRO SELECTOR
  $('.EditCliente').click(function(){
    var clienteId = $(this).attr('client-id');
    $.ajax({

      // especifica si será una petición POST o GET
      method: 'POST',
      // la URL para la petición
      url: '/fitcoControl/Resources/PHP/Clientes/fetchClientData.php',
      // la información a enviar
      data: {clienteId: clienteId},

      // código a ejecutar si la petición es satisfactoria
      success: function(result){
        var rsp = JSON.parse(result);
        console.log(rsp);
        if (rsp.code == 1) {
          $('#mclt_id').val(rsp.response.pk_cliente);
          $('#mclt_cliente').val(rsp.response.nombreCliente);
          $('#mclt_ncontacto').val(rsp.response.nombreContacto);
          $('#mclt_correo').val(rsp.response.correoCliente);
          $('#mclt_telefono').val(rsp.response.telefonoCliente);
          $('#mclt_credito').val(rsp.response.creditoCliente);
          $('#mclt_fingreso').val(rsp.response.fingresoCliente);
          $('#mclt_color').val(rsp.response.colorCliente);
          $('#mclt_prendas').val(rsp.response.prendasCliente);
          $('#mclt_precio').val(rsp.response.precioPrenda);
          $('#mclt_nosotros').val(rsp.response.nosotrosCliente);
          $('#mclt_vendedor').val(rsp.response.vendedorCliente);

        } else {
          console.error("Hubo un error al jalar la informacion del cliente.");
          console.error(rsp.response);
        }
      },
      // código a ejecutar si la petición falla;
      error: function(exception){
        console.error(exception);
      }
    })
  });
  $('.ActualizarCliente').unbind();//EVITAMOS QUE SE DUPLIQUE NUESTRO SELECTOR
  $('.ActualizarCliente').click(function(){
    var idCliente = $('#mclt_id').val();
    var nombreCliente = $('#mclt_cliente').val();
    var nombreContacto = $('#mclt_ncontacto').val();
    var correoCliente = $('#mclt_correo').val();
    var telefonoCliente = $('#mclt_telefono').val();
    var creditoCliente = $('#mclt_credito').val();
    var fingresoCliente = $('#mclt_fingreso').val();
    var colorCliente = $('#mclt_color').val();
    var prendasCliente = $('#mclt_prendas').val();
    var mclt_precio = $('#mclt_precio').val();
    var nosotrosCliente = $('#mclt_nosotros').val();
    var vendedorCliente = $('#mclt_vendedor').val();

    $.ajax({
      method: 'POST',
      url: '/fitcoControl/Resources/PHP/Clientes/EditClientData.php',
      data: {
        mclt_id: idCliente,
        mclt_nombre: nombreCliente,
        mclt_ncontacto: nombreContacto,
        mclt_contacto: correoCliente,
        mclt_color: colorCliente,
        mclt_prendas: prendasCliente,
        mclt_precio: mclt_precio,
        mclt_fingreso: fingresoCliente,
        mclt_nosotros: nosotrosCliente,
        mclt_credito: creditoCliente,
        mclt_telefono: telefonoCliente,
        mclt_vendedor: vendedorCliente
      },
      success:function(result){
        console.log(result);
        if (result != 1) {
          alertify.error('NO SE MODIFICÓ NINGUN REGISTRO');
          $('#EditarCliente').modal('hide');
          $('#NuevoCliente').hide();
          $('.spanA').css('display', '');
          fetchClients();
        }else {
          alertify.success('SE MODIFICÓ CORRECTAMENTE');
          $('#EditarCliente').modal('hide');
          $('#NuevoCliente').hide();
          $('.spanA').css('display', '');
          fetchClients();
          // $('#CalendarioWeb').fullCalendar('refetchEvents');
        }
      },
      error:function(exception){
        console.error(exception)
      }
    });
  });

  $('.eliminarCliente').unbind();
  $('.eliminarCliente').click(function(){
    var clienteId = $(this).attr('client-id');
    swal({
    title: "Estas Seguro?",
    text: "Ya no se podra recuperar el registro!",
    type: "warning",
    showCancelButton: true,
    confirmButtonClass: "btn-danger",
    confirmButtonText: "Si, Eliminar",
    cancelButtonText: "No, cancelar",
    closeOnConfirm: false,
    closeOnCancel: false
  },
  function(isConfirm) {
    if (isConfirm) {
      $.ajax({
        method: 'POST',
        url: '/fitcoControl/Resources/PHP/Clientes/EliminarCliente.php',
        data: {clienteId: clienteId},

        success: function(result){
          console.log(result);
          if (result != 1) {
            alertify.error('NO SE PUDO ELIMINAR');
          }else if (result == 1){
            $('#NuevoCliente').hide();
            $('.spanA').css('display', '');
            fetchClients();
          }
        },
        error: function(exception){
          console.error(exception)
        }
      });
      swal("Eliminado!", "Se elimino correctamente.", "success");
    } else {
      swal("Cancelado", "El registro esta a salvo :)", "error");
    }
  });
});
}
