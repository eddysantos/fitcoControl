$(document).ready(function(){

fetchCorte();
});


//Mostrar Registros en pantalla
function fetchCorte(){
  $.ajax({
    method: 'POST',
    url:'/fitcoControl/Resources/PHP/Corte/MostrarTablaCorte.php',
    success:function(result){
      var rsp = JSON.parse(result);
      console.log(rsp);
      $('#MostrarCorte').html(rsp.infoTabla);
      ActivarBotonesCorte();
    },
    error:function(exception){
      console.error(exception)
    }
  })
}


function ActivarBotonesCorte(){

  $('.acorte').unbind();
  $('.acorte').click(function(){
    var corteId = $(this).attr('corte-id');
    $('#mcor_id').val(corteId);
    $('#AgregarCorte').modal('show');
  });

  //AGREGAR PAGOS MODAL
    $('.ActualizarCorte').unbind();
    $('.ActualizarCorte').click(function(){

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
