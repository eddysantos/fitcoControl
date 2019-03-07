$(document).ready(function(){
  CorteDiario();

  $('#CalendarioCorte').fullCalendar({
    // defaultView: 'month',
    weekNumbers: true,
    weekNumbersWithinDays: true,
    header:{
      left: 'today,prev,next',
      center: 'title',
      right: 'month,basicWeek,basicDay,listWeek'
    },
    //agregar Evento
    dayClick: function(date,jsEvent,view){
      // limpiarFormulario();

      $('#_txtFecha').val(date.format());
      $('#_txtFin').val(date.format());

      $('#ModalAgregar').modal();
    },

    //Muestra todos los eventos que estan en la base de datos
    events: '/fitcoControl/Ubicaciones/Corte/actions/acciones.php',


    // solo ver informacion
    eventClick: function(calEvent,jsEvent,view){
      $('#tituloEvento').html(calEvent.title);
      $('#txtID').val(calEvent.pk_CorteCalendario);
      $('#txtColor').val(calEvent.color);
      $('#cliente').val(calEvent.title);
      $('#txtDescripcion').val(calEvent.piezasRequeridas);

      FechaHora = calEvent.start._i.split(" ");
      $('#txtFecha').val(FechaHora[0]);
      $('#txtHora').val(FechaHora[1]);

      FechaFin = calEvent.end._i.split(" ");
      $('#txtFin').val(FechaFin[0]);
      $('#txtHoraFin').val(FechaFin[1]);



      $('#ModalEventos').modal();
    },

    editable:true,
    eventLimit: true,


    eventDrop: function(calEvent){
      $('#tituloEvento').html(calEvent.title);
      $('#txtID').val(calEvent.pk_CorteCalendario);
      $('#txtColor').val(calEvent.color);
      $('#cliente').val(calEvent.title);
      $('#txtDescripcion').val(calEvent.piezasRequeridas);

      var FechaHora=calEvent.start.format().split("T");
      $('#txtFecha').val(FechaHora[0]);
      $('#txtHora').val(FechaHora[1]);

      FechaFin = calEvent.end.format().split("T");
      $('#txtFin').val(FechaFin[0]);
      $('#txtHoraFin').val(FechaFin[1]);


      RecolectarDatosGUI();
      EnviarInformacion('modificar',NuevoEvento,true);
    },
    eventRender: function(eventObj, $el){

     $el.popover({
       title: eventObj.title,
       content: eventObj.piezasRequeridas,
       trigger: 'hover',
       placement: 'top',
       container: 'body'
     });
    }

  });



  var NuevoEvento;
  $('#btnAgregar').click(function(){
      // limpiarFormulario();
      RecolectarDatos();
      AgregarInformacion('agregar',NuevoEvento);
      $('#ModalAgregar').modal('toggle');
      alertify.success('SE AGREGÓ CORRECTAMENTE');
  });

  $('#btnEliminar').click(function(){
    RecolectarDatosGUI();
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
        EnviarInformacion('eliminar',NuevoEvento);
        swal("Eliminado!", "Se elimino correctamente.", "success");
      } else {
        swal("Cancelado", "El registro esta a salvo :)", "error");
      }
    });
  });

  $('#btnModificar').click(function(){
      RecolectarDatosGUI();
      EnviarInformacion('modificar',NuevoEvento);
      alertify.success('SE MODIFICO CORRECTAMENTE');


  });

  function RecolectarDatosGUI(){
    NuevoEvento={
      id:$('#txtID').val(),
      title:$('#cliente').val(),
      start:$('#txtFecha').val()+" "+$('#txtHora').val(),
      color:$('#txtColor').val(),
      descripcion:$('#txtDescripcion').val(),
      textColor:"#FFFFFF",
      end:$('#txtFin').val()+" "+$('#txtHoraFin').val()
    };
  }

  function EnviarInformacion(accion,objEvento,modal){
    $.ajax({
      type: 'POST',
      url: '/fitcoControl/Ubicaciones/Corte/actions/acciones.php?accion='+accion,
      data: objEvento,
      success:function(msg){
        if (msg) {
          $('#CalendarioCorte').fullCalendar('refetchEvents');

          if (!modal) {
            $('#ModalEventos').modal('toggle');
          }

        }
      },
      error:function(){
        alert("hay un error..");
      }
    });
  }

  function RecolectarDatos(){
    NuevoEvento={
      title:$('#_cliente').val(),
      start:$('#_txtFecha').val()+" "+$('#_txtHora').val(),
      color:$('#_txtColor').val(),
      descripcion:$('#_txtDescripcion').val(),
      textColor:"#FFFFFF",
      end:$('#_txtFin').val()+" "+$('#_txtHoraFin').val()
    };
  }

  function AgregarInformacion(accion,objEvento,modal){
    $.ajax({
      type: 'POST',
      url: '/fitcoControl/Ubicaciones/Corte/actions/acciones.php?accion='+accion,
      data: objEvento,
      success:function(msg){
        if (msg) {
          $('#CalendarioCorte').fullCalendar('refetchEvents');

          if (!modal) {
            $('#ModalAgregar').modal('toggle');
          }

        }
      },
      error:function(){
        alert("hay un error..");
      }
    });
  }

  function limpiarFormulario(){
    $('#tituloEvento').html('');
    $('#txtID').val('');
    $('#txtColor').val('');
    $('#cliente').val('');
    $('#txtDescripcion').val('');
  }



});



//CORTE DIARIO
function CorteDiario(){
  $.ajax({
    method: 'POST',
    url:'/fitcoControl/Ubicaciones/Corte/actions/mostrar.php',
    success: function(r){
      // console.log(r);
      r = JSON.parse(r);
      if (r.code == 1) {
        $('#mostrarCorte').html(r.data);
        ActivarBotones();
      } else {
        console.error(r.message);
      }
    }
  })
}


function ActivarBotones(){
  $('.agregarCorte').unbind();
  $('.agregarCorte').click(function(){
    var idProg = $(this).attr('db-id')
    $('#mcor_id').val(idProg);
    $('#agregarCorte').modal('show');
  });

  $('.AgregarCor').unbind();
  $('.AgregarCor').click(function(){
    var data = {
  		fk_CorteCalendario: $('#mcor_id').val(),
      fechaIntroduccion: $('#mcor_fint').val(),
      metaCorte: $('#mcor_meta').val(),
      cantidadCorte: $('#mcor_cant').val(),
      notaCorte : $('#mcor_not').val()
    }

    validacion =  $('#mcor_id').val() == "" ||
    $('#mcor_fint').val() == "" ||
    $('#mcor_meta').val() == "" ||
    $('#mcor_cant').val() == "";

    if (validacion) {
        swal("NO PUEDE CONTINUAR","Necesita llenar todos los campos","error");
    }else {
      $.ajax({
        method: 'POST',
        url: 'actions/agregar.php',
        data: data,
        success:function(r){
          var r = JSON.parse(r);
          if (r.code != 1) {
            swal("FALLO AL REGISTRAR","No se agregó el registro","error");
            console.error(r.response);
          } else {
            $('.modal').modal('hide');
            alertify.success('SE AGREGÓ CORRECTAMENTE');
            CorteDiario();
          }
        },
        error:function(exception){
          console.error(exception)
        }
      })
    }
  });



  $('.visualizarCorte').click(function(){
    var dbid = $(this).attr('db-id');
    var ajaxCall = $.ajax({
        method: 'POST',
        data:{dbid:dbid},
        url: 'actions/tablaCorte.php'
    });

    ajaxCall.done(function(r) {
      r = JSON.parse(r);
      if (r.code == 1) {
        $('#visualizarCorte').html(r.data);
        ActivarBotones();
      } else {
        console.error(r.message);
      }
    });
  });


  $('tbody').on('click', '.editarCor', function(){
    var dbid = $(this).attr('db-id');
    var tar_modal = $($(this).attr('href'));

    var fetch_corte = $.ajax({
      method: 'POST',
      data: {dbid: dbid},
      url: 'actions/fetch.php'
    });

    fetch_corte.done(function(r){
      r = JSON.parse(r);

      if (r.code == 1) {
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

  $('.Actualizarcor').unbind();
  $('.Actualizarcor').click(function(){


    var data = {
      pk_CorteDiario : $('#pk_CorteDiario').val(),
      fechaIntroduccion : $('#fechaIntroduccion').val(),
      metaCorte : $('#metaCorte').val(),
      cantidadCorte : $('#cantidadCorte').val(),
      notas : $('#notas').val()
    }

    validar = $('#fechaIntroduccion').val() == "" ||
              $('#metaCorte').val() == "" ||
              $('#cantidadCorte').val() == "";

    if (validar) {
      swal("Error","Los campos marcados con (*), son obligatorios","error");
    }else{

      var ajaxCall = $.ajax({
          method: 'POST',
          data: data,
          url: 'actions/editar.php'
      });

      ajaxCall.done(function(r) {
        r = JSON.parse(r);
        if (r.code == 1) {
          CorteDiario();
          swal("Exito", "Se actualizo.", "success");
          $('.modal').modal('hide');
        } else {
          console.error(r.message);
        }
      });
    }
  })


    $('.eliminarCor').unbind();
    $('.eliminarCor').click(function(){
      var dbId = $(this).attr('db-id');
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
          data: {dbId: dbId},

          success: function(r){
            if (r.code != 1) {
              $('.modal').modal('hide');
              CorteDiario();
            }else if (r.code == 1){
              CorteDiario();
              $('.modal').modal('hide');
            }
          },
          error: function(exception){
            console.error(exception)
          }
        });
        CorteDiario();
        swal("Eliminado!", "Se elimino correctamente.", "success");
      } else {
        swal("Cancelado", "El registro esta a salvo :)", "error");
      }
    });
  });

}
