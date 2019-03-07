// $(document).ready(function(){
//   Mantenimiento_Det();
//   fetchTerminado();
//
//
//   $('#correo').click(function(){
//     $.ajax({
//       method: 'POST',
//       url:'actions/notificar_autorizaciones.php',
//       success: function(r){
//         console.log(r);
//         r = JSON.parse(r);
//         if (r.code == 1) {
//           swal("Enviado!", "El correo se envio correctamente.", "success");
//         } else {
//           console.error(r.message);
//         }
//       }
//     })
//   })
//
//
//   $('.consultar').click(function(){
//     var accion = $(this).attr('accion');
//     var status = $(this).attr('status');
//
//     switch (accion) {
//         case "amantenimiento":
//         if (status == 'cerrado') {
//           $('.spanA').css('display', 'inherit');
//           $(this).attr('status', 'abierto');
//           $('#tablaMantenimiento').animate({"right": "36%"}, "slow");
//           $('#NuevoMantenimiento').fadeIn(2500);
//           $('#SinRegistros').fadeOut();
//           $('p').css('font-size','13px');
//
//         }else {
//           $('.spanA').css('display', '');
//           $(this).attr('status', 'cerrado');
//           $('#tablaMantenimiento').animate({"right": "4%"}, "slow");
//           $('#NuevoMantenimiento').hide();
//           $('p').css('font-size','1.75rem');
//
//         }
//         break;
//
//       default:
//         console.error("Something went terribly wrong...");
//     }
//   });
// });
//
// function checkPrivilege(privilege){
//   if (privilege.is(':checked') == true) {
//     return 1;
//   } else {
//     return 0;
//   }
// }
//
// function markCheckbox(selector, value){
//   if (value == "1") {
//     selector.prop('checked', true);
//   } else {
//     selector.prop('checked', false);
//   }
// }
//
//
// //MOSTRAR REGISTROS EN PANTALLA
// function Mantenimiento_Det(){
//   $.ajax({
//     method: 'POST',
//     url:'/fitcoControl/Ubicaciones/Mantenimiento/actions/mostrar.php',
//     success: function(r){
//       console.log(r);
//       r = JSON.parse(r);
//       if (r.code == 1) {
//         $('#tabla_Mantenimiento').html(r.data);
//         ActivarBotones();
//       } else {
//         console.error(r.message);
//       }
//     }
//   })
// }
//
// function fetchTerminado(){
//   $.ajax({
//     url:'/fitcoControl/Ubicaciones/Mantenimiento/actions/RepoPagado.php',
//     method: 'POST',
//     // data:{cuentas:cuentas},
//   })
//   .done(function(resultado){
//     $('#mostrarPagado').html(resultado);
//     ActivarBotones();
//   })
// }
//
//
//
// //AGREGAR NUEVO REGISTRO EN LINEA
// $('#NuevoRegistroMan').click(function(){
//   var data = {
// 		orden: $('#man_orden').val(),
//     inv: $('#man_inversion').val(),
//     area: $('#man_area').val(),
//     desc: $('#man_descripcion').val(),
//     prov : $('#man_proveedor').val(),
//     costo: $('#man_costo').val(),
//     fecha: $('#man_fecha').val(),
//     pagado: $('#man_pagado').val(),
//     aut: $('#man_aut').val()
//   }
//
//   validacion = $('#man_orden').val() == "" ||
//   $('#man_inversion').val() == "" ||
//   $('#man_area').val() == "" ||
//   $('#man_descripcion').val() == "" ||
//   $('#man_proveedor').val() == "" ||
//   $('#man_fecha').val() == "" ||
//   $('#man_costo').val() == "";
//
//   if (validacion) {
//     swal("NO PUEDE CONTINUAR","Todos los campos necesitan estar llenos","error");
//   }else {
// 	$.ajax({
// 		type: "POST",
// 		url: "/fitcoControl/Ubicaciones/Mantenimiento/actions/agregar.php",
// 		data: data,
// 		success: 	function(request){
//       console.log(request);
// 			r = JSON.parse(request);
//       if (r.code == 1) {
//         alertify.success('SE AGREGÓ CORRECTAMENTE');
//         $('#NuevoMantenimiento').hide();
//         $('.spanA').css('display', '');
//         $('#tablaMantenimiento').animate({"right": "4%"}, "slow");
//         Mantenimiento_Det();
// 			} else {
//         swal("FALLO AL REGISTRAR","No se agregó el registro","error");
//         Mantenimiento_Det();
// 				console.error(r.message);
// 			}
// 		}
// 	});
//   }
// });
//
//
// function ActivarBotones(){
//
//   //PARA VISUALIZAR DATOS EN EL MODAL//
//   $('.EditMantenimiento').unbind();
//   $('.EditMantenimiento').click(function(){
//     var mantId = $(this).attr('db-id');
//
//     $.ajax({
//       method: 'POST',
//       url: 'actions/fetch.php',
//       data: {mantId: mantId},
//
//       success: function(result){
//         var rsp = JSON.parse(result);
//         if (rsp.code == 1) {
//           $('#pk_mantenimiento').val(rsp.response.pk_mantenimiento);
//           $('#orden').val(rsp.response.orden);
//           $('#mant_Inv').val(rsp.response.mant_Inv);
//           $('#area').val(rsp.response.area);
//           $('#descripcion').val(rsp.response.descripcion);
//           $('#proveedor').val(rsp.response.proveedor);
//           $('#costo').val(rsp.response.costo);
//           $('#fechaRequerido').val(rsp.response.fechaRequerido);
//           markCheckbox($('#pagado'), rsp.response.pagado);
//           markCheckbox($('#autorizacion'), rsp.response.autorizacion);
//         }else {
//           console.error("Hubo un error al jalar la informacion del usuario.");
//           console.error(rsp.response);
//         }
//       },
//       error: function(exception){
//         console.error(exception);
//       }
//     })
//   });
//
//   $('.ActualizarMant').unbind();
//   $('.ActualizarMant').click(function(){
//     var data = {
//       idMant : $('#pk_mantenimiento').val(),
//       orden : $('#orden').val(),
//       mant_Inv : $('#mant_Inv').val(),
//       area : $('#area').val(),
//       descripcion : $('#descripcion').val(),
//       proveedor : $('#proveedor').val(),
//       costo : $('#costo').val(),
//       fechaRequerido : $('#fechaRequerido').val(),
//       pagado : checkPrivilege($('#pagado')),
//       autorizacion : checkPrivilege($('#autorizacion'))
//     }
//     $.ajax({
//       type: "POST",
//       url: '/fitcoControl/Ubicaciones/Mantenimiento/actions/editar.php',
//       data: data,
//       success: 	function(request){
//         r = JSON.parse(request);
//         if (r.code == 1) {
//           alertify.success('SE MODIFICÓ CORRECTAMENTE');
//           $('.modal').modal('hide');
//           $('#NuevoMantenimiento').hide();
//           $('.spanA').css('display', '');
//           Mantenimiento_Det();
//           fetchTerminado();
//
//         } else {
//           $('.modal').modal('hide');
//           $('#NuevoMantenimiento').hide();
//           $('.spanA').css('display', '');
//           Mantenimiento_Det();
//           fetchTerminado();
//
//           alertify.error('NO SE MODIFICÓ NINGUN REGISTRO');
//           console.error(r.message);
//         }
//       }
//     });
//   });
//
//
//     $('.eliminarMant').unbind();
//     $('.eliminarMant').click(function(){
//       var dbId = $(this).attr('db-id');
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
//           url: '/fitcoControl/Ubicaciones/Mantenimiento/actions/eliminar.php',
//           data: {dbId: dbId},
//
//           success: function(result){
//             console.log(result);
//             if (result != 1) {
//               alertify.error('NO SE PUDO ELIMINAR');
//             }else if (result == 1){
//               Mantenimiento_Det();
//               fetchTerminado();
//
//             }
//           },
//           error: function(exception){
//             console.error(exception)
//           }
//         });
//         swal("Eliminado!", "Se elimino correctamente.", "success");
//       } else {
//         swal("Cancelado", "El registro esta a salvo :)", "error");
//       }
//     });
//   });
// }
