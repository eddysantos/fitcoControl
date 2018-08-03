$(document).ready(function(){
  lineas_Det();


  $('#filter').click(function(){
    var value = $('#fetchval').val();
    var fe = $('#fechaval').val();
    validacion = $('#fechaval').val() == "" ||
    $('#fetchval').val() == "";

    if (validacion) {
      swal("NO PUEDE CONTINUAR","Los dos campos necesitan estar llenos","error");
    }else {
      $.ajax({
        url: 'actions/fetchselect.php',
        method: 'POST',
        data: {request:value, fe:fe},
        success: function(r){
          r = JSON.parse(r);
          if (r.code == 1) {
            $('#tabla_lineas').html(r.data);
          } else {
            console.error(r.message);
          }
        }
      });
    }
  });


$('.filtroRepo').click(function(){
  var fIni = $('#f-Ini').val();
  var fFin = $('#f-Fin').val();
  var linea = $('#lin-linea').val();
  var emp = $('#lin-listaEmp').val();
  var ope = $('#lin_listaOpe').val();

  validacion = $('#f-Ini').val() == ""
  && $('#f-Fin').val() == ""
  && $('#lin-linea').val() == ""
  && $('#lin-listaEmp').val() == ""
  && $('#lin_listaOpe').val() == "";

  if (validacion) {
    swal("NO PUEDE CONTINUAR","Necesita elegir un filtro","error");
    $('#inputfiltros').show();
    $('#reportes').css('display', 'none');

  }else {
    $.ajax({
      url: '/fitcoControl/Ubicaciones/Lineas/actions/fetchRepo.php',
      method: 'POST',
      data: {request:fIni, ffin:fFin, linea:linea, emp:emp, ope:ope},
      success: function(r){
        r = JSON.parse(r);
        if (r.code == 1) {
          $('#tabla_Reportes').html(r.data);
        } else {
          console.error(r.message);
        }
      }
    });
  }
  });
});




//MOSTRAR TABLA
function lineas_Det(){
  $.ajax({
    method: 'POST',
    url:'/fitcoControl/Ubicaciones/Lineas/actions/mostrar.php',
    success: function(r){
      r = JSON.parse(r);
      if (r.code == 1) {
        $('#tabla_lineas').html(r.data);
      } else {
        console.error(r.message);
      }
    }
  })
}

//DIV BUSCARDOR
$('.buscador').hover(function(){
  var accion = $(this).attr('accion');
  var status = $(this).attr('status');

  switch (accion) {
    case "msearch":
      if (status == 'cerrado') {
        $(this).attr('status','abierto');
        $('#tablaLineas').animate({"right": "4%"}, "slow");
        $('#NuevaProduccion').hide();
        $('.ef').css('font-size','16px');


      }else {
        $('.spanB').css('display', '');
        $(this).attr('status', 'cerrado');
      }
      break;
    default:
      console.error("Something went terribly wrong...");
  }
});

$('.consultar').click(function(){
  var accion = $(this).attr('accion');
  var status = $(this).attr('status');

  switch (accion) {
    case "agproduccion":
    if (status == 'cerrado') {
      $(this).attr('status', 'abierto');
      $('#tablaLineas').animate({"right": "36%"}, "slow");
      $('.ef').css('font-size','14px');
      $('#NuevaProduccion').fadeIn(2500);
      $('#SinRegistros').fadeOut();
    }else {
      $(this).attr('status', 'cerrado');
      $('#tablaLineas').animate({"right": "4%"}, "slow");
      $('#NuevaProduccion').hide();
      $('.ef').css('font-size','16px');

    }
    break;

    case "verEfi":
    if (status == 'cerrado') {
      $(this).attr('status', 'abierto');
      $('.m').css('display', 'inherit');
      $('tr#item').addClass('bsha');
    }else {
      $(this).attr('status', 'cerrado');
      $('.m').css('display', 'none');
      $('tr#item').removeClass('bsha');
    }
    break;

    case "diariaLin":
    if (status == 'cerrado') {
      $(this).attr('status', 'abierto');
      $('#graficadiariaLin').css('display', 'inherit');
    }
    break;

    case "filtroRepo":
    if (status == 'cerrado') {
      $(this).attr('status', 'abierto');
      $('#reportes').css('display', 'inherit');
      $('#inputfiltros').hide();
    }else {
      $(this).attr('status', 'cerrado');
      $('#reportes').css('display', 'none');
      $('#inputfiltros').show();
    }
    break;

    case "backRepo":
    if (status == 'cerrado') {
      $(this).attr('status', 'abierto');
      $('#filtroRepo').attr('status', 'cerrado');
      $('#reportes').css('display', 'none');
      $('#inputfiltros').show();
    }else {
      $(this).attr('status', 'cerrado');
      $('#reportes').css('display', 'inherit');
      $('#inputfiltros').hide();
    }
    break;
    default:
      console.error("Something went terribly wrong...");
  }
});



// mostrar divs en modal
$('.lt-lin').click(function(){
  var accion = $(this).attr('accion');
  var status = $(this).attr('status');

  switch (accion) {
    case "empleado":
      $('#lis-empleado').fadeIn();
      $('#add-empleado').fadeIn();
      $('#lis-operacion').hide();
      $('#add-operacion').hide();
      break;

    case "operacion":
      $('#lis-operacion').fadeIn();
      $('#lis-empleado').hide();
      $('#add-operacion').fadeIn();
      $('#add-empleado').hide();

      break;
    default:
      console.error("Something went terribly wrong...");
  }
});

//AGREGAR NUEVO REGISTRO EN LINEA
$('#NuevoRegistroLin').click(function(){
  var data = {
		linea: $('#lin_linea').val(),
    fecha: $('#lin_fecha').val(),
    ope: $('#lin_ope').val(),
    emp: $('#lin_empleado').val(),
    meta : $('#lin_meta').val(),
    produc: $('#lin_pro').val()
  }

  validacion = $('#lin_linea').val() == "" ||
  $('#lin_fecha').val() == "" ||
  $('#lin_ope').val() == "" ||
  $('#lin_empleado').val() == "" ||
  $('#lin_pro').val() == "" ||
  $('#lin_meta').val() == "";

  if (validacion) {
    swal("NO PUEDE CONTINUAR","Todos los campos necesitan estar llenos","error");
  }else {
	$.ajax({
		type: "POST",
		url: "/fitcoControl/Ubicaciones/Lineas/actions/agregar.php",
		data: data,
		success: 	function(request){
			r = JSON.parse(request);
      if (r.code == 1) {
        alertify.success('SE AGREGÓ CORRECTAMENTE');
        $('#NuevaProduccion').hide();
        $('.spanA').css('display', '');
        $('#tablaLineas').animate({"right": "4%"}, "slow");
        lineas_Det();
			} else {
        swal("FALLO AL REGISTRAR","No se agregó el registro","error");

				console.error(r.message);
			}
		}
	});
  }
});

//ADD EMPLEADO
$('#add-empleado').click(function(){
  var data = {
		nemp: $('#a-numEmp').val(),
    nombre: $('#a-nombre').val(),
    apellido: $('#a-apellido').val(),
    area: $('#a-area').val()
  }

  validacion = $('#a-numEmp').val() == "" ||
  $('#a-nombre').val() == "" ||
  $('#a-apellido').val() == "" ||
  $('#a-area').val() == "";


  if (validacion) {
    swal("NO PUEDE CONTINUAR","Necesita llenar todos los campos","error");
  }else {
  	$.ajax({
  		type: "POST",
  		url: "/fitcoControl/Ubicaciones/Lineas/actions/addEmpleado.php",
  		data: data,
  		success: 	function(request){
  			r = JSON.parse(request);
        if (r.code == 1) {
          alertify.success('SE AGREGÓ CORRECTAMENTE');
          $('.modal').modal('hide');
          $('.spanA').css('display', '');
          lineas_Det();

  			} else {
          swal("FALLO AL REGISTRAR","No se agregó el registro","error");
  				console.error(r.message);
  			}
  		}
  	});
  }
});

//ADD EMPLEADO
$('#add-operacion').click(function(){
  var data = {
		oper: $('#a-operacion').val()
  }

  validacion =  $('#a-operacion').val() == "";

  if (validacion) {
    swal("NO PUEDE CONTINUAR","El Campo esta vacio","error");
  }else {
  	$.ajax({
  		type: "POST",
  		url: "/fitcoControl/Ubicaciones/Lineas/actions/addOperacion.php",
  		data: data,
  		success: 	function(request){
  			r = JSON.parse(request);
        if (r.code == 1) {
          alertify.success('SE AGREGÓ CORRECTAMENTE');
          $('.modal').modal('hide');
          $('.spanA').css('display', '');
          lineas_Det();
  			} else {
          swal("FALLO AL REGISTRAR","No se agregó el registro","error");
  				console.error(r.message);
  			}
  		}
  	});
  }
});


//PASAR DATOS A MODAL
$('tbody').on('click', '.editar-linea', function(){
  var dbid = $(this).attr('db-id');
  var tar_modal = $($(this).attr('href'));
  var fetch_linea = $.ajax({
    method: 'POST',
    data: {dbid: dbid},
    url: 'actions/fetchDetalleLineas.php'
  });

  fetch_linea.done(function(r){
    r = JSON.parse(r);
    if (r.code == 1) {

    for (var key in r.data) {
      if ($('#' + key).is('select')) {
        continue;
      }

      if (r.data.hasOwnProperty(key)) {
        $('#' + key).html(r['data'][key]).val(r['data'][key]).addClass('has-content');
        if ( typeof($('#'+key).attr('db-id')) != 'undefined' && $('#'+key).attr('db-id') !== false) {
          $('#' + key).attr('db-id', r['data'][key]);
        }
      }
    }
    $('#medit-linea').attr('db-id', r.data.pk_linea);
    tar_modal.modal('show');

    } else {
      console.error(r);
    }
  })

})

//ACTUALIZAR HORAS

$('tbody').on('click', '.addProducc', function(){
  var dbid = $(this).attr('db-id');
  var tar_modal = $($(this).attr('href'));
  var fetch_linea = $.ajax({
    method: 'POST',
    data: {dbid: dbid},
    url: 'actions/fetchDetalleLineas.php'
  });

  fetch_linea.done(function(r){
    r = JSON.parse(r);
    if (r.code == 1) {

    for (var key in r.data) {
      if ($('#' + key).is('select')) {
        continue;
      }

      if (r.data.hasOwnProperty(key)) {
        $('#' + key).html(r['data'][key]).val(r['data'][key]).addClass('has-content');
        if ( typeof($('#'+key).attr('db-id')) != 'undefined' && $('#'+key).attr('db-id') !== false) {
          $('#' + key).attr('db-id', r['data'][key]);
        }
      }
    }
    $('#add-producc').attr('db-id', r.data.pk_linea);
    tar_modal.modal('show');
    } else {
      console.error(r);
    }
  })
})

// EDITAR DATOS
$('#add-producc').click(function(){
  var data = {
    id: $('#pk_linea').val(),
    prod2: $('#prod2').val(),
    prod3: $('#prod3').val(),
    prod4: $('#prod4').val(),
    prod5: $('#prod5').val(),
    prod6: $('#prod6').val(),
    prod7: $('#prod7').val(),
    prod8: $('#prod8').val(),
    prod9: $('#prod9').val(),
    prod10: $('#prod10').val()
  }

  validacion = $('#prod2').val() == "" ||
  $('#prod3').val() == "" ||
  $('#prod4').val() == "" ||
  $('#prod5').val() == "" ||
  $('#prod6').val() == "" ||
  $('#prod7').val() == "" ||
  $('#prod8').val() == "" ||
  $('#prod9').val() == "" ||
  $('#prod10').val() == "" ;


  if (validacion) {
    swal("NO PUEDE CONTINUAR","Llene los demas campos con 0 para continuar","error");
  }else {
    $.ajax({
      type: "POST",
      url:'/fitcoControl/Ubicaciones/Lineas/actions/actualizarProdHora.php',
      data: data,
      success: 	function(r){
        console.log(r);
        r = JSON.parse(r);
        if (r.code == 1) {
          lineas_Det();
          swal("Exito", "Se agrego correctamente.", "success");
          $('.modal').modal('hide');
        } else {
          console.error(r.message);
          alertify.error('NO SE MODIFICÓ NINGUN REGISTRO');
          $('.modal').modal('hide');

        }
      },
      error: function(x){
        console.error(x);
        swal("Algo Fallo", "Favor de notificar a sistemas.", "error");

      }
    });
  }
});



// EDITAR DATOS
$('#medit-linea').click(function(){
  var data = {
    id: $('#pk_linea').attr('db-id'),
    mlinea: $('#linea').val(),
    mfecha: $('#fecha').val(),
    mope: $('#operacion').val(),
    mnombre: $('#nombre').val(),
    mmeta: $('#meta').val(),
    mprod: $('#prod1').val()
  }

  $.ajax({
    type: "POST",
    url:'/fitcoControl/Ubicaciones/Lineas/actions/editar.php',
    data: data,
    success: 	function(r){
      console.log(r);
      r = JSON.parse(r);
      if (r.code == 1) {
        lineas_Det();
        swal("Exito", "La cuenta se actualizó correctamente.", "success");
        $('.modal').modal('hide');

      } else {
        console.error(r.message);
        alertify.error('NO SE MODIFICÓ NINGUN REGISTRO');

      }
    },
    error: function(x){
      console.error(x);
      swal("Algo Fallo", "Favor de notificar a sistemas.", "error");

    }
  });
  $('.modal').modal('hide');
});
