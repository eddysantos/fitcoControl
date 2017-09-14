$(document).ready(function(){

fetchProgramacion();
fetchProProduccion();
fetchTablaGrafica();
$('#previewProgram').click(function(){
  var np = new Array();

  var fi = new Date( $('#produccionFI').val());
  var ff = new Date( $('#produccionFF').val());
  var md = $('#produccionMD').val();

  var test = [
    [ 'Washington', new Date(1789, 3, 30), new Date(1797, 2, 4) ],
    [ 'Adams',      new Date(1796, 2, 4),  new Date(1801, 2, 4) ],
    [ 'Jefferson',  new Date(1801, 2, 4),  new Date(1809, 2, 4) ]
  ];

  np.push(["testClient", fi, ff]);

  dibujarGrafica();

  console.log(np);
})


//BUSCADOR TIEMPO REAL
$('#npClientName').keyup(function(){
  var txt = $(this).val();
  if (txt == "") {
    $('#npClientList').fadeOut();
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
        $('#npClientList').html("<p>Hubo un error al cargar la lista de clientes...</p>");
        console.warn("Error en el query: " + rsp.response);
      } else {
        $('#npClientList').html(rsp.response);
        $('#npClientList p').click(function(){
          var cid = $(this).attr('client-id');
          var nc = $(this).html();

          $('#npClientName').val(nc).html(nc).attr('client-id', cid);
          $('#npClientList').fadeOut();
        });
      }
      $('#npClientList').fadeIn();
      clientSelector();
    },
    error: function(exception){
      console.error(exception);
    }
  });
});

$('.agregar-programacion').click(function(){
  var cId = $('#npClientName').attr('client-id');
  var fi = $('#produccionFI').val();
  var ff = $('#produccionFF').val();
  var pz = $('#produccionPZ').val();
  var md = $('#produccionMD').val();

  validacion = $('#produccionFI').val() == ""
      || $('#produccionFF').val() == ""
      || $('#npClientName').val() == ""
      || $('#produccionPZ').val() == ""
      || $('#produccionMD').val() == "";

  validacionFecha = $('#produccionFI').val() > $('#produccionFF').val();

  if (validacion) {
    swal("NO PUEDE CONTINUAR","Nesesita llenar todos los campos","error");
  } else if (validacionFecha) {
    swal("NO PUEDE CONTINUAR","Su fecha inicio no puede ser mayor a su fecha final","error");
  }else {
    $.ajax({
      method: 'POST',
      url: '/fitcoControl/Resources/PHP/Programacion/addProgramacion.php',
      data: {cId: cId, fi: fi, ff:ff, pz:pz, md:md},
      success: function(result){
        console.log(result);
        dibujarGrafica();
        $('#NuevaProg')[0].reset();
        alertify.success('SE AGREGÓ CORRECTAMENTE');
      },
      error: function(exception){
        console.error(exception);
      }
    })
  }
});

//drawChart();
});

function clientSelector(){
  $('.client-item').click(function(){
    var clientId = $(this).attr('client-id');
    var clientName = $(this).find('span').html();

    $('#npClientName').attr('client-id', clientId);
    $('#npClientName').html(clientName).val(clientName);
    $('#npClientList').fadeOut();
  });
}

//Mostrar Registros en pantalla
function fetchProgramacion(){
  $.ajax({
    method: 'POST',
    url:'/fitcoControl/Resources/PHP/Programacion/MostrarTablaProgramacion.php',
    success:function(result){
      var rsp = JSON.parse(result);
      console.log(rsp);
      $('#MostrartablaProduccion').html(rsp.infoTabla);
      ActivarBotonProgram();
    },
    error:function(exception){
      console.error(exception)
    }
  })
}

//tabla para grafica produccion
function fetchTablaGrafica(){
  $.ajax({
    method: 'POST',
    url:'/fitcoControl/Resources/PHP/Produccion/ProduccionTablaGrafica.php',
    success:function(result){
      var rsp = JSON.parse(result);
      console.log(rsp);
      $('#tablaGrafica').html(rsp.infoTabla);
      ActivarBotonProgram();
    },
    error:function(exception){
      console.error(exception)
    }
  })
}


function ActivarBotonProgram(){
  //PASAR VARIABLES AL MODAL
  $('.EditarProduccion').unbind();
  $('.EditarProduccion').click(function(){
    var programId = $(this).attr('program-id');
    $.ajax({

      method: 'POST',
      url: '/fitcoControl/Resources/PHP/Programacion/fetchProgramData.php',
      data: {programId: programId},

      success: function(result){
        var rsp = JSON.parse(result);
        console.log(rsp);
        if (rsp.code == 1) {
          $('#mpgr_id').val(rsp.response.pk_programacion);
          $('#mpgr_cliente').val(rsp.response.fk_cliente);
          $('#mpgr_fini').val(rsp.response.fechaInicio);
          $('#mpgr_ffin').val(rsp.response.fechaFinal);
          $('#mpgr_piezas').val(rsp.response.piezasRequeridas);
          $('#mpgr_meta').val(rsp.response.metaDiaria);
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

  $('.ActualizarProgram').unbind();
  $('.ActualizarProgram').click(function(){
    var idProgram = $('#mpgr_id').val();
    var nombreCliente = $('#mpgr_cliente').val();
    var fechaInicio = $('#mpgr_fini').val();
    var fechaFinal = $('#mpgr_ffin').val();
    var piezasRequeridas = $('#mpgr_piezas').val();
    var metaDiaria = $('#mpgr_meta').val();

    $.ajax({
      method: 'POST',
      url: '/fitcoControl/Resources/PHP/Programacion/EditProgramData.php',
      data: {
        mpgr_id: idProgram,
        mpgr_cliente: nombreCliente,
        mpgr_fini: fechaInicio,
        mpgr_ffin: fechaFinal,
        mpgr_piezas: piezasRequeridas,
        mpgr_meta: metaDiaria
      },
      success:function(result){
        console.log(result);
        if (result != 1) {
          alertify.error('NO SE MODIFICÓ NINGUN REGISTRO');
          $('#EditarProduccion').modal('hide');
          fetchProgramacion();
        }else {
          $('#EditarProduccion').modal('hide');
          fetchProgramacion();
          dibujarGrafica();
          alertify.success('SE MODIFICÓ CORRECTAMENTE');
        }
      },
      error:function(exception){
        console.error(exception)
      }
    });
  });
}


//PESTAÑA PRODUCCIÓN,, PESTAÑA PRODUCCIÓN
function fetchProProduccion(){
  $.ajax({
    method: 'POST',
    url:'/fitcoControl/Resources/PHP/Produccion/MostrarProduccion.php',
    success:function(result){
      var rsp = JSON.parse(result);
      console.log(rsp);
      $('#mostrarProduccion').html(rsp.infoTabla);
      ActivarBotonProduc();
    },
    error:function(exception){
      console.error(exception)
    }
  })
}



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
      var cantidadProduccion = $('#mpro_cant').val();

      validacion =  $('#mpro_idprog').val() == "" ||
      $('#mpro_fint').val() == "" ||
      $('#mpro_cant').val() == "";

      if (validacion) {
          swal("NO PUEDE CONTINUAR","Necesita llenar todos los campos","error");
      }else {
        $.ajax({
          method: 'POST',
          url: '/fitcoControl/Resources/PHP/Produccion/AgregarProduccion.php',
          data: {

            mpro_idprog: fk_programacion,
            mpro_fint: fechaIntroduccion,
            mpro_cant: cantidadProduccion
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
            }
          },
          error:function(exception){
            console.error(exception)
          }
        })
      }
    });

    //VISUALIZAR PRODUCCION EN MODAL
    $('.visualizarproduccion').click(function(){
      var idProg = $(this).attr('program-id');
      $.ajax({
        method: 'POST',
        url:'/fitcoControl/Resources/PHP/Produccion/TablaProduccion.php',
        data:{idProg:idProg},
        success:function(result){
          var rsp = JSON.parse(result);
          console.log(rsp);
          $('#visualizarProduccion').html(rsp.infoTabla);

        },
        error:function(exception){
          console.error(exception)
        }
      })

    });
}