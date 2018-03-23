$(document).ready(function(){

fetchProgramacion();
fetchProProduccion();
fetchTablaGrafica();

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
    var hr = $('#produccionHR').val();
    var pz = $('#produccionPZ').val();

    validacion = $('#produccionFI').val() == ""
        || $('#produccionFF').val() == ""
        || $('#produccionHR').val() == ""
        || $('#npClientName').val() == ""
        || $('#produccionPZ').val() == "";

    validacionFecha = $('#produccionFI').val() > $('#produccionFF').val();
    validacionHora =
    $('#produccionHR').val() > '20:00:00'
    || $('#produccionHR').val() <  '07:59:00';

    if (validacion) {
      swal("NO PUEDE CONTINUAR","Nesesita llenar todos los campos","error");
    } else if (validacionFecha) {
      swal("NO PUEDE CONTINUAR","Su fecha inicio no puede ser mayor a su fecha final","error");
    }else if (validacionHora) {
      swal("NO PUEDE CONTINUAR","La hora tiene que ser mayor a 08:00 y menor a 20:00 horas","error");
    }else {
      $.ajax({
        method: 'POST',
        url: '/fitcoControl/Resources/PHP/Programacion/addProgramacion.php',
        data: {cId: cId, fi: fi, ff:ff, hr:hr, pz:pz},
        success: function(result){
          console.log(result);
          dibujarGrafica();
          fetchProgramacion();
          fetchProProduccion();
          $('#NuevaProg')[0].reset();
          alertify.success('SE AGREGÓ CORRECTAMENTE');
        },
        error: function(exception){
          console.error(exception);
        }
      })
    }
  });
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

// Mostrar Registros en pantalla
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


//BUSCADOR TIEMPO REAL 2
$('#mpgr_cliente').keyup(function(){
  var txt = $(this).val();
  if (txt == "") {
    $('#mpgr_ClientList').fadeOut();
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
        $('#mpgr_ClientList').html("<p>Hubo un error al cargar la lista de clientes...</p>");
        console.warn("Error en el query: " + rsp.response);
      } else {
        $('#mpgr_ClientList').html(rsp.response);
        $('#mpgr_ClientList p').click(function(){
          var cid = $(this).attr('client-id');
          var nc = $(this).html();

          $('#mpgr_cliente').val(nc).html(nc).attr('client-id', cid);
          $('#mpgr_ClientList').fadeOut();
        });
      }
      $('#mpgr_ClientList').fadeIn();
      SelectorCliente();
    },
    error: function(exception){
      console.error(exception);
    }
  });
});

function SelectorCliente(){
  $('.client-item').click(function(){
    var clientId = $(this).attr('client-id');
    var clientName = $(this).find('span').html();

    $('#mpgr_cliente').attr('client-id', clientId);
    $('#mpgr_cliente').html(clientName).val(clientName);
    $('#mpgr_ClientList').fadeOut();
  });
}


function ActivarBotonProgram(){

  //Eliminar Programacion
      $('.EliminarProgramacion').unbind();
      $('.EliminarProgramacion').click(function(){
        var Idprogram = $(this).attr('program-id');
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
            url: '/fitcoControl/Resources/PHP/Programacion/EliminarProgramacion.php',
            data: {Idprogram: Idprogram},

            success: function(result){
              console.log(result);
              if (result != 1) {
                alertify.error('NO SE PUDO ELIMINAR');
              }else if (result == 1){
                fetchProgramacion();
                fetchTablaGrafica();
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
          $('#mpgr_cliente').val(rsp.response.nombreCliente).attr('client-id', rsp.response.fk_cliente);
          $('#mpgr_fini').val(rsp.response.fechaInicio);
          $('#mpgr_ffin').val(rsp.response.fechaFinal);
          $('#mpgr_hora').val(rsp.response.horaEntrega);
          $('#mpgr_piezas').val(rsp.response.piezasRequeridas);
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
    var nombreCliente = $('#mpgr_cliente').attr('client-id');
    var fechaInicio = $('#mpgr_fini').val();
    var fechaFinal = $('#mpgr_ffin').val();
    var piezasRequeridas = $('#mpgr_piezas').val();
    var hr = $('#mpgr_hora').val();

    $.ajax({
      method: 'POST',
      url: '/fitcoControl/Resources/PHP/Programacion/EditProgramData.php',
      data: {
        mpgr_id: idProgram,
        mpgr_cliente: nombreCliente,
        mpgr_fini: fechaInicio,
        mpgr_ffin: fechaFinal,
        mpgr_piezas: piezasRequeridas,
        hr: hr
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
// function fetchProProduccion(){
//   $.ajax({
//     method: 'POST',
//     url:'/fitcoControl/Resources/PHP/Produccion/MostrarProduccion.php',
//     success:function(result){
//       var rsp = JSON.parse(result);
//       console.log(rsp);
//       $('#mostrarProduccion').html(rsp.infoTabla);
//       ActivarBotonProduc();
//     },
//     error:function(exception){
//       console.error(exception)
//     }
//   })
// }

function fetchProProduccion(produccion){
  $.ajax({
    url:'/fitcoControl/Resources/PHP/Produccion/MostrarProduccion.php',
    method: 'POST',
    data:{produccion:produccion},
  })
  .done(function(resultado){
    $('#mostrarProduccion').html(resultado);
    ActivarBotonProduc();
  })
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

      validacion =  $('#mpro_idprog').val() == "" ||
      $('#mpro_fint').val() == "" ||
      $('#mpro_meta').val() == "" ||
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
            mpro_meta: metaProduccion,
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
              fetchTablaGrafica();
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
          ActivarBotonProduc();
        },
        error:function(exception){
          console.error(exception)
        }
      })
    });

//PASAR VARIABLES A MODAL
    $('.editarProduc').unbind();
    $('.editarProduc').click(function(){
      var IdProduc = $(this).attr('pro-id');
      $.ajax({

        method: 'POST',
        url: '/fitcoControl/Resources/PHP/Produccion/fetchProducData.php',
        data: {IdProduc: IdProduc},

        success: function(result){
          var rsp = JSON.parse(result);
          console.log(rsp);
          if (rsp.code == 1) {
            $('#mpr_id').val(rsp.response.pk_produccion);
            $('#mpr_fecha').val(rsp.response.fechaIntroduccion);
            $('#mpr_meta').val(rsp.response.metaProduccion);
            $('#mpr_elaborado').val(rsp.response.cantidadProduccion);

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

    $('.ActualizarProd').unbind();//EVITAMOS QUE SE DUPLIQUE NUESTRO SELECTOR
    $('.ActualizarProd').click(function(){
      var id = $('#mpr_id').val();
      var ff = $('#mpr_fecha').val();
      var mm = $('#mpr_meta').val();
      var ee = $('#mpr_elaborado').val();

      $.ajax({
        method: 'POST',
        url: '/fitcoControl/Resources/PHP/Produccion/EditProdData.php',
        data: {
          id: id,
          ff: ff,
          mm: mm,
          ee: ee
        },
        success:function(result){
          console.log(result);
          if (result != 1) {
            alertify.error('NO SE MODIFICÓ NINGUN REGISTRO');
            $('#EdProd').modal('hide');
            $('#VisualizarTablaProduccion').modal('hide');
            fetchProProduccion();
            fetchTablaGrafica();
          }else {
            $('#EdProd').modal('hide');
            $('#VisualizarTablaProduccion').modal('hide');
            fetchProProduccion();
            fetchTablaGrafica();
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
        url: '/fitcoControl/Resources/PHP/Produccion/EliminarProducData.php',
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
