
$(document).ready(function(){
  Usuarios_Det();


  $('#usr_privilegios').on('change', function() {
    if (this.value == 'Administrador') {
      $('.privusuarios').css('display', 'none');
      $('.agregarNuevoRegistro').css('display', '');
    }else {
      $('.privusuarios').css('display', '');
      $('.agregarNuevoRegistro').css('display', 'none');
    }
  });

});

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




//MOSTRAR REGISTROS EN PANTALLA
function Usuarios_Det(){
  $.ajax({
    method: 'POST',
    url:'/fitcoControl/Ubicaciones/Usuarios/actions/mostrar.php',
    success: function(r){
      console.log(r);
      r = JSON.parse(r);
      if (r.code == 1) {
        $('#mostrarUsuarios1').html(r.data);
        ActivarBotonesUsuario();
      } else {
        console.error(r.message);
      }
    }
  })
}


//AGREGAR NUEVO REGISTRO
$('.NuevoRegistroUsuario').click(function(){
  var data = {
    nom : $('#usr_nombre').val(),
    ape : $('#usr_apellidos').val(),
    correo : $('#usr_correo').val(),
    dep : $('#usr_departamento').val(),
    puesto : $('#usr_puesto').val(),
    usr : $('#usr_usuario').val(),
    contra : $('#usr_contra').val(),
    priv : $('#usr_privilegios').val(),
    e_ventas : checkPrivilege($('#priv_e_ventas')),
    e_tesoreria : checkPrivilege($('#priv_e_tesoreria')),
    e_produc : checkPrivilege($('#priv_e_produc')),
    e_rhVer : checkPrivilege($('#priv_e_rhVer')),
    e_rhEditar : checkPrivilege($('#priv_e_rhEditar')),
    e_usVer : checkPrivilege($('#priv_e_usVer')),
    e_usEditar : checkPrivilege($('#priv_e_usEditar')),
    c_ver : checkPrivilege($('#priv_c_ver')),
    c_editar : checkPrivilege($('#priv_c_editar')),
    tc_ver : checkPrivilege($('#priv_tc_ver')),
    tc_editar : checkPrivilege($('#priv_tc_editar')),
    tcxp_ver : checkPrivilege($('#priv_tcxp_ver')),
    tcxp_editar : checkPrivilege($('#priv_tcxp_editar')),
    tm_ver : checkPrivilege($('#priv_tm_ver')),
    tm_editar : checkPrivilege($('#priv_tm_editar')),
    tr_ver : checkPrivilege($('#priv_tr_ver')),
    tr_editar : checkPrivilege($('#priv_tr_editar')),
    pro_pgVer : checkPrivilege($('#priv_pro_pgVer')),
    pro_pgEditar : checkPrivilege($('#priv_pro_pgEditar')),
    pro_miVer : checkPrivilege($('#priv_pro_miVer')),
    pro_miEditar : checkPrivilege($('#priv_pro_miEditar')),
    pro_pdVer : checkPrivilege($('#priv_pro_pdVer')),
    pro_pdEditar : checkPrivilege($('#priv_pro_pdEditar')),
    pro_corVer : checkPrivilege($('#priv_pro_corVer')),
    pro_corEditar : checkPrivilege($('#priv_pro_corEditar')),
    pro_liVer : checkPrivilege($('#priv_pro_liVer')),
    pro_liEditar : checkPrivilege($('#priv_pro_liEditar')),
    en_ver : checkPrivilege($('#priv_en_ver')),
    en_editar : checkPrivilege($('#priv_en_editar')),
    cc_ver : checkPrivilege($('#priv_cc_ver')),
    cc_editar : checkPrivilege($('#priv_cc_editar')),
    ve_ver : checkPrivilege($('#priv_ve_ver')),
    ve_editar : checkPrivilege($('#priv_ve_editar'))
  }

  validacion = $('#usr_nombre').val() == "" ||
  $('#usr_apellidos').val() == "" ||
  $('#usr_correo').val() == "" ||
  $('#usr_departamento').val() == "" ||
  $('#usr_puesto').val() == "" ||
  $('#usr_usuario').val() == "" ||
  $('#usr_contra').val() == "" ||
  $('#usr_privilegios').val() == "";

  if (validacion) {
    swal("NO PUEDE CONTINUAR","Todos los campos necesitan estar llenos","error");
  }else {
	$.ajax({
		type: "POST",
		url:'/fitcoControl/Ubicaciones/Usuarios/actions/agregar.php',
		data: data,
		success: 	function(request){
			r = JSON.parse(request);
      if (r.code == 1) {
        alertify.success('SE AGREGÓ CORRECTAMENTE');
        $('#NuevoUsuario').hide();
        $('.spanA').css('display', '');
        $('#Eusuarios').animate({"right": "4%"}, "slow");
        Usuarios_Det();
        $('.modal').modal('hide');
			} else {
        swal("FALLO AL REGISTRAR","No se agregó el registro","error");

				console.error(r.message);
			}
		}
	});
  }
});


function ActivarBotonesUsuario(){

  //PARA VISUALIZAR DATOS EN EL MODAL//
  $('.EditUsuario').unbind();
  $('.EditUsuario').click(function(){
    var usuarioId = $(this).attr('db-id');

    $.ajax({
      method: 'POST',
      url: 'actions/fetchdataUsuarios.php',
      data: {usuarioId: usuarioId},

      success: function(result){
        var rsp = JSON.parse(result);
        // console.log(rsp);
        if (rsp.code == 1) {
          $('#pk_usuario').val(rsp.response.pk_usuario);
          $('#nombreUsuario').val(rsp.response.nombreUsuario);
          $('#apellidosUsuario').val(rsp.response.apellidosUsuario);
          $('#correoUsuario').val(rsp.response.correoUsuario);
          $('#departamentoUsuario').val(rsp.response.departamentoUsuario);
          $('#puestoUsuario').val(rsp.response.puestoUsuario);
          $('#usrUsuario').val(rsp.response.usrUsuario);
          $('#contraUsuario').val(rsp.response.contraUsuario);
          $('#privilegiosUsuario').val(rsp.response.privilegiosUsuario);
          markCheckbox($('#e_ventas'), rsp.response.e_ventas);
          markCheckbox($('#e_tesoreria'), rsp.response.e_tesoreria);
          markCheckbox($('#e_produc'), rsp.response.e_produc);
          markCheckbox($('#e_rhVer'), rsp.response.e_rhVer);
          markCheckbox($('#e_rhEditar'), rsp.response.e_rhEditar);
          markCheckbox($('#e_usVer'), rsp.response.e_usVer);
          markCheckbox($('#e_usEditar'), rsp.response.e_usEditar);
          markCheckbox($('#c_ver'), rsp.response.c_ver);
          markCheckbox($('#c_editar'), rsp.response.c_editar);
          markCheckbox($('#tc_ver'), rsp.response.tc_ver);
          markCheckbox($('#tc_editar'), rsp.response.tc_editar);
          markCheckbox($('#tcxp_ver'), rsp.response.tcxp_ver);
          markCheckbox($('#tcxp_editar'), rsp.response.tcxp_editar);
          markCheckbox($('#tm_ver'), rsp.response.tm_ver);
          markCheckbox($('#tm_editar'), rsp.response.tm_editar);
          markCheckbox($('#tr_ver'), rsp.response.tr_ver);
          markCheckbox($('#tr_editar'), rsp.response.tr_editar);
          markCheckbox($('#pro_pgVer'), rsp.response.pro_pgVer);
          markCheckbox($('#pro_pgEditar'), rsp.response.pro_pgEditar);
          markCheckbox($('#pro_miVer'), rsp.response.pro_miVer);
          markCheckbox($('#pro_miEditar'), rsp.response.pro_miEditar);
          markCheckbox($('#pro_pdVer'), rsp.response.pro_pdVer);
          markCheckbox($('#pro_pdEditar'), rsp.response.pro_pdEditar);
          markCheckbox($('#pro_corVer'), rsp.response.pro_corVer);
          markCheckbox($('#pro_corEditar'), rsp.response.pro_corEditar);
          markCheckbox($('#pro_liVer'), rsp.response.pro_liVer);
          markCheckbox($('#pro_liEditar'), rsp.response.pro_liEditar);
          markCheckbox($('#en_ver'), rsp.response.en_ver);
          markCheckbox($('#en_editar'), rsp.response.en_editar);
          markCheckbox($('#cc_ver'), rsp.response.cc_ver);
          markCheckbox($('#cc_editar'), rsp.response.cc_editar);
          markCheckbox($('#ve_ver'), rsp.response.ve_ver);
          markCheckbox($('#ve_editar'), rsp.response.ve_editar);
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
    var data = {
      idUsuario : $('#pk_usuario').val(),
      nom : $('#nombreUsuario').val(),
      ape : $('#apellidosUsuario').val(),
      correo : $('#correoUsuario').val(),
      dep : $('#departamentoUsuario').val(),
      puesto : $('#puestoUsuario').val(),
      usr : $('#usrUsuario').val(),
      contra : $('#contraUsuario').val(),
      priv : $('#privilegiosUsuario').val(),
      e_ventas : checkPrivilege($('#e_ventas')),
      e_tesoreria : checkPrivilege($('#e_tesoreria')),
      e_produc : checkPrivilege($('#e_produc')),
      e_rhVer : checkPrivilege($('#e_rhVer')),
      e_rhEditar : checkPrivilege($('#e_rhEditar')),
      e_usVer : checkPrivilege($('#e_usVer')),
      e_usEditar : checkPrivilege($('#e_usEditar')),
      c_ver : checkPrivilege($('#c_ver')),
      c_editar : checkPrivilege($('#c_editar')),
      tc_ver : checkPrivilege($('#tc_ver')),
      tc_editar : checkPrivilege($('#tc_editar')),
      tcxp_ver : checkPrivilege($('#tcxp_ver')),
      tcxp_editar : checkPrivilege($('#tcxp_editar')),
      tm_ver : checkPrivilege($('#tm_ver')),
      tm_editar : checkPrivilege($('#tm_editar')),
      tr_ver : checkPrivilege($('#tr_ver')),
      tr_editar : checkPrivilege($('#tr_editar')),
      pro_pgVer : checkPrivilege($('#pro_pgVer')),
      pro_pgEditar : checkPrivilege($('#pro_pgEditar')),
      pro_miVer : checkPrivilege($('#pro_miVer')),
      pro_miEditar : checkPrivilege($('#pro_miEditar')),
      pro_pdVer : checkPrivilege($('#pro_pdVer')),
      pro_pdEditar : checkPrivilege($('#pro_pdEditar')),
      pro_corVer : checkPrivilege($('#pro_corVer')),
      pro_corEditar : checkPrivilege($('#pro_corEditar')),
      pro_liVer : checkPrivilege($('#pro_liVer')),
      pro_liEditar : checkPrivilege($('#pro_liEditar')),
      en_ver : checkPrivilege($('#en_ver')),
      en_editar : checkPrivilege($('#en_editar')),
      cc_ver : checkPrivilege($('#cc_ver')),
      cc_editar : checkPrivilege($('#cc_editar')),
      ve_ver : checkPrivilege($('#ve_ver')),
      ve_editar : checkPrivilege($('#ve_editar'))
    }
    $.ajax({
      type: "POST",
      url: '/fitcoControl/Ubicaciones/Usuarios/actions/editar.php',
      data: data,
      success: 	function(request){
        r = JSON.parse(request);
        if (r.code == 1) {
          alertify.success('SE MODIFICÓ CORRECTAMENTE');
          $('.modal').modal('hide');
          $('#NuevoUsuario').hide();
          $('.spanA').css('display', '');
          Usuarios_Det();
        } else {
          $('.modal').modal('hide');
          $('#NuevoUsuario').hide();
          $('.spanA').css('display', '');
          Usuarios_Det();
          alertify.error('NO SE MODIFICÓ NINGUN REGISTRO');
          console.error(r.message);
        }
      }
    });
  });


    $('.eliminarUser').unbind();
    $('.eliminarUser').click(function(){
      var usuarioId = $(this).attr('db-id');
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
          url: '/fitcoControl/Ubicaciones/Usuarios/actions/eliminar.php',
          data: {usuarioId: usuarioId},

          success: function(result){
            console.log(result);
            if (result != 1) {
              alertify.error('NO SE PUDO ELIMINAR');
            }else if (result == 1){
              Usuarios_Det();
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
