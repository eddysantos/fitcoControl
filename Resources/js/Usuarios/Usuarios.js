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
        usr_privilegios: privilegiosUsuario
      },
      success:function(result){
        var rsp = JSON.parse(result);
        if (rsp.code != 1) {
          alert("No se pudo agregar el registro");
          console.error(rsp.response);
        } else {
          fetchUsuario();
          $('#NuevoUsuario').hide();
          $('#usuarios').animate({"right": "4%"}, "slow");
          $('#Eusuarios').animate({"right": "4%"}, "slow");
        }
      },
      error:function(exception){
        console.error(exception)
      }
    });
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
        musr_privilegios: privilegiosUsuario
      },
      success:function(result){
        if (result != 1) {
          alert("No se pudo modificar el registro");
        }
        $('#EditarUsuario').modal('hide');
        fetchUsuario();
      },
      error:function(exception){
        console.error(exception)
      }
    });
  });
}
