$(document).ready(function(){
  mostrarOrdenes();
  mostrarReporte();

$(function () {
  $('[data-toggle="tooltip"]').tooltip();
});



  $('#correo').click(function(){
    $.ajax({
      method: 'POST',
      url:'actions/mail.php',
      success: function(r){
        console.log(r);
        r = JSON.parse(r);
        if (r.code == 1) {
          swal("Enviado!", "El correo se envio correctamente.", "success");
        } else {
          console.error(r.message);
        }
      }
    })
  })

  $('#_sugerencia').change(function(){
    if ($('#_sugerencia').val() ==  "si") {
      $('.razonSugerencia').show();
    }else{
      $('.razonSugerencia').hide();
    }
  });

  $('.consultar').click(function(){
    var accion = $(this).attr('accion');
    var status = $(this).attr('status');

    switch (accion) {
        case "aOrden":
        if (status == 'cerrado') {
          $('.spanA').css('display', 'inherit');
          $(this).attr('status', 'abierto');
          $('#tablaOrdenCompra').animate({"right": "36%"}, "slow");
          $('#NuevaOrden').fadeIn(2500);
          $('#SinRegistros').fadeOut();
          $('p').css('font-size','13px');

        }else {
          $('.spanA').css('display', '');
          $(this).attr('status', 'cerrado');
          $('#tablaOrdenCompra').animate({"right": "4%"}, "slow");
          $('#NuevaOrden').hide();
          $('p').css('font-size','1.75rem');

        }
        break;

      default:
        console.error("Something went terribly wrong...");
    }
  });

  $('.generarOrden').click(function(){
    var data = {
      usuarioSolicitud: $('#_usuarioSolicitud').val(),
      fecha_reg: $('#fecha_sol').val(),
      usuarioSolicitud: $('#_usuarioSolicitud').val(),
      item: $('#_item').val(),
      descripcion: $('#_descripcion').val(),
      vitalDesechable: $('#_vitalDesechable').val(),
      fechaRequerido: $('#_fechaRequerido').val(),
      cantidad: $('#_cantidad').val()
    }

    validar = $('#_usuarioSolicitud').val() == "" ||
              $('#_item').val() == "" ||
              $('#_descripcion').val() == "" ||
              $('#_vitalDesechable').val() == "" ||
              $('#_fechaRequerido').val() == "" ||
              $('#_cantidad').val() == "" ||
              $('#fecha_sol').val() == "";


  if (validar) {
    swal("Error","Todos los campos son obligatorios","error");
  }else{
    var ajaxCall = $.ajax({
        method: 'POST',
        data: data,
        url: 'actions/agregar.php'
    });
      ajaxCall.done(function(r) {
        console.log(r);
        r = JSON.parse(r);
        if (r.code == 1) {
          $('#ordenGenerada').html(r.data);
          $('#NuevaOrden').hide();
          $('#NuevaCotizacion').show();
        } else {
          console.error(r.message);
        }
      });
    }
  });


  $('.nueva_cot').click(function(){

    var opcion = $(this).attr('opcion');
    var data = {
     fk_orden: $('#_pk_orden').val(),
     razonSocial: $('#_razonSocial').val(),
     rfc: $('#_rfc').val(),
     precio: $('#_precio').val(),
     iva: $('#_iva').val(),
     numCuenta: $('#_numCuenta').val(),
     clabe: $('#_clabe').val(),
     nombreBanco: $('#_nombreBanco').val(),
     condicionPago: $('#_condicionPago').val(),
     sugerencia: $('#_sugerencia').val(),
     razonSugerencia: $('#_razonSugerencia').val(),
     opcion : opcion
    }

    validar = $('#_razonSocial').val() == "" ||
              $('#_rfc').val() == "" ||
              $('#_precio').val() == "" ||
              $('#_iva').val() == "" ||
              $('#_numCuenta').val() == "" ||
              $('#_nombreBanco').val() == "" ||
              $('#_condicionPago').val() == "" ||
              $('#_clabe').val() == "" ||
              $('#_sugerencia').val() == "";


  if (validar) {
    swal("Error","Todos los campos son obligatorios","error");
  }else{
     var ajaxCall = $.ajax({
         method: 'POST',
         data: data,
         url: 'actions/agregar_cotizacion.php'
     });

      ajaxCall.done(function(r) {
        r = JSON.parse(r);
        if (r.code == 1) {
          swal("Exito", "Se guardo correctamente.", "success");
          $('#cot1, #op1').hide();
          $('.razonSugerencia').hide();
          $('#cot2, #op2').show();
          $("#NuevaCotizacion")[0].reset();
        } else {
          console.error(r.message);
        }
      });
    }
  });



$('.ultima_cot').click(function(){
  var fk_orden = $('#_pk_orden').val();
  var opcion = $(this).attr('opcion');
  var data = {
   fk_orden: $('#_pk_orden').val(),
   razonSocial: $('#_razonSocial').val(),
   rfc: $('#_rfc').val(),
   precio: $('#_precio').val(),
   iva: $('#_iva').val(),
   numCuenta: $('#_numCuenta').val(),
   clabe: $('#_clabe').val(),
   nombreBanco: $('#_nombreBanco').val(),
   condicionPago: $('#_condicionPago').val(),
   sugerencia: $('#_sugerencia').val(),
   razonSugerencia: $('#_razonSugerencia').val(),
   opcion : opcion
  }

  validar = $('#_razonSocial').val() == "" ||
            $('#_rfc').val() == "" ||
            $('#_precio').val() == "" ||
            $('#_iva').val() == "" ||
            $('#_numCuenta').val() == "" ||
            $('#_nombreBanco').val() == "" ||
            $('#_condicionPago').val() == "" ||
            $('#_clabe').val() == "" ||
            $('#_sugerencia').val() == "";

  if (validar) {
      swal("Error","Todos los campos son obligatorios","error");
    }else{
      var ajaxCall = $.ajax({
        method: 'POST',
        data: data,
        url: 'actions/agregar_cotizacion.php'
      });

      ajaxCall.done(function(r) {
        r = JSON.parse(r);
        if (r.code == 1) {
          swal({title: "Finalizado", text: "Tu numero de orden es: "+ fk_orden +" ", type: "success"},function(){location.reload();});
        } else {
          console.error(r.message);
        }
      });
    }
  });


})//FIN DEL DOCUMENTO



function mostrarOrdenes(){
  var ajaxCall = $.ajax({
      method: 'POST',
      url: 'actions/mostrar.php'
  });

  ajaxCall.done(function(r) {
    r = JSON.parse(r);
    if (r.code == 1) {
      $('#tabla_OrdenCompra').html(r.data);
      // $('#tabla_OrdenCompra').html(r.cotizaciones);
      botones();
    } else {
      console.error(r.message);
    }
  });
}


function mostrarReporte(){
  var ajaxCall = $.ajax({
      method: 'POST',
      url: 'actions/reporte.php'
  });

  ajaxCall.done(function(r) {
    r = JSON.parse(r);
    if (r.code == 1) {
      $('#tabla_reporte').html(r.data);
      botones();
    } else {
      console.error(r.message);
    }
  });
}


function checkPrivilege(privilege){
  if (privilege.is(':checked') == true) {
    return 1;
  } else {
    return 0;
  }
}

function markCheckbox(selector, value){
  if (value == "1") {
    selector.prop('checked', true);
  } else {
    selector.prop('checked', false);
  }
}

function botones(){

  $('tbody').on('click', '.edit_cotizaciones', function(){
    var dbid = $(this).attr('db-id');
    var tar_modal = $($(this).attr('href'));

    var fetch_cot = $.ajax({
      method: 'POST',
      data: {dbid: dbid},
      url: 'actions/fetch.php'
    });

    fetch_cot.done(function(r){
      r = JSON.parse(r);

      if (r.code == 1) {
        $('#opcion').val(r.data.opcion);
        $('#notaAprobado').val(r.data.notaAprobado);
        markCheckbox($('#aprobado'), r.data.aprobado);
      tar_modal.modal('show');
      } else {
        console.error(r);
      }
    })


    var id = $(this).attr('db-id');
    var data = { dbid : $(this).attr('db-id')}
    $('#pk_orden').val(id);
    var ajaxCall = $.ajax({
        method: 'POST',
        data: data,
        url: 'actions/mostrar_cotizaciones.php'
    });

    ajaxCall.done(function(r) {
      r = JSON.parse(r);
      if (r.code == 1) {
        $('#edit_cot_auto').html(r.data);
        botones();
      } else {
        console.error(r.message);
      }
    });
  }) //FIN TBODY









  $('.ver_cotizaciones').click(function(){
    var id = $(this).attr('db-id');
    var data = { dbid : $(this).attr('db-id')}
    $('#_pk_orden').val(id);

    var ajaxCall = $.ajax({
        method: 'POST',
        data: data,
        url: 'actions/mostrar_cotizaciones.php'
    });

    ajaxCall.done(function(r) {
      r = JSON.parse(r);
      if (r.code == 1) {
        $('#tabla_cotizaciones').html(r.data);
        botones();
      } else {
        console.error(r.message);
      }
    });
  });

  $('.actualizarCot').click(function(){
    var opcion = $(this).attr('opcion');
    var pk_cot = $(this).attr('db-id');
    var pk_orden = $(this).attr('pk-orden');
    $('#add_opcion').val(opcion);
    $('#add_pk_cotizacion').val(pk_cot);
    $('#add_pk_orden').val(pk_orden);

    var tar_modal = $($(this).attr('href'));
    tar_modal.modal('show');
    botones();
  })


  $('.actualizarAprob').unbind();
  $('.actualizarAprob').click(function(){
    var data = {
      pk_orden: $('#add_pk_orden').val(),
      pk_cotizacion: $('#add_pk_cotizacion').val(),
      notaAprobado: $('#add_notaAprobado').val(),
      opcion: $('#add_opcion').val(),
      aprobado: checkPrivilege($('#add_aprobado'))
    }
    var ajaxCall = $.ajax({
        method: 'POST',
        data: data,
        url: 'actions/editar.php'
    });

    ajaxCall.done(function(r) {
      r = JSON.parse(r);
      if (r.code == 1) {
        swal("Exito", "Se actualizo.", "success");
        $('.modal').modal('hide');
        mostrarOrdenes();
      } else {
        console.error(r.message);
      }
    });
  });



  $('.ver_cot_aut').click(function(){
    var id = $(this).attr('db-id');
    var data = { dbid : $(this).attr('db-id')}
    $('#_pk_orden').val(id);
    var ajaxCall = $.ajax({
        method: 'POST',
        data: data,
        url: 'actions/mostrar_cot_aut.php'
    });

    ajaxCall.done(function(r) {
      r = JSON.parse(r);
      if (r.code == 1) {
        $('#tabla_cot_auto').html(r.data);
        botones();
      } else {
        console.error(r.message);
      }
    });
  });

  $('.actualizar').click(function(){
    var data = {
      pk_orden: $('#pk_orden').val(),
      pk_cotizacion: $('#pk_cotizacion').val(),
      notaAprobado: $('#notaAprobado').val(),
      opcion: $('#opcion').val(),
      aprobado: checkPrivilege($('#aprobado'))
    }

    var ajaxCall = $.ajax({
        method: 'POST',
        data: data,
        url: 'actions/editar.php'
    });

    ajaxCall.done(function(r) {
      r = JSON.parse(r);
      if (r.code == 1) {
        swal("Exito", "Se actualizo.", "success");
        $('.modal').modal('hide');
        mostrarOrdenes();
        $(this).hide();
      } else {
        console.error(r.message);
      }
    });
  })

  // $('.select-pagado').unbind();
  $('.select-pagado').change(function(){
    var data = {
      pk_orden: $(this).attr('db-id'),
      pagado: 1
    }

    var ajaxCall = $.ajax({
        method: 'POST',
        data: data,
        url: 'actions/editar-pagado.php'
    });

    ajaxCall.done(function(r) {
      r = JSON.parse(r);
      if (r.code == 1) {
        swal("Exito", "Se actualizo.", "success");
        mostrarOrdenes();
      } else {
        console.error(r.message);
      }
    });
  })


  $('.nopagado').change(function(){
    var data = {
      pk_orden: $(this).attr('db-id'),
      pagado: 0
    }

    var ajaxCall = $.ajax({
        method: 'POST',
        data: data,
        url: 'actions/editar-pagado.php'
    });

    ajaxCall.done(function(r) {
      r = JSON.parse(r);
      if (r.code == 1) {
        swal("Exito", "Se actualizo.", "success");
        mostrarOrdenes();
        mostrarReporte();
      } else {
        console.error(r.message);
      }
    });
  })


}
