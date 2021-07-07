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




function CorteDiario(){
  $.ajax({
    method: 'POST',
    url:'/fitcoControl/Ubicaciones/Corte/actions/mostrar.php',
    success: function(r){
      console.log(r);
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
        url: '/fitcoControl/Ubicaciones/Corte/actions/agregar.php',
        data: data,
        success:function(result){
          var rsp = JSON.parse(result);
          if (rsp.code != 1) {
            swal("FALLO AL REGISTRAR","No se agregó el registro","error");
            console.error(rsp.response);
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
    var idCor = $(this).attr('db-id');
    $.ajax({
      method: 'POST',
      url:'/fitcoControl/Ubicaciones/Corte/actions/tablaCorte.php',
      data:{idCor:idCor},
      success:function(result){
        var rsp = JSON.parse(result);
        console.log(rsp);
        $('#visualizarCorte').html(rsp.infoTabla);
        ActivarBotones();
      },
      error:function(exception){
        console.error(exception)
      }
    })
  });


  $('.editarCor').unbind();
  $('.editarCor').click(function(){
    var dbid = $(this).attr('db-id');
    $.ajax({

      method: 'POST',
      url: '/fitcoControl/Ubicaciones/Corte/actions/fetch.php',
      data: {dbid: dbid},

      success: function(result){
        var rsp = JSON.parse(result);
        console.log(rsp);
        if (rsp.code == 1) {
          $('#Emcor_id').val(rsp.response.pk_CorteDiario);
          $('#Emcor_fint').val(rsp.response.fechaIntroduccion);
          $('#Emcor_meta').val(rsp.response.metaCorte);
          $('#Emcor_cant').val(rsp.response.cantidadCorte);
          $('#Emcor_not').val(rsp.response.notas);

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

  $('.Actualizarcor').unbind();
  $('.Actualizarcor').click(function(){
    var id = $('#Emcor_id').val();
    var ff = $('#Emcor_fint').val();
    var mm = $('#Emcor_meta').val();
    var cc = $('#Emcor_cant').val();
    var nt = $('#Emcor_not').val();

    $.ajax({
      method: 'POST',
      url: '/fitcoControl/Ubicaciones/Corte/actions/editar.php',
      data: {
        id: id,
        ff: ff,
        mm: mm,
        cc: cc,
        nt: nt
      },
      success:function(result){
        console.log(result);
        if (result != 1) {
          alertify.error('NO SE MODIFICÓ NINGUN REGISTRO');
          $('.modal').modal('hide');
          // $('.visualizarCorte').click();
          CorteDiario();
        }else {
          $('.modal').modal('hide');
          CorteDiario();
          alertify.success('SE MODIFICÓ CORRECTAMENTE');
        }
      },
      error:function(exception){
        console.error(exception)
      }
    });
  });


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
        url: '/fitcoControl/Ubicaciones/Corte/actions/eliminar.php',
        data: {dbId: dbId},

        success: function(result){
          console.log(result);
          if (result != 1) {
            $('.modal').modal('hide');
            alertify.error('NO SE PUDO ELIMINAR');
          }else if (result == 1){
            CorteDiario();
            $('.modal').modal('hide');
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
