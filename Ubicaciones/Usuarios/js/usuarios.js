
$(document).ready(function(){
  Usuarios_Det();



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


$('#usr_privilegios').on('change', function() {
  if (this.value == 'Administrador') {
    $('.privusuarios').css('display', 'none');
    $('.agregarNuevoRegistro').css('display', '');
  }else {
    $('.privusuarios').css('display', '');
    $('.agregarNuevoRegistro').css('display', 'none');
  }
});







//MOSTRAR REGISTROS EN PANTALLA
function Usuarios_Det(){
  $.ajax({
    method: 'POST',
    url:'/fitcoControl/Ubicaciones/Usuarios/actions/mostrar.php',
    success: function(r){
      r = JSON.parse(r);
      if (r.code == 1) {
        $('#mostrarUsuarios').html(r.data);
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
    pro_pdVer : checkPrivilege($('#priv_pro_pdVer')),
    pro_pdEditar : checkPrivilege($('#priv_pro_pdEditar')),
    pro_corVer : checkPrivilege($('#priv_pro_corVer')),
    pro_corEditar : checkPrivilege($('#priv_pro_corEditar')),
    pro_liVer : checkPrivilege($('#priv_pro_liVer')),
    pro_liEditar : checkPrivilege($('#priv_pro_liEditar')),
    en_ver : checkPrivilege($('#priv_en_ver')),
    en_editar : checkPrivilege($('#priv_en_editar')),
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

    // 
    // if ($('#privilegiosUsuario').val(rsp.response.privilegiosUsuario) == 'Usuario') {
    //   $('.edit_priv').css('display', '');
    // }else if ($('#privilegiosUsuario').val(rsp.response.privilegiosUsuario) == 'Administrador') {
    //   $('.edit_priv').css('display', 'none');
    // }

    var usuarioId = $(this).attr('db-id');

    $.ajax({
      method: 'POST',
      url: 'actions/fetchdataUsuarios.php',
      data: {usuarioId: usuarioId},

      success: function(result){
        var rsp = JSON.parse(result);
        console.log(rsp);
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

//   $('.ActualizarUsuario').unbind();
//   $('.ActualizarUsuario').click(function(){
//     var idUsuario = $('#musr_id').val();
//     var nombreUsuario = $('#musr_nombre').val();
//     var apellidosUsuario = $('#musr_apellidos').val();
//     var correoUsuario = $('#musr_correo').val();
//     var departamentoUsuario = $('#musr_departamento').val();
//     var puestoUsuario = $('#musr_puesto').val();
//     var usrUsuario = $('#musr_usuario').val();
//     var contraUsuario = $('#musr_contra').val();
//     var privilegiosUsuario = $('#musr_privilegios').val();
//     var cobranza_ver= checkPrivilege($('#musr_verCobranza'));
//     var cobranza_editar = checkPrivilege($('#musr_editCobranza'));
//     var produccion_ver = checkPrivilege($('#musr_verProduccion'));
//     var produccion_editar = checkPrivilege($('#musr_editProduccion'));
//     var cliente_ver = checkPrivilege($('#musr_verCliente'));
//     var cliente_editar = checkPrivilege($('#musr_editCliente'));
//     var verVentas = checkPrivilege($('#musr_verVentas'));
//     var editarVentas = checkPrivilege($('#musr_editVentas'));
//
//     $.ajax({
//       method: 'POST',
//       url: '/fitcoControl/Resources/PHP/Usuarios/EditarUsuario.php',
//       data: {
//         musr_id: idUsuario,
//         musr_nombre: nombreUsuario,
//         musr_apellidos: apellidosUsuario,
//         musr_correo: correoUsuario,
//         musr_departamento: departamentoUsuario,
//         musr_puesto: puestoUsuario,
//         musr_usuario: usrUsuario,
//         musr_contra: contraUsuario,
//         musr_privilegios: privilegiosUsuario,
//         musr_verCobranza: cobranza_ver,
//         musr_editCobranza: cobranza_editar,
//         musr_verProduccion: produccion_ver,
//         musr_editProduccion: produccion_editar,
//         musr_verCliente: cliente_ver,
//         musr_editCliente: cliente_editar,
//         musr_verVentas: verVentas,
//         musr_editVentas: editarVentas
//       },
//       success:function(result){
//         if (result != 1) {
//           alertify.error('NO SE MODIFICÓ NINGUN REGISTRO');
//           $('#EditarUsuario').modal('hide');
//           $('#NuevoUsuario').hide();
//           $('.spanA').css('display', '');
//           fetchUsuario();
//         }else {
//           $('#EditarUsuario').modal('hide');
//           $('#NuevoUsuario').hide();
//           $('.spanA').css('display', '');
//           fetchUsuario();
//           alertify.success('SE MODIFICÓ CORRECTAMENTE');
//         }
//       },
//       error:function(exception){
//         console.error(exception)
//       }
//     });
//   });
//
//
//   $('.eliminarUser').unbind();
//   $('.eliminarUser').click(function(){
//     var usuarioId = $(this).attr('usuario-id');
//     swal({
//     title: "Estas Seguro?",
//     text: "Ya no se podra recuperar el registro!",
//     type: "warning",
//     showCancelButton: true,
//     confirmButtonClass: "btn-danger",
//     confirmButtonText: "Si, Eliminar",
//     cancelButtonText: "No, cancelar",
//     closeOnConfirm: false,
//     closeOnCancel: false
//   },
//   function(isConfirm) {
//     if (isConfirm) {
//       $.ajax({
//         method: 'POST',
//         url: '/fitcoControl/Resources/PHP/Usuarios/EliminarUsuario.php',
//         data: {usuarioId: usuarioId},
//
//         success: function(result){
//           console.log(result);
//           if (result != 1) {
//             alertify.error('NO SE PUDO ELIMINAR');
//           }else if (result == 1){
//             fetchUsuario();
//           }
//         },
//         error: function(exception){
//           console.error(exception)
//         }
//       });
//       swal("Eliminado!", "Se elimino correctamente.", "success");
//     } else {
//       swal("Cancelado", "El registro esta a salvo :)", "error");
//     }
//   });
// });
}
