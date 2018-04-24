$(document).ready(function(){

  $('#_cliente').keyup(function(){
    var txt = $(this).val();
    if (txt == "") {
      $('#mpgr_ClientList').fadeOut();
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
          $('#mpgr_ClientList').html("<p>Hubo un error al cargar la lista de clientes...</p>");
          console.warn("Error en el query: " + rsp.response);
        } else {
          $('#mpgr_ClientList').html(rsp.response);
          $('#mpgr_ClientList p').click(function(){
            var cid = $(this).attr('client-id');
            var col = $(this).attr('color');
            var nc = $(this).html();

            $('#_fk_cliente').val(cid).html(cid).attr('client-id', cid);
            $('#_cliente').val(nc).html(nc).attr('client-id', cid);
            $('#_txtColor').val(col).html(col).attr('color', col);
            $('#mpgr_ClientList').fadeOut();
          });
        }
        $('#mpgr_ClientList').fadeIn();
      },
      error: function(exception){
        console.error(exception);
      }
    });
  });


  $('#cliente').keyup(function(){
    var txt = $(this).val();
    if (txt == "") {
      $('#Epgr_ClientList').fadeOut();
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
          $('#Epgr_ClientList').html("<p>Hubo un error al cargar la lista de clientes...</p>");
          console.warn("Error en el query: " + rsp.response);
        } else {
          $('#Epgr_ClientList').html(rsp.response);
          $('#Epgr_ClientList p').click(function(){
            var cid = $(this).attr('client-id');
            var col = $(this).attr('color');
            var nc = $(this).html();

            $('#fk_cliente').val(cid).html(cid).attr('client-id', cid);
            $('#cliente').val(nc).html(nc).attr('client-id', cid);
            $('#txtColor').val(col).html(col).attr('color', col);
            $('#Epgr_ClientList').fadeOut();
          });
        }
        $('#Epgr_ClientList').fadeIn();
      },
      error: function(exception){
        console.error(exception);
      }
    });
  });



  $('#CalendarioWeb').fullCalendar({
    // defaultView: 'month',
    weekNumbers: true,
    weekNumbersWithinDays: true,
    header:{
      left: 'today,prev,next',
      center: 'title',
      right: 'month,basicWeek,basicDay,listWeek'
    },
    // String: 'No hay programaciones para mostrar',
     //Finaliza el header


//agregar Evento
    dayClick: function(date,jsEvent,view){
      $('#_txtFecha').val(date.format());
      $('#_txtFin').val(date.format());

      $('#ModalAgregar').modal();
    },

//Muestra todos los eventos que estan en la base de datos
    events: '/fitcoControl/Resources/PHP/Programacion/calendarioProgramacion.php',


// solo ver informacion
    eventClick: function(calEvent,jsEvent,view){
      $('#tituloEvento').html(calEvent.nombreCliente);
      $('#txtID').val(calEvent.pk_programacion);
      $('#txtColor').val(calEvent.colorCliente);
      $('#cliente').val(calEvent.nombreCliente);
      $('#fk_cliente').val(calEvent.fk_cliente);
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
    // selectable: true,
		// selectHelper: true,


    eventDrop: function(calEvent){
      $('#tituloEvento').html(calEvent.nombreCliente);
      $('#txtID').val(calEvent.pk_programacion);
      $('#txtColor').val(calEvent.colorCliente);
      $('#cliente').val(calEvent.nombreCliente);
      $('#fk_cliente').val(calEvent.fk_cliente);
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
      fk_cliente:$('#fk_cliente').val(),
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
      fk_cliente:$('#_fk_cliente').val(),
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
      url: '/fitcoControl/Resources/PHP/Programacion/calendarioProgramacion.php?accion='+accion,
      data: objEvento,
      success:function(msg){
        if (msg) {
          $('#CalendarioWeb').fullCalendar('refetchEvents');

          if (!modal) {
            $('#ModalAgregar')[0].reset();
            $('#ModalAgregar').modal('toggle');
          }

        }
      },
      error:function(){
        alert("hay un error..");
      }
    });
  }

});
