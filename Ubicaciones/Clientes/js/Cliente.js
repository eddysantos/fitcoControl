$(document).ready(function(){
  // fetchClients();
  mostrarClientes();



  $('#agregar').click(function(){
    var data = {
      nombreCliente : $('#clt_nombre').val(),
      nombreContacto : $('#clt_ncontacto').val(),
      correoCliente : $('#clt_contacto').val(),
      telefonoCliente : $('#clt_telefono').val(),
      creditoCliente : $('#clt_credito').val(),
      fingresoCliente : $('#clt_fingreso').val(),
      colorCliente : $('#clt_color').val(),
      prendasCliente : $('#clt_prendas').val(),
      precioPrenda : $('#clt_precio').val(),
      nosotrosCliente : $('#clt_nosotros').val(),
      vendedorCliente : $('#clt_vendedor').val()
    }


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
      swal("NO PUEDE CONTINUAR","Necesita llenar todos los campos","error");
    }else {
      $.ajax({
        type: "POST",
        url: "actions/agregar.php",
        data: data,
        success: 	function(r){
          r = JSON.parse(r);
          console.log(r);
          if (r.code == 1) {
            alertify.success('SE AGREGÓ CORRECTAMENTE');
            mostrarClientes();
          } else {
            swal("FALLO AL REGISTRAR","No se agregó el registro","error");
            console.error(r.message);
            mostrarClientes();
          }
        }
      });
    }
  });



  $('tbody').on('click', '.EditCliente', function(){
    var dbid = $(this).attr('db-id');
    var tar_modal = $($(this).attr('href'));

    var fetch_empleado = $.ajax({
      method: 'POST',
      data: {dbid: dbid},
      url: 'actions/fetch.php'
    });

    fetch_empleado.done(function(r){
      r = JSON.parse(r);

      if (r.code == 1) {

      console.log(r.data);
      for (var key in r.data) {

        if (r.data.hasOwnProperty(key)) {
          var iterated_element = $('#' + key);
          var element_type = iterated_element.prop('nodeName');
          var dbid = iterated_element.attr('db-id');
          var value = r.data[key];

          iterated_element.val(value).addClass('tiene-contenido');
          if (typeof dbid !== undefined && dbid !== false) {
            iterated_element.attr('db-id', value)
          }
        }
      }
      tar_modal.modal('show');
      } else {
        console.error(r);
      }
    })
  })

  $('.ActualizarCliente').click(function(){
     validacion = $('#nombreCliente').val() == "" ||
               $('#nombreContacto').val() == "" ||
               $('#correoCliente').val() == "" ||
               $('#telefonoCliente').val() == "" ||
               $('#creditoCliente').val() == "" ||
               $('#fingresoCliente').val() == "" ||
               $('#colorCliente').val() == "" ||
               $('#prendasCliente').val() == "" ||
               $('#precioPrenda').val() == "" ||
               $('#nosotrosCliente').val() == "" ||
               $('#vendedorCliente').val() == "";

    var data = {
      pk_cliente : $('#pk_cliente').attr('db-id'),
      nombreCliente : $('#nombreCliente').val(),
      nombreContacto : $('#nombreContacto').val(),
      correoCliente : $('#correoCliente').val(),
      telefonoCliente : $('#telefonoCliente').val(),
      creditoCliente : $('#creditoCliente').val(),
      fingresoCliente : $('#fingresoCliente').val(),
      colorCliente : $('#colorCliente').val(),
      prendasCliente : $('#prendasCliente').val(),
      precioPrenda : $('#precioPrenda').val(),
      nosotrosCliente : $('#nosotrosCliente').val(),
      vendedorCliente : $('#vendedorCliente').val(),
    }


    if (validacion) {
      swal("Error","Todos los campos son obligatorios, si no tiene la información puede llenar con cero","error");
    }else{
      var ajaxCall = $.ajax({
          method: 'POST',
          data: data,
          url: 'actions/editar.php'
      });

      ajaxCall.done(function(r) {
        r = JSON.parse(r);
        if (r.code == 1) {
          mostrarClientes();
          swal("Exito", "Se actualizo.", "success");
          $('.modal').modal('hide');
        } else {
          console.error(r.message);
        }
      });
    }
  })

});

  // $('#NuevoRegistro').click(function(){
  //   var nombreCliente = $('#clt_nombre').val();
  //   var nombreContacto = $('#clt_ncontacto').val();
  //   var correoCliente = $('#clt_contacto').val();
  //   var telefonoCliente = $('#clt_telefono').val();
  //   var creditoCliente = $('#clt_credito').val();
  //   var fingresoCliente = $('#clt_fingreso').val();
  //   var colorCliente = $('#clt_color').val();
  //   var prendasCliente = $('#clt_prendas').val();
  //   var precioPrenda = $('#clt_precio').val();
  //   var nosotrosCliente = $('#clt_nosotros').val();
  //   var vendedorCliente = $('#clt_vendedor').val();
  //
  //   validacion = $('#clt_nombre').val() == "" ||
  //   $('#clt_contacto').val() == "" ||
  //   $('#clt_telefono').val() == "" ||
  //   $('#clt_credito').val() == "" ||
  //   $('#clt_fingreso').val() == "" ||
  //   $('#clt_color').val() == "" ||
  //   $('#clt_prendas').val() == ""||
  //   $('#clt_precio').val() == ""||
  //   $('#clt_nosotros').val() == "";
  //
  //   if (validacion) {
  //     swal("NO PUEDE CONTINUAR","Nesesita llenar todos los campos","error");
  //   }else {
  //     $.ajax({
  //       method: 'POST',
  //       url: 'actions/AgregarClientes.php',
  //       data: {
  //         clt_nombre: nombreCliente,
  //         clt_ncontacto: nombreContacto,
  //         clt_contacto: correoCliente,
  //         clt_color: colorCliente,
  //         clt_prendas: prendasCliente,
  //         clt_precio: precioPrenda,
  //         clt_fingreso: fingresoCliente,
  //         clt_nosotros: nosotrosCliente,
  //         clt_credito: creditoCliente,
  //         clt_telefono: telefonoCliente,
  //         clt_vendedor: vendedorCliente
  //       },
  //       success:function(result){
  //         var rsp = JSON.parse(result);
  //         if (rsp.code != 1) {
  //           swal("FALLO AL REGISTRAR","No se agregó el registro","error");
  //           console.error(rsp.response);
  //           fetchClients();
  //         } else {
  //           alertify.success('SE AGREGÓ CORRECTAMENTE');
  //           $('#NuevoCliente')[0].reset();
  //           $('#NuevoCliente').hide();
  //           $('.spanA').css('display', '');
  //           fetchClients();
  //         }
  //       },
  //       error:function(exception){
  //         console.error(exception)
  //       }
  //     })
  //   }
  // });



//Muestra los registros en pantalla y los valores buscados
// function fetchClients(clientes){
//   $.ajax({
//     url:'actions/mostrar.php',
//     method: 'POST',
//     data:{clientes:clientes},
//   })
//   .done(function(resultado){
//     $('#mostrarClientes').html(resultado);
//     ActivarBotones();
//   })
// }



function mostrarClientes(){
  var ajaxCall = $.ajax({
      method: 'POST',
      url: 'actions/mostrar.php'
  });

  ajaxCall.done(function(r) {
    r = JSON.parse(r);
    if (r.code == 1) {
      $('#tablaClientes').html(r.data);
      Eliminar();
    } else {
      console.error(r.message);
    }
  });
}



// $(document).on('keyup', '#busqueda', function(){
//   var valorBusqueda = $(this).val();
//   if (valorBusqueda!= "") {
//     fetchClients(valorBusqueda);
//   }else {
//     fetchClients();
//   }
// });




function Eliminar(){
  $('.eliminarCliente').click(function(){
    var pk_cliente = $(this).attr('db-id');
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
          url: 'actions/eliminar.php',
          data: {pk_cliente: pk_cliente},
          success: function(r){
            mostrarClientes()
          },
          error: function(exception){
            console.error(exception)
            alertify.error('NO SE PUDO ELIMINAR');
            mostrarClientes();
          }
        });
        swal("Eliminado!", "Se elimino correctamente.", "success");
        mostrarClientes();
        $('#NuevoCliente').hide();
        $('#Eclientes').animate({"right": "4%"}, "slow");
      } else {
        swal("Cancelado", "El registro esta a salvo :)", "error");
        mostrarClientes();
        $('#NuevoCliente').hide();
        $('#Eclientes').animate({"right": "4%"}, "slow");
        $('.spanA').css('display', '');
      }
    });
  });
  // Asociar un evento al botón que muestra la ventana modal
  // $('.EditCliente').unbind(); // EVITAMOS QUE SE DUPLIQUE NUESTRO SELECTOR
  // $('.EditCliente').click(function(){
  //   var clienteId = $(this).attr('client-id');
  //   $.ajax({
  //
  //     // especifica si será una petición POST o GET
  //     method: 'POST',
  //     // la URL para la petición
  //     url: 'actions/fetchClientData.php',
  //     // la información a enviar
  //     data: {clienteId: clienteId},
  //
  //     // código a ejecutar si la petición es satisfactoria
  //     success: function(result){
  //       var rsp = JSON.parse(result);
  //       console.log(rsp);
  //       if (rsp.code == 1) {
  //         $('#mclt_id').val(rsp.response.pk_cliente);
  //         $('#mclt_cliente').val(rsp.response.nombreCliente);
  //         $('#mclt_ncontacto').val(rsp.response.nombreContacto);
  //         $('#mclt_correo').val(rsp.response.correoCliente);
  //         $('#mclt_telefono').val(rsp.response.telefonoCliente);
  //         $('#mclt_credito').val(rsp.response.creditoCliente);
  //         $('#mclt_fingreso').val(rsp.response.fingresoCliente);
  //         $('#mclt_color').val(rsp.response.colorCliente);
  //         $('#mclt_prendas').val(rsp.response.prendasCliente);
  //         $('#mclt_precio').val(rsp.response.precioPrenda);
  //         $('#mclt_nosotros').val(rsp.response.nosotrosCliente);
  //         $('#mclt_vendedor').val(rsp.response.vendedorCliente);
  //
  //       } else {
  //         console.error("Hubo un error al jalar la informacion del cliente.");
  //         console.error(rsp.response);
  //       }
  //     },
  //     // código a ejecutar si la petición falla;
  //     error: function(exception){
  //       console.error(exception);
  //     }
  //   })
  // });





  // $('.ActualizarCliente').unbind();//EVITAMOS QUE SE DUPLIQUE NUESTRO SELECTOR
  // $('.ActualizarCliente').click(function(){
  //   var idCliente = $('#mclt_id').val();
  //   var nombreCliente = $('#mclt_cliente').val();
  //   var nombreContacto = $('#mclt_ncontacto').val();
  //   var correoCliente = $('#mclt_correo').val();
  //   var telefonoCliente = $('#mclt_telefono').val();
  //   var creditoCliente = $('#mclt_credito').val();
  //   var fingresoCliente = $('#mclt_fingreso').val();
  //   var colorCliente = $('#mclt_color').val();
  //   var prendasCliente = $('#mclt_prendas').val();
  //   var mclt_precio = $('#mclt_precio').val();
  //   var nosotrosCliente = $('#mclt_nosotros').val();
  //   var vendedorCliente = $('#mclt_vendedor').val();
  //
  //   $.ajax({
  //     method: 'POST',
  //     url: 'actions/EditClientData.php',
  //     data: {
  //       mclt_id: idCliente,
  //       mclt_nombre: nombreCliente,
  //       mclt_ncontacto: nombreContacto,
  //       mclt_contacto: correoCliente,
  //       mclt_color: colorCliente,
  //       mclt_prendas: prendasCliente,
  //       mclt_precio: mclt_precio,
  //       mclt_fingreso: fingresoCliente,
  //       mclt_nosotros: nosotrosCliente,
  //       mclt_credito: creditoCliente,
  //       mclt_telefono: telefonoCliente,
  //       mclt_vendedor: vendedorCliente
  //     },
  //     success:function(result){
  //       console.log(result);
  //       if (result != 1) {
  //         alertify.error('NO SE MODIFICÓ NINGUN REGISTRO');
  //         $('#EditarCliente').modal('hide');
  //         $('#NuevoCliente').hide();
  //         $('.spanA').css('display', '');
  //         fetchClients();
  //       }else {
  //         alertify.success('SE MODIFICÓ CORRECTAMENTE');
  //         $('#EditarCliente').modal('hide');
  //         $('#NuevoCliente').hide();
  //         $('.spanA').css('display', '');
  //         fetchClients();
  //         // $('#CalendarioWeb').fullCalendar('refetchEvents');
  //       }
  //     },
  //     error:function(exception){
  //       console.error(exception)
  //     }
  //   });
  // });
//
//   $('.eliminarCliente').unbind();
//   $('.eliminarCliente').click(function(){
//     var dbId = $(this).attr('db-id');
//     swal({
//     title: "Estas Seguro?",
//     text: "Ya no se podra recuperar el registro!",
//     type: "warning",
//     showCancelButton: true,
//     confirmButtonClass: "btn-danger",
//     confirmButtonText: "Si, Eliminar",
//     cancelButtonText: "No, cancelar",
//     closeOnConfirm: false,
//     closeOnCancel: false
//   },
//   function(isConfirm) {
//     if (isConfirm) {
//       $.ajax({
//         method: 'POST',
//         url: 'actions/EliminarCliente.php',
//         data: {dbId: dbId},
//
//         success: function(r){
//           console.log(r);
//           if (r.code == 1) {
//             $('#NuevoCliente').hide();
//             $('.spanA').css('display', '');
//             mostrarClientes();
//           }else {
//             alertify.error('NO SE PUDO ELIMINAR');
//             console.error(r.message);
//           }
//         },
//         error: function(x){
//           console.error(x)
//         }
//       });
//       swal("Eliminado!", "Se elimino correctamente.", "success");
//     } else {
//       swal("Cancelado", "El registro esta a salvo :)", "error");
//     }
//   });
// });


  // $('.eliminarCliente').click(function(){
  //   var dbid = $(this).attr('db-id');
  //   swal({
  //     title: "Estas Seguro?",
  //     text: "Ya no se podra recuperar el registro!",
  //     type: "warning",
  //     showCancelButton: true,
  //     confirmButtonClass: "btn-danger",
  //     confirmButtonText: "Si, Eliminar",
  //     cancelButtonText: "No, cancelar",
  //     closeOnConfirm: false,
  //     closeOnCancel: false
  //   },
  //   function(isConfirm) {
  //     if (isConfirm) {
  //       $.ajax({
  //         method: 'POST',
  //         url: 'actions/EliminarCliente.php',
  //         data: {dbid: dbid},
  //         success: function(r){
  //           mostrarClientes();
  //         },
  //         error: function(exception){
  //           console.error(exception)
  //           alertify.error('NO SE PUDO ELIMINAR');
  //           mostrarClientes();
  //         }
  //       });
  //       swal("Eliminado!", "Se elimino correctamente.", "success");
  //       mostrarClientes();
  //     } else {
  //       swal("Cancelado", "El registro esta a salvo :)", "error");
  //       mostrarClientes();
  //     }
  //   });
  // });
}
