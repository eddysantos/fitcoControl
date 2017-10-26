$(document).ready(function(){
  fetchCobranza();
  fetchTablaCobranza();


  $('#NuevoRegistroCobranza').click(function(){

    var fk_cliente = $('#cbz_cliente').val();
    var facturaCobranza = $('#cbz_factura').val();
    var importeCobranza = $('#cbz_importe').val();
    var vencimientoCobranza = $('#cbz_dvencimiento').val();

    validacion = $('#cbz_cliente').val() == "" ||
    $('#cbz_factura').val() == "" ||
    $('#cbz_importe').val() == "" ||
    $('#cbz_dvencimiento').val() == "";

    if (validacion) {
      swal("NO PUEDE CONTINUAR","Nesesita llenar todos los campos","error");
    }else {
      $.ajax({
        method: 'POST',
        url: '/fitcoControl/Resources/PHP/Cobranza/AgregarCobranza.php',
        beforeSend: function(){
          alert("Se enviará el ajax al servidor!");
        },
        data: {
          cbz_cliente: fk_cliente,
          cbz_factura: facturaCobranza,
          cbz_importe: importeCobranza,
          cbz_dvencimiento: vencimientoCobranza
        },
        success:function(result){
          var rsp = JSON.parse(result);
          console.log(rsp);
          if (rsp.code != 1) {
            console.error("Hubo un error al registrar la nueva factura!");
            console.error("El error es: " + rsp.response);
            swal("FALLO AL REGISTRAR","No se agregó el registro","error");
          } else {
            fetchCobranza();
            $('#Agregarcobranza').hide();
            $('#cobranza').animate({"right": "4%"}, "slow");
            $('#Ecobranza').animate({"right": "4%"}, "slow");
            alertify.success('SE AGREGÓ CORRECTAMENTE');
          }
        },
        error:function(exception){
          console.error(exception)
        }
      })
    }
  });
});

//MOSTRAR LOS REGISTROS EN PANTALLA
function fetchCobranza(){
  $.ajax({
    method: 'POST',
    url:'/fitcoControl/Resources/PHP/Cobranza/MostrarTablaCobranza.php',
    success:function(result){
      console.log(result);
      var rsp = JSON.parse(result);
      $('#mostrarCobranza').html(rsp.infoTabla);
      ActivarBotonesCobranza();
    },
    error:function(exception){
      console.error(exception)
    }
  })
}

//TABLA PARA DATOS DE GRAFICA COBRANZA
function fetchTablaCobranza(){
  $.ajax({
    method: 'POST',
    url:'/fitcoControl/Resources/PHP/Cobranza/TablaGraficaCobranza.php',
    success:function(result){
      console.log(result);
      var rsp = JSON.parse(result);
      $('#mostrarTablaGrafica').html(rsp.infoTabla);
      ActivarBotonesCobranza();
    },
    error:function(exception){
      console.error(exception)
    }
  })
}

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
            }
          },
          error:function(exception){
            console.error(exception)
          }
        })
      }
    });


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
          $('#mcbz_cliente').val(rsp.response.fk_cliente);
          $('#mcbz_factura').val(rsp.response.facturaCobranza);
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
    var fk_cliente = $('#mcbz_cliente').val();
    var facturaCobranza = $('#mcbz_factura').val();
    var importeCobranza = $('#mcbz_importe').val();
    var vencimientoCobranza = $('#mcbz_vencimiento').val();

    $.ajax({
      method:'POST',
      url:'/fitcoControl/Resources/PHP/Cobranza/EditarDatosCobranza.php',
      data: {
        mcbz_id: idCobranza,
        mcbz_cliente: fk_cliente,
        mcbz_factura: facturaCobranza,
        mcbz_importe: importeCobranza,
        mcbz_vencimiento: vencimientoCobranza
      },
      success:function(result){
        if (result != 1) {
          alertify.error('NO SE MODIFICÓ NINGUN REGISTRO');
          $('#DetCobranza').modal('hide');
          fetchClients();
        }else {
          $('#DetCobranza').modal('hide');
          fetchCobranza();
          alertify.success('SE MODIFICÓ CORRECTAMENTE');
        }
      },
      error:function(exception){
        console.error(exception)
      }
    })
  });
}
