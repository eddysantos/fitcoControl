
$(document).ready(function(){
  fetchVencidocxc();
  mostrarCuentas();


  $(':input#cxp_pro').change(function(){
    var value = $(this).val();

      $.ajax({
        url: 'actions/reporte.php',
        method: 'POST',
        data: {request:value},
        success: function(r){
          r = JSON.parse(r);
          if (r.code == 1) {
            $('#mostrarCuentasVencidas').html(r.data);
          } else {
            console.error(r.message);
          }
        }
      });
    });



    $('#NuevoRegistro').click(function(){

      var data = {
       proveedor : $('#cxp_proveedor').val(),
       descripcion : $('#cxp_desc').val(),
       total : $('#cxp_total').val(),
       vencimiento : $('#cxp_vencimiento').val(),
       pagado : $('#cxp_pagado').val(),
       factura : $('#cxp_factura').val()
      }

      validacion = $('#cxp_proveedor').val() == "" ||
      $('#cxp_desc').val() == "" ||
      $('#cxp_total').val() == "" ||
      $('#cxp_vencimiento').val() == "" ||
      $('#cxp_pagado').val() == "" ||
      $('#cxp_factura').val() == "";

      if (validacion) {
        swal("NO PUEDE CONTINUAR","Nesesita llenar todos los campos","error");
      }else {
        var ajaxCall = $.ajax({
            method: 'POST',
            data: data,
            url: 'actions/agregar.php'
        });

        ajaxCall.done(function(r) {
          r = JSON.parse(r);
          if (r.code == 1) {
            swal("Exito", "Se guardo correctamente.", "success");
            $('#NuevaCuenta')[0].reset();
            $('#NuevaCuenta').hide();
            $('.spanA').css('display', '');
            $('#Ecuentas').animate({"right": "4%"}, "slow");
            mostrarCuentas();
          } else {
            swal("FALLO AL REGISTRAR","No se agregó el registro","error");
            console.error(r.message);
          }
        });
      }
    });

  }); //FIN DEL DOCUMENTO





  function mostrarCuentas(){
    var ajaxCall = $.ajax({
        method: 'POST',
        url: 'actions/mostrar.php'
    });

    ajaxCall.done(function(r) {
      r = JSON.parse(r);
      if (r.code == 1) {
        $('#mostrarCuentas').html(r.data);
        botonesCuentasxPagar();
      } else {
        console.error(r.message);
      }
    });
  }



  function fetchVencidocxc(){
    var ajaxCall = $.ajax({
        method: 'POST',
        url: 'actions/reporte.php'
    });

    ajaxCall.done(function(r) {
      r = JSON.parse(r);
      if (r.code == 1) {
        $('#mostrarCuentasVencidas').html(r.data);

      } else {
        console.error(r.message);
      }
    });
  }


  function botonesCuentasxPagar(){
    $('tbody').on('click', '.EditCuenta', function(){
      var dbid = $(this).attr('db-id');
      var tar_modal = $($(this).attr('href'));

      var fetch_cuentasxpagar = $.ajax({
        method: 'POST',
        data: {dbid: dbid},
        url: 'actions/fetch.php'
      });

      fetch_cuentasxpagar.done(function(r){
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

    $('.ActualizarCuenta').click(function(){
      var data = {
        pk_cuentasPagar: $('#pk_cuentasPagar').attr('db-id'),
        proveedor: $('#proveedor').val(),
        descripcion: $('#descripcion').val(),
        factura: $('#factura').val(),
        montoPago: $('#montoPago').val(),
        fechaVencimiento: $('#fechaVencimiento').val(),
        pagado: $('#pagado').val()
      }

      validacion = $('#proveedor').val() == "" ||
                $('#descripcion').val() == "" ||
                $('#factura').val() == "" ||
                $('#montoPago').val() == "" ||
                $('#fechaVencimiento').val() == "" ||
                $('#pagado').val() == "";

      if (validacion) {
        swal("Error","Todos los campos son obligatorios, si no tiene la informacion favor de llenar con cero","error");
      }else{

        var ajaxCall = $.ajax({
            method: 'POST',
            data: data,
            url: 'actions/editar.php'
        });

        ajaxCall.done(function(r) {
          r = JSON.parse(r);
          if (r.code == 1) {
            mostrarCuentas();
            swal("Exito", "Se actualizo.", "success");
            $('.modal').modal('hide');
          } else {
            console.error(r.message);
          }
        });
      }
    })

    $('.eliminarCuenta').unbind();
    $('.eliminarCuenta').click(function(){
      var dbid = $(this).attr('db-id');
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
            data: {dbid: dbid},
            success: function(r){
              mostrarCuentas();
            },
            error: function(exception){
              console.error(exception)
              alertify.error('NO SE PUDO ELIMINAR');
              mostrarCuentas();
            }
          });
          swal("Eliminado!", "Se elimino correctamente.", "success");
          mostrarCuentas();
          $('#NuevaCuenta').hide();
          $('.spanA').css('display', '');
          $('#Ecuentas').animate({"right": "4%"}, "slow");
        } else {
          swal("Cancelado", "El registro esta a salvo :)", "error");
          mostrarCuentas();
          $('#NuevaCuenta').hide();
          $('.spanA').css('display', '');
          $('#Ecuentas').animate({"right": "4%"}, "slow");
        }
      });
    });


  }
