$(document).ready(function(){

  mostrarUtilidades();
  // botones();

  $('#add_utilidades').click(function(){
    validacion  = $('#_fecha').val() == "" ||
    $('#_ingresos').val() == "" ||
    $('#_egresos').val() == "";
    var data = {
      fecha: $('#_fecha').val(),
      ingresos: $('#_ingresos').val(),
      egresos: $('#_egresos').val()
    }

    if (validacion) {
      swal("CAMPOS EN BLANCO","Verifique que los campos esten llenos","error");
    }else {
    var ajaxCall = $.ajax({
        method: 'POST',
        data: data,
        url: 'actions/agregar_utilidad.php'
    });

    ajaxCall.done(function(r) {
      r = JSON.parse(r);
      if (r.code == 1) {
        swal("Exito", "Se guardo correctamente.", "success");
        mostrarUtilidades();
        botones();
      } else {
        console.error(r.message);
      }
    });
   }
  });




}); //fin del documento


function botones(){
  $('tbody').on('click', '.edit_utilidades', function(){
    var dbid = $(this).attr('db-id');
    var tar_modal = $($(this).attr('href'));

    var fetch_cltNuevo = $.ajax({
      method: 'POST',
      data: {dbid: dbid},
      url: 'actions/fetch_utilidad.php'
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


  $('.act_utilidad').click(function(){
     validar = $('#fecha').val() == "" ||
               $('#ingresos').val() == "" ||
               $('#egresos').val() == "";

    var data = {
      id: $('#pk_utilidad').attr('db-id'),
      fecha: $('#fecha').val(),
      ingresos: $('#ingresos').val(),
      egresos: $('#egresos').val()
    }


    if (validar) {
      swal("Error","Todos los campos necesitan estar llenos","error");
    }else{

      var ajaxCall = $.ajax({
          method: 'POST',
          data: data,
          url: 'actions/editar_utilidad.php'
      });

      ajaxCall.done(function(r) {
        r = JSON.parse(r);
        if (r.code == 1) {
           mostrarUtilidades();
          swal("Exito", "Se actualizo.", "success");
          $('.modal').modal('hide');
        } else {
          console.error(r.message);
        }
      });
    }
  })
}



function mostrarUtilidades(){
  var ajaxCall = $.ajax({
      method: 'POST',
      url: 'actions/mostrar_utilidades.php'
  });

  ajaxCall.done(function(r) {
    r = JSON.parse(r);
    if (r.code == 1) {
      $('#tabla_utilidades').html(r.data);
      botones();
    } else {
      console.error(r.message);
    }
  });
}
