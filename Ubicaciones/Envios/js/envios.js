$(document).ready(function(){
fetchEnvio();
});

  function fetchEnvio(envios){
    $.ajax({
      url:'actions/mostrar.php',
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
      var dbid = $(this).attr('db-id');
      var ajaxCall = $.ajax({
          method: 'POST',
          data:{dbid:dbid},
          url: 'actions/ModalTablaEnvios.php'
      });

      ajaxCall.done(function(r) {
        r = JSON.parse(r);
        if (r.code == 1) {
          $('#tablaEnvios').html(r.data);
          ActivarBotonesModalEnvios();
        } else {
          console.error(r.message);
        }
      });
    })

    $('.aEnvio').unbind();
    $('.aEnvio').click(function(){
      var envioId = $(this).attr('db-id');
      $('#menv_id').val(envioId);
      $('#AgregarEnvio').modal('show');
      ActivarBotonesModalEnvios();
    });

    $('.AgregarEnvio').unbind();
    $('.AgregarEnvio').click(function(){

      var data = {
        id : $('#menv_id').val(),
        fecha : $('#menv_fecha').val(),
        hora : $('#menv_hora').val(),
        notas : $('#menv_notas').val(),
        status : $('#menv_status').val()
      }

      validacion =
      $('#menv_fecha').val() == "" ||
      $('#menv_hora').val() == "" ||
      $('#menv_status').val() == "" ;

      if (validacion) {
        swal("NO PUEDE CONTINUAR","Necesita llenar todos los campos","error");
      }else {
        var ajaxCall = $.ajax({
            method: 'POST',
            data: data,
            url: 'actions/agregar.php'
        });

        ajaxCall.done(function(r) {
          r = JSON.parse(r);
          if (r.code == 1) {
            swal("Exito", "Se guardo correctamente.", "success");
            fetchEnvio();
            $('.modal').modal('hide');
          } else {
            console.error(r.message);
          }
        });
      }
    });
  }


function ActivarBotonesModalEnvios(){

  $('tbody').on('click', '.editarEnvio', function(){
    var dbid = $(this).attr('db-id');
    var tar_modal = $($(this).attr('href'));

    var fetch_envios = $.ajax({
      method: 'POST',
      data: {dbid: dbid},
      url: 'actions/fetch.php'
    });

    fetch_envios.done(function(r){
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

  $('.ActualizarEnvio').unbind();
  $('.ActualizarEnvio').click(function(){
    var data = {
      pk_envios: $('#pk_envios').attr('db-id'),
      descripcion: $('#descripcion').val(),
      fechaEnvio: $('#fechaEnvio').val(),
      horaEnvio: $('#horaEnvio').val(),
      notas: $('#notas').val()
    }

    validacion = $('#descripcion').val() == "" ||
              $('#fechaEnvio').val() == "" ||
              $('#horaEnvio').val() == "" ||
              $('#notas').val() == "";

    if (validacion) {
      swal("Error","Todos los campos son obligatorios","error");
    }else{

      var ajaxCall = $.ajax({
          method: 'POST',
          data: data,
          url: 'actions/editar.php'
      });

      ajaxCall.done(function(r) {
        r = JSON.parse(r);
        if (r.code == 1) {
          fetchEnvio();
          swal("Exito", "Se actualizo.", "success");
          $('.modal').modal('hide');
        } else {
          console.error(r.message);
        }
      });
    }
  })

  $('.eliminarEnvio').unbind();
  $('.eliminarEnvio').click(function(){
    var pk_envios = $(this).attr('db-id');
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
          url: 'actions/eliminar.php',
          data: {pk_envios: pk_envios},
          success: function(r){
            fetchEnvio();
          },
          error: function(exception){
            console.error(exception)
            alertify.error('NO SE PUDO ELIMINAR');
            fetchEnvio();
          }
        });
        swal("Eliminado!", "Se elimino correctamente.", "success");
        fetchEnvio();
        $('.modal').modal('hide');
      } else {
        swal("Cancelado", "El registro esta a salvo :)", "error");
        fetchEnvio();
        $('.modal').modal('hide');
      }
    });
  });
}
