$(document).ready(function(){
  det_cobranza();


$(':input#cob_cli').change(function(){
  var value = $(this).val();

    $.ajax({
      url: '/fitcoControl/Ubicaciones/Cobranza/actions/RepoCobraza.php',
      method: 'POST',
      data: {request:value},
      success: function(r){
        r = JSON.parse(r);
        if (r.code == 1) {
          $('#mostrarCobranza').html(r.data);
        } else {
          console.error(r.message);
        }
      }
    });
  });
});

//MOSTRAR TABLA
function det_cobranza(){
  $.ajax({
    method: 'POST',
    url:'/fitcoControl/Ubicaciones/Cobranza/actions/mostrar.php',
    success: function(r){
      r = JSON.parse(r);
      if (r.code == 1) {
        $('#mostrarCobranza').html(r.data);
        ActivarBotones();
      } else {
        console.error(r.message);
      }
    }
  })
}



function ActivarBotones(){
  $('.comentCobranza').unbind();
  $('.comentCobranza').click(function(){
    var cobranzaId = $(this).attr('cobranza-id');
    $('#com_id').val(cobranzaId);
    $('#coment').modal('show');

    $.ajax({
      method: 'POST',
      url:'/fitcoControl/Ubicaciones/Cobranza/actions/mostrarComentarios.php',
      data:{cobranzaId:cobranzaId},
      success:function(result){
        var rsp = JSON.parse(result);
        console.log(rsp);
        $('#comentariosCobranza').html(rsp.infoTabla);
        ActivarBotones();
      },
      error:function(exception){
        console.error(exception)
      }
    })
  });

    $('.comCobranza').unbind();
    $('.comCobranza').click(function(){

      var fk_com = $('#com_id').val();
      var fecha = $('#com_fecha').val();
      var comentario = $('#com_comentario').val();

      validacion =
      $('#com_fecha').val() == "" ||
      $('#com_comentario').val() == "" ;

      if (validacion) {
          swal("NO PUEDE CONTINUAR","Necesita llenar todos los campos","error");
      }else {
        $.ajax({
          method: 'POST',
          url: '/fitcoControl/Ubicaciones/Cobranza/actions/agregarComent.php',
          data: {
            id: fk_com,
            fecha: fecha,
            comentario: comentario
          },
          success:function(result){
            var rsp = JSON.parse(result);
            if (rsp.code != 1) {
              swal("FALLO AL REGISTRAR","No se agregó el registro","error");
              console.error(rsp.response);
            } else {
              $('#coment').modal('hide');
              alertify.success('SE AGREGÓ CORRECTAMENTE');
              det_cobranza();
            }
          },
          error:function(exception){
            console.error(exception)
          }
        })
      }
    });


    $('.EditComCobranza').unbind();//EVITAMOS QUE SE DUPLIQUE NUESTRO SELECTOR
    $('.EditComCobranza').click(function(){

      var data =  {
        id : $('#ed_com_id').val(),
        ff : $('#ed_com_fecha').val(),
        cc : $('#ed_com_comentario').val()
      }

      $.ajax({
        method: 'POST',
        url: '/fitcoControl/Ubicaciones/Cobranza/actions/editarComent.php',
        data: data,
        success:function(result){
          console.log(result);
          if (result != 1) {
            alertify.error('NO SE MODIFICÓ NINGUN REGISTRO');
            $('#edit_coment').modal('hide');
            $('#coment').modal('hide');
            det_cobranza();
          }else {
            $('#edit_coment').modal('hide');
            $('#coment').modal('hide');
            det_cobranza();
            alertify.success('SE MODIFICÓ CORRECTAMENTE');
          }
        },
        error:function(exception){
          console.error(exception)
        }
      });
    });


    //EDITAR COMENTARIO
    $('.editarComen').unbind();
    $('.editarComen').click(function(){
      var IdComen = $(this).attr('comen-id');
      $.ajax({

        method: 'POST',
        url: '/fitcoControl/Ubicaciones/Cobranza/actions/fetchComent.php',
        data: {IdComen: IdComen},

        success: function(result){
          var rsp = JSON.parse(result);
          console.log(rsp);
          if (rsp.code == 1) {
            $('#ed_com_id').val(rsp.response.pk_coment);
            $('#ed_com_fecha').val(rsp.response.fecha);
            $('#ed_com_comentario').val(rsp.response.comentario);

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
}
