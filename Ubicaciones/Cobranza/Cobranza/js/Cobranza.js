$(document).ready(function(){
  fetchCobranza();
  Reporte();


  $(':input#cob_cli').change(function(){
  var value = $(this).val();

    $.ajax({
      url: 'Cobranza/actions/reporte.php',
      method: 'POST',
      data: {request:value},
      success: function(r){
        r = JSON.parse(r);
        if (r.code == 1) {
          $('#mostrarReporte').html(r.data);
        } else {
          console.error(r.message);
        }
      }
    });
  });


  $(function(){
    data = {
      period: $('#cob_periodo').val(),
      date_from: $('#dates_cob_chart').find('.date-from').val(),
      date_to: $('#dates_cob_chart').find('.date-to').val(),
    };

    var pull_chart = $.ajax({
      method: 'POST',
      data: data,
      url: 'Cobranza/actions/grafica.php'
    });

    pull_chart.done(function(r){
      r = JSON.parse(r);
      console.log(r);
      if (r.code == '2') {
        r.to_chart = {};
      }

      cob_chart = c3.generate({
        bindto: '#g-cobranza',
        data:{
          x: "x",
          columns: r.to_chart,
          labels: true,
        },
        axis: {
          x: {
            type: 'category',
            tick: {
              format: '%Y-%m-%d',
            }
          }
        },
      });
    });
  });

  $('.reload-chart').click(function(){
    data = {
      period: $('#cob_periodo').val(),
      date_from: $('#dates_cob_chart').find('.date-from').val(),
      date_to: $('#dates_cob_chart').find('.date-to').val(),
    };

    var pull_chart = $.ajax({
      method: 'POST',
      data: data,
      url: 'Cobranza/actions/grafica.php'
    });

    pull_chart.done(function(r){
      r = JSON.parse(r);
      console.log(r);
      if (r.code == '2') {
        r.to_chart = {};
        swal("NO HAY REGISTROS","verifica el rango de fecha seleccionado","error");
      }
      cob_chart.load({columns: r.to_chart});
    });
  });
}); // TERMINO DE DOCUMENTO

$('#NuevoRegistroCobranza').click(function(){
  var data = {
    conceptoPago: $('#cbz_concepto').val(),
    facturaCobranza : $('#cbz_factura').val(),
    importeCobranza : $('#cbz_importe').val(),
    vencimientoCobranza : $('#cbz_dvencimiento').val(),
    fechaEntrega : $('#cbz_entrega').val(),
    fk_cliente : $('#npClientName').attr('db-id')
  }

  validacion =
  $('#npClientName').val() == "" ||
  $('#cbz_concepto').val() == "" ||
  $('#cbz_factura').val() == "" ||
  $('#cbz_importe').val() == "" ||
  $('#cbz_entrega').val() == "" ||
  $('#cbz_dvencimiento').val() == "";

  if (validacion) {
    swal("Error","Todos los campos son obligatorios","error");
  }else {
    var ajaxCall = $.ajax({
        method: 'POST',
        data: data,
        url: 'Cobranza/actions/agregar.php'
    });

    ajaxCall.done(function(r) {
      r = JSON.parse(r);
      if (r.code == 1) {
        $('#Agregarcobranza')[0].reset();
        // $('#Agregarcobranza').hide();
        $('.spanA').css('display', '');
        fetchCobranza();
        alertify.success('SE AGREGÓ CORRECTAMENTE');
      } else {
        swal("FALLO AL REGISTRAR","No se agregó el registro","error");
        console.error(rsp.response);
        // $('#Agregarcobranza').hide();
        $('.spanA').css('display', '');
          fetchCobranza();
        console.error(r.message);
      }
    });
  }
});


function fetchCobranza(){
  var ajaxCall = $.ajax({
      method: 'POST',
      url : 'Cobranza/actions/mostrar.php'
  });

  ajaxCall.done(function(r) {
    r = JSON.parse(r);
    if (r.code == 1) {
      $('#mostrarCobranza').html(r.data);
      Cobranza();
      comentarios();
      Pagos();
    } else {
      console.error(r.message);
    }
  });
}


function Reporte(){
  var ajaxCall = $.ajax({
      method: 'POST',
      url : 'Cobranza/actions/reporte.php'
  });

  ajaxCall.done(function(r) {
    r = JSON.parse(r);
    if (r.code == 1) {
      $('#mostrarReporte').html(r.data);
    } else {
      console.error(r.message);
    }
  });
}



function Cobranza(){

  //EDITAR COBRANZA EN MODAL
$('tbody').on('click', '.editarCobranza', function(){
    var dbid = $(this).attr('db-id');
    var tar_modal = $($(this).attr('href'));

    var fetch_cobranza = $.ajax({
      method: 'POST',
      data: {dbid: dbid},
      url: 'Cobranza/actions/fetch.php'
    });

    fetch_cobranza.done(function(r){
      r = JSON.parse(r);

      if (r.code == 1) {

      console.log(r.data);
      for (var key in r.data) {

        if (r.data.hasOwnProperty(key)) {
          var iterated_element = $('#' + key);
          var element_type = iterated_element.prop('nodeName');
          var dbid = iterated_element.attr('db-id');
          var value = r.data[key];

          iterated_element.val(value).addClass('has-content');
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


  $('.ActualizarDcobranza').click(function(){
    var data = {
      pk_cobranza : $('#pk_cobranza').val(),
      nombreCliente: $('#pk_cliente').val(),
      conceptoPago : $('#conceptoPago').val(),
      facturaCobranza : $('#facturaCobranza').val(),
      importeCobranza : $('#importeCobranza').val(),
      fechaEntrega : $('#fechaEntrega').val(),
      vencimientoCobranza : $('#vencimientoCobranza').val()
    }

    validar = $('#nombreCliente').val() == "" ||
    $('#conceptoPago').val() == "" ||
    $('#facturaCobranza').val() == "" ||
    $('#importeCobranza').val() == "" ||
    $('#fechaEntrega').val() == "" ||
    $('#vencimientoCobranza').val() == "";


    if (validar) {
      swal("Error","Todos los campos son obligatorios","error");
    }else{

      var ajaxCall = $.ajax({
          method: 'POST',
          data: data,
          url: '/fitcoControl/Ubicaciones/Cobranza/Cobranza/actions/editar.php'
      });

      ajaxCall.done(function(r) {
        r = JSON.parse(r);
        if (r.code == 1) {
          alertify.success('SE MODIFICÓ CORRECTAMENTE');
          $('.modal').modal('hide');
          $('#Agregarcobranza').hide();
          $('.spanA').css('display', '');
          $( "img" ).removeClass( "spand-iconp" ).addClass( "spand-icon");
          $('p').css('font-size','1.75rem').css('font-weight','500');
          $('b').css('font-size','1.75rem');
          fetchCobranza();
        } else {
          alertify.error('NO SE MODIFICÓ NINGUN REGISTRO');
          $('#Agregarcobranza').hide();
          $('.spanA').css('display', '');
          $('.modal').modal('hide');
          $( "img" ).removeClass( "spand-iconp" ).addClass( "spand-icon");
          $('p').css('font-size','1.75rem').css('font-weight','500');
          $('b').css('font-size','1.75rem');
          fetchCobranza();
          console.error(r.message);
        }
      });
    }
  })

  $('.eliminarCobranza').click(function(){
    var pk_cobranza = $(this).attr('db-id');
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
          url: 'Cobranza/actions/eliminar.php',
          data: {pk_cobranza: pk_cobranza},
          success: function(r){
            fetchCobranza();
          },
          error: function(exception){
            console.error(exception)
            alertify.error('NO SE PUDO ELIMINAR');
            fetchCobranza();
          }
        });
        swal("Eliminado!", "Se elimino correctamente.", "success");
        fetchCobranza();
        // $('#NuevaVenta').hide();
      } else {
        swal("Cancelado", "El registro esta a salvo :)", "error");
        fetchCobranza();
        // $('#NuevaVenta').hide();
        $('.spanV').css('display', '');
      }
    });
  });
}

function comentarios(){
  $('.comentCobranza').click(function(){
    var dbid = $(this).attr('db-id');
    $('#com_id').val(dbid);
    $('#coment').modal('show');

    var ajaxCall = $.ajax({
        method: 'POST',
        data:{dbid:dbid},
        url: '/fitcoControl/Ubicaciones/Cobranza/Comentarios/actions/mostrar.php'
    });

    ajaxCall.done(function(r) {
      r = JSON.parse(r);
      if (r.code == 1) {
        $('#comentariosCobranza').html(r.data);
        // comentarios();
      } else {
        console.error(r.message);
      }
    });
  });

  $('.comCobranza').unbind();
  $('.comCobranza').click(function(){
    var data = {
      fk_com: $('#com_id').val(),
      fecha: $('#com_fecha').val(),
      comentario: $('#com_comentario').val()
    }

    validacion = $('#com_fecha').val() == "" ||
    $('#com_comentario').val() == "" ;


    if (validacion) {
      swal("NO PUEDE CONTINUAR","Necesita llenar todos los campos","error");
    }else {
      var ajaxCall = $.ajax({
          method: 'POST',
          data: data,
          url: '/fitcoControl/Ubicaciones/Cobranza/Comentarios/actions/agregar.php'
      });

      ajaxCall.done(function(r) {
        r = JSON.parse(r);
        if (r.code == 1) {
          swal("Exito", "Se guardo correctamente.", "success");

        } else {
          console.error(r.message);
        }
      });
    }
  });

  $('.editarComen').unbind();
  $('tbody').on('click', '.editarComen', function(){
    var dbid = $(this).attr('db-id');
    var tar_modal = $($(this).attr('href'));

    var fetch_comentario = $.ajax({
      method: 'POST',
      data: {dbid: dbid},
      url: '/fitcoControl/Ubicaciones/Cobranza/Comentarios/actions/fetch.php'
    });

    fetch_comentario.done(function(r){
      r = JSON.parse(r);

      if (r.code == 1) {

      console.log(r.data);
      for (var key in r.data) {

        if (r.data.hasOwnProperty(key)) {
          var iterated_element = $('#' + key);
          var element_type = iterated_element.prop('nodeName');
          var dbid = iterated_element.attr('db-id');
          var value = r.data[key];

          iterated_element.val(value).addClass('has-content');
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

$('.actualizarComentario').unbind();
$('.actualizarComentario').click(function(){
  var data = {
    pk_coment: $('#pk_coment').attr('db-id'),
    fecha: $('#fecha').val(),
    comentario: $('#comentario').val(),
  }
  validar = $('#fecha').val() == "" ||
            $('#comentario').val() == "";


  if (validar) {
    swal("Error","Todos los campos son obligatorios","error");
  }else{

    var ajaxCall = $.ajax({
        method: 'POST',
        data: data,
        url: 'Comentarios/actions/editar.php'
    });

    ajaxCall.done(function(r) {
      r = JSON.parse(r);
      if (r.code == 1) {
        comentarios();
        swal("Exito", "Se actualizo.", "success");
        $('.modal').modal('hide');
      } else {
        console.error(r.message);
      }
    });
  }
})

  // $('.actualizarComentario').unbind();
  // $('.actualizarComentario').click(function(){
  //   var data = {
  //     pk_coment: $('#pk_coment').attr('db-id'),
  //     fecha: $('#fecha').val(),
  //     comentario: $('#comentario').val()
  //   }
  //
  //   validar = $('#fecha').val() == "" ||
  //             $('#comentario').val() == "";
  //
  //
  //   if (validar) {
  //     swal("Error","Todos los campos son obligatorios","error");
  //   }else{
  //
  //     var ajaxCall = $.ajax({
  //         method: 'POST',
  //         data: data,
  //         url: 'Comentarios/actions/editar.php'
  //     });
  //
  //     ajaxCall.done(function(r) {
  //       r = JSON.parse(r);
  //       if (r.code == 1) {
  //         comentarios();
  //         swal("Exito", "Se actualizo.", "success");
  //         $('.modal').modal('hide');
  //       } else {
  //         console.error(r.message);
  //       }
  //     });
  //   }
  // })
}//Fin de comentarios


function Pagos(){
  $('.agregarPago').click(function(){
    var dbid = $(this).attr('db-id');
    $('#mpgo_id').val(dbid);
    $('#PagoFacturas').modal('show');

    var ajaxCall = $.ajax({
        method: 'POST',
        data:{dbid:dbid},
        url: 'Pagos/actions/mostrar.php'
    });

    ajaxCall.done(function(r) {
      r = JSON.parse(r);
      if (r.code == 1) {
        $('#mostrarPagos').html(r.data);
        // botonesPagos();
      } else {
        console.error(r.message);
      }
    });
  });


  $('.nuevoPago').click(function(){
    var data = {
      fk_pago: $('#mpgo_id').val(),
      fecha: $('#mpgo_fpago').val(),
      importe: $('#mpgo_importe').val()
    }

    validacion = $('#mpgo_fpago').val() == "" ||
    $('#mpgo_importe').val() == "" ;


    if (validacion) {
      swal("NO PUEDE CONTINUAR","Necesita llenar todos los campos","error");
    }else {
      var ajaxCall = $.ajax({
          method: 'POST',
          data: data,
          url: 'Pagos/actions/agregar.php'
      });

      ajaxCall.done(function(r) {
        r = JSON.parse(r);
        if (r.code == 1) {
          swal("Exito", "Se guardo correctamente.", "success");
          fetchCobranza();
          $('.modal').modal('hide');
        } else {
          console.error(r.message);
        }
      });
    }
  });

  $('tbody').on('click', '.editarPago', function(){
    var dbid = $(this).attr('db-id');
    var tar_modal = $($(this).attr('href'));

    var fetch_pago = $.ajax({
      method: 'POST',
      data: {dbid: dbid},
      url: 'Pagos/actions/fetch.php'
    });

    fetch_pago.done(function(r){
      r = JSON.parse(r);

      if (r.code == 1) {

      console.log(r.data);
      for (var key in r.data) {

        if (r.data.hasOwnProperty(key)) {
          var iterated_element = $('#' + key);
          var element_type = iterated_element.prop('nodeName');
          var dbid = iterated_element.attr('db-id');
          var value = r.data[key];

          iterated_element.val(value).addClass('has-content');
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

  $('.ActualizarPago').click(function(){
    var data = {
      pk_pagos: $('#pk_pagos').attr('db-id'),
      fechaPago: $('#fechaPago').val(),
      importePago: $('#importePago').val()
    }

    validar = $('#fechaPago').val() == "" ||
              $('#importePago').val() == "";


    if (validar) {
      swal("Error","Todos los campos son obligatorios","error");
    }else{

      var ajaxCall = $.ajax({
          method: 'POST',
          data: data,
          url: 'Pagos/actions/editar.php'
      });

      ajaxCall.done(function(r) {
        r = JSON.parse(r);
        if (r.code == 1) {
          fetchCobranza();
          swal("Exito", "Se actualizo.", "success");
          $('.modal').modal('hide');
        } else {
          console.error(r.message);
        }
      });
    }
  })
}
