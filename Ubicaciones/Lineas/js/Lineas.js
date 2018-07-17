$(document).ready(function(){
  lineas_Det();

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
        lineas_Det();
			} else {
        swal("FALLO AL REGISTRAR","No se agregó el registro","error");

				console.error(r.message);
			}
		}
	});
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
    // url: 'actions/editar.php',
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
      }
    },
    error: function(x){
      console.error(x);
    }
  });
$('.modal').modal('hide');
});
