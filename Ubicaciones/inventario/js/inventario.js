$(document).ready(function(){
  tabla_inventario();


  $('.buscador').hover(function(){
    var accion = $(this).attr('accion');
    var status = $(this).attr('status');

    switch (accion) {
      case "busc":
      if (status == 'cerrado') {
        $(this).attr('status', 'abierto');
        $('#nventario').animate({"right": "4%"}, "slow");
        $('#NuevoRegistro').hide();

        $('.spanA').css('display', '');
        // $('p').css('font-size','1.75rem');
        // $('b').css('font-size','1.75rem');
        // $('p').css('font-weight','500');
        $('.img').removeClass( "spand-iconp" ).addClass( "spand-icon");
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


  //CORTE
        case "ainventario":
        if (status == 'cerrado') {
          $('.spanA').css('display', 'inherit');
          $(this).attr('status', 'abierto');
          $('#inventario').animate({"right": "36%"}, "slow");
          $('#NuevoRegistro').fadeIn(2500);
          $('#SinRegistros').fadeOut();
          $('p').css('font-size','12px');
        }else {
          $('.spanA').css('display', '');
          $(this).attr('status', 'cerrado');
          $('#inventario').animate({"right": "4%"}, "slow");
          $('#NuevoRegistro').hide();
          $('p').css('font-size','1.75rem');
        }
        break;

        default:
          console.error("Something went terribly wrong...");
      }
    });


  $('#agregar').click(function(){

    var data = {
      usuario_reg: $('#_usuario_reg').val(),
      fecha_reg: $('#_fecha_reg').val(),
      cod_proveedor: $('#_cod_proveedor').val(),
      proveedor: $('#_proveedor').val(),
      color: $('#_color').val(),
      composicion: $('#_composicion').val(),
      ancho: $('#_ancho').val(),
      precio: $('#_precio').val(),
      metros: $('#_metros').val(),
      folio_corte: $('#_folio_corte').val(),
      // mts_necesarios: $('#_mts_necesarios').val(),
      fecha: $('#_fecha').val(),
    }

    var ajaxCall = $.ajax({
        method: 'POST',
        data: data,
        url: 'actions/agregar.php'
    });

    ajaxCall.done(function(r) {
      r = JSON.parse(r);
      if (r.code == 1) {
        swal("Exito", "Se guardo correctamente.", "success");
        tabla_inventario();
      } else {
        console.error(r.message);
      }
    });
  });

  $('tbody').on('click', '.editar', function(){
    var dbid = $(this).attr('db-id');
    var tar_modal = $($(this).attr('href'));

    var fetch_inventario = $.ajax({
      method: 'POST',
      data: {dbid: dbid},
      url: 'actions/fetch.php'
    });

    fetch_inventario.done(function(r){
      r = JSON.parse(r);

      if (r.code == 1) {

      console.log(r.data);
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

  $('#actualizar').click(function(){
    var data = {
      pk_inventario: $('#pk_inventario').attr('db-id'),
      usuario_edit: $('#_usuario_edit').val(),
      fecha_edit: $('#_fecha_edit').val(),
      cod_proveedor: $('#cod_proveedor').val(),
      proveedor: $('#proveedor').val(),
      color: $('#color').val(),
      composicion: $('#composicion').val(),
      ancho: $('#ancho').val(),
      precio: $('#precio').val(),
      metros: $('#metros').val(),
      folio_corte: $('#folio_corte').val(),
      fecha: $('#fecha').val()
    }

    var ajaxCall = $.ajax({
        method: 'POST',
        data: data,
        url: 'actions/editar.php'
    });

    ajaxCall.done(function(r) {
      r = JSON.parse(r);
      if (r.code == 1) {
        tabla_inventario();
        swal("Exito", "Se actualizo.", "success");
        $('.modal').modal('hide');
      } else {
        console.error(r.message);
      }
    });
  })


})//FIN DEL DOCUMENTO



function botones(){
  $('.ver_inventario').click(function(){
    var id = $(this).attr('db-id');
    var data = { dbid : $(this).attr('db-id')}

    $('#_fk_inventario').val(id);
    $('#mostrar_inv_utilizado').modal('show');
    var ajaxCall = $.ajax({
        method: 'POST',
        data: data,
        url: 'actions/utilizado_mostrar.php'
    });

    ajaxCall.done(function(r) {
      r = JSON.parse(r);
      if (r.code == 1) {
        $('#tabla_inv_utilizado').html(r.data);
      } else {
        console.error(r.message);
      }
    });
  });

  $('.add_inv_ut').click(function(){

      var data = {
        fk_inventario: $('#_fk_inventario').val(),
        fecha_ut: $('#_fecha_ut').val(),
        utilizado: $('#_utilizado').val(),
        usuario_reg_ut: $('#_usuario_reg_ut').val(),
        fecha_reg_ut: $('#_fecha_reg_ut').val(),
      }

      var agregarUtilizado = $.ajax({
          method: 'POST',
          data: data,
          url: 'actions/utilizado_agregar.php'
      });

      agregarUtilizado.done(function(r) {
        r = JSON.parse(r);
        if (r.code == 1) {
          swal("Exito", "Se guardo correctamente.", "success");
          setTimeout('document.location.reload()',800);
        } else {
          console.error(r.message);
        }
      });
  })

  $('tbody').on('click', '.editarUtilizado', function(){
    var dbid = $(this).attr('db-id');
    var tar_modal = $($(this).attr('href'));

    var fetch_utilizado = $.ajax({
      method: 'POST',
      data: {dbid: dbid},
      url: 'actions/utilizado_fetch.php'
    });

    fetch_utilizado.done(function(r){
      r = JSON.parse(r);

      if (r.code == 1) {

      console.log(r.data);
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


  $('.act_utilizado').click(function(){
    var data = {
      pk_inv_utilizado : $('#pk_inv_utilizado').attr('db-id'),
      usuario_edit_ut : $('#_usuario_edit_ut').val(),
      fecha_edit_ut : $('#_fecha_edit_ut').val(),
      fecha_ut : $('#fecha_ut').val(),
      utilizado : $('#utilizado').val(),
      fecha_reg_ut : $('#fecha_reg_ut').val(),
      usuario_reg_ut : $('#usuario_reg_ut').val(),
      fk_inventario : $('#fk_inventario').val()
    }

    validar = $('#fecha_ut').val() == "" ||
              $('#utilizado').val() == "";


    if (validar) {
      swal("Error","Los campos son obligatorios","error");
    }else{

      var ajaxCall = $.ajax({
          method: 'POST',
          data: data,
          url: 'actions/utilizado_editar.php'
      });

      ajaxCall.done(function(r) {
        r = JSON.parse(r);
        if (r.code == 1) {
          swal("Exito", "Se actualizo.", "success");
          tabla_inventario();
          $('.modal').modal('hide');
        } else {
          console.error(r.message);
        }
      });
    }
  })


}




function tabla_inventario(){
  var ajaxCall = $.ajax({
      method: 'POST',
      url: 'actions/mostrar.php'
  });

  ajaxCall.done(function(r) {
    r = JSON.parse(r);
    if (r.code == 1) {
      $('#tablaInventario').html(r.data);
      botones();
    } else {
      console.error(r.message);
    }
  });
}
