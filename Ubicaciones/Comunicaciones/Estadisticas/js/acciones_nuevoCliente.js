$(document).ready(function(){

  mostrarClienteNuevo();
  // botones();

  $('#add_cltNuevo').click(function(){
    validacion  = $('#_fecha').val() == "" ||
    $('#_clientesNuevos').val() == "";
    var data = {
      fecha: $('#_fecha').val(),
      cliente: $('#_clientesNuevos').val()
    }

    if (validacion) {
      swal("CAMPOS EN BLANCO","Verifique que los campos esten llenos","error");
    }else {
    var ajaxCall = $.ajax({
        method: 'POST',
        data: data,
        url: 'actions/agregar_cltNuevo.php'
    });

    ajaxCall.done(function(r) {
      r = JSON.parse(r);
      if (r.code == 1) {
        swal("Exito", "Se guardo correctamente.", "success");
        mostrarClienteNuevo();
        // botones();
      } else {
        console.error(r.message);
      }
    });
   }
  });




}); //fin del documento


function botones(){

  $('tbody').on('click', '.edit_clienteNuevo', function(){
    var dbid = $(this).attr('db-id');
    var tar_modal = $($(this).attr('href'));

    var fetch_cltNuevo = $.ajax({
      method: 'POST',
      data: {dbid: dbid},
      url: 'actions/fetch_cltNuevo.php'
    });

    fetch_cltNuevo.done(function(r){
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


  $('.act_clienteNuevo').click(function(){
     validar = $('#fecha').val() == "" ||
               $('#clientesNuevos').val() == "";

    var data = {
      id: $('#pk_clt_nuevos').attr('db-id'),
      fecha: $('#fecha').val(),
      clientesNuevos: $('#clientesNuevos').val()
    }


    if (validar) {
      swal("Error","Todos los campos necesitan estar llenos","error");
    }else{

      var ajaxCall = $.ajax({
          method: 'POST',
          data: data,
          url: 'actions/editar_cltNuevo.php'
      });

      ajaxCall.done(function(r) {
        r = JSON.parse(r);
        if (r.code == 1) {
           mostrarClienteNuevo()
          swal("Exito", "Se actualizo.", "success");
          $('.modal').modal('hide');
        } else {
          console.error(r.message);
        }
      });
    }
  })
}



function mostrarClienteNuevo(){
  var ajaxCall = $.ajax({
      method: 'POST',
      url: 'actions/mostrar_cltNuevo.php'
  });

  ajaxCall.done(function(r) {
    r = JSON.parse(r);
    if (r.code == 1) {
      $('#tabla_cltNuevos').html(r.data);
      botones();
    } else {
      console.error(r.message);
    }
  });
}
