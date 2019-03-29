$(document).ready(function() {
    listar();
});

  var listar = function(){
    var table = $('#db_cobranza').DataTable({
      "scrollY": "380px",
      // "scrollX": true,
      "scrollCollapse": true,
      "destroy": true,
      "ajax":{
        "method": "POST",
        "url": "actions/listar.php"
      },
      "columns":[

        {"width": "5%","data": "colorCliente",
          render :function(data,type,row){
            return"<input class='w-25 dt' value="+ data +" type='color'>"
          }
        },
        {"width": "35%","data": "nombreCliente",},
        {"width": "15%","data": "conceptoPago"},
        {"width": "10%","data": "facturaCobranza"},
        {"width": "10%","data": "importeCobranza",render: $.fn.dataTable.render.number(',', '.', 2, '$') },
        {"width": "10%","data": "vencimientoCobranza"},
        {"width": "15%","data": "pk_cobranza",
          render:function(data,type,row){
            return"<a href='#PagoFacturas' data-toggle='modal' id='btnAgregarPago' class='agregarPago spand-link' cobranza-id="+ data +"><img  src='/fitcoControl/Resources/iconos/003-add.svg' class='img spand-icon'></a>           <a href='' class='visualizarcobranza spand-link' data-toggle='modal' data-target='#VisualizarTablaCobranza' cobranza-id="+ data +"><img  src='/fitcoControl/Resources/iconos/magnifier.svg' class='img ml-3 spand-icon'></a>              <a onclick='mostrar(" + data + ");' class='spand-link'  data-toggle='modal' data-target='#editarCobranza'><img  src='/fitcoControl/Resources/iconos/001-edit-1.svg' class='img ml-3 spand-icon'></a>              <a  onclick='eliminar(" + data + ");' class='eliminar spand-link ml-3' cobranza-id="+ data +"><img src='/fitcoControl/Resources/iconos/004-delete-1.svg' class='img spand-icon'></a>"
          }
        }
      ],
      "language": idioma_espanol
    });
  }


  // $('#NuevoRegistroCobranza').click(function(){
  //   var conceptoPago = $('#cbz_concepto').val();
  //   var facturaCobranza = $('#cbz_factura').val();
  //   var importeCobranza = $('#cbz_importe').val();
  //   var vencimientoCobranza = $('#cbz_dvencimiento').val();
  //   var fechaEntrega = $('#cbz_entrega').val();
  //   var fk_cliente = $('#npClientName').attr('client-id');
  //
  //   validacion =
  //   $('#npClientName').val() == "" ||
  //   $('#cbz_concepto').val() == "" ||
  //   $('#cbz_factura').val() == "" ||
  //   $('#cbz_importe').val() == "" ||
  //   $('#cbz_entrega').val() == "" ||
  //   $('#cbz_dvencimiento').val() == "";
  //
  //
  //   if (validacion) {
  //     swal("NO PUEDE CONTINUAR","Nesesita llenar todos los campos","error");
  //   }else{
  //     $.ajax({
  //       method: 'POST',
  //       url: 'actions/agregar.php',
  //       data:{
  //         cbz_concepto: conceptoPago,
  //         cbz_factura: facturaCobranza,
  //         cbz_importe: importeCobranza,
  //         cbz_dvencimiento: vencimientoCobranza,
  //         cbz_entrega: fechaEntrega,
  //         cbz_cliente: fk_cliente
  //       },
  //       success:function(result){
  //         var rsp = JSON.parse(result);
  //         if (rsp.code != 1) {
  //           swal("FALLO AL REGISTRAR","No se agregó el registro","error");
  //           console.error(rsp.response);
  //           $('#Agregarcobranza').hide();
  //           $('.spanA').css('display', '');
  //             listar();
  //         } else{
  //           $('#Agregarcobranza')[0].reset();
  //           $('#Agregarcobranza').hide();
  //           $('.spanA').css('display', '');
  //             listar();
  //           alertify.success('SE AGREGÓ CORRECTAMENTE');
  //         }
  //       },
  //       error:function(exception){
  //         console.error(exception)
  //       }
  //     })
  //   }
  // });



   // ************************** //
  // **MOSTRAR DATOS EN MODAL**//
 // *************************//
  //
  // var mostrar = function(pk_cobranza){
  //   if (!/^([0-9])*$/.test(pk_cobranza)) {
  //     return false
  //   }else {
  //     $.ajax({
  //       url:"actions/mostrar.php",
  //       method: "POST",
  //       dataType: "json",
  //       data:{pk_cobranza:pk_cobranza},
  //       success:function (data){
  //         $('#mcbz_id').val(data.pk_cobranza);
  //         $('#mcbz_cliente').val(data.nombreCliente).attr('client-id', data.fk_cliente);
  //         $('#mcbz_concepto').val(data.conceptoPago);
  //         $('#mcbz_factura').val(data.facturaCobranza);
  //         $('#mcbz_entrega').val(data.fechaEntrega);
  //         $('#mcbz_importe').val(data.importeCobranza);
  //         $('#mcbz_vencimiento').val(data.vencimientoCobranza);
  //         console.log(data);
  //       },
  //       error: function(exception){
  //         console.error(exception);
  //         }
  //     });
  //   }
  // }


  // ****************************** //
  // **ACTUALIAZAR DATOS EN MODAL**//
  // *****************************//
  // $('.ActualizarDcobranza').unbind();
  // $('.ActualizarDcobranza').click(function(){
  //   var idCobranza = $('#mcbz_id').val();
  //   var fk_cliente = $('#mcbz_cliente').attr('client-id');
  //   var concepto = $('#mcbz_concepto').val();
  //   var facturaCobranza = $('#mcbz_factura').val();
  //   var importeCobranza = $('#mcbz_importe').val();
  //   var fechaEntrega = $('#mcbz_entrega').val();
  //   var vencimientoCobranza = $('#mcbz_vencimiento').val();
  //
  //   validacion =
  //   $('#mcbz_cliente').val() == "" ||
  //   $('#mcbz_concepto').val() == "" ||
  //   $('#mcbz_factura').val() == "" ||
  //   $('#mcbz_importe').val() == "" ||
  //   $('#mcbz_entrega').val() == "" ||
  //   $('#mcbz_vencimiento').val() == "";
  //
  //   if (validacion) {
  //     swal("NO PUEDE CONTINUAR","Nesesita llenar todos los campos","error");
  //   }else{
  //   $.ajax({
  //     method:'POST',
  //     dataType: "json",
  //     url:'actions/editar.php',
  //     data: {
  //       mcbz_id: idCobranza,
  //       mcbz_cliente: fk_cliente,
  //       mcbz_concepto: concepto,
  //       mcbz_factura: facturaCobranza,
  //       mcbz_importe: importeCobranza,
  //       mcbz_vencimiento: vencimientoCobranza,
  //       mcbz_fechaEntrega: fechaEntrega
  //     },
  //     success:function(data){
  //       var rsp = JSON.parse(data);
  //       console.log(rsp);
  //       listar();
  //       $('#editarCobranza').modal('hide');
  //
  //     },
  //     error:function(exception){
  //       alertify.error('NO SE MODIFICÓ NINGUN REGISTRO');
  //       console.error(exception)
  //     }
  //   })
  //   }
  // });



   // ******************************//
  // ** ELIMINAR DATOS DE TABLA  **//
 // ***************************** //
//   var eliminar = function (pk_cobranza) {
//       swal({
//       title: "Estas Seguro?",
//       text: "Ya no se podra recuperar el registro!",
//       type: "warning",
//       showCancelButton: true,
//       confirmButtonClass: "btn-danger",
//       confirmButtonText: "Si, Eliminar",
//       cancelButtonText: "No, cancelar",
//       closeOnConfirm: false,
//       closeOnCancel: false
//     },
//     function(isConfirm) {
//       if (isConfirm) {
//         $.ajax({
//           method: 'POST',
//           url: 'actions/eliminar.php',
//           data: {pk_cobranza: pk_cobranza},
//
//           success: function(data){
//             listar();
//           },
//           error: function(exception){
//             alertify.error('NO SE PUDO ELIMINAR');
//             console.error(exception)
//           }
//         });
//         swal("Eliminado!", "Se elimino correctamente.", "success");
//       } else {
//         swal("Cancelado", "El registro esta a salvo :)", "error");
//       }
//     });
// }



  // ***************************** //
 // ******* EN ESPAÑOL  ********* //
// ***************************** //
  var idioma_espanol = {
      "sProcessing":     "Procesando...",
      "sLengthMenu":     "Mostrar _MENU_",
      "sZeroRecords":    "No se encontraron resultados",
      "sEmptyTable":     "Ningún dato disponible en esta tabla",
      "sInfo":           "Registros del _START_ al _END_ de un total de _TOTAL_ registros",
      "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
      "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix":    "",
      "sSearch":         "",
      "sUrl":            "",
      "sInfoThousands":  ",",
      "sLoadingRecords": "Cargando...",
      "oPaginate": {
          "sFirst":    "Primero",
          "sLast":     "Último",
          "sNext":     "Siguiente",
          "sPrevious": "Anterior"
      },
      "oAria": {
          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
  }
