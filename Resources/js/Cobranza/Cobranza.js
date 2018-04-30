$(document).ready(function(){
  fetchCobranza();
  // fetchTablaCobranza();

  });

  //BUSCADOR TIEMPO REAL PARA CAMPO LISTA
  $('#npClientName').keyup(function(){
    var txt = $(this).val();
    if (txt == "") {
      $('#npClientList').fadeOut();
      return false;
    }

    $.ajax({
      method: 'POST',
      url: '/fitcoControl/Resources/PHP/Clientes/fetchPopupClientList.php',
      data:{txt: txt},
      success: function(result){
        rsp = JSON.parse(result);
        console.log(rsp);

        if (rsp.code != "1") {
          $('#npClientList').html("<p>Hubo un error al cargar la lista de clientes...</p>");
          console.warn("Error en el query: " + rsp.response);
        } else {
          $('#npClientList').html(rsp.response);

          $('#npClientList p').click(function(){
            var cid = $(this).attr('client-id');
            var nc = $(this).html();

            $('#npClientName').val(nc).html(nc).attr('client-id', cid);
            $('#npClientList').fadeOut();
          });
        }
        $('#npClientList').fadeIn();
        clientSelector();
      },
      error: function(exception){
        console.error(exception);
      }
    });
  });

  function clientSelector(){
    $('.client-item').click(function(){
      var clientId = $(this).attr('client-id');
      var clientName = $(this).find('span').html();

      $('#npClientName').attr('client-id', clientId);
      $('#npClientName').html(clientName).val(clientName);
      $('#npClientList').fadeOut();
    });
  }


  $('#NuevoRegistroCobranza').click(function(){
    var conceptoPago = $('#cbz_concepto').val();
    var facturaCobranza = $('#cbz_factura').val();
    var importeCobranza = $('#cbz_importe').val();
    var vencimientoCobranza = $('#cbz_dvencimiento').val();
    var fechaEntrega = $('#cbz_entrega').val();
    var fk_cliente = $('#npClientName').attr('client-id');

    validacion =
    $('#npClientName').val() == "" ||
    $('#cbz_concepto').val() == "" ||
    $('#cbz_factura').val() == "" ||
    $('#cbz_importe').val() == "" ||
    $('#cbz_entrega').val() == "" ||
    $('#cbz_dvencimiento').val() == "";


    if (validacion) {
      swal("NO PUEDE CONTINUAR","Nesesita llenar todos los campos","error");
    }else{
      $.ajax({
        method: 'POST',
        url: '/fitcoControl/Resources/PHP/Cobranza/AgregarCobranza.php',
        data:{
          cbz_concepto: conceptoPago,
          cbz_factura: facturaCobranza,
          cbz_importe: importeCobranza,
          cbz_dvencimiento: vencimientoCobranza,
          cbz_entrega: fechaEntrega,
          cbz_cliente: fk_cliente
        },
        success:function(result){
          var rsp = JSON.parse(result);
          if (rsp.code != 1) {
            swal("FALLO AL REGISTRAR","No se agregó el registro","error");
            console.error(rsp.response);
            $('#Agregarcobranza').hide();
            $('.spanA').css('display', '');
              fetchCobranza();
          } else{
            $('#Agregarcobranza')[0].reset();
            $('#Agregarcobranza').hide();
            $('.spanA').css('display', '');
              fetchCobranza();
            alertify.success('SE AGREGÓ CORRECTAMENTE');
          }
        },
        error:function(exception){
          console.error(exception)
        }
      })
    }
  });


function fetchCobranza(cobranza){
  $.ajax({
    url : '/fitcoControl/Resources/PHP/Cobranza/MostrarTesoreria.php',
    method: 'POST',
    data:{cobranza:cobranza},
  })
  .done(function(resultado){
    $('#mostrarCobranza').html(resultado);
    ActivarBotonesCobranza();
  })
}

$(document).on('keyup', '#busqueda', function(){
  var valorBusqueda = $(this).val();
  if (valorBusqueda!= "") {
    fetchCobranza(valorBusqueda);
  }else {
    fetchCobranza();
  }
});



function ActivarBotonesCobranza(){

  $('.agregarPago').unbind();
  $('.agregarPago').click(function(){
    var cobranzaId = $(this).attr('cobranza-id');
    $('#mpgo_id').val(cobranzaId);
    $('#PagoFacturas').modal('show');
  });

  //AGREGAR PAGOS MODAL
    $('.AgregarPgo').unbind();
    $('.AgregarPgo').click(function(){

      var fk_cobranza = $('#mpgo_id').val();
      var fechaPago = $('#mpgo_fpago').val();
      var importePago = $('#mpgo_importe').val();

      validacion =
      $('#mpgo_fpago').val() == "" ||
      $('#mpgo_importe').val() == "" ;

      if (validacion) {
          swal("NO PUEDE CONTINUAR","Necesita llenar todos los campos","error");
      }else {
        $.ajax({
          method: 'POST',
          url: '/fitcoControl/Resources/PHP/Pagos/AgregarPago.php',
          data: {
            mpgo_id: fk_cobranza,
            mpgo_fpago: fechaPago,
            mpgo_importe: importePago
          },
          success:function(result){
            var rsp = JSON.parse(result);
            if (rsp.code != 1) {
              swal("FALLO AL REGISTRAR","No se agregó el registro","error");
              console.error(rsp.response);
            } else {
              $('#PagoFacturas').modal('hide');
              alertify.success('SE AGREGÓ CORRECTAMENTE');
              fetchCobranza();
              // fetchTablaCobranza();
            }
          },
          error:function(exception){
            console.error(exception)
          }
        })
      }
    });



    //BUSCADOR TIEMPO REAL 2
    $('#mcbz_cliente').keyup(function(){
      var txt = $(this).val();
      if (txt == "") {
        $('#mcbz_ClientList').fadeOut();
        return false;
      }

      $.ajax({
        method: 'POST',
        url: '/fitcoControl/Resources/PHP/Clientes/fetchPopupClientList.php',
        data:{txt: txt},
        success: function(result){
          rsp = JSON.parse(result);
          console.log(rsp);

          if (rsp.code != "1") {
            $('#mcbz_ClientList').html("<p>Hubo un error al cargar la lista de clientes...</p>");
            console.warn("Error en el query: " + rsp.response);
          } else {
            $('#mcbz_ClientList').html(rsp.response);
            $('#mcbz_ClientList p').click(function(){
              var cid = $(this).attr('client-id');
              var nc = $(this).html();

              $('#mcbz_cliente').val(nc).html(nc).attr('client-id', cid);
              $('#mcbz_ClientList').fadeOut();
            });
          }
          $('#mcbz_ClientList').fadeIn();
          SelectorCliente();
        },
        error: function(exception){
          console.error(exception);
        }
      });
    });

    function SelectorCliente(){
      $('.client-item').click(function(){
        var clientId = $(this).attr('client-id');
        var clientName = $(this).find('span').html();

        $('#mcbz_cliente').attr('client-id', clientId);
        $('#mcbz_cliente').html(clientName).val(clientName);
        $('#mcbz_ClientList').fadeOut();
      });
    }


  //EDITAR COBRANZA EN MODAL
  $('.editarCobranza').unbind();
  $('.editarCobranza').click(function(){
    var cobranzaId = $(this).attr('cobranza-id');
    $.ajax({
      method:'POST',
      url:'/fitcoControl/Resources/PHP/Cobranza/fetchCobranData.php',
      data:{cobranzaId:cobranzaId},

      success: function(result){
        var rsp = JSON.parse(result);
        console.log(rsp);
        if (rsp.code == 1) {
          $('#mcbz_id').val(rsp.response.pk_cobranza);
          $('#mcbz_cliente').val(rsp.response.nombreCliente).attr('client-id', rsp.response.fk_cliente);
          $('#mcbz_concepto').val(rsp.response.conceptoPago);
          $('#mcbz_factura').val(rsp.response.facturaCobranza);
          $('#mcbz_entrega').val(rsp.response.fechaEntrega);
          $('#mcbz_importe').val(rsp.response.importeCobranza);
          $('#mcbz_vencimiento').val(rsp.response.vencimientoCobranza);
      }else {
        console.error("Hubo un error al jalar la informacion de cobranza.");
        console.error(rsp.response);
      }
    },
    error: function(exception){
      console.error(exception);
      }
    })
  });

  $('.ActualizarDcobranza').unbind();
  $('.ActualizarDcobranza').click(function(){
    var idCobranza = $('#mcbz_id').val();
    var fk_cliente = $('#mcbz_cliente').attr('client-id');
    var concepto = $('#mcbz_concepto').val();
    var facturaCobranza = $('#mcbz_factura').val();
    var importeCobranza = $('#mcbz_importe').val();
    var fechaEntrega = $('#mcbz_entrega').val();
    var vencimientoCobranza = $('#mcbz_vencimiento').val();

    validacion =
    $('#mcbz_cliente').val() == "" ||
    $('#mcbz_concepto').val() == "" ||
    $('#mcbz_factura').val() == "" ||
    $('#mcbz_importe').val() == "" ||
    $('#mcbz_entrega').val() == "" ||
    $('#mcbz_vencimiento').val() == "";

    if (validacion) {
      swal("NO PUEDE CONTINUAR","Nesesita llenar todos los campos","error");
    }else{
    $.ajax({
      method:'POST',
      url:'/fitcoControl/Resources/PHP/Cobranza/EditarDatosCobranza.php',
      data: {
        mcbz_id: idCobranza,
        mcbz_cliente: fk_cliente,
        mcbz_concepto: concepto,
        mcbz_factura: facturaCobranza,
        mcbz_importe: importeCobranza,
        mcbz_vencimiento: vencimientoCobranza,
        mcbz_fechaEntrega: fechaEntrega
      },
      success:function(result){
        var rsp = JSON.parse(result);
        console.log(rsp);
        if (result != 1) {
          alertify.error('NO SE MODIFICÓ NINGUN REGISTRO');
          $('#Agregarcobranza').hide();
          $('.spanA').css('display', '');
          $('#DetCobranza').modal('hide');
          $( "img" ).removeClass( "spand-iconp" ).addClass( "spand-icon");
          $('p').css('font-size','1.75rem');
          $('b').css('font-size','1.75rem');
          $('p').css('font-weight','500');
          fetchCobranza();
        }else {
          $('#Agregarcobranza').hide();
          $('.spanA').css('display', '');
          $('#DetCobranza').modal('hide');
          $( "img" ).removeClass( "spand-iconp" ).addClass( "spand-icon");
          $('p').css('font-size','1.75rem');
          $('b').css('font-size','1.75rem');
          $('p').css('font-weight','500');
          fetchCobranza();
          alertify.success('SE MODIFICÓ CORRECTAMENTE');
        }
      },
      error:function(exception){
        console.error(exception)
      }
    })
    }
  });

  $('.eliminarCobranza').unbind();
  $('.eliminarCobranza').click(function(){
    var cobranzaId = $(this).attr('cobranza-id');
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
        url: '/fitcoControl/Resources/PHP/Cobranza/EliminarCobranza.php',
        data: {cobranzaId: cobranzaId},

        success: function(result){
          console.log(result);
          if (result != 1) {
            alertify.error('NO SE PUDO ELIMINAR');
            $('#Agregarcobranza').hide();
            $('.spanA').css('display', '');
            fetchCobranza();
          }else if (result == 1){
            $('#Agregarcobranza').hide();
            $('.spanA').css('display', '');
            fetchCobranza();
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


//PAGOS

  $('.visualizarcobranza').click(function(){
    var cobranzaId = $(this).attr('cobranza-id');
    $.ajax({
      method: 'POST',
      url:'/fitcoControl/Resources/PHP/Pagos/TablaPagos.php',
      data:{cobranzaId:cobranzaId},
      success:function(result){
        var rsp = JSON.parse(result);
        console.log(rsp);
        $('#visualizarCobranza').html(rsp.infoTabla);
        ActivarBotonesCobranza();
      },
      error:function(exception){
        console.error(exception)
      }
    })
  });

  $('.editarPago').unbind();
  $('.editarPago').click(function(){
    var IdPagos = $(this).attr('pago-id');
    $.ajax({

      method: 'POST',
      url: '/fitcoControl/Resources/PHP/Pagos/fetchPagoData.php',
      data: {IdPagos: IdPagos},

      success: function(result){
        var rsp = JSON.parse(result);
        console.log(rsp);
        if (rsp.code == 1) {
          $('#pgo_id').val(rsp.response.pk_pagos);
          $('#pgo_fecha').val(rsp.response.fechaPago);
          $('#pgo_pagado').val(rsp.response.importePago);

        } else {
          console.error("Hubo un error al jalar la informacion del cliente.");
          console.error(rsp.response);
        }
      },
      error: function(exception){
        console.error(exception);
      }
    })
  });

  $('.ActualizarPago').unbind();//EVITAMOS QUE SE DUPLIQUE NUESTRO SELECTOR
  $('.ActualizarPago').click(function(){
    var id = $('#pgo_id').val();
    var ff = $('#pgo_fecha').val();
    var pp = $('#pgo_pagado').val();

    $.ajax({
      method: 'POST',
      url: '/fitcoControl/Resources/PHP/Pagos/EditarModalPagos.php',
      data: {
        id: id,
        ff: ff,
        pp: pp
      },
      success:function(result){
        console.log(result);
        if (result != 1) {
          alertify.error('NO SE MODIFICÓ NINGUN REGISTRO');
          $('#EdPago').modal('hide');
          $('#VisualizarTablaCobranza').modal('hide');
          fetchCobranza();
          // fetchTablaCobranza();
        }else {
          $('#EdPago').modal('hide');
          $('#VisualizarTablaCobranza').modal('hide');
          fetchCobranza();
          // fetchTablaCobranza();
          alertify.success('SE MODIFICÓ CORRECTAMENTE');
        }
      },
      error:function(exception){
        console.error(exception)
      }
    });
  });

  $('.eliminarPago').unbind();
  $('.eliminarPago').click(function(){
    var IdPagos = $(this).attr('pago-id');
    $.ajax({
      method: 'POST',
      url: '/fitcoControl/Resources/PHP/Pagos/EliminarModalPagos.php',
      data: {IdPagos: IdPagos},

      success: function(result){
        console.log(result);
        if (result != 1) {
          alertify.error('NO SE PUDO ELIMINAR');
        }else {
          alertify.success('SE ELIMINO REGISTRO');
        }
      },
      error: function(exception){
        console.error(exception)
      }
    });
  });
}
