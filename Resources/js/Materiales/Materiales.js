$(document).ready(function(){

fetchMateriales();
});


  $('#NuevoRegistroMat').click(function(){
    var mm = $('#mat_material').val();
    var fc = $('#mat_fcompra').val();
    var ss = $('#mat_serie').val();
    var pp = $('#mat_precio').val();
    var pe = $('#mat_persona').val();
    var fe = $('#mat_fentrega').val();
    var cc = $('#mat_condiciones').val();


    validacion =
    $('#mat_material').val() == "" ||
    $('#mat_fcompra').val() == "" ||
    $('#mat_precio').val() == "" ||
    $('#mat_persona').val() == "" ||
    $('#mat_fentrega').val() == "" ||
    $('#menv_condiciones').val() == "" ;

    if (validacion) {
        swal("NO PUEDE CONTINUAR","Necesita llenar todos los campos","error");
    }else {
      $.ajax({
        method: 'POST',
        url: '/fitcoControl/Resources/PHP/Materiales/AgregarMaterial.php',
        data: {

          mm: mm,
          fc: fc,
          ss: ss,
          pp: pp,
          pe: pe,
          fe: fe,
          cc: cc
        },
        success:function(result){
          var rsp = JSON.parse(result);
          if (rsp.code != 1) {
            swal("FALLO AL REGISTRAR","No se agregó el registro","error");
            console.error(rsp.response);
            $('#NuevoMaterial').hide();
            $('.spanA').css('display', '');
            fetchMateriales();
          } else {
            alertify.success('SE AGREGÓ CORRECTAMENTE');
            $('#NuevoMaterial')[0].reset();
            $('#NuevoMaterial').hide();
            $('.spanA').css('display', '');
            fetchMateriales();
          }
        },
        error:function(exception){
          console.error(exception)
        }
      })
    }
  });




  //MOSTRAR LOS REGISTROS EN PANTALLA
  function fetchMateriales(materiales){
    $.ajax({
      url:'/fitcoControl/Resources/PHP/Materiales/MostrarTablaMaterial.php',
      method: 'POST',
      data:{materiales:materiales},
    })
    .done(function(resultado){
      $('#MostrarMateriales').html(resultado);
      ActivarBotonesMaterial();
    })
  }

  $(document).on('keyup', '#busqueda', function(){
    var valorBusqueda = $(this).val();
    if (valorBusqueda!= "") {
      fetchMateriales(valorBusqueda);
    }else {
      fetchMateriales();
    }
  });


function ActivarBotonesMaterial(){
  //AGREGAR PAGOS MODAL

  $('.editMat').unbind();
  $('.editMat').click(function(){
    var matId = $(this).attr('mat-id');

    $.ajax({
      method: 'POST',
      url: '/fitcoControl/Resources/PHP/Materiales/fetchMaterialData.php',
      data: {matId: matId},

      success: function(result){
        var rsp = JSON.parse(result);
        console.log(rsp);
        if (rsp.code == 1) {
          $('#mmat_id').val(rsp.response.pk_material);
          $('#mmat_material').val(rsp.response.material);
          $('#mmat_fcompra').val(rsp.response.fechaCompra);
          $('#mmat_serie').val(rsp.response.numeroSerie);
          $('#mmat_precio').val(rsp.response.precioMaterial);
          $('#mmat_persona').val(rsp.response.personaEntrega);
          $('#mmat_fentrega').val(rsp.response.fechaEntrega);
          $('#mmat_condiciones').val(rsp.response.condicionEntrega);
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

  $('.ActualizarMat').unbind();
  $('.ActualizarMat').click(function(){
    var id = $('#mmat_id').val();
    var mm = $('#mmat_material').val();
    var fc = $('#mmat_fcompra').val();
    var ns = $('#mmat_serie').val();
    var pr = $('#mmat_precio').val();
    var pe = $('#mmat_persona').val();
    var fe = $('#mmat_fentrega').val();
    var cc = $('#mmat_condiciones').val();

    $.ajax({
      method: 'POST',
      url: '/fitcoControl/Resources/PHP/Materiales/EditarMaterial.php',
      data: {
        id: id,
        mm: mm,
        fc: fc,
        ns: ns,
        pr: pr,
        pe: pe,
        fe: fe,
        cc: cc
      },
      success:function(result){
        if (result != 1) {
          alertify.error('NO SE MODIFICÓ NINGUN REGISTRO');
          $('#EditarMaterial').modal('hide');
          $('#NuevoMaterial').hide();
          $('.spanA').css('display', '');
          fetchMateriales();
        }else {
          $('#EditarMaterial').modal('hide');
          $('#NuevoMaterial').hide();
          $('.spanA').css('display', '');
          fetchMateriales();
          alertify.success('SE MODIFICÓ CORRECTAMENTE');
        }
      },
      error:function(exception){
        console.error(exception)
      }
    });
  });


  $('.eliminarMat').unbind();
  $('.eliminarMat').click(function(){
    var matId = $(this).attr('mat-id');
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
        url: '/fitcoControl/Resources/PHP/Materiales/EliminarMaterial.php',
        data: {matId: matId},

        success: function(result){
          console.log(result);
          if (result != 1) {
            alertify.error('NO SE PUDO ELIMINAR');
            $('#NuevoMaterial').hide();
            $('.spanA').css('display', '');
            fetchMateriales();
          }else if (result == 1){
            $('#NuevoMaterial').hide();
            $('.spanA').css('display', '');
            fetchMateriales();
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
