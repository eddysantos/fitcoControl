$(document).ready(function(){
  fetchSeccionCorte();
});


function fetchSeccionCorte(corte){
  $.ajax({
    url : '/fitcoControl/Resources/PHP/Corte/MostrarSeccionCorte.php',
    method: 'POST',
    data:{corte:corte},
  })
  .done(function(resultado){
    $('#MostrarSeccionCorte').html(resultado);
    ActivarBotonesCorte();
  })
}

$(document).on('keyup', '#busqueda', function(){
  var valorBusqueda = $(this).val();
  if (valorBusqueda!= "") {
    fetchSeccionCorte(valorBusqueda);
  }else {
    fetchSeccionCorte();
  }
});

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
      // clientSelector();
    },
    error: function(exception){
      console.error(exception);
    }
  });
});

//NUEVO REGISTRO CORTE --- NUEVO REGISTRO CORTE --- NUEVO REGISTRO CORTE//
$('#NuevoRegistroCorte').click(function(){
  var fhInicioProg = $('#cor_fhprogInicio').val();
  var fhFinalProg = $('#cor_fhprogFinal').val();
  var fhInicioReal = $('#cor_fhrealInicio').val();
  var fhFinalReal = $('#cor_fhrealFinal').val();
  var clienteCorte = $('#npClientName').val();
  var fcorte = $('#cor_fcorte').val();
  var notas = $('#notasCorte').val();

  validacion =
  $('#npClientName').val() == "" ||
  $('#cor_fcorte').val() == "" ||
  $('#cor_fhprogInicio').val() == "" ||
  $('#cor_fhprogFinal').val() == "";

  validacionHora = $('#cor_fhprogInicio').val()> $('#cor_fhprogFinal').val();


  if (validacion) {
    swal("NO PUEDE CONTINUAR","Nesesita llenar todos los campos","error");
  }else if (validacionHora) {
    swal("NO PUEDE CONTINUAR","Su hora de inicio no puede ser mayor a su hora final","error");
  }else{
    $.ajax({
      method: 'POST',
      url: '/fitcoControl/Resources/PHP/Corte/AgregarSeccionCorte.php',
      data:{
        fhInicioProg: fhInicioProg,
        fhFinalProg: fhFinalProg,
        fhInicioReal: fhInicioReal,
        fhFinalReal: fhFinalReal,
        clienteCorte: clienteCorte,
        fcorte: fcorte,
        nt: notas
      },
      success:function(result){
        var rsp = JSON.parse(result);
        if (rsp.code != 1) {
          swal("FALLO AL REGISTRAR","No se agregó el registro","error");
          console.error(rsp.response);
          $('#Agregarcorte').hide();
          $('.spanA').css('display', '');
            fetchSeccionCorte();
        }else{
          $('#Agregarcorte')[0].reset();
          $('#Agregarcorte').hide();
          $('.spanA').css('display', '');
            fetchSeccionCorte();
          alertify.success('SE AGREGÓ CORRECTAMENTE');
        }
      },
      error:function(exception){
        console.error(exception)
      }
    })
  }
});


function ActivarBotonesCorte(){

//buscador de Clientes en MODAL
  $('#mcor_cliente').keyup(function(){
    var txt = $(this).val();
    if (txt == "") {
      $('#mcor_ClientList').fadeOut();
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
          $('#mcor_ClientList').html("<p>Hubo un error al cargar la lista de clientes...</p>");
          console.warn("Error en el query: " + rsp.response);
        } else {
          $('#mcor_ClientList').html(rsp.response);
          $('#mcor_ClientList p').click(function(){
            var cid = $(this).attr('client-id');
            var nc = $(this).html();

            $('#mcor_cliente').val(nc).html(nc).attr('client-id', cid);
            $('#mcor_ClientList').fadeOut();
          });
        }
        $('#mcor_ClientList').fadeIn();
        // SelectorCliente();
      },
      error: function(exception){
        console.error(exception);
      }
    });
  });

  $('.editarcorte').unbind();
  $('.editarcorte').click(function(){
    var corteId = $(this).attr('corteId');
    $.ajax({

      method: 'POST',
      url: '/fitcoControl/Resources/PHP/Corte/fetchSeccionCorteData.php',
      data: {corteId: corteId},

      success: function(result){
        var rsp = JSON.parse(result);
        console.log(rsp);
        if (rsp.code == 1) {
          $('#mcor_id').val(rsp.response.pk_corte);
          $('#mcor_cliente').val(rsp.response.clienteCorte);
          $('#mcor_fcorte').val(rsp.response.fechaCorte);
          $('#mcor_hpinicio').val(rsp.response.fhinicio_prog);
          $('#mcor_hpfinal').val(rsp.response.fhfinal_prog);
          $('#mcor_hrinicio').val(rsp.response.fhinicio_real);
          $('#mcor_hrfinal').val(rsp.response.fhfinal_real);
          $('#mcor_notas').val(rsp.response.Notas);

        } else {
          console.error("Hubo un error al jalar la informacion de.");
          console.error(rsp.response);
          console.error(rsp.data)
        }
      },
      error: function(exception){
        console.error(exception);
      }
    })
  });

  $('.ActualizarCorte').unbind();
  $('.ActualizarCorte').click(function(){
    var id = $('#mcor_id').val();
    var cc = $('#mcor_cliente').val();
    var fc = $('#mcor_fcorte').val();
    var hpi = $('#mcor_hpinicio').val();
    var hpf = $('#mcor_hpfinal').val();
    var hri = $('#mcor_hrinicio').val();
    var hrf = $('#mcor_hrfinal').val();
    var nt = $('#mcor_notas').val();

    $.ajax({
      method: 'POST',
      url: '/fitcoControl/Resources/PHP/Corte/editarRegCorte.php',
      data: {
        id: id,
        cc: cc,
        fc: fc,
        hpi: hpi,
        hpf: hpf,
        hri: hri,
        hrf: hrf,
        nt: nt
      },
      success:function(result){
        console.log(result);
        if (result != 1) {
          alertify.error('NO SE MODIFICÓ NINGUN REGISTRO');
          $('#EditarCorte').modal('hide');
          fetchSeccionCorte();
          $('#tablacorte').animate({"right": "4%"}, "slow");
          $('#Agregarcorte').hide();
          $('.spanA').css('display', '');
        }else {
          $('#EditarCorte').modal('hide');
          fetchSeccionCorte();
          $('#tablacorte').animate({"right": "4%"}, "slow");
          $('#Agregarcorte').hide();
          $('.spanA').css('display', '');
          alertify.success('SE MODIFICÓ CORRECTAMENTE');
        }
      },
      error:function(exception){
        console.error(exception)
      }
    });
  });


  $('.eliminarCorte').unbind();
  $('.eliminarCorte').click(function(){
    var corteId = $(this).attr('corteId');
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
        url: '/fitcoControl/Resources/PHP/Corte/eliminarRegCorte.php',
        data: {corteId: corteId},

        success: function(result){
          console.log(result);
          if (result != 1) {
            alertify.error('NO SE PUDO ELIMINAR');
          }else if (result == 1){
            fetchSeccionCorte();
            $('#tablacorte').animate({"right": "4%"}, "slow");
            $('#Agregarcorte').hide();
            $('.spanA').css('display', '');
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
