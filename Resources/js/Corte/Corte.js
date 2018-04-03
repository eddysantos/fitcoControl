$(document).ready(function(){

fetchCorte();
});


//Mostrar Registros en pantalla
// function fetchCorte(){
//   $.ajax({
//     method: 'POST',
//     url:'/fitcoControl/Resources/PHP/Corte/MostrarTablaCorte.php',
//     success:function(result){
//       var rsp = JSON.parse(result);
//       console.log(rsp);
//       $('#MostrarCorte').html(rsp.infoTabla);
//       ActivarBotonesCorte();
//     },
//     error:function(exception){
//       console.error(exception)
//     }
//   })
// }

function fetchCorte(corte){
  $.ajax({
    url:'/fitcoControl/Resources/PHP/Corte/MostrarTablaCorte.php',
    method: 'POST',
    data:{corte:corte},
  })
  .done(function(resultado){
    $('#MostrarCorte').html(resultado);
    ActivarBotonesCorte();
  })
}

$(document).on('keyup', '#busqueda', function(){
  var valorBusqueda = $(this).val();
  if (valorBusqueda!= "") {
    fetchCorte(valorBusqueda);
  }else {
    fetchCorte();
  }
});

function ActivarBotonesCorte(){

  $('.acorte').unbind();
  $('.acorte').click(function(){
    var corteId = $(this).attr('corte-id');
    $('#mcor_id').val(corteId);
    $('#AgregarCorte').modal('show');
  });

  //AGREGAR PAGOS MODAL
    $('.AgregarCorte').unbind();
    $('.AgregarCorte').click(function(){

      var id = $('#mcor_id').val();
      var ff = $('#mcor_ffinal').val();
      var hr = $('#mcor_hfin').val();
      var nt = $('#mcor_notas').val();


      validacion =
      $('#mcor_ffinal').val() == "" ||
      $('#mcor_hfin').val() == "" ;

      if (validacion) {
          swal("NO PUEDE CONTINUAR","Necesita llenar todos los campos","error");
      }else {
        $.ajax({
          method: 'POST',
          url: '/fitcoControl/Resources/PHP/Corte/AgregarCorte.php',
          data: {

            id: id,
            ff: ff,
            hr: hr,
            nt: nt
          },
          success:function(result){
            var rsp = JSON.parse(result);
            if (rsp.code != 1) {
              swal("FALLO AL REGISTRAR","No se agregó el registro","error");
              console.error(rsp.response);
            } else {
              $('#AgregarCorte').modal('hide');
              alertify.success('SE AGREGÓ CORRECTAMENTE');
              fetchCorte();
            }
          },
          error:function(exception){
            console.error(exception)
          }
        })
      }
    });

    $('.editarcorte').unbind();
    $('.editarcorte').click(function(){
      var corteId = $(this).attr('corteId');
      $.ajax({

        method: 'POST',
        url: '/fitcoControl/Resources/PHP/Corte/fetchCorteData.php',
        data: {corteId: corteId},

        success: function(result){
          var rsp = JSON.parse(result);
          console.log(rsp);
          if (rsp.code == 1) {
            $('#emcor_id').val(rsp.response.pk_corte);
            $('#emcor_ffinal').val(rsp.response.tiempoActual);
            $('#emcor_hfin').val(rsp.response.horaActual);
            $('#emcor_notas').val(rsp.response.Notas);

          } else {
            // console.error("Hubo un error al jalar la informacion de.");
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
      var id = $('#emcor_id').val();
      var fc = $('#emcor_ffinal').val();
      var hc = $('#emcor_hfin').val();
      var nc = $('#emcor_notas').val();

      $.ajax({
        method: 'POST',
        url: '/fitcoControl/Resources/PHP/Corte/EditarCorte.php',
        data: {
          id: id,
          fc: fc,
          hc: hc,
          nc: nc
        },
        success:function(result){
          console.log(result);
          if (result != 1) {
            alertify.error('NO SE MODIFICÓ NINGUN REGISTRO');
            $('#EditarCorte').modal('hide');
            fetchCorte();
          }else {
            $('#EditarCorte').modal('hide');
            fetchCorte();
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
    $.ajax({
      method: 'POST',
      url: '/fitcoControl/Resources/PHP/Corte/eliminarCorte.php',
      data: {corteId: corteId},

      success: function(result){
        console.log(result);
        if (result != 1) {
          fetchCorte();
          alertify.error('NO SE PUDO ELIMINAR');
        }else {
          fetchCorte();
          alertify.success('SE MODIFICÓ CORRECTAMENTE');
        }
      },
      error: function(exception){
        console.error(exception)
      }
    });
  });
}
