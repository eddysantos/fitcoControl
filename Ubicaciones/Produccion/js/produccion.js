$(document).ready(function(){
fetchProProduccion();

$(function(){
  data = {
    period: $('#pro_periodo').val(),
    date_from: $('#dates_pro_chart').find('.date-from').val(),
    date_to: $('#dates_pro_chart').find('.date-to').val(),
  };

console.log('hola');
  var pull_chart = $.ajax({
    method: 'POST',
    data: data,
    url: 'actions/grafica.php'
  });

  pull_chart.done(function(r){
    r = JSON.parse(r);
    console.log(r);
    if (r.code == '2') {
      r.to_chart = {};
    }
    pro_chart = c3.generate({
      bindto: '#g-produccion',
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


$('#pro_load').click(function(){
  // alert("presiono pro_load");
  data = {
    period: $('#pro_periodo').val(),
    date_from: $('#dates_pro_chart').find('.date-from').val(),
    date_to: $('#dates_pro_chart').find('.date-to').val(),
  };

  var pull_chart = $.ajax({
    method: 'POST',
    data: data,
    url: 'actions/grafica.php'
  });

  pull_chart.done(function(r){
    r = JSON.parse(r);
    console.log(r);
    pro_chart.load({columns: r.to_chart});
  });
});
});



function fetchProProduccion(){
  $.ajax({
    method: 'POST',
    url:'actions/mostrar.php',
  }).done(function(r) {
    r = JSON.parse(r);
    if (r.code == 1) {
      $('#mostrarProduccion').html(r.data);
          ActivarBotonProduc();
    } else {
      console.error(r.message);
    }
  });
}


$(document).on('keyup', '#busqueda', function(){
  var valorBusqueda = $(this).val();
  if (valorBusqueda!= "") {
    fetchProProduccion(valorBusqueda);
  }else {
    fetchProProduccion();
  }
});

function ActivarBotonProduc(){
  $('.agregarproduccion').unbind();
  $('.agregarproduccion').click(function(){
    var idProg = $(this).attr('program-id')
    $('#mpro_idprog').val(idProg);
    $('#AgregarProduccion').modal('show');
  });

  //AGREGAR PRODUCCION MODAL
    $('.AgregarPro').unbind();
    $('.AgregarPro').click(function(){

      var fk_programacion = $('#mpro_idprog').val();
      var fechaIntroduccion = $('#mpro_fint').val();
      var metaProduccion = $('#mpro_meta').val();
      var cantidadProduccion = $('#mpro_cant').val();
      var notaProduccion = $('#mpro_not').val();

      validacion =  $('#mpro_idprog').val() == "" ||
      $('#mpro_fint').val() == "" ||
      $('#mpro_meta').val() == "" ||
      $('#mpro_cant').val() == "";

      if (validacion) {
          swal("NO PUEDE CONTINUAR","Necesita llenar todos los campos","error");
      }else {
        $.ajax({
          method: 'POST',
          url: 'actions/AgregarProduccion.php',
          data: {

            mpro_idprog: fk_programacion,
            mpro_fint: fechaIntroduccion,
            mpro_meta: metaProduccion,
            mpro_cant: cantidadProduccion,
            mpro_not: notaProduccion
          },
          success:function(result){
            var rsp = JSON.parse(result);
            if (rsp.code != 1) {
              swal("FALLO AL REGISTRAR","No se agregó el registro","error");
              console.error(rsp.response);
            } else {
              $('#AgregarProduccion').modal('hide');
              alertify.success('SE AGREGÓ CORRECTAMENTE');
              fetchProProduccion();
              // fetchTablaGrafica();
            }
          },
          error:function(exception){
            console.error(exception)
          }
        })
      }
    });




    $('.visualizarproduccion').click(function(){
      var idProg = $(this).attr('program-id');
      $.ajax({
        method: 'POST',
        url:'actions/TablaProduccion.php',
        data:{idProg:idProg},
        success:function(result){
          var rsp = JSON.parse(result);
          console.log(rsp);
          $('#visualizarProduccion').html(rsp.infoTabla);
          ActivarBotonProduc();
        },
        error:function(exception){
          console.error(exception)
        }
      })
    });


    $('.editarProduc').unbind();
    $('.editarProduc').click(function(){
      var IdProduc = $(this).attr('pro-id');
      $.ajax({

        method: 'POST',
        url: 'actions/fetchProducData.php',
        data: {IdProduc: IdProduc},

        success: function(result){
          var rsp = JSON.parse(result);
          console.log(rsp);
          if (rsp.code == 1) {
            $('#mpr_id').val(rsp.response.pk_produccion);
            $('#mpr_fecha').val(rsp.response.fechaIntroduccion);
            $('#mpr_meta').val(rsp.response.metaProduccion);
            $('#mpr_elaborado').val(rsp.response.cantidadProduccion);
            $('#mpr_not').val(rsp.response.notas);

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

    $('.ActualizarProd').unbind();
    $('.ActualizarProd').click(function(){
      var id = $('#mpr_id').val();
      var ff = $('#mpr_fecha').val();
      var mm = $('#mpr_meta').val();
      var ee = $('#mpr_elaborado').val();
      var nt = $('#mpr_not').val();

      $.ajax({
        method: 'POST',
        url: 'actions/EditProdData.php',
        data: {
          id: id,
          ff: ff,
          mm: mm,
          ee: ee,
          nt: nt
        },
        success:function(result){
          console.log(result);
          if (result != 1) {
            alertify.error('NO SE MODIFICÓ NINGUN REGISTRO');
            $('#EdProd').modal('hide');
            $('#VisualizarTablaProduccion').modal('hide');
            fetchProProduccion();
          }else {
            $('#EdProd').modal('hide');
            $('#VisualizarTablaProduccion').modal('hide');
            fetchProProduccion();
            alertify.success('SE MODIFICÓ CORRECTAMENTE');
          }
        },
        error:function(exception){
          console.error(exception)
        }
      });
    });

    $('.eliminarProduc').unbind();
    $('.eliminarProduc').click(function(){
      var IdProduc = $(this).attr('pro-id');
      $.ajax({
        method: 'POST',
        url: 'actions/EliminarProducData.php',
        data: {IdProduc: IdProduc},

        success: function(result){
          console.log(result);
          if (result != 1) {
            alertify.error('NO SE PUDO ELIMINAR');
          }else {
            alertify.success('SE ELIMINO REGISTRO');
            $('#VisualizarTablaProduccion').modal('hide');
            fetchProProduccion();
          }
        },
        error: function(exception){
          console.error(exception)
        }
      });
    });
}
