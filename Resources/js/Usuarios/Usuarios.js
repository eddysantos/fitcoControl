function checkPrivilege(privilege){
  if (privilege.is(':checked') == true) {
    return 1;
  } else {
    return 0;
  }
}

function markCheckbox(selector, value){
  if (value == "1") {
    selector.prop('checked', true);
  } else {
    selector.prop('checked', false);
  }
}


$(document).ready(function(){
  fetchUsuario();



  $('#NuevoRegistroUsuario').click(function(){

    var nombreUsuario = $('#usr_nombre').val();
    var apellidosUsuario = $('#usr_apellidos').val();
    var correoUsuario = $('#usr_correo').val();
    var departamentoUsuario = $('#usr_departamento').val();
    var puestoUsuario = $('#usr_puesto').val();
    var usrUsuario = $('#usr_usuario').val();
    var contraUsuario = $('#usr_contra').val();
    var privilegiosUsuario = $('#usr_privilegios').val();
    var verCobranza = checkPrivilege($('#verCobranza'));
    var editCobranza = checkPrivilege($('#editCobranza'));
    var verProduccion =checkPrivilege($('#verProduccion'));
    var editProduccion = checkPrivilege($('#editProduccion'));
    var verCliente = checkPrivilege($('#verCliente'));
    var editCliente = checkPrivilege($('#editCliente'));

    validacion =
    $('#usr_nombre').val() == "" ||
    $('#usr_apellidos').val() == "" ||
    $('#usr_correo').val() == "" ||
    $('#usr_departamento').val() == "" ||
    $('#usr_puesto').val() == "" ||
    $('#usr_usuario').val() == "" ||
    $('#usr_contra').val() == "" ||
    $('#usr_privilegios').val() == "";

    if (validacion) {
      swal("NO PUEDE CONTINUAR","Necesita llenar todos los campos","error");
    }else {
      $.ajax({
        method: 'POST',
        url: '/fitcoControl/Resources/PHP/Usuarios/AgregarUsuario.php',
        data: {
          usr_nombre: nombreUsuario,
          usr_apellidos: apellidosUsuario,
          usr_correo: correoUsuario,
          usr_departamento: departamentoUsuario,
          usr_puesto: puestoUsuario,
          usr_usuario: usrUsuario,
          usr_contra: contraUsuario,
          usr_privilegios: privilegiosUsuario,
          verCobranza: verCobranza,
          editCobranza: editCobranza,
          verProduccion: verProduccion,
          editProduccion: editProduccion,
          verCliente: verCliente,
          editCliente: editCliente
        },
        success:function(result){
          var rsp = JSON.parse(result);
          if (rsp.code != 1) {
            swal("FALLO AL REGISTRAR","No se agregó el registro","error");
            console.error(rsp.response);
          } else {
            fetchUsuario();
            $('#NuevoUsuario').hide();
            $('#usuarios').animate({"right": "4%"}, "slow");
            $('#Eusuarios').animate({"right": "4%"}, "slow");
            alertify.success('SE AGREGÓ CORRECTAMENTE');
          }
        },
        error:function(exception){
          console.error(exception)
        }
      })
    }
  });
});



//MOSTRAR LOS REGISTROS EN PANTALLA
function fetchUsuario(){
  $.ajax({
    method: 'POST',
    url:'/fitcoControl/Resources/PHP/Usuarios/MostrarTablaUsuario.php',
    success:function(result){
      var rsp = JSON.parse(result);
      console.log(rsp);
      $('#mostrarUsuarios').html(rsp.infoTabla);
      ActivarBotonesUsuario();
    },
    error:function(exception){
      console.error(exception)
    }
  })
}


function ActivarBotonesUsuario(){

  //PARA VISUALIZAR DATOS EN EL MODAL//
  $('.EditUsuario').unbind();
  $('.EditUsuario').click(function(){
    var usuarioId = $(this).attr('usuario-id');

    $.ajax({
      method: 'POST',
      url: '/fitcoControl/Resources/PHP/Usuarios/fetchUsuarioData.php',
      data: {usuarioId: usuarioId},

      success: function(result){
        var rsp = JSON.parse(result);
        console.log(rsp);
        if (rsp.code == 1) {
          $('#musr_id').val(rsp.response.pk_usuario);
          $('#musr_nombre').val(rsp.response.nombreUsuario);
          $('#musr_apellidos').val(rsp.response.apellidosUsuario);
          $('#musr_correo').val(rsp.response.correoUsuario);
          $('#musr_departamento').val(rsp.response.departamentoUsuario);
          $('#musr_puesto').val(rsp.response.puestoUsuario);
          $('#musr_usuario').val(rsp.response.usrUsuario);
          $('#musr_contra').val(rsp.response.contraUsuario);
          $('#musr_privilegios').val(rsp.response.privilegiosUsuario);
          markCheckbox($('#musr_verCobranza'), rsp.response.cobranza_ver);
          markCheckbox($('#musr_editCobranza'), rsp.response.cobranza_editar);
          markCheckbox($('#musr_verProduccion'), rsp.response.produccion_ver);
          markCheckbox($('#musr_editProduccion'), rsp.response.produccion_editar);
          markCheckbox($('#musr_verCliente'), rsp.response.cliente_ver);
          markCheckbox($('#musr_editCliente'), rsp.response.cliente_editar);
        }else {
          console.error("Hubo un error al jalar la informacion del usuario.");
          console.error(rsp.response);
        }
      },
      error: function(exception){
        console.error(exception);
      }
    })
  });

  $('.ActualizarUsuario').unbind();
  $('.ActualizarUsuario').click(function(){
    var idUsuario = $('#musr_id').val();
    var nombreUsuario = $('#musr_nombre').val();
    var apellidosUsuario = $('#musr_apellidos').val();
    var correoUsuario = $('#musr_correo').val();
    var departamentoUsuario = $('#musr_departamento').val();
    var puestoUsuario = $('#musr_puesto').val();
    var usrUsuario = $('#musr_usuario').val();
    var contraUsuario = $('#musr_contra').val();
    var privilegiosUsuario = $('#musr_privilegios').val();
    var cobranza_ver= checkPrivilege($('#musr_verCobranza'));
    var cobranza_editar = checkPrivilege($('#musr_editCobranza'));
    var produccion_ver = checkPrivilege($('#musr_verProduccion'));
    var produccion_editar = checkPrivilege($('#musr_editProduccion'));
    var cliente_ver = checkPrivilege($('#musr_verCliente'));
    var cliente_editar = checkPrivilege($('#musr_editCliente'));

    $.ajax({
      method: 'POST',
      url: '/fitcoControl/Resources/PHP/Usuarios/EditarUsuario.php',
      data: {
        musr_id: idUsuario,
        musr_nombre: nombreUsuario,
        musr_apellidos: apellidosUsuario,
        musr_correo: correoUsuario,
        musr_departamento: departamentoUsuario,
        musr_puesto: puestoUsuario,
        musr_usuario: usrUsuario,
        musr_contra: contraUsuario,
        musr_privilegios: privilegiosUsuario,
        musr_verCobranza: cobranza_ver,
        musr_editCobranza: cobranza_editar,
        musr_verProduccion: produccion_ver,
        musr_editProduccion: produccion_editar,
        musr_verCliente: cliente_ver,
        musr_editCliente: cliente_editar
      },
      success:function(result){
        if (result != 1) {
          alertify.error('NO SE MODIFICÓ NINGUN REGISTRO');
          $('#EditarUsuario').modal('hide');
          fetchUsuario();
        }else {
          $('#EditarUsuario').modal('hide');
          fetchUsuario();
          alertify.success('SE MODIFICÓ CORRECTAMENTE');
        }
      },
      error:function(exception){
        console.error(exception)
      }
    });
  });
}
