$(document).ready(function(){
fetchEnvio();

});


  function fetchEnvio(envios){
    $.ajax({
      url:'/fitcoControl/Resources/PHP/Envios/MostrarTablaEnvio.php',
      method: 'POST',
      data:{envios:envios},
    })
    .done(function(resultado){
      $('#MostrarEnvio').html(resultado);
      ActivarBotonesEnvio();
    })
  }

  $(document).on('keyup', '#busqueda', function(){
    var valorBusqueda = $(this).val();
    if (valorBusqueda!= "") {
      fetchEnvio(valorBusqueda);
    }else {
      fetchEnvio();
    }
  });

  function ActivarBotonesEnvio(){

    $('.aVerTabla').click(function(){
      var envioId = $(this).attr('envio-id');
      $.ajax({
        method: 'POST',
        url:'/fitcoControl/Resources/PHP/Envios/ModalTablaEnvios.php',
        data:{envioId:envioId},
        success:function(result){
          var rsp = JSON.parse(result);
          console.log(rsp);
          $('#tablaEnvios').html(rsp.infoTabla);
          ActivarBotonesModalEnvios();
        },
        error:function(exception){
          console.error(exception)
        }
      })
    });

    $('.aEnvio').unbind();
    $('.aEnvio').click(function(){
      var envioId = $(this).attr('envio-id');
      $('#menv_id').val(envioId);
      $('#AgregarEnvio').modal('show');
    });

    //AGREGAR PAGOS MODAL
    $('.AgregarEnvio').unbind();
    $('.AgregarEnvio').click(function(){

      var id = $('#menv_id').val();
      var ff = $('#menv_fecha').val();
      var hr = $('#menv_hora').val();
      var nt = $('#menv_notas').val();
      var st = $('#menv_status').val();


      validacion =
      $('#menv_fecha').val() == "" ||
      $('#menv_hora').val() == "" ||
      $('#menv_status').val() == "" ;

      if (validacion) {
          swal("NO PUEDE CONTINUAR","Necesita llenar todos los campos","error");
      }else {
        $.ajax({
          method: 'POST',
          url: '/fitcoControl/Resources/PHP/Envios/AgregarEnvio.php',
          data: {

            id: id,
            ff: ff,
            hr: hr,
            nt: nt,
            st: st
          },
          success:function(result){
            var rsp = JSON.parse(result);
            if (rsp.code != 1) {
              swal("FALLO AL REGISTRAR","No se agregó el registro","error");
              console.error(rsp.response);
            } else {
              $('#AgregarEnvio').modal('hide');
              alertify.success('SE AGREGÓ CORRECTAMENTE');
              fetchEnvio();
            }
          },
          error:function(exception){
            console.error(exception)
          }
        })
      }
    });
  }


  function ActivarBotonesModalEnvios(){
    $('.editarEnvio').unbind();
    $('.editarEnvio').click(function(){
      var envioId = $(this).attr('envio-id');
      $.ajax({

        method: 'POST',
        url: '/fitcoControl/Resources/PHP/Envios/fetchEnviosData.php',
        data: {envioId : envioId},

        success: function(result){
          var rsp = JSON.parse(result);
          console.log(rsp);
          if (rsp.code == 1) {
            $('#menv_id1').val(rsp.response.pk_envios);
            $('#menv_status1').val(rsp.response.descripcion);
            $('#menv_fecha1').val(rsp.response.fechaEnvio);
            $('#menv_hora1').val(rsp.response.horaEnvio);
            $('#menv_notas1').val(rsp.response.notas);

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



    $('.ActualizarEnvio').unbind();//EVITAMOS QUE SE DUPLIQUE NUESTRO SELECTOR
    $('.ActualizarEnvio').click(function(){
      var id = $('#menv_id1').val();
      var st = $('#menv_status1').val();
      var ff = $('#menv_fecha1').val();
      var hr = $('#menv_hora1').val();
      var nt = $('#menv_notas1').val();

      $.ajax({
        method: 'POST',
        url: '/fitcoControl/Resources/PHP/Envios/EditarEnvio.php',
        data: {
          id: id,
          st: st,
          ff: ff,
          hr: hr,
          nt: nt
        },
        success:function(result){
          console.log(result);
          if (result != 1) {
            alertify.error('NO SE MODIFICÓ NINGUN REGISTRO');
            $('#EditarEnvio').modal('hide');
            $('#VisualizarEnvio').modal('hide');
            fetchEnvio();
          }else {
            $('#EditarEnvio').modal('hide');
            $('#VisualizarEnvio').modal('hide');
            fetchEnvio();
            alertify.success('SE MODIFICÓ CORRECTAMENTE');
          }
        },
        error:function(exception){
          console.error(exception)
        }
      });
    });


    $('.eliminarEnvio').unbind();
    $('.eliminarEnvio').click(function(){
      var envioId = $(this).attr('envio-id');
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
          url: '/fitcoControl/Resources/PHP/Envios/EliminarEnvio.php',
          data: {envioId: envioId},

          success: function(result){
            console.log(result);
            if (result != 1) {
              alertify.error('NO SE PUDO ELIMINAR');
            }else if (result == 1){
              fetchEnvio();
              $('#VisualizarEnvio').modal('hide');
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
