$(document).ready(function(){
Program_Det();

$('.prog').click(function(){
  var accion = $(this).attr('accion');
  var status = $(this).attr('status');

  switch (accion) {
    case "repo":
    if (status == 'cerrado') {
      $('.spanA').css('display', 'inherit');
      $(this).attr('status', 'abierto');
    }else {
      $('.spanA').css('display', '');
      $(this).attr('status', 'cerrado');
    }
    break;

    default:
      console.error("Something went terribly wrong...");
  }
});

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
      $('#txtCliente').val(calEvent.title);
      $('#txtCorte').val(calEvent.corte);
      $('#txtDescripcion').val(calEvent.piezasRequeridas);
      $('#txtpiezasDiarias').val(calEvent.piezasDiarias);
      $('#txtpiezasHora').val(calEvent.piezasHora);
      $('#txthorasNecesarias').val(calEvent.horasNecesarias);

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
      $('#txtCliente').val(calEvent.title);
      $('#txtCorte').val(calEvent.corte);
      $('#txtDescripcion').val(calEvent.piezasRequeridas);
      $('#txtpiezasDiarias').val(calEvent.piezasDiarias);
      $('#txtpiezasHora').val(calEvent.piezasHora);
      $('#txthorasNecesarias').val(calEvent.horasNecesarias);

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

    validar = $('#txtColor').val() == "" ||
    $('#txtCliente').val() == "" ||
    $('#txtDescripcion').val() == "" ||
    $('#txtCorte').val() == "" ||
    $('#txtpiezasDiarias').val() == "" ||
    $('#txtpiezasHora').val() == "" ||
    $('#txthorasNecesarias').val() == "" ||
    $('#txtFecha').val() == "" ||
    $('#txtFin').val() == "";

    if (validar) {
      swal("Error","Necesita llenar todos los campos, puede llenar con cero en caso de no tener informacion","error");
    }else {
      RecolectarDatosGUI();
      EnviarInformacion('modificar',NuevoEvento);
      alertify.success('SE MODIFICO CORRECTAMENTE');
    }
  });

  function RecolectarDatosGUI(){
    NuevoEvento={
      id:$('#txtID').val(),
      title:$('#txtCliente').val(),
      start:$('#txtFecha').val()+" "+$('#txtHora').val(),
      color:$('#txtColor').val(),
      descripcion:$('#txtDescripcion').val(),
      corte:$('#txtCorte').val(),
      piezasDiarias:$('#txtpiezasDiarias').val(),
      piezasHora:$('#txtpiezasHora').val(),
      horasNecesarias:$('#txthorasNecesarias').val(),
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
      validar = $('#_txtColor').val() == "" ||
      $('#_cliente').val() == "" ||
      $('#_txtDescripcion').val() == "" ||
      $('#_corte').val() == "" ||
      $('#_piezasDiarias').val() == "" ||
      $('#_piezasHora').val() == "" ||
      $('#_horasNecesarias').val() == "" ||
      $('#_txtFecha').val() == "" ||
      $('#_txtFin').val() == "";

    if (validar) {
      swal("Error","Necesita llenar todos los campos, puede llenar con cero en caso de no tener informacion","error");
    }else {
      RecolectarDatos();
      AgregarInformacion('agregar',NuevoEvento);
      $('#ModalAgregar').modal('toggle');
      alertify.success('SE AGREGÓ CORRECTAMENTE');
    }
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
    $('#txtCliente').val('');
    $('#txtDescripcion').val('');
  }
});

$('#actualizarProgram').click(function(){
   validar = $('#title').val() == "" ||
   $('#piezasRequeridas').val() == "" ||
   $('#piezasDiarias').val() == "" ||
   $('#piezasNecesarias').val() == "" ||
   $('#piezasHora').val() == "" ||
   $('#end').val() == "" ||
   $('#start').val() == "" ||
   $('#corte').val() == "" ||
   $('#color').val() == "";

  var data = {
    title: $('#title').val(),
    piezasRequeridas: $('#piezasRequeridas').val(),
    color: $('#color').val(),
    textColor: "#FFFFFF",
    start: $('#start').val()+" "+$('#HoraStart').val(),
    end: $('#end').val()+" "+$('#HoraEnd').val(),
    corte: $('#corte').val(),
    piezasDiarias: $('#piezasDiarias').val(),
    piezasHora: $('#piezasHora').val(),
    horasNecesarias: $('#horasNecesarias').val(),
    pk_programacion: $('#pk_programacion').val(),
  }


  if (validar) {
    swal("Error","Necesita llenar todos los campos, puede llenar con cero","error");
  }else{

    var ajaxCall = $.ajax({
        method: 'POST',
        data: data,
        url: 'actions/editar.php'
    });

    ajaxCall.done(function(r) {
      r = JSON.parse(r);
      if (r.code == 1) {
        Program_Det();
        botones();
        swal("Exito", "Se actualizo.", "success");
        $('.modal').modal('hide');
      } else {
        console.error(r.message);
      }
    });
  }
})


$('tbody').on('click', '.EditarProgram', function(){
  var dbid = $(this).attr('db-id');
  var tar_modal = $($(this).attr('href'));

  var fetch_program = $.ajax({
    method: 'POST',
    data: {dbid: dbid},
    url: 'actions/fetch.php'
  });

  fetch_program.done(function(r){
    r = JSON.parse(r);

    if (r.code == 1) {

    console.log(r.data);
    for (var key in r.data) {

      if (r.data.hasOwnProperty(key)) {
        var iterated_element = $('#' + key);
        var element_type = iterated_element.prop('nodeName');
        var dbid = iterated_element.attr('db-id');
        var value = r.data[key];

        iterated_element.val(value).addClass('tiene-contenido');
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


function botones(){
  $('.EliminarProgram').click(function(){
    var pk_programacion = $(this).attr('db-id');
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
          data: {pk_programacion: pk_programacion},
          success: function(r){
            Program_Det();
          },
          error: function(exception){
            console.error(exception)
            alertify.error('NO SE PUDO ELIMINAR');
            Program_Det();
          }
        });
        swal("Eliminado!", "Se elimino correctamente.", "success");
      } else {
        swal("Cancelado", "El registro esta a salvo :)", "error");
        Program_Det();
      }
    });
  });
}





//MOSTRAR TABLA
function Program_Det(){
  $.ajax({
    method: 'POST',
    url:'/fitcoControl/Ubicaciones/Programacion/actions/mostrar.php',
    success: function(r){
      r = JSON.parse(r);
      if (r.code == 1) {
        $('#tabla_Programacion').html(r.data);
        botones();
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
		url: "actions/agregar.php",
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

function fechadias_madd(){
  fecha_inicio = $('#_txtFecha').val();
  date = fecha_inicio.split("-").join("-");

  dias = Math.round($('#_horasNecesarias').val() / 9);

  dateparts = date.split('-').map(d => parseInt(d));
  if (dateparts.length !== 3 || !dateparts.every(d => !isNaN(d))){
    alert('La fecha no tiene un formato correcto');
    return;
  }

  fechaDate = new Date(dateparts[0], dateparts[1]-1, dateparts[2]);
  diasNum = parseInt(dias);
  if (isNaN(diasNum)){
    alert('El numero de dias no tiene un formato correcto');
  }

  fechaDate.setDate(fechaDate.getDate() + diasNum);
  ultimafecha = fechaDate.toLocaleDateString();

  date2 = ultimafecha.split("/").reverse().join("-");
  dateparts2 = date2.split('-').map(d => parseInt(d));
  fechaDate2 = new Date(dateparts2[0], dateparts2[1]-1, dateparts2[2]);


  var d = new Date(fechaDate2),
          month = '' + (d.getMonth() + 1),
          day = '' + d.getDate(),
          year = d.getFullYear();

      if (month.length < 2) month = '0' + month;
      if (day.length < 2) day = '0' + day;

    date3 =  [year, month, day].join('-');

  $('#_txtFin').val(date3);
}


function fechadias_medit(){
  fecha_inicio = $('#txtFecha').val();
  date = fecha_inicio.split("-").join("-");

  dias = Math.round($('#txthorasNecesarias').val() / 9);

  dateparts = date.split('-').map(d => parseInt(d));
  if (dateparts.length !== 3 || !dateparts.every(d => !isNaN(d))){
    alert('La fecha no tiene un formato correcto');
    return;
  }

  fechaDate = new Date(dateparts[0], dateparts[1]-1, dateparts[2]);
  diasNum = parseInt(dias);
  if (isNaN(diasNum)){
    alert('El numero de dias no tiene un formato correcto');
  }

  fechaDate.setDate(fechaDate.getDate() + diasNum);
  ultimafecha = fechaDate.toLocaleDateString();

  date2 = ultimafecha.split("/").reverse().join("-");
  dateparts2 = date2.split('-').map(d => parseInt(d));
  fechaDate2 = new Date(dateparts2[0], dateparts2[1]-1, dateparts2[2]);


  var d = new Date(fechaDate2),
          month = '' + (d.getMonth() + 1),
          day = '' + d.getDate(),
          year = d.getFullYear();

      if (month.length < 2) month = '0' + month;
      if (day.length < 2) day = '0' + day;

    date3 =  [year, month, day].join('-');

  $('#txtFin').val(date3);
}



function fechadias_add(){
  fecha_inicio = $('#add_start').val();
  date = fecha_inicio.split("-").join("-");

  dias = Math.round($('#add_horasNecesarias').val() / 9);

  dateparts = date.split('-').map(d => parseInt(d));
  if (dateparts.length !== 3 || !dateparts.every(d => !isNaN(d))){
    alert('La fecha no tiene un formato correcto');
    return;
  }

  fechaDate = new Date(dateparts[0], dateparts[1]-1, dateparts[2]);
  diasNum = parseInt(dias);
  if (isNaN(diasNum)){
    alert('El numero de dias no tiene un formato correcto');
  }

  fechaDate.setDate(fechaDate.getDate() + diasNum);
  ultimafecha = fechaDate.toLocaleDateString();

  date2 = ultimafecha.split("/").reverse().join("-");
  dateparts2 = date2.split('-').map(d => parseInt(d));
  fechaDate2 = new Date(dateparts2[0], dateparts2[1]-1, dateparts2[2]);


  var d = new Date(fechaDate2),
          month = '' + (d.getMonth() + 1),
          day = '' + d.getDate(),
          year = d.getFullYear();

      if (month.length < 2) month = '0' + month;
      if (day.length < 2) day = '0' + day;

    date3 =  [year, month, day].join('-');

  $('#add_end').val(date3);
}

function fechadias_edit(){
    fecha_inicio = $('#start').val();
    date = fecha_inicio.split("-").join("-");

    dias = Math.round($('#horasNecesarias').val() / 9);

    dateparts = date.split('-').map(d => parseInt(d));
    if (dateparts.length !== 3 || !dateparts.every(d => !isNaN(d))){
      alert('La fecha no tiene un formato correcto');
      return;
    }

    fechaDate = new Date(dateparts[0], dateparts[1]-1, dateparts[2]);
    diasNum = parseInt(dias);
    if (isNaN(diasNum)){
      alert('El numero de dias no tiene un formato correcto');
    }

    fechaDate.setDate(fechaDate.getDate() + diasNum);
    ultimafecha = fechaDate.toLocaleDateString();

    date2 = ultimafecha.split("/").reverse().join("-");
    dateparts2 = date2.split('-').map(d => parseInt(d));
    fechaDate2 = new Date(dateparts2[0], dateparts2[1]-1, dateparts2[2]);


    var d = new Date(fechaDate2),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();

        if (month.length < 2) month = '0' + month;
        if (day.length < 2) day = '0' + day;

      date3 =  [year, month, day].join('-');

    $('#end').val(date3);
}


// calculos
function calculo(){
  // modal Calendario
  prendasxhora = $('#_piezasDiarias').val() / 9;
  $('#_piezasHora').val(prendasxhora);
  horasRequeridas =  $('#_txtDescripcion').val() / $('#_piezasHora').val() + 3;
  $('#_horasNecesarias').val(horasRequeridas);

  prendasxhoraCal = $('#txtpiezasDiarias').val() / 9;
  $('#txtpiezasHora').val(prendasxhoraCal);
  horasRequeridasCal =  $('#txtDescripcion').val() / $('#txtpiezasHora').val() + 3;
  $('#txthorasNecesarias').val(horasRequeridasCal);


  // modal Reporte
  prendasxhora_m = $('#piezasDiarias').val() / 9;
  $('#piezasHora').val(prendasxhora_m);
  horasRequeridas_m =  $('#piezasRequeridas').val() / $('#piezasHora').val() + 3;
  $('#horasNecesarias').val(horasRequeridas_m);

  prendasxhora_add = $('#add_piezasDiarias').val() / 9;
  $('#add_piezasHora').val(prendasxhora_add);
  horasRequeridas_add =  $('#add_piezasRequeridas').val() / $('#add_piezasHora').val() + 3;
  $('#add_horasNecesarias').val(horasRequeridas_add);
  diasNecesarios = Math.round($('#add_horasNecesarias').val() / 9);
}
