$(document).ready(function(){
Materia_Det();
// calcular();
calcularmodal();


$(function(){
  data = {
    period: $('#mat_periodo').val(),
    date_from: $('#dates_mat_chart').find('.date-from').val(),
    date_to: $('#dates_mat_chart').find('.date-to').val(),
  };

  var pull_chart = $.ajax({
    method: 'POST',
    data: data,
    url: 'actions/grafica.php'
  });

  pull_chart.done(function(r){
    r = JSON.parse(r);
    console.log(r);
   mat_chart = c3.generate({
      bindto: '#g-materia',
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
    period: $('#mat_periodo').val(),
    date_from: $('#dates_mat_chart').find('.date-from').val(),
    date_to: $('#dates_mat_chart').find('.date-to').val(),
  };

  var pull_chart = $.ajax({
    method: 'POST',
    data: data,
    url: 'actions/grafica.php'
  });

  pull_chart.done(function(r){
    r = JSON.parse(r);
   mat_chart.load({columns: r.to_chart});
  });
});


  $('#nuevo_Reg_Mat').click(function(){
    var data = {
      m_fecha: $('#m_fecha').val(),
      m_entradas: $('#m_entradas').val(),
      m_ent_correctas: $('#m_ent_correctas').val(),
      m_porcentaje: $('#m_porcentaje').val()
    }

    validacion = $('#m_entradas').val() == "" ||
    $('#m_fecha').val()== "";

    if (validacion) {
      swal("NO PUEDE CONTINUAR","Todos los campos necesitan estar llenos","error");
    }else {
    $.ajax({
      type: "POST",
      url: "/fitcoControl/Ubicaciones/MateriaPrima/actions/agregar.php",
      data: data,
      success: 	function(request){
        console.log(request);
        r = JSON.parse(request);
        if (r.code == 1) {
          alertify.success('SE AGREGÓ CORRECTAMENTE');
          Materia_Det();
          location.reload();
        } else {
          swal("FALLO AL REGISTRAR","No se agregó el registro","error");
          console.error(r.message);
          Materia_Det();
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


// function calcular(){
//   $('#contenido').on('change','#m_entradas,#m_ent_correctas',function(){
//     var m_entradas = parseInt($('#m_entradas').val());
//     var m_ent_correctas = parseInt($('#m_ent_correctas').val());
//     if (isNaN(m_entradas)) {
//       m_entradas = 0;
//     }
//     if (isNaN(m_ent_correctas)) {
//       m_ent_correctas = 0;
//     }
//
//     $('#m_porcentaje').val(m_ent_correctas/m_entradas*100);
//   });
// }

function calcularmodal(){
  $('#contenidomodal').on('change','#mat_ent_correctas,#mat_entradas',function(){
    var mat_ent_correctas = parseInt($('#mat_ent_correctas').val());
    var mat_entradas = parseInt($('#mat_entradas').val());
    if (isNaN(mat_ent_correctas)) {
      mat_ent_correctas = 0;
    }
    if (isNaN(mat_entradas)) {
      mat_entradas = 0;
    }

    $('#porcentaje').val(mat_ent_correctas/mat_entradas*100);
  });
}


function Materia_Det(){
  $.ajax({
    method: 'POST',
    url: '/fitcoControl/Ubicaciones/MateriaPrima/actions/mostrar.php',
    success: function(r){
      r = JSON.parse(r);
      if (r.code == 1) {
        $('#tabla_Materia').html(r.data);
        ActivarBotones();
      }else {
        console.error(r.message);
      }
    }
  })
}



function ActivarBotones(){
  $('.actualizar').unbind();
  $('.actualizar').click(function(){
    var data = {
      pk_materia: $('#pk_materia').attr('db-id'),
      mat_entradas: $('#mat_entradas').val(),
      mat_ent_correctas: $('#mat_ent_correctas').val(),
      fecha: $('#fecha').val(),
      porcentaje: $('#porcentaje').val()
    }

    $.ajax({
      type: "POST",
      url: "/fitcoControl/Ubicaciones/MateriaPrima/actions/editar.php",
      data: data,
      success: function(r){
        r = JSON.parse(r);
        if (r.code == 1) {
          swal("Exito","El registro actualizó correctamente","success");
          Materia_Det();
          location.reload();
        }else {
          console.error(r.message);
          Materia_Det();
          location.reload();
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
        url: '/fitcoControl/Ubicaciones/MateriaPrima/actions/eliminar.php',
        data: {dbId: dbId},

        success: function(result){
          console.log(result);
          if (result != 1) {
            alertify.error('NO SE PUDO ELIMINAR');
          }else if (result == 1){
            Materia_Det();
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
