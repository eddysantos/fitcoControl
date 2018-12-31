$(document).ready(function(){
Program_Det();

  $('#proReg').click(function(){
    $('#registrarProg').fadeIn();
    $('#calendarioProgram').fadeOut();
  });

  $('#proCal').click(function(){
    $('#registrarProg').fadeOut();
    $('#calendarioProgram').fadeIn();
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
    //agregar Evento
    dayClick: function(date,jsEvent,view){
      // limpiarFormulario();

      $('#_txtFecha').val(date.format());
      $('#_txtFin').val(date.format());

      $('#ModalAgregar').modal();
    },

    //Muestra todos los eventos que estan en la base de datos
    events: '/fitcoControl/Ubicaciones/Programacion/actions/acciones.php',


    // solo ver informacion
    eventClick: function(calEvent,jsEvent,view){
      $('#tituloEvento').html(calEvent.title);
      $('#txtID').val(calEvent.pk_programacion);
      $('#txtColor').val(calEvent.color);
      $('#cliente').val(calEvent.title);
      $('#corte').val(calEvent.corte);
      $('#txtDescripcion').val(calEvent.piezasRequeridas);
      $('#piezasDiarias').val(calEvent.piezasDiarias);
      $('#piezasHora').val(calEvent.piezasHora);
      $('#horasNecesarias').val(calEvent.horasNecesarias);

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
      $('#corte').val(calEvent.corte);
      $('#txtDescripcion').val(calEvent.piezasRequeridas);
      $('#piezasDiarias').val(calEvent.piezasDiarias);
      $('#piezasHora').val(calEvent.piezasHora);
      $('#horasNecesarias').val(calEvent.horasNecesarias);

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
      corte:$('#corte').val(),
      piezasDiarias:$('#piezasDiarias').val(),
      piezasHora:$('#piezasHora').val(),
      horasNecesarias:$('#horasNecesarias').val(),
      textColor:"#FFFFFF",
      end:$('#txtFin').val()+" "+$('#txtHoraFin').val()
    };
  }

  function EnviarInformacion(accion,objEvento,modal){
    $.ajax({
      type: 'POST',
      url: '/fitcoControl/Ubicaciones/Programacion/actions/acciones.php?accion='+accion,
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



  $('#btnAgregar').click(function(){
      RecolectarDatos();
      AgregarInformacion('agregar',NuevoEvento);
      $('#ModalAgregar').modal('toggle');
      alertify.success('SE AGREGÓ CORRECTAMENTE');
  });

  function RecolectarDatos(){
    NuevoEvento={
      title:$('#_cliente').val(),
      start:$('#_txtFecha').val()+" "+$('#_txtHora').val(),
      color:$('#_txtColor').val(),
      descripcion:$('#_txtDescripcion').val(),
      corte:$('#_corte').val(),
      piezasDiarias:$('#_piezasDiarias').val(),
      piezasHora:$('#_piezasHora').val(),
      horasNecesarias:$('#_horasNecesarias').val(),
      textColor:"#FFFFFF",
      end:$('#_txtFin').val()+" "+$('#_txtHoraFin').val()
    };
  }

  function AgregarInformacion(accion,objEvento,modal){
    $.ajax({
      type: 'POST',
      url: '/fitcoControl/Ubicaciones/Programacion/actions/acciones.php?accion='+accion,
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


//MOSTRAR TABLA
function Program_Det(){
  $.ajax({
    method: 'POST',
    url:'/fitcoControl/Ubicaciones/Programacion/actions/mostrar.php',
    success: function(r){
      r = JSON.parse(r);
      if (r.code == 1) {
        $('#tabla_Programacion').html(r.data);
      } else {
        console.error(r.message);
      }
    }
  })
}


//AGREGAR NUEVO REGISTRO EN LINEA
$('#AgregarProgram').click(function(){
  var data = {
		color: $('#add_color').val(),
    title: $('#add_title').val(),
    piezasRequeridas: $('#add_piezasRequeridas').val(),
    corte: $('#add_corte').val(),
    piezasDiarias : $('#add_piezasDiarias').val(),
    piezasHora : $('#add_piezasHora').val(),
    horasNecesarias : $('#add_horasNecesarias').val(),
    start:$('#add_start').val()+" "+$('#add_HoraStart').val(),
    textColor:"#FFFFFF",
    end:$('#add_end').val()+" "+$('#add_HoraEnd').val()
  }

	$.ajax({
		type: "POST",
		url: "/fitcoControl/Ubicaciones/Programacion/actions/agregar.php",
		data: data,
		success: 	function(r){
      console.log(r);
			r = JSON.parse(r);
      if (r.code == 1) {
        alertify.success('SE AGREGÓ CORRECTAMENTE');
        $('.modal').modal('hide');
        Program_Det();
			} else {
        swal("FALLO AL REGISTRAR","No se agregó el registro","error");
				console.error(r.message);
			}
		}
	});
});


function fechadias(){
    fecha_inicio = $('#add_start').val();
    date = fecha_inicio.split("-").join("-");

    dias = Math.round($('#add_horasNecesarias').val() / 9);

    dateparts = date.split('-').map(d => parseInt(d));
    if (dateparts.length !== 3 || !dateparts.every(d => !isNaN(d))){
      alert('La fecha no tiene un formato correcto');
      return;
    }

    fechaDate = new Date(dateparts[0], dateparts[1]-1, dateparts[2]);


    // var fechaDate = new Date(dateparts[2], dateparts[1]-1, dateparts[0]);


    diasNum = parseInt(dias);
    if (isNaN(diasNum)){
      alert('El numero de dias no tiene un formato correcto');
    }


    fechaDate.setDate(fechaDate.getDate() + diasNum);
    console.log(fechaDate.toLocaleDateString());

    console.log('El resultado de sumar ' + dias + ' días a la fecha ' + date + ' es ' + fechaDate.toLocaleDateString());

    // $('#add_end').val(fechaDate.toLocaleDateString());
}


// calculos
function calculo(){
  prendasxhora = $('#_piezasDiarias').val() / 9;
  $('#_piezasHora').val(prendasxhora);

  horasRequeridas =  $('#_txtDescripcion').val() / $('#_piezasHora').val() + 3;
  $('#_horasNecesarias').val(horasRequeridas);

  prendasxhora_m = $('#piezasDiarias').val() / 9;
  $('#piezasHora').val(prendasxhora_m);

  horasRequeridas_m =  $('#txtDescripcion').val() / $('#piezasHora').val() + 3;
  $('#horasNecesarias').val(horasRequeridas_m);


  prendasxhora_add = $('#add_piezasDiarias').val() / 9;
  $('#add_piezasHora').val(prendasxhora_add);

  horasRequeridas_add =  $('#add_piezasRequeridas').val() / $('#add_piezasHora').val() + 3;
  $('#add_horasNecesarias').val(horasRequeridas_add);
  diasNecesarios = Math.round($('#add_horasNecesarias').val() / 9);


    hoy = $('#add_start').val();
    devolucion = new Date();
    devolucion.setDate(hoy + 1);

    console.log("Fecha actual: ", hoy);
    console.log("Fecha devolucion: ", devolucion);

  // fecha = $('#add_start').val();
  // fecha.setDate(fecha.getDate() + diasNecesarios);
  // diaNuevo =  + horasNecesarias_add;

  // $('#add_end').val($('#add_start').val() + horasNecesarias_add);
  // console.log(fecha);

}
