$(document).ready(function(){
ventas_Det();
graficaVentasMensual();
graficaVentasSemanal();

  $('.selectVentas').change(function(){
    var vendedor = $('#selectVentas').val();
    var data = {};
    if (vendedor != "" && vendedor != 'undefined') {
      var data = {vendedor: vendedor};
    }

    var pull_ventasMensual = $.ajax({
      method: 'POST',
      url: 'actions/graficaVentasMensual.php',
      data: data
    });

    pull_ventasMensual.done(function(r){
      r = JSON.parse(r);
      console.log(r);
      if (r.code == 1) {
        ventasMensual.load({
          columns: r.to_chart
        });
      }
    });
  });



  $('.selectVentasSemana').change(function(){
    var vendedor = $('#selectVentasSemana').val();
    var data = {};
    if (vendedor != "" && vendedor != 'undefined') {
      var data = {vendedor: vendedor};
    }

    var pull_ventasSemanal = $.ajax({
      method: 'POST',
      url: 'actions/graficaVentasSemanal.php',
      data: data
    });

    pull_ventasSemanal.done(function(r){
      r = JSON.parse(r);
      console.log(r);
      if (r.code == 1) {
        ventasSemanal.load({
          columns: r.to_chart
        });
      }
    });
  });



  $('.buscador').hover(function(){
    var accion = $(this).attr('accion');
    var status = $(this).attr('status');

    if (status == 'cerrado') {
      $(this).attr('status', 'abierto');
      $('#tablaVentas').animate({"right": "4%"}, "slow");
      $('#NuevaVenta').hide();

      $('.spanA').css('display', '');
      $('p').css('font-size','1.75rem');
      $('b').css('font-size','1.75rem');
      $('p').css('font-weight','500');
    }else {
      $('.spanB').css('display', '');
      $(this).attr('status', 'cerrado');
    }
  });

  $('.vent').click(function(){
    var accion = $(this).attr('accion');
    var status = $(this).attr('status');


    $('#selectGrafica').find('a').css('color', "");
        $('#selectGrafica').find('a').css('font-size', "");
        $(this).attr('status', 'abierto');
        $(this).css('cssText', 'color: rgb(98, 98, 98) !important');

    switch (accion) {
      case "aventas":
      if (status == 'cerrado') {
        $('.spanA').css('display', 'inherit');
        $(this).attr('status', 'abierto');
        $('#tablaVentas').animate({"right": "36%"}, "slow");
        $('#NuevaVenta').fadeIn(2500);
        $('#SinRegistros').fadeOut();
      }else {
        $('.spanA').css('display', '');
        $(this).attr('status', 'cerrado');
        $('#tablaVentas').animate({"right": "4%"}, "slow");
        $('#NuevaVenta').hide();
      }
      break;

      case "mensualVen":
        $('.graficasVentasMensual').fadeIn();
        $('.graficasVentasSemanal').hide();
        break;

      case "semanalVen":
        $('.graficasVentasSemanal').fadeIn();
        $('.graficasVentasMensual').hide();
        break;
      default:
        console.error("Something went terribly wrong...");
    }
  });


  $('#add-Vendedor').click(function(){
    var data = {
  		vendedor: $('#nVendedor').val()
    }
    validacion = $('#nVendedor').val() == "";

    if (validacion) {
      swal("NO PUEDE CONTINUAR","Necesita llenar todos los campos","error");
    }else {
    	$.ajax({
    		type: "POST",
    		url: "actions/AddVendedor.php",
    		data: data,
    		success: 	function(r){
    			r = JSON.parse(r);
          if (r.code == 1) {
            alertify.success('SE AGREGÓ CORRECTAMENTE');
            $('.modal').modal('hide');
    			} else {
            swal("FALLO AL REGISTRAR","No se agregó el registro","error");
    				console.error(r.message);
    			}
    		}
    	});
    }
  });
});


function ventas_Det(){
  $.ajax({
    method: 'POST',
    url:'/fitcoControl/Ubicaciones/Ventas/actions/Mostrar.php',
    success: function(r){
      r = JSON.parse(r);
      if (r.code == 1) {
        $('#tabla_Ventas').html(r.data);
          ActivarBotonesVentas();
      } else {
        console.error(r.message);
      }
    }
  })
}

  $('#NuevoRegistroVentas').click(function(){
    var data = {
      cliente: $('#vts_nombreCliente').val(),
      vendedor: $('#vts_vendedor').val(),
      nprendas: $('#vts_nprendas').val(),
      precio: $('#vts_precio').val(),
      acuerdo: $('#vts_Apago').val(),
      fingreso: $('#vts_fingreso').val(),
      fbaja: $('#vts_fingreso').val()
    }

    validacion =
    $('#vts_nombreCliente').val() == "" ||
    $('#vts_vendedor').val() == "" ||
    $('#vts_nprendas').val() == "" ||
    $('#vts_precio').val() == "" ||
    $('#vts_Apago').val() == "" ||
    $('#vts_fingreso').val() == "";

    if (validacion) {
      swal("NO PUEDE CONTINUAR","Necesita llenar todos los campos","error");
    }else {
      $.ajax({
        method: 'POST',
        url: '/fitcoControl/Ubicaciones/Ventas/actions/AgregarVenta.php',
        data: data,
        success:function(result){
          r = JSON.parse(result);
          if (r.code != 1) {
            swal("FALLO AL REGISTRAR","No se agregó el registro","error");
            console.error(r.response);
            $('#NuevaVenta').hide();
            $('.spanV').css('display', '');
            ventas_Det();
            graficaVentasMensual();
            graficaVentasSemanal();

          } else {
            $('#NuevaVenta').hide();
            $('.spanV').css('display', '');
            ventas_Det();
            graficaVentasMensual();
            graficaVentasSemanal();

            alertify.success('SE AGREGÓ CORRECTAMENTE');
          }
        },
        error:function(exception){
          console.error(exception)
        }
      })
    }
  });




function ActivarBotonesVentas(){

  // PARA VISUALIZAR DATOS EN EL MODAL//
  $('.EditVentas').unbind();
  $('.EditVentas').click(function(){
    var dbid = $(this).attr('db-id');

    $.ajax({
      method: 'POST',
      url: '/fitcoControl/Ubicaciones/Ventas/actions/fetchVentaData.php',
      data: {dbid: dbid},

      success: function(r){
        r = JSON.parse(r);
        console.log(r);
        if (r.code == 1) {
          $('#pk_ventas').val(r.response.pk_ventas);
          $('#nombreCliente').val(r.response.nombreCliente);
          $('#nombreVendedor').val(r.response.nombreVendedor);
          $('#numeroPrendas').val(r.response.numeroPrendas);
          $('#precioXprenda').val(r.response.precioXprenda);
          $('#acuerdoPago').val(r.response.acuerdoPago);
          $('#fechaIngreso').val(r.response.fechaIngreso);
          $('#fechaBaja').val(r.response.fechaBaja);
        }else {
          console.error("Hubo un error al jalar la informacion del usuario.");
          console.error(r.message);
        }
      },
      error: function(exception){
        console.error(exception);
      }
    })
  });

  $('.ActualizarVenta').unbind();
  $('.ActualizarVenta').click(function(){
    var idVentas = $('#pk_ventas').val();
    var nombreCliente = $('#nombreCliente').val();
    var vendedor = $('#nombreVendedor').val();
    var prendas = $('#numeroPrendas').val();
    var precio = $('#precioXprenda').val();
    var pago = $('#acuerdoPago').val();
    var fingreso = $('#fechaIngreso').val();
    var fbaja = $('#fechaBaja').val();

    $.ajax({
      method: 'POST',
      url: '/fitcoControl/Ubicaciones/Ventas/actions/EditVenta.php',
      data: {
        idVentas: idVentas,
        nombreCliente: nombreCliente,
        vendedor: vendedor,
        prendas: prendas,
        precio: precio,
        pago: pago,
        fingreso: fingreso,
        fbaja: fbaja
      },
      success:function(result){
        if (result != 1) {
          alertify.error('NO SE MODIFICÓ NINGUN REGISTRO');
          $('#EditarVentas').modal('hide');
          $('#NuevaVenta').hide();
          $('.spanV').css('display', '');
          ventas_Det();
          graficaVentasMensual();
          graficaVentasSemanal();

        }else {
          $('#EditarVentas').modal('hide');
          $('#NuevaVenta').hide();
          $('.spanV').css('display', '');
          ventas_Det();
          graficaVentasMensual();
          graficaVentasSemanal();

          alertify.success('SE MODIFICÓ CORRECTAMENTE');
        }
      },
      error:function(exception){
        console.error(exception)
      }
    });
  });


  $('.EliminarVenta').unbind();
  $('.EliminarVenta').click(function(){
    var ventasId = $(this).attr('db-id');
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
        url: '/fitcoControl/Ubicaciones/Ventas/actions/EliminarVenta.php',
        data: {ventasId: ventasId},

        success: function(result){
          console.log(result);
          if (result != 1) {
            alertify.error('NO SE PUDO ELIMINAR');
          }else if (result == 1){
            ventas_Det();
            graficaVentasMensual();
            graficaVentasSemanal();

          }
        },
        error: function(exception){
          console.error(exception)
        }
      });
      swal("Eliminado!", "Se elimino correctamente.", "success");
      $('#NuevaVenta').hide();
      $('.spanV').css('display', '');
      ventas_Det();
      graficaVentasMensual();
      graficaVentasSemanal();

    } else {
      swal("Cancelado", "El registro esta a salvo :)", "error");
      $('#NuevaVenta').hide();
      $('.spanV').css('display', '');
      ventas_Det();
      graficaVentasMensual();
      graficaVentasSemanal();

    }
  });
});
}

function graficaVentasMensual(){
  var pull_ventasMensual = $.ajax({
    method: 'POST',
    url: 'actions/graficaVentasMensual.php'
  });
    pull_ventasMensual.done(function(r){
      r = JSON.parse(r);
      console.log("Variable r:");
      console.log(r);
      if (r.code == 1) {
        ventasMensual = c3.generate({
          bindto: '#graficasVentasMensual',
          data: {
            x: 'x',
            columns: r.to_chart
          },
          size: {
            width: 1280,
            height: 480
          },
          axis: {
            x: {
             type: 'category'
            }
          },
          legend: {
            position: 'right'
          },
          subchart: {
            show: true,
            size: {
            height: 30
          }
        }
      });
    }
  }).fail(function(x){
    console.warn(x);
  })
}



function graficaVentasSemanal(){
  var pull_ventasSemanal = $.ajax({
    method: 'POST',
    url: 'actions/graficaVentasSemanal.php'
  });
    pull_ventasSemanal.done(function(r){
      r = JSON.parse(r);
      console.log("Variable r:");
      console.log(r);
      if (r.code == 1) {
        ventasSemanal = c3.generate({
          bindto: '#graficasVentasSemanal',
          data: {
            x: 'x',
            columns: r.to_chart
          },
          size: {
            width: 1280,
            height: 480
          },
          axis: {
            x: {
             type: 'category'
            }
          },
          legend: {
            position: 'right'
          },
          subchart: {
            show: true,
            size: {
            height: 30
          }
        }
      });
    }
  }).fail(function(x){
    console.warn(x);
  })
}
