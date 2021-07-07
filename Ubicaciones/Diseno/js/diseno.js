$(document).ready(function(){
calcular();
calcularmodal();
Diseno_Det();

$(function(){
  data = {
    period: $('#dis_periodo').val(),
    date_from: $('#dates_dis_chart').find('.date-from').val(),
    date_to: $('#dates_dis_chart').find('.date-to').val(),
  };

  var pull_chart = $.ajax({
    method: 'POST',
    data: data,
    url: 'actions/grafica.php'
  });

  pull_chart.done(function(r){
    r = JSON.parse(r);
    console.log(r);
    dis_chart = c3.generate({
      bindto: '#g-diseno',
      data:{
        x: "x",
        columns: r.to_chart,
        labels: true,
      },
      axis: {
        x: {
          type: 'category',
          tick: {
            format: '%Y-%m-%d',
          }
        }
      },
    });
  });
});



$('.reload-chart').click(function(){
  data = {
    period: $('#dis_periodo').val(),
    date_from: $('#dates_dis_chart').find('.date-from').val(),
    date_to: $('#dates_dis_chart').find('.date-to').val(),
  };

  var pull_chart = $.ajax({
    method: 'POST',
    data: data,
    url: 'actions/grafica.php'
  });

  pull_chart.done(function(r){
    r = JSON.parse(r);
    dis_chart.load({columns: r.to_chart});
  });
});



  $('#nuevo_Reg_Dis').click(function(){
    var data = {
      d_fecha: $('#d_fecha').val(),
      d_requerido: $('#d_requerido').val(),
      d_entregados: $('#d_entregados').val(),
  		d_porcentaje: $('#d_porcentaje').val()
    }

    validacion = $('#d_requerido').val() == "" ||
    $('#d_entregados').val() == "" ||
    $('#d_fecha').val()== "";

    if (validacion) {
      swal("NO PUEDE CONTINUAR","Todos los campos necesitan estar llenos","error");
    }else {
  	$.ajax({
  		type: "POST",
  		url: "/fitcoControl/Ubicaciones/Diseno/actions/agregar.php",
  		data: data,
  		success: 	function(request){
        console.log(request);
  			r = JSON.parse(request);
        if (r.code == 1) {
          alertify.success('SE AGREGÓ CORRECTAMENTE');
          Diseno_Det();
          location.reload();
  			} else {
          swal("FALLO AL REGISTRAR","No se agregó el registro","error");
  				console.error(r.message);
          Diseno_Det();
          // location.reload();
  			}
  		 }
  	 });
    }
  });


  $('tbody').on('click', '.editar', function(){
    var dbid = $(this).attr('db-id');
    var tar_modal = $($(this).attr('href'));
    var fetch_diseno = $.ajax({
      method: 'POST',
      data: {dbid: dbid},
      url: 'actions/fetch.php'
    });

    fetch_diseno.done(function(r){
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
    });
  });
});



function calcular(){
  $('#contenido').on('change','#d_requerido,#d_entregados',function(){
    var d_requerido = parseInt($('#d_requerido').val());
    var d_entregados = parseInt($('#d_entregados').val());
    if (isNaN(d_requerido)) {
      d_requerido = 0;
    }
    if (isNaN(d_entregados)) {
      d_entregados = 0;
    }

    $('#d_porcentaje').val(d_entregados/d_requerido*100);
  });
}


function calcularmodal(){
  $('#contenidomodal').on('change','#dis_requerido,#dis_entregados',function(){
    var dis_requerido = parseInt($('#dis_requerido').val());
    var dis_entregados = parseInt($('#dis_entregados').val());
    if (isNaN(dis_requerido)) {
      dis_requerido = 0;
    }
    if (isNaN(dis_entregados)) {
      dis_entregados = 0;
    }

    $('#porcentaje').val(dis_entregados/dis_requerido*100);
  });
}


function Diseno_Det(){
  $.ajax({
    method: 'POST',
    url: '/fitcoControl/Ubicaciones/Diseno/actions/mostrar.php',
    success: function(r){
      r = JSON.parse(r);
      if (r.code == 1) {
        $('#tabla_diseno').html(r.data);
        ActivarBotones();
      } else {
        console.error(r.message);
      }
    }
  })
}


function ActivarBotones(){
  $('.actualizar').unbind();
  $('.actualizar').click(function(){
      var data = {
        pk_diseno: $('#pk_diseno').attr('db-id'),
        dis_requerido: $('#dis_requerido').val(),
        fecha: $('#fecha').val(),
        dis_entregados: $('#dis_entregados').val(),
        porcentaje: $('#porcentaje').val()
      }

      $.ajax({
        type: "POST",
        url: "/fitcoControl/Ubicaciones/Diseno/actions/editar.php",
        data: data,
        success: 	function(r){
          console.log(r);
          r = JSON.parse(r);
          if (r.code == 1) {
            swal("Exito", "El registro actualizó correctamente.", "success");
            Diseno_Det();
            location.reload();
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

    $('.eliminar').unbind();
    $('.eliminar').click(function(){
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
          url: '/fitcoControl/Ubicaciones/Diseno/actions/eliminar.php',
          data: {dbId: dbId},

          success: function(result){
            console.log(result);
            if (result != 1) {
              alertify.error('NO SE PUDO ELIMINAR');
            }else if (result == 1){
              Diseno_Det();
              location.reload();
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
