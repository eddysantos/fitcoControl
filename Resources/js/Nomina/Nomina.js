$(document).ready(function(){
  fetchNomina();
});

  $('#NuevoRegistroNomina').click(function(){
    var ff = $('#nom_fecha').val();
    var cn = $('#nom_cantNom').val();
    var he = $('#nom_hrExtras').val();
    var ch = $('#nom_cantHr').val();

    validacion =
    $('#nom_fecha').val() == "" ||
    $('#nom_cantNom').val() == "" ||
    $('#nom_hrExtras').val() == "" ||
    $('#nom_cantHr').val() == "";

    if (validacion) {
        swal("NO PUEDE CONTINUAR","Necesita llenar todos los campos","error");
    }else {
      $.ajax({
        method: 'POST',
        url: '/fitcoControl/Resources/PHP/Nomina/AgregarNomina.php',
        data: {
          ff: ff,
          cn: cn,
          he: he,
          ch: ch
        },
        success:function(result){
          var rsp = JSON.parse(result);
          if (rsp.code != 1) {
            swal("FALLO AL REGISTRAR","No se agregó el registro","error");
            console.error(rsp.response);
            $('#NuevoNomina').hide();
            $('.spanA').css('display', '');
            fetchNomina();
          } else {
            $('#NuevoNomina')[0].reset();
            $('#NuevoNomina').hide();
            $('.spanA').css('display', '');
            fetchNomina();
            alertify.success('SE MODIFICÓ CORRECTAMENTE');
          }
        },
        error:function(exception){
          console.error(exception)
        }
      })
    }
  });

  //MOSTRAR LOS REGISTROS EN PANTALLA
  function fetchNomina(nomina){
    $.ajax({
      url:'/fitcoControl/Resources/PHP/Nomina/MostrarTablaNomina.php',
      method: 'POST',
      data:{nomina:nomina},
    })
    .done(function(resultado){
      $('#MostrarNomina').html(resultado);
      ActivarBotonesNomina();
    })
  }

  $(document).on('keyup', '#busqueda', function(){
    var valorBusqueda = $(this).val();
    if (valorBusqueda!= "") {
      fetchNomina(valorBusqueda);
    }else {
      fetchNomina();
    }
  });


function ActivarBotonesNomina(){

  $('.editNom').unbind();
  $('.editNom').click(function(){
    var nomId = $(this).attr('nom-id');

    $.ajax({
      method: 'POST',
      url: '/fitcoControl/Resources/PHP/Nomina/fetchNominaData.php',
      data: {nomId: nomId},

      success: function(result){
        var rsp = JSON.parse(result);
        console.log(rsp);
        if (rsp.code == 1) {
          $('#mnom_id').val(rsp.response.pk_nomina);
          $('#mnom_fecha').val(rsp.response.fechaNomina);
          $('#mnom_cantNom').val(rsp.response.dineroNomina);
          $('#mnom_hrExtras').val(rsp.response.horasExtras);
          $('#mnom_cantHr').val(rsp.response.dineroHoras);
        }else {
          console.error("Hubo un error al jalar la informacion del usuario.");
          console.error(rsp.response);
        }
      },
      error: function(exception){
        console.error(exception);
      }
    })
  });

  $('.ActualizarNom').unbind();
  $('.ActualizarNom').click(function(){
    var id = $('#mnom_id').val();
    var ff = $('#mnom_fecha').val();
    var cn = $('#mnom_cantNom').val();
    var he = $('#mnom_hrExtras').val();
    var ch = $('#mnom_cantHr').val();

    $.ajax({
      method: 'POST',
      url: '/fitcoControl/Resources/PHP/Nomina/EditarNomina.php',
      data: {
        id: id,
        ff: ff,
        cn: cn,
        he: he,
        ch: ch
      },
      success:function(result){
        if (result != 1) {
          alertify.error('NO SE MODIFICÓ NINGUN REGISTRO');
          $('#EditarNomina').modal('hide');
          $('#NuevoNomina').hide();
          $('.spanA').css('display', '');
          fetchNomina();
        }else {
          $('#EditarNomina').modal('hide');
          $('#NuevoNomina').hide();
          $('.spanA').css('display', '');
          fetchNomina();
          alertify.success('SE MODIFICÓ CORRECTAMENTE');
        }
      },
      error:function(exception){
        console.error(exception)
      }
    });
  });


  $('.eliminarNom').unbind();
  $('.eliminarNom').click(function(){
    var nomId = $(this).attr('nom-id');
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
        url: '/fitcoControl/Resources/PHP/Nomina/EliminarNomina.php',
        data: {nomId: nomId},

        success: function(result){
          console.log(result);
          if (result != 1) {
            alertify.error('NO SE PUDO ELIMINAR');
            $('#NuevoNomina').hide();
            $('.spanA').css('display', '');
            fetchNomina();
          }else if (result == 1){
            $('#NuevoNomina').hide();
            $('.spanA').css('display', '');
            fetchNomina();
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
