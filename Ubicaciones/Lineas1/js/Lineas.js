$(document).ready(function(){
  lineas_Det();
  lst_EmpProduc();
  // EmpPro_Det();

  // Agregar Multiple

// $(function(){
//   $.ajax({
//     method: 'POST',
//     url:'actions/fetchAddMultiple.php',
//     success: function(r){
//       console.log(fecha);
//       r = JSON.parse(r);
//       if (r.code == 1) {
//         $('#Emp_produc').html(r.data);
//       } else {
//         console.error(r.message);
//       }
//     }
//   })
// })

$('#updateFecha').click(function(){
  var data = {
    fecha: $('#fechaSelect').val()
  }
  var ajaxCall = $.ajax({
      method: 'POST',
      data: data,
      url: 'actions/modificarFechaMultiple.php'
  });

  ajaxCall.done(function(r) {
    r = JSON.parse(r);
    if (r.code == 1) {
      lst_EmpProduc();
      swal("Exito", "Se actualizo la Fecha.", "success");
    } else {
      console.error(r.message);
    }
  });
})


jQuery(document).on('submit', '#insertMultiple', function(event){
  event.preventDefault();
  $.ajax({
    url: 'actions/addMultiple.php',
    type: 'POST',
    dataType: 'json',
    data: $(this).serialize(),
  })
  .done(function(r){
    if (!r.error) {
      alertify.success('Los Datos se ingresaron correctamente');
      lineas_Det();
      $('.modal').modal('hide');
    }else {
      alertify.error('NO SE PUDO ELIMINAR');
    }
  })
  .fail(function(resp){
    console.log(resp.responseText);
  })
})


  $('#filter').click(function(){
    var ffin = $('#fechafin').val();
    var fini = $('#fechaini').val();
    validacion = $('#fechaini').val() == "" ||
    $('#fechafin').val() == "";

    if (validacion) {
      swal("NO PUEDE CONTINUAR","Los dos campos necesitan estar llenos","error");
    }else {
      $.ajax({
        url: 'actions/fetchselect.php',
        method: 'POST',
        data: {ffin:ffin, fini:fini},
        success: function(r){
          r = JSON.parse(r);
          if (r.code == 1) {
            $('#tabla_lineas').html(r.data);
            ActivarBotones();
          } else {
            console.error(r.message);
          }
        }
      });
    }
  });

  $("#seleccionarFiltros").change(function(){
    if ($(this).val() == 2) {
      $('#filtroEmpleado').show();
      $('#filtroOper').hide();
    }else if ($(this).val() == 1) {
      $('#filtroOper').hide();
      $('#filtroEmpleado').hide();
    }else if ($(this).val() == 3) {
      $('#filtroOper').show();
      $('#filtroEmpleado').hide();
    }
  });


  $('.filtroRepo').click(function(){
    var fIni = $('#f-Ini').val();
    var fFin = $('#f-Fin').val();
    var linea = $('#lin-linea').val();
    var emp = $('#lin-listaEmp').val();
    var ope = $('#lin_listaOpe').val();
      $.ajax({
        url: '/fitcoControl/Ubicaciones/Lineas1/actions/fetchRepo.php',
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
    });
  });



//MOSTRAR TABLA
function lineas_Det(){
  $.ajax({
    method: 'POST',
    url:'/fitcoControl/Ubicaciones/Lineas1/actions/mostrar.php',
    success: function(r){
      r = JSON.parse(r);
      if (r.code == 1) {
        $('#tabla_lineas').html(r.data);
        ActivarBotones();
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
    emp: $('#lin_empleado').val()
  }

  validacion = $('#lin_linea').val() == "" ||
  $('#lin_fecha').val() == "" ||
  $('#lin_empleado').val() == "";

  if (validacion) {
    swal("NO PUEDE CONTINUAR","Todos los campos necesitan estar llenos","error");
  }else {
	$.ajax({
		type: "POST",
		url: "/fitcoControl/Ubicaciones/Lineas1/actions/agregar.php",
		data: data,
		success: 	function(request){
			r = JSON.parse(request);
      if (r.code == 1) {
        alertify.success('SE AGREGÓ CORRECTAMENTE');
        // $('#NuevaProduccion').hide();
        // $('.spanA').css('display', '');
        // $('#tablaLineas').animate({"right": "4%"}, "slow");
        // lineas_Det();
        setTimeout('document.location.reload()',800);
			} else {
        swal("FALLO AL REGISTRAR","No se agregó el registro","error");

				console.error(r.message);
			}
		}
	});
  }
});


$("#agregarMult").click(function(){
  $('#agregarMultiple1').modal('show');
  // $('#agregarMultiple').attr("name", "insertar");
});

// $('#agregarMultiple').click(function(){
// });


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
  		url: "/fitcoControl/Ubicaciones/Lineas1/actions/addEmpleado.php",
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
  		url: "/fitcoControl/Ubicaciones/Lineas1/actions/addOperacion.php",
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

$('tbody').on('click', '.editar-linea', function(){
  var dbid = $(this).attr('db-id');
  var tar_modal = $($(this).attr('href'));
  var fetch_linea = $.ajax({
    method: 'POST',
    data: {dbid: dbid},
    url: '/fitcoControl/Ubicaciones/Lineas1/actions/fetchDetalleLineas.php'
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


//PASAR DATOS A MODAL
$('tbody').on('click', '.editar-lineaProd', function(){
  var dbid = $(this).attr('db-id');
  var tar_modal = $($(this).attr('href'));
  var fetch_prodLinea = $.ajax({
    method: 'POST',
    data: {dbid: dbid},
    url: 'actions/fetchProdLin.php'
  });

  fetch_prodLinea.done(function(r){
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
    tar_modal.modal('show');
    } else {
      console.error(r);
    }
  })
})

$('#medit-producc').click(function(){
  var data = {
    pk_ProdLin: $('#pk_ProdLin').attr('db-id'),
    fk_linea: $('#fk_linea').attr('db-id'),
    operacion: $('#operacion').val(),
    meta: $('#meta').val(),
    prod1: $('#prod1').val(),
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

  $.ajax({
    type: "POST",
    url:'/fitcoControl/Ubicaciones/Lineas1/actions/editarProduccion.php',
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

$('tbody').on('click', '.addProducc', function(){
  var dbid = $(this).attr('db-id');
  $('#add_pk_linea').val(dbid);
  $('#addProducc').modal('show');
})

$('#add-producc').click(function(){
var data = {
  add_pk_linea: $('#add_pk_linea').val(),
  add_operacion: $('#add_operacion').val(),
  add_meta: $('#add_meta').val(),
  add_prod1: $('#add_prod1').val(),
  add_prod2: $('#add_prod2').val(),
  add_prod3: $('#add_prod3').val(),
  add_prod4: $('#add_prod4').val(),
  add_prod5: $('#add_prod5').val(),
  add_prod6: $('#add_prod6').val(),
  add_prod7: $('#add_prod7').val(),
  add_prod8: $('#add_prod8').val(),
  add_prod9: $('#add_prod9').val(),
  add_prod10: $('#add_prod10').val()
}
  $.ajax({
    type: "POST",
    url:'/fitcoControl/Ubicaciones/Lineas1/actions/actualizarProdHora.php',
    data: data,
    success: 	function(r){
      console.log(r);
      r = JSON.parse(r);
      if (r.code == 1) {
        lineas_Det();
        swal("Exito", "Se agrego correctamente.", "success");
        $('.modal').modal('hide');
        setTimeout('document.location.reload()',800);
      } else {
        console.error(r.message);
        alertify.error('NO SE MODIFICÓ NINGUN REGISTRO');
        $('.modal').modal('hide');
        setTimeout('document.location.reload()',800);
      }
    },
    error: function(x){
      console.error(x);
      swal("Algo Fallo", "Favor de notificar a sistemas.", "error");

    }
  });
});



// EDITAR DATOS
$('#medit-linea').click(function(){
  var data = {
    id: $('#pk_linea').attr('db-id'),
    mlinea: $('#linea').val(),
    mfecha: $('#fecha').val(),
    mnombre: $('#nombre').val()
  }

  $.ajax({
    type: "POST",
    url:'/fitcoControl/Ubicaciones/Lineas1/actions/editar.php',
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


function ActivarBotones(){
  $('.visualizarProd').unbind();
  $('.visualizarProd').click(function(){
    var dbid = $(this).attr('db-id');
    console.log(dbid);

    $.ajax({
      method: 'POST',
      url:'/fitcoControl/Ubicaciones/Lineas1/actions/mostrarProduccion.php',
      data:{dbid:dbid},
      success: function(r){
        // console.log(r);
        r = JSON.parse(r);
        if (r.code == 1) {
          $('#produccionLineas').html(r.data);
          ActivarBotones();
        } else {
          console.error(r.message);
        }
      }
    })
  });


    $('.EliminarProd').unbind();
    $('.EliminarProd').click(function(){
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
          url: '/fitcoControl/Ubicaciones/Lineas1/actions/eliminarProd.php',
          data: {dbId: dbId},

          success: function(result){
            console.log(result);
            if (result != 1) {
              alertify.error('NO SE PUDO ELIMINAR');
            }else if (result == 1){
              lineas_Det();
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

    $('.EliminarLinea').unbind();
    $('.EliminarLinea').click(function(){
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
          url: '/fitcoControl/Ubicaciones/Lineas1/actions/eliminar.php',
          data: {dbId: dbId},

          success: function(result){
            console.log(result);
            if (result != 1) {
              alertify.error('NO SE PUDO ELIMINAR');
            }else if (result == 1){
              lineas_Det();
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

$('#add_operacion').keyup(function(e){
	if (e.keyCode === 13 || e.keyCode === 9) {
		$('#add_meta').focus();
	}
});

$('#operacion').keyup(function(e){
	if (e.keyCode === 13 || e.keyCode === 9) {
		$('#meta').focus();
	}
})

function nextFocus(inputF, inputS) {
  document.getElementById(inputF).addEventListener('keydown', function(event) {
    if (event.keyCode == 13) {
      document.getElementById(inputS).focus();
    }
  });
}

function lst_EmpProduc(){
  $.ajax({
    method: 'POST',
    url:'actions/fetchAddMultiple.php',
    success: function(r){
      console.log(fecha);
      r = JSON.parse(r);
      if (r.code == 1) {
        $('#Emp_produc').html(r.data);
      } else {
        console.error(r.message);
      }
    }
  })
}
