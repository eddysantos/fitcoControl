$(document).ready(function(){

  $('#CalendarioWeb').fullCalendar({
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
    events: '/fitcoControl/Resources/PHP/Programacion/calendarioProgramacion.php',


    // solo ver informacion
    eventClick: function(calEvent,jsEvent,view){
      $('#tituloEvento').html(calEvent.title);
      $('#txtID').val(calEvent.pk_programacion);
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
      $('#txtID').val(calEvent.pk_programacion);
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
      RecolectarDatos();
      Validacion();
      $('#ModalAgregar').modal('toggle');
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
      ValidarModificar();
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

  function ValidarModificar(){
    if ($('#txtFecha').val() > $('#txtFin').val()) {
      swal("NO PUEDE CONTINUAR","La fecha de inicio no puede ser mayor a la fecha final","error");
    }else if ($('#cliente').val() == "" || $('#txtFecha').val() == "" || $('#txtDescripcion').val() == "" || $('#txtFin').val() == "") {
      swal("NO PUEDE CONTINUAR","Todos los datos necesitan estar llenos","error");
    }else {
      EnviarInformacion('modificar',NuevoEvento);
      alertify.success('SE MODIFICO CORRECTAMENTE');
    }
  }

  function EnviarInformacion(accion,objEvento,modal){
    $.ajax({
      type: 'POST',
      url: '/fitcoControl/Resources/PHP/Programacion/calendarioProgramacion.php?accion='+accion,
      data: objEvento,
      success:function(msg){
        if (msg) {
          $('#CalendarioWeb').fullCalendar('refetchEvents');

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

  function Validacion(){
    if ($('#_txtFecha').val() > $('#_txtFin').val()) {
      swal("NO PUEDE CONTINUAR","La fecha de inicio no puede ser mayor a la fecha final","error");
    }else if ($('#_cliente').val() == "" || $('#_txtFecha').val() == "" || $('#_txtDescripcion').val() == "" || $('#_txtFin').val() == "") {
      swal("NO PUEDE CONTINUAR","Todos los datos necesitan estar llenos","error");
    }else {
      AgregarInformacion('agregar',NuevoEvento);
      alertify.success('SE AGREGÓ CORRECTAMENTE');
    }
  }


  function AgregarInformacion(accion,objEvento,modal){
    $.ajax({
      type: 'POST',
      url: '/fitcoControl/Resources/PHP/Programacion/calendarioProgramacion.php?accion='+accion,
      data: objEvento,
      success:function(msg){
        if (msg) {
          $('#CalendarioWeb').fullCalendar('refetchEvents');

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
