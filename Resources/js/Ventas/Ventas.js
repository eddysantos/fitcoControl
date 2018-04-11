$(document).ready(function(){
fetchVentas();

});

//MOSTRAR LOS REGISTROS EN PANTALLA BUSCADOR TIEMPO REAL
function fetchVentas(ventas){
  $.ajax({
    url:'/fitcoControl/Resources/PHP/Ventas/MostrarTablaVentas.php',
    method: 'POST',
    data:{ventas:ventas},
  })
  .done(function(resultado){
    $('#mostrarVentas').html(resultado);
    ActivarBotonesVentas();
  })
}

$(document).on('keyup', '#busquedaVenta', function(){
  var valorBusqueda = $(this).val();
  if (valorBusqueda!= "") {
    fetchVentas(valorBusqueda);
  }else {
    fetchVentas();
  }
});

  $('#NuevoRegistroVentas').click(function(){

    var cliente = $('#vts_nombreCliente').val();
    var vendedor = $('#vts_vendedor').val();
    var nprendas = $('#vts_nprendas').val();
    var precio = $('#vts_precio').val();
    var acuerdo = $('#vts_Apago').val();
    var fingreso = $('#vts_fingreso').val();
    var fbaja = $('#vts_fbaja').val();


    validacion =
    $('#vts_nombreCliente').val() == "" ||
    $('#vts_vendedor').val() == "" ||
    $('#vts_nprendas').val() == "" ||
    $('#vts_precio').val() == "" ||
    $('#vts_Apago').val() == "" ||
    $('#vts_fingreso').val() == "";

    if (validacion) {
      swal("NO PUEDE CONTINUAR","Necesita llenar todos los campos","error");
    }else {
      $.ajax({
        method: 'POST',
        url: '/fitcoControl/Resources/PHP/Ventas/AgregarVenta.php',
        data: {
          cliente:cliente,
          vendedor:vendedor,
          nprendas:nprendas,
          precio:precio,
          acuerdo:acuerdo,
          fingreso:fingreso,
          fbaja:fbaja
        },
        success:function(result){
          var rsp = JSON.parse(result);
          if (rsp.code != 1) {
            swal("FALLO AL REGISTRAR","No se agregó el registro","error");
            console.error(rsp.response);
            $('#NuevaVenta').hide();
            $('.spanV').css('display', '');
            fetchVentas();
          } else {
            $('#NuevoVenta')[0].reset();
            $('#NuevaVenta').hide();
            $('.spanV').css('display', '');
            fetchVentas();
            alertify.success('SE AGREGÓ CORRECTAMENTE');
          }
        },
        error:function(exception){
          console.error(exception)
        }
      })
    }
  });

function ActivarBotonesVentas(){

  //PARA VISUALIZAR DATOS EN EL MODAL//
  $('.EditVentas').unbind();
  $('.EditVentas').click(function(){
    var ventasId = $(this).attr('ventas-id');

    $.ajax({
      method: 'POST',
      url: '/fitcoControl/Resources/PHP/Ventas/fetchVentaData.php',
      data: {ventasId: ventasId},

      success: function(result){
        var rsp = JSON.parse(result);
        console.log(rsp);
        if (rsp.code == 1) {
          $('#mvts_id').val(rsp.response.pk_ventas);
          $('#mvts_nombreCliente').val(rsp.response.nombreCliente);
          $('#mvts_vendedor').val(rsp.response.nombreVendedor);
          $('#mvts_nprendas').val(rsp.response.numeroPrendas);
          $('#mvts_precio').val(rsp.response.precioXprenda);
          $('#mvts_Apago').val(rsp.response.acuerdoPago);
          $('#mvts_fingreso').val(rsp.response.fechaIngreso);
          $('#mvts_fbaja').val(rsp.response.fechaBaja);
        }else {
          console.error("Hubo un error al jalar la informacion del usuario.");
          console.error(rsp.response);
        }
      },
      error: function(exception){
        console.error(exception);
      }
    })
  });

  $('.ActualizarVenta').unbind();
  $('.ActualizarVenta').click(function(){
    var idVentas = $('#mvts_id').val();
    var nombreCliente = $('#mvts_nombreCliente').val();
    var vendedor = $('#mvts_vendedor').val();
    var prendas = $('#mvts_nprendas').val();
    var precio = $('#mvts_precio').val();
    var pago = $('#mvts_Apago').val();
    var fingreso = $('#mvts_fingreso').val();
    var fbaja = $('#mvts_fbaja').val();

    $.ajax({
      method: 'POST',
      url: '/fitcoControl/Resources/PHP/Ventas/EditVenta.php',
      data: {
        idVentas: idVentas,
        nombreCliente: nombreCliente,
        vendedor: vendedor,
        prendas: prendas,
        precio: precio,
        pago: pago,
        fingreso: fingreso,
        fbaja: fbaja
      },
      success:function(result){
        if (result != 1) {
          alertify.error('NO SE MODIFICÓ NINGUN REGISTRO');
          $('#EditarVentas').modal('hide');
          $('#NuevaVenta').hide();
          $('.spanV').css('display', '');
          fetchVentas();
        }else {
          $('#EditarVentas').modal('hide');
          $('#NuevaVenta').hide();
          $('.spanV').css('display', '');
          fetchVentas();
          alertify.success('SE MODIFICÓ CORRECTAMENTE');
        }
      },
      error:function(exception){
        console.error(exception)
      }
    });
  });


  $('.EliminarVenta').unbind();
  $('.EliminarVenta').click(function(){
    var ventasId = $(this).attr('ventas-id');
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
        url: '/fitcoControl/Resources/PHP/Ventas/EliminarVenta.php',
        data: {ventasId: ventasId},

        success: function(result){
          console.log(result);
          if (result != 1) {
            alertify.error('NO SE PUDO ELIMINAR');
          }else if (result == 1){
            fetchVentas();
          }
        },
        error: function(exception){
          console.error(exception)
        }
      });
      swal("Eliminado!", "Se elimino correctamente.", "success");
      $('#NuevaVenta').hide();
      $('.spanV').css('display', '');
      fetchVentas();
    } else {
      swal("Cancelado", "El registro esta a salvo :)", "error");
      $('#NuevaVenta').hide();
      $('.spanV').css('display', '');
      fetchVentas();
    }
  });
});
}
