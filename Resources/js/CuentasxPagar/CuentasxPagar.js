$(document).ready(function(){
  fetchCuentas();
  });

  $('#NuevoRegistro').click(function(){
    var proveedor = $('#cxp_proveedor').val();
    var descripcion = $('#cxp_desc').val();
    var total = $('#cxp_total').val();
    var fvencimiento = $('#cxp_vencimiento').val();
    var pagado = $('#cxp_pagado').val();
    var factura = $('#cxp_factura').val();

    validacion = $('#cxp_proveedor').val() == "" ||
    $('#cxp_desc').val() == "" ||
    $('#cxp_total').val() == "" ||
    $('#cxp_vencimiento').val() == "" ||
    $('#cxp_pagado').val() == "" ||
    $('#cxp_factura').val() == "";

    if (validacion) {
      swal("NO PUEDE CONTINUAR","Nesesita llenar todos los campos","error");
    }else {
      $.ajax({
        method: 'POST',
        url: '/fitcoControl/Resources/PHP/CuentasxPagar/Agregar.php',
        data: {
          cxp_proveedor: proveedor,
          cxp_desc: descripcion,
          cxp_total: total,
          cxp_vencimiento: fvencimiento,
          cxp_pagado: pagado,
          cxp_factura: factura
        },
        success:function(result){
          var rsp = JSON.parse(result);
          if (rsp.code != 1) {
            swal("FALLO AL REGISTRAR","No se agregó el registro","error");
            console.error(rsp.response);
            fetchCuentas();
          } else {
            alertify.success('SE AGREGÓ CORRECTAMENTE');
            $('#NuevaCuenta')[0].reset();
            $('#NuevaCuenta').hide();
            $('.spanA').css('display', '');
            fetchCuentas();
          }
        },
        error:function(exception){
          console.error(exception)
        }
      })
    }
  });

  function fetchCuentas(cuentas){
    $.ajax({
      url:'/fitcoControl/Resources/PHP/CuentasxPagar/Mostrar.php',
      method: 'POST',
      data:{cuentas:cuentas},
    })
    .done(function(resultado){
      $('#mostrarCuentas').html(resultado);
      ActivarBotones();
    })
  }

  $(document).on('keyup', '#busqueda', function(){
    var valorBusqueda = $(this).val();
    if (valorBusqueda!= "") {
      fetchCuentas(valorBusqueda);
    }else {
      fetchCuentas();
    }
  });





  function ActivarBotones(){
    $('.EditCuenta').unbind();
    $('.EditCuenta').click(function(){
      var cuentaId = $(this).attr('cuenta-id');
      $.ajax({
        method: 'POST',
        url: '/fitcoControl/Resources/PHP/CuentasxPagar/fetchCuentasxPagar.php',
        data: {cuentaId: cuentaId},

        success: function(result){
          var rsp = JSON.parse(result);
          console.log(rsp);
          if (rsp.code == 1) {
            $('#mcxp_id').val(rsp.response.pk_cuentasPagar);
            $('#mcxp_proveedor').val(rsp.response.proveedor);
            $('#mcxp_desc').val(rsp.response.descripcion);
            $('#mcxp_total').val(rsp.response.montoPago);
            $('#mcxp_vencimiento').val(rsp.response.fechaVencimiento);
            $('#mcxp_pagado').val(rsp.response.pagado);
            $('#mcxp_factura').val(rsp.response.factura);

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


    $('.ActualizarCuenta').unbind();
    $('.ActualizarCuenta').click(function(){
      var id = $('#mcxp_id').val();
      var proveedor = $('#mcxp_proveedor').val();
      var desc = $('#mcxp_desc').val();
      var total = $('#mcxp_total').val();
      var vence = $('#mcxp_vencimiento').val();
      var pagado = $('#mcxp_pagado').val();
      var factura = $('#mcxp_factura').val();

      $.ajax({
        method: 'POST',
        url: '/fitcoControl/Resources/PHP/CuentasxPagar/Editar.php',
        data: {
          id: id,
          proveedor: proveedor,
          desc: desc,
          total: total,
          vence: vence,
          pagado: pagado,
          factura: factura
        },
        success:function(result){
          if (result != 1) {
            alertify.error('NO SE MODIFICÓ NINGUN REGISTRO');
            $('#EditarCuenta').modal('hide');
            $('#NuevaCuenta').hide();
            $('.spanA').css('display', '');
            fetchCuentas();
          }else {
            alertify.success('SE MODIFICÓ CORRECTAMENTE');
            $('#EditarCuenta').modal('hide');
            $('#NuevaCuenta').hide();
            $('.spanA').css('display', '');
            fetchCuentas();
          }
        },
        error:function(exception){
          console.error(exception)
        }
      });
    });



    $('.eliminarCuenta').unbind();
    $('.eliminarCuenta').click(function(){
      var cuentaId = $(this).attr('cuenta-id');
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
          url: '/fitcoControl/Resources/PHP/CuentasxPagar/Eliminar.php',
          data: {cuentaId: cuentaId},

          success: function(result){
            console.log(result);
            if (result != 1) {
              alertify.error('NO SE PUDO ELIMINAR');
              $('#NuevaCuenta').hide();
              $('.spanA').css('display', '');
              fetchCuentas();
            }else if (result == 1){
              $('#NuevaCuenta').hide();
              $('.spanA').css('display', '');
              fetchCuentas();
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
