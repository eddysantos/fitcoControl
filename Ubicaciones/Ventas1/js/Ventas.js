$(document).ready(function(){
tablaVentas();

$(function(){
  data = {
    period: $('#ven_periodo').val(),
    grafico: $('#ven_grafico').val(),
    date_from: $('#dates_ven_chart').find('.date-from').val(),
    date_to: $('#dates_ven_chart').find('.date-to').val(),
  };


  var pull_chart = $.ajax({
    method: 'POST',
    data: data,
    url: 'actions/grafica.php'
  });

  pull_chart.done(function(r){
    r = JSON.parse(r);
    console.log(r);
    ven_chart = c3.generate({
      bindto: '#g-ventas',
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

$('.ven_vendedores').change(function(){
  var vendedor = $('#ven_vendedores').val();

  var data = {};
  if (vendedor != "" && vendedor != 'undefined') {
    var data = {vendedor: vendedor,
      period: $('#ven_periodo').val(),
      grafico: $('#ven_grafico').val(),
      date_from: $('#dates_ven_chart').find('.date-from').val(),
      date_to: $('#dates_ven_chart').find('.date-to').val()};
  }

  var pull_chart = $.ajax({
    method: 'POST',
    url: 'actions/grafica.php',
    data: data
  });

  pull_chart.done(function(r){
    r = JSON.parse(r);
    console.log(r);
    ven_chart.load({columns: r.to_chart});
  });
});

$('.reload-chart').click(function(){
  var vendedor = $('#ven_vendedores').val("Vendedores");
  data = {
    period: $('#ven_periodo').val(),
    grafico: $('#ven_grafico').val(),
    date_from: $('#dates_ven_chart').find('.date-from').val(),
    date_to: $('#dates_ven_chart').find('.date-to').val(),
  };

  var pull_chart = $.ajax({
    method: 'POST',
    data: data,
    url: 'actions/grafica.php'
  });

  pull_chart.done(function(r){
    r = JSON.parse(r);
    console.log(r);
    ven_chart.load({columns: r.to_chart});
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

  $('#agregar').click(function(){
    var data = {
      vts_nombreCliente: $('#vts_nombreCliente').val(),
      vts_vendedor: $('#vts_vendedor').val(),
      vts_nprendas: $('#vts_nprendas').val(),
      vts_precio: $('#vts_precio').val(),
      vts_Apago: $('#vts_Apago').val(),
      vts_costoPrenda: $('#vts_costoPrenda').val(),
      vts_ingresoBanco: $('#vts_ingresoBanco').val(),
  		vts_fingreso: $('#vts_fingreso').val()
    }
    validacion = $('#vts_nombreCliente').val() == "" ||
                 $('#vts_vendedor').val() == "" ||
                 $('#vts_nprendas').val() == "" ||
                 $('#vts_precio').val() == "" ||
                 $('#vts_Apago').val() == "" ||
                 $('#vts_costoPrenda').val() == "" ||
                 $('#vts_fingreso').val() == "";

    if (validacion) {
      swal("NO PUEDE CONTINUAR","Necesita llenar todos los campos","error");
    }else {
    	$.ajax({
    		type: "POST",
    		url: "actions/agregar.php",
    		data: data,
    		success: 	function(r){
    			r = JSON.parse(r);
          console.log(r);
          if (r.code == 1) {
            alertify.success('SE AGREGÓ CORRECTAMENTE');
    			} else {
            swal("FALLO AL REGISTRAR","No se agregó el registro","error");
    				console.error(r.message);
    			}
    		}
    	});
    }
  });



  $('tbody').on('click', '.EditVentas', function(){
    var dbid = $(this).attr('db-id');
    var tar_modal = $($(this).attr('href'));

    var fetch_ventas = $.ajax({
      method: 'POST',
      data: {dbid: dbid},
      url: 'actions/fetch.php'
    });

    fetch_ventas.done(function(r){
      r = JSON.parse(r);

      if (r.code == 1) {
      for (var key in r.data) {
        if (r.data.hasOwnProperty(key)) {
          var iterated_element = $('#' + key);
          var element_type = iterated_element.prop('nodeName');
          var dbid = iterated_element.attr('db-id');
          var value = r.data[key];

          iterated_element.val(value).addClass('has-content');
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


  $('#ActualizarVenta').click(function(){
    validacion = $('#pk_ventas').val() == "" ||
                 $('#nombreCliente').val() == "" ||
                 $('#nombreVendedor').val() == "" ||
                 $('#numeroPrendas').val() == "" ||
                 $('#precioXprenda').val() == "" ||
                 $('#costoPrenda').val() == "" ||
                 $('#ingresoBanco').val() == "" ||
                 $('#acuerdoPago').val() == "" ||
                 $('#fecha').val() == "";

      var data = {
        pk_ventas: $('#pk_ventas').val(),
        nombreCliente: $('#nombreCliente').val(),
        nombreVendedor: $('#nombreVendedor').val(),
        numeroPrendas: $('#numeroPrendas').val(),
        precioXprenda: $('#precioXprenda').val(),
        costoPrenda: $('#costoPrenda').val(),
        ingresoBanco: $('#ingresoBanco').val(),
        acuerdoPago: $('#acuerdoPago').val(),
        fechaIngreso: $('#fecha').val()
      }
      if (validacion) {
        swal("NO PUEDE CONTINUAR","Necesita llenar todos los campos","error");
      }else {
      $.ajax({
        type: "POST",
        url: "actions/editar.php",
        data: data,
        success: 	function(r){
          console.log(r);
          r = JSON.parse(r);
          if (r.code == 1) {
            tablaVentas();
            swal("Exito", "La cuenta se actualizó correctamente.", "success");
            $('.modal').modal('hide');
          } else {
            console.error(r.message);
            $('.modal').modal('hide');
          }
        },
        error: function(x){
          console.error(x);
        }
      });
    }
  })
});


function tablaVentas(){
  $.ajax({
    method: 'POST',
    url:'actions/Mostrar.php',
  }).done(function(r) {
    r = JSON.parse(r);
    if (r.code == 1) {
      $('#tabla_Ventas').html(r.data);
        Eliminar();
    } else {
      console.error(r.message);
    }
  });
}


function Eliminar(){
  $('.EliminarVenta').click(function(){
    var pk_ventas = $(this).attr('db-id');
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
          data: {pk_ventas: pk_ventas},
          success: function(r){
            tablaVentas();
          },
          error: function(exception){
            console.error(exception)
            alertify.error('NO SE PUDO ELIMINAR');
            tablaVentas();
          }
        });
        swal("Eliminado!", "Se elimino correctamente.", "success");
        tablaVentas();
        $('#NuevaVenta').hide();
      } else {
        swal("Cancelado", "El registro esta a salvo :)", "error");
        tablaVentas();
        $('#NuevaVenta').hide();
        $('.spanV').css('display', '');
      }
    });
  });
}
