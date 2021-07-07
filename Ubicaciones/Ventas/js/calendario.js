$(document).ready(function(){

$('#AgendaVentas').fullCalendar({
    themeSystem: 'bootstrap4',
    defaultView: 'agendaWeek',
    weekNumbers: true,
    eventLimit: true,
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'month,agendaWeek,agendaDay,listMonth'
    },

    businessHours: {
      dow: [ 1, 2, 3, 4, 5,6],
      start: '08:00',
      end: '19:00',
    },

  //agregar Evento
  dayClick: function(date, jsEvent, view, resourceObj) {
    $('#_start').val(date.format());
    $('#_end').val(date.format());

    $('#ModalAgregar').modal();
  },


    events: 'actions/acciones.php',

    editable:true,
    eventLimit: true,
    eventResize: function(calEvent) {
      // alert(event.title + " end is now " + event.end.format());

      // if (!confirm("is this okay?")) {
        $('#tituloEvento').html(calEvent.title);
        $('#pk_agenda').val(calEvent.pk_agenda);
        $('#title').val(calEvent.title);
        $('#cliente').val(calEvent.cliente);
        $('#motivo').val(calEvent.motivo);
        $('#contacto').val(calEvent.contacto);
        $('#telefono').val(calEvent.telefono);

        FechaHora=calEvent.start.format().split("T");
        $('#start').val(FechaHora[0]);
        $('#startHora').val(FechaHora[1]);

        FechaFin = calEvent.end.format().split("T");
        $('#end').val(FechaFin[0]);
        $('#endHora').val(FechaFin[1]);


        RecolectarDatosGUI();
        EnviarInformacion('modificar',NuevoEvento,true);
      // }




    },

    eventClick: function(calEvent,jsEvent,view){
      $('#tituloEvento').html(calEvent.title);
      $('#pk_agenda').val(calEvent.pk_agenda);
      $('#title').val(calEvent.title);
      $('#cliente').val(calEvent.cliente);
      $('#motivo').val(calEvent.motivo);
      $('#contacto').val(calEvent.contacto);
      $('#telefono').val(calEvent.telefono);

      FechaHora = calEvent.start._i.split(" ");
      $('#start').val(FechaHora[0]);
      $('#startHora').val(FechaHora[1]);

      FechaFin = calEvent.end._i.split(" ");
      $('#end').val(FechaFin[0]);
      $('#endHora').val(FechaFin[1]);

      $('#ModalEventos').modal();
    },

    eventDrop: function(calEvent){
      $('#tituloEvento').html(calEvent.title);
      $('#pk_agenda').val(calEvent.pk_agenda);
      $('#title').val(calEvent.title);
      $('#cliente').val(calEvent.cliente);
      $('#motivo').val(calEvent.motivo);
      $('#contacto').val(calEvent.contacto);
      $('#telefono').val(calEvent.telefono);

      FechaHora=calEvent.start.format().split("T");
      $('#start').val(FechaHora[0]);
      $('#startHora').val(FechaHora[1]);

      FechaFin = calEvent.end.format().split("T");
      $('#end').val(FechaFin[0]);
      $('#endHora').val(FechaFin[1]);


      RecolectarDatosGUI();
      EnviarInformacion('modificar',NuevoEvento,true);
    },
    eventRender: function(eventObj, $el){

     $el.popover({
       title: eventObj.cliente,
       trigger: 'hover',
       placement: 'top',
       container: 'body'
     });
    }


  }) //fin del fullcalendar



  var NuevoEvento;
  $('#btnAgregar').click(function(){
    NuevoEvento={
      pk_agenda:$('#_pk_agenda').val(),
      title:$('#_title').val(),
      cliente:$('#_cliente').val(),
      motivo:$('#_motivo').val(),
      contacto:$('#_contacto').val(),
      telefono:$('#_telefono').val(),
      start:$('#_start').val(),
      end:$('#_end').val()
    };


    validacion = $('#_title').val() == "" ||
    $('#_cliente').val() == "" ||
    $('#_motivo').val() == "" ||
    $('#_contacto').val() == "" ||
    $('#_start').val() == "" ||
    $('#_end').val() == "";

    if ($('#_start').val() == $('#_end').val()) {
      swal("NO PUEDE CONTINUAR","La fecha y hora de inicio no puede ser igual o mayor a la final","error");
    }else if (validacion) {
      swal("NO PUEDE CONTINUAR","Todos los datos con obligatiorios","error");
    }else {
      AgregarInformacion('agregar',NuevoEvento);
      $('#ModalAgregar').modal('toggle');
      alertify.success('SE AGREGÓ CORRECTAMENTE');
    }
  })


  function AgregarInformacion(accion,objEvento,modal){
    $.ajax({
      type: 'POST',
      url: 'actions/acciones.php?accion='+accion,
      data: objEvento,
      success:function(msg){
        if (msg) {
          $('#AgendaVentas').fullCalendar('refetchEvents');

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


  $('#btnEliminar').click(function(){
      NuevoEvento = {pk_agenda:$('#pk_agenda').val()};
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
  })



  $('#btnModificar').click(function(){
    RecolectarDatosGUI();

    validacion = $('#title').val() == "" ||
    $('#cliente').val() == "" ||
    $('#motivo').val() == "" ||
    $('#contacto').val() == "" ||
    $('#start').val() == "" ||
    $('#startHora').val() == "" ||
    $('#endHora').val() == "" ||
    $('#end').val() == "";

    if (  ($('#startHora').val() >= $('#endHora').val()) && ($('#start').val() == $('#end').val())  ) {
      swal("NO PUEDE CONTINUAR","La fecha y hora de inicio no puede ser igual o mayor a la final","error");
    }else if (validacion) {
      swal("NO PUEDE CONTINUAR","Todos los datos con obligatiorios","error");
    }else {

      EnviarInformacion('modificar',NuevoEvento);
      alertify.success('SE MODIFICO CORRECTAMENTE');
    }
  });



  function RecolectarDatosGUI(){
    NuevoEvento={
      pk_agenda:$('#pk_agenda').val(),
      title:$('#title').val(),
      cliente:$('#cliente').val(),
      motivo:$('#motivo').val(),
      contacto:$('#contacto').val(),
      telefono:$('#telefono').val(),
      start:$('#start').val()+" "+$('#startHora').val(),
      end:$('#end').val()+" "+$('#endHora').val()
    };
  }

  function EnviarInformacion(accion,objEvento,modal){
    $.ajax({
      type: 'POST',
      url: 'actions/acciones.php?accion='+accion,
      data: objEvento,
      success:function(msg){
        if (msg) {
          $('#AgendaVentas').fullCalendar('refetchEvents');

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


});//FIN DEL DOCUMENTO
