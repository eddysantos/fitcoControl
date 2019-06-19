$(document).ready(function(){
mostrarMetrica();
// calculos();


$(function(){
  data = {
    // period: $('#ven_periodo').val(),
    grafico: $('#ven_grafico').val(),
    date_from: $('#dates_ven_chart').find('.date-from').val(),
    date_to: $('#dates_ven_chart').find('.date-to').val(),
  };


  var pull_chart = $.ajax({
    method: 'POST',
    data: data,
    url: 'actions/grafica.php'
  });

  pull_chart.done(function(r){
    r = JSON.parse(r);
    // console.log(r);
    if (r.code == '2') {
      r.to_chart = {};
    }
    ven_chart = c3.generate({
      bindto: '#g-metricas',
      data:{
        x: "x",
        columns: r.to_chart,
        labels: true,
      },
      axis: {
        x: {
          type: 'category',
          tick: {
            format: '%Y-%m-%d',
          }
        }
      },
    });
  });
});

$('.reload-chart').click(function(){
  data = {
    period: $('#ven_periodo').val(),
    grafico: $('#ven_grafico').val(),
    date_from: $('#dates_ven_chart').find('.date-from').val(),
    date_to: $('#dates_ven_chart').find('.date-to').val(),
  };

  var pull_chart = $.ajax({
    method: 'POST',
    data: data,
    url: 'actions/grafica.php'
  });

  pull_chart.done(function(r){
    r = JSON.parse(r);
    console.log(r);
    ven_chart.load({columns: r.to_chart});
  });
});

$('.add_mes').change(function(){
  var mes = $(this).val();
  var fecha = new Date();
  var anio = fecha.getFullYear();

  if (mes == 'Enero' ) {
    $('#add_fecha').val(anio+'-01-01');
    $('#a_fecha').val(anio+'-01-01');
    $('#fecha').val(anio+'-01-01');
  }else if (mes == 'Febrero') {
    $('#add_fecha').val(anio+'-02-01');
    $('#a_fecha').val(anio+'-02-01');
    $('#fecha').val(anio+'-02-01');
  }else if (mes == 'Marzo') {
    $('#add_fecha').val(anio+'-03-01');
    $('#a_fecha').val(anio+'-03-01');
    $('#fecha').val(anio+'-03-01');
  }else if (mes == 'Abril') {
    $('#add_fecha').val(anio+'-04-01');
    $('#a_fecha').val(anio+'-04-01');
    $('#fecha').val(anio+'-04-01');
  }else if (mes == 'Mayo') {
    $('#add_fecha').val(anio+'-05-01');
    $('#a_fecha').val(anio+'-05-01');
    $('#fecha').val(anio+'-05-01');
  }else if (mes == 'Junio') {
    $('#add_fecha').val(anio+'-06-01');
    $('#a_fecha').val(anio+'-06-01');
    $('#fecha').val(anio+'-06-01');
  }else if (mes == 'Julio') {
    $('#add_fecha').val(anio+'-07-01');
    $('#a_fecha').val(anio+'-07-01');
    $('#fecha').val(anio+'-07-01');
  }else if (mes == 'Agosto') {
    $('#add_fecha').val(anio+'-08-01');
    $('#a_fecha').val(anio+'-08-01');
    $('#fecha').val(anio+'-08-01');
  }else if (mes == 'Septiembre') {
    $('#add_fecha').val(anio+'-09-01');
    $('#a_fecha').val(anio+'-09-01');
    $('#fecha').val(anio+'-09-01');
  }else if (mes == 'Octubre') {
    $('#add_fecha').val(anio+'-10-01');
    $('#a_fecha').val(anio+'-10-01');
    $('#fecha').val(anio+'-10-01');
  }else if (mes == 'Noviembre') {
    $('#add_fecha').val(anio+'-11-01');
    $('#a_fecha').val(anio+'-11-01');
    $('#fecha').val(anio+'-11-01');
  }else if (mes == 'Diciembre') {
    $('#add_fecha').val(anio+'-12-01');
    $('#a_fecha').val(anio+'-12-01');
    $('#fecha').val(anio+'-12-01');
  }
});



  $('.add-vendedor').click(function(){
    var data = {
      add_usuario_add: $('#add_usuario_add').val(),
      add_fecha_add: $('#add_fecha_add').val(),
      add_vendedor: $('#add_vendedor').val(),
      add_mes: $('#add_mes').val(),
      add_fecha: $('#add_fecha').val(),
      add_tipoCambio: $('#add_tipoCambio').val(),
      add_clt_metaClientes: $('#add_clt_metaClientes').val(),
      add_clt_prospectos: $('#add_clt_prospectos').val(),
      add_clt_cotizados: $('#add_clt_cotizados').val(),
      add_clt_nuevo: $('#add_clt_nuevo').val(),
      add_clt_factor: $('#add_clt_factor').val(),
      add_clt_meta: $('#add_clt_meta').val(),
      add_ccot_emitidas: $('#add_ccot_emitidas').val(),
      add_ccot_pedidos: $('#add_ccot_pedidos').val(),
      add_ccot_factor: $('#add_ccot_factor').val(),
      add_ccot_meta: $('#add_ccot_meta').val(),
      add_mcot_emTotal: $('#add_mcot_emTotal').val(),
      add_mcot_emPesos: $('#add_mcot_emPesos').val(),
      add_mcot_emUsd: $('#add_mcot_emUsd').val(),
      add_pcot_ventotal: $('#add_pcot_ventotal').val(),
      add_pcot_venPesos: $('#add_pcot_venPesos').val(),
      add_pcot_venUsd: $('#add_pcot_venUsd').val(),
      add_fact_conversion: $('#add_fact_conversion').val(),
      add_fact_meta: $('#add_fact_meta').val(),
      add_ven_meta: $('#add_ven_meta').val(),
      add_ven_reales: $('#add_ven_reales').val(),
      add_ven_balance: $('#add_ven_balance').val()
    }


    validar = $('#add_vendedor').val() == "" ||
              $('#add_mes').val() == "" ||
              $('#add_tipoCambio').val() == "" ||
              $('#add_clt_metaClientes').val() == "" ||
              $('#add_clt_prospectos').val() == "" ||
              $('#add_clt_cotizados').val() == "" ||
              $('#add_clt_nuevo').val() == "" ||
              $('#add_clt_factor').val() == "" ||
              $('#add_clt_meta').val() == "" ||
              $('#add_ccot_emitidas').val() == "" ||
              $('#add_ccot_pedidos').val() == "" ||
              $('#add_ccot_factor').val() == "" ||
              $('#add_ccot_meta').val() == "" ||
              $('#add_mcot_emTotal').val() == "" ||
              $('#add_mcot_emPesos').val()== "" ||
              $('#add_mcot_emUsd').val()== "" ||
              $('#add_pcot_ventotal').val()== "" ||
              $('#add_pcot_venPesos').val()== "" ||
              $('#add_pcot_venUsd').val()== "" ||
              $('#add_fact_conversion').val()== "" ||
              $('#add_fact_meta').val()== "" ||
              $('#add_ven_meta').val()== "" ||
              $('#add_ven_reales').val()== "" ||
              $('#add_ven_balance').val()== "";

    if (validar) {
     swal("NO PUEDE CONTINUAR","Todos los campos necesitan estar llenos","error");
    }else {
      var ajaxCall = $.ajax({
          method: 'POST',
          data: data,
          url: 'actions/agregarVendedor.php'
      });

      ajaxCall.done(function(r) {
        r = JSON.parse(r);
        if (r.code == 1) {
          swal("Exito", "Se guardo correctamente.", "success");
          mostrarMetrica();
          $('.modal').modal('hide');
        } else {
          console.error(r.message);
        }
      });
    }
  });


 $(function(){
   $('#contenidomodal').on('change','#add_clt_prospectos,#add_clt_nuevo',function(){
     // CLIENTE FACTOR
     var clt_prospectos = parseInt($('#add_clt_prospectos').val());
     var clt_nuevos = parseInt($('#add_clt_nuevo').val());
     if (isNaN(clt_prospectos)) {clt_prospectos = 0;}
     if (isNaN(clt_nuevos)) {clt_nuevos = 0;}
     $('#add_clt_factor').val(clt_nuevos/clt_prospectos*100);
   });



   $('#contenidomodal').on('change','#add_ccot_emitidas,#add_ccot_pedidos,#add_mcot_emTotal,#add_pcot_ventotal',function(){
     //CANTIDAD DE COTIZACIONES
     var cot_emitidas = parseInt($('#add_ccot_emitidas').val());
     var cot_pedidos = parseInt($('#add_ccot_pedidos').val());
     if (isNaN(cot_emitidas)) { cot_emitidas = 0;}
     if (isNaN(cot_pedidos)) { cot_pedidos = 0;}
     $('#add_ccot_factor').val(cot_pedidos/cot_emitidas*100);

     //FACTOR DE CONVERSIÓN
     var cot_em_tot = $('#add_mcot_emTotal').val();
     var cot_vendidas = $('#add_pcot_ventotal').val();
     if (isNaN(cot_em_tot)) { cot_em_tot = 0;}
     if (isNaN(cot_vendidas)) { cot_vendidas = 0;}
     $('#add_fact_conversion').val(cot_vendidas/cot_em_tot*100);
   });



   $('#contenidomodal').on('change','#add_mcot_emPesos,#add_mcot_emUsd,#add_tipoCambio,#add_pcot_venPesos,#add_pcot_venUsd,#add_ven_meta,#add_ven_reales',function(){
     var tipoCambio = $('#add_tipoCambio').val();

//FACTOR DE CONVERSIÓN
     var mcot_emPesos = parseInt($('#add_mcot_emPesos').val());
     var mcot_emUsd = parseInt($('#add_mcot_emUsd').val());
     if (isNaN(mcot_emPesos)) { mcot_emPesos = 0;}
     if (isNaN(mcot_emUsd)) { mcot_emUsd = 0;}

//COTIZACIONES PEDIDAS
     var mcot_venPesos = parseInt($('#add_pcot_venPesos').val());
     var mcot_venUsd = parseInt($('#add_pcot_venUsd').val());
     if (isNaN(mcot_venPesos)) { mcot_venPesos = 0;}
     if (isNaN(mcot_venUsd)) { mcot_venUsd = 0;}




     $('#add_mcot_emTotal').val(mcot_emPesos + (mcot_emUsd*tipoCambio));
     $('#add_pcot_ventotal').val(mcot_venPesos + (mcot_venUsd*tipoCambio));

     $('#add_fact_conversion').val($('#add_pcot_ventotal').val() / $('#add_mcot_emTotal').val() * 100);
     $('#add_ven_reales').val(mcot_venPesos + (mcot_venUsd*tipoCambio));


     if ($('#add_ven_reales').val()>0) {
       $('#add_ven_balance').val($('#add_ven_reales').val() - $('#add_ven_meta').val());
     }else {
       $('#add_ven_balance').val(0);
     }
   });
 })


 $(function(){
   $('#contenidosubmodal').on('change','#a_clt_prospectos,#a_clt_nuevo',function(){
     // CLIENTE FACTOR
     var clt_prospectos = parseInt($('#a_clt_prospectos').val());
     var clt_nuevos = parseInt($('#a_clt_nuevo').val());
     if (isNaN(clt_prospectos)) {clt_prospectos = 0;}
     if (isNaN(clt_nuevos)) {clt_nuevos = 0;}
     $('#a_clt_factor').val(clt_nuevos/clt_prospectos*100);
   });



   $('#contenidosubmodal').on('change','#a_ccot_emitidas,#a_ccot_pedidos,#a_mcot_emTotal,#a_pcot_ventotal',function(){
     //CANTIDAD DE COTIZACIONES
     var cot_emitidas = parseInt($('#a_ccot_emitidas').val());
     var cot_pedidos = parseInt($('#a_ccot_pedidos').val());
     if (isNaN(cot_emitidas)) { cot_emitidas = 0;}
     if (isNaN(cot_pedidos)) { cot_pedidos = 0;}
     $('#a_ccot_factor').val(cot_pedidos/cot_emitidas*100);

     //FACTOR DE CONVERSIÓN
     var cot_em_tot = $('#a_mcot_emTotal').val();
     var cot_vendidas = $('#a_pcot_ventotal').val();
     if (isNaN(cot_em_tot)) { cot_em_tot = 0;}
     if (isNaN(cot_vendidas)) { cot_vendidas = 0;}
     $('#a_fact_conversion').val(cot_vendidas/cot_em_tot*100);
   });



   $('#contenidosubmodal').on('change','#a_mcot_emPesos,#a_mcot_emUsd,#a_tipoCambio,#a_pcot_venPesos,#a_pcot_venUsd,#a_ven_meta,#a_ven_reales',function(){
     var tipoCambio = $('#a_tipoCambio').val();

//FACTOR DE CONVERSIÓN
     var mcot_emPesos = parseInt($('#a_mcot_emPesos').val());
     var mcot_emUsd = parseInt($('#a_mcot_emUsd').val());
     if (isNaN(mcot_emPesos)) { mcot_emPesos = 0;}
     if (isNaN(mcot_emUsd)) { mcot_emUsd = 0;}

//COTIZACIONES PEDIDAS
     var mcot_venPesos = parseInt($('#a_pcot_venPesos').val());
     var mcot_venUsd = parseInt($('#a_pcot_venUsd').val());
     if (isNaN(mcot_venPesos)) { mcot_venPesos = 0;}
     if (isNaN(mcot_venUsd)) { mcot_venUsd = 0;}




     $('#a_mcot_emTotal').val(mcot_emPesos + (mcot_emUsd*tipoCambio));
     $('#a_pcot_ventotal').val(mcot_venPesos + (mcot_venUsd*tipoCambio));

     $('#a_fact_conversion').val($('#a_pcot_ventotal').val() / $('#a_mcot_emTotal').val() * 100);
     $('#a_ven_reales').val(mcot_venPesos + (mcot_venUsd*tipoCambio));


     if ($('#a_ven_reales').val()>0) {
       $('#a_ven_balance').val($('#a_ven_reales').val() - $('#a_ven_meta').val());
     }else {
       $('#a_ven_balance').val(0);
     }
   });
 })


 $(function(){
   $('#contenidoEditmodal').on('change','#clt_prospectos,#clt_nuevo',function(){
     // CLIENTE FACTOR
     var clt_prospectos = parseInt($('#clt_prospectos').val());
     var clt_nuevos = parseInt($('#clt_nuevo').val());
     if (isNaN(clt_prospectos)) {clt_prospectos = 0;}
     if (isNaN(clt_nuevos)) {clt_nuevos = 0;}
     $('#clt_factor').val(clt_nuevos/clt_prospectos*100);
   });



   $('#contenidoEditmodal').on('change','#ccot_emitidas,#ccot_pedidos,#mcot_emTotal,#pcot_ventotal',function(){
     //CANTIDAD DE COTIZACIONES
     var cot_emitidas = parseInt($('#ccot_emitidas').val());
     var cot_pedidos = parseInt($('#ccot_pedidos').val());
     if (isNaN(cot_emitidas)) { cot_emitidas = 0;}
     if (isNaN(cot_pedidos)) { cot_pedidos = 0;}
     $('#ccot_factor').val(cot_pedidos/cot_emitidas*100);

     //FACTOR DE CONVERSIÓN
     var cot_em_tot = $('#mcot_emTotal').val();
     var cot_vendidas = $('#pcot_ventotal').val();
     if (isNaN(cot_em_tot)) { cot_em_tot = 0;}
     if (isNaN(cot_vendidas)) { cot_vendidas = 0;}
     $('#fact_conversion').val(cot_vendidas/cot_em_tot*100);
   });



   $('#contenidoEditmodal').on('change','#mcot_emPesos,#mcot_emUsd,#tipoCambio,#pcot_venPesos,#pcot_venUsd,#ven_meta,#ven_reales',function(){
     var tipoCambio = $('#tipoCambio').val();

//FACTOR DE CONVERSIÓN
     var mcot_emPesos = parseInt($('#mcot_emPesos').val());
     var mcot_emUsd = parseInt($('#mcot_emUsd').val());
     if (isNaN(mcot_emPesos)) { mcot_emPesos = 0;}
     if (isNaN(mcot_emUsd)) { mcot_emUsd = 0;}

//COTIZACIONES PEDIDAS
     var mcot_venPesos = parseInt($('#pcot_venPesos').val());
     var mcot_venUsd = parseInt($('#pcot_venUsd').val());
     if (isNaN(mcot_venPesos)) { mcot_venPesos = 0;}
     if (isNaN(mcot_venUsd)) { mcot_venUsd = 0;}




     $('#mcot_emTotal').val(mcot_emPesos + (mcot_emUsd*tipoCambio));
     $('#pcot_ventotal').val(mcot_venPesos + (mcot_venUsd*tipoCambio));

     $('#fact_conversion').val($('#pcot_ventotal').val() / $('#mcot_emTotal').val() * 100);
     $('#ven_reales').val(mcot_venPesos + (mcot_venUsd*tipoCambio));


     if ($('#ven_reales').val()>0) {
       $('#ven_balance').val($('#ven_reales').val() - $('#ven_meta').val());
     }else {
       $('#ven_balance').val(0);
     }
   });
 })


})//Fin del documento


 function mostrarMetrica(){
   var ajaxCall = $.ajax({
       method: 'POST',
       url: 'actions/mostrar2.php'
   });

   ajaxCall.done(function(r) {
     r = JSON.parse(r);
     // console.log(r);
     if (r.code == 1) {
       $('#tabla_metrica').html(r.data);
       botones();
     } else {
       console.error(r.message);
     }
   });
 }


function botones(){

$('.eliminarVendedor').click(function(){
  var pk_venMet = $(this).attr('db-id');
  swal({
    title: "Estas Seguro?",
    text: "Ya no se podra recuperar la informacion de vendedor ni las mensuales!",
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
        data: {pk_venMet: pk_venMet},
        success: function(r){
          mostrarMetrica();
        },
        error: function(x){
          console.error(x)
          alertify.error('NO SE PUDO ELIMINAR');
          mostrarMetrica();
        }
      });
      swal("Eliminado!", "Se elimino correctamente.", "success");
      mostrarMetrica();
    } else {
      swal("Cancelado", "El registro esta a salvo :)", "error");
      mostrarMetrica();
    }
  });
});

$('.eliminarMetrica').click(function(){
  var pk_metrica = $(this).attr('db-id');
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
        url: 'actions/eliminarMetrica.php',
        data: {pk_metrica: pk_metrica},
        success: function(r){
          mostrarMetrica();
        },
        error: function(x){
          console.error(x)
          alertify.error('NO SE PUDO ELIMINAR');
          mostrarMetrica();
        }
      });
      swal("Eliminado!", "Se elimino correctamente.", "success");
      mostrarMetrica();
    } else {
      swal("Cancelado", "El registro esta a salvo :)", "error");
      mostrarMetrica();
    }
  });
});

$('.agregarMetrica').click(function(){
  var dbid = $(this).attr('db-id');
  $('#a_fk_venMet').val(dbid);
  $('#modal').modal('show');
})

 $('.add-metrica').unbind();
 $('.add-metrica').click(function(){

   var data = {
     a_fk_venMet: $('#a_fk_venMet').val(),
     a_mes: $('#a_mes').val(),
     a_fecha: $('#a_fecha').val(),
     a_tipoCambio: $('#a_tipoCambio').val(),
     a_clt_metaClientes: $('#a_clt_metaClientes').val(),
     a_clt_prospectos: $('#a_clt_prospectos').val(),
     a_clt_cotizados: $('#a_clt_cotizados').val(),
     a_clt_nuevo: $('#a_clt_nuevo').val(),
     a_clt_factor: $('#a_clt_factor').val(),
     a_clt_meta: $('#a_clt_meta').val(),
     a_ccot_emitidas: $('#a_ccot_emitidas').val(),
     a_ccot_pedidos: $('#a_ccot_pedidos').val(),
     a_ccot_factor: $('#a_ccot_factor').val(),
     a_ccot_meta: $('#a_ccot_meta').val(),
     a_mcot_emTotal: $('#a_mcot_emTotal').val(),
     a_mcot_emPesos: $('#a_mcot_emPesos').val(),
     a_mcot_emUsd: $('#a_mcot_emUsd').val(),
     a_pcot_ventotal: $('#a_pcot_ventotal').val(),
     a_pcot_venPesos: $('#a_pcot_venPesos').val(),
     a_pcot_venUsd: $('#a_pcot_venUsd').val(),
     a_fact_conversion: $('#a_fact_conversion').val(),
     a_fact_meta: $('#a_fact_meta').val(),
     a_ven_meta: $('#a_ven_meta').val(),
     a_ven_reales: $('#a_ven_reales').val(),
     a_ven_balance: $('#a_ven_balance').val()
   }

   validar = $('#a_fk_venMet').val() == "" ||
             $('#a_mes').val() == "" ||
             $('#a_tipoCambio').val() == "" ||
             $('#a_clt_metaClientes').val() == "" ||
             $('#a_clt_prospectos').val() == "" ||
             $('#a_clt_cotizados').val() == "" ||
             $('#a_clt_nuevo').val() == "" ||
             $('#a_clt_factor').val() == "" ||
             $('#a_clt_meta').val() == "" ||
             $('#a_ccot_emitidas').val() == "" ||
             $('#a_ccot_pedidos').val() == "" ||
             $('#a_ccot_factor').val() == "" ||
             $('#a_ccot_meta').val() == "" ||
             $('#a_mcot_emTotal').val() == "" ||
             $('#a_mcot_emPesos').val()== "" ||
             $('#a_mcot_emUsd').val()== "" ||
             $('#a_pcot_ventotal').val()== "" ||
             $('#a_pcot_venPesos').val()== "" ||
             $('#a_pcot_venUsd').val()== "" ||
             $('#a_fact_conversion').val()== "" ||
             $('#a_fact_meta').val()== "" ||
             $('#a_ven_meta').val()== "" ||
             $('#a_ven_reales').val()== "" ||
             $('#a_ven_balance').val()== "";

   if (validar) {
    swal("NO PUEDE CONTINUAR","Todos los campos necesitan estar llenos","error");
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
         mostrarMetrica();
       } else {
         console.error(r.message);
       }
     });
   }
 });

 $('form').on('click', '.editarMetrica', function(){
   var dbid = $(this).attr('db-id');
   var tar_modal = $($(this).attr('href'));

   var fetch_metrica = $.ajax({
     method: 'POST',
     data: {dbid: dbid},
     url: 'actions/fetch.php'
   });

   fetch_metrica.done(function(r){
     r = JSON.parse(r);

     if (r.code == 1) {
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

 $('.edit-metrica').unbind();
 $('.edit-metrica').click(function(){
   var data = {
     pk_metrica: $('#pk_metrica').val(),
     fk_venMet: $('#fk_venMet').val(),
     mes: $('#mes').val(),
     fecha: $('#fecha').val(),
     tipoCambio: $('#tipoCambio').val(),
     clt_metaClientes: $('#clt_metaClientes').val(),
     clt_prospectos: $('#clt_prospectos').val(),
     clt_cotizados: $('#clt_cotizados').val(),
     clt_nuevo: $('#clt_nuevo').val(),
     clt_factor: $('#clt_factor').val(),
     clt_meta: $('#clt_meta').val(),
     ccot_emitidas: $('#ccot_emitidas').val(),
     ccot_pedidos: $('#ccot_pedidos').val(),
     ccot_factor: $('#ccot_factor').val(),
     ccot_meta: $('#ccot_meta').val(),
     mcot_emTotal: $('#mcot_emTotal').val(),
     mcot_emPesos: $('#mcot_emPesos').val(),
     mcot_emUsd: $('#mcot_emUsd').val(),
     pcot_venTotal: $('#pcot_venTotal').val(),
     pcot_venPesos: $('#pcot_venPesos').val(),
     pcot_venUsd: $('#pcot_venUsd').val(),
     fact_conversion: $('#fact_conversion').val(),
     fact_meta: $('#fact_meta').val(),
     ven_meta: $('#ven_meta').val(),
     ven_reales: $('#ven_reales').val(),
     ven_balance: $('#ven_balance').val()
   }

   validar = $('#fk_venMet').val() == "" ||
             $('#mes').val() == "" ||
             $('#tipoCambio').val() == "" ||
             $('#clt_metaClientes').val() == "" ||
             $('#clt_prospectos').val() == "" ||
             $('#clt_cotizados').val() == "" ||
             $('#clt_nuevo').val() == "" ||
             $('#clt_factor').val() == "" ||
             $('#clt_meta').val() == "" ||
             $('#ccot_emitidas').val() == "" ||
             $('#ccot_pedidos').val() == "" ||
             $('#ccot_factor').val() == "" ||
             $('#ccot_meta').val() == "" ||
             $('#mcot_emTotal').val() == "" ||
             $('#mcot_emPesos').val()== "" ||
             $('#mcot_emUsd').val()== "" ||
             $('#pcot_ventotal').val()== "" ||
             $('#pcot_venPesos').val()== "" ||
             $('#pcot_venUsd').val()== "" ||
             $('#fact_conversion').val()== "" ||
             $('#fact_meta').val()== "" ||
             $('#ven_meta').val()== "" ||
             $('#ven_reales').val()== "" ||
             $('#ven_balance').val()== "";

   if (validar) {
     swal("Error","Todos los campos son obligatorios","error");
   }else{

     var ajaxCall = $.ajax({
         method: 'POST',
         data: data,
         url: 'actions/editar.php'
     });

     ajaxCall.done(function(r) {
       r = JSON.parse(r);
       if (r.code == 1) {
         mostrarMetrica();
         swal("Exito", "Se actualizo.", "success");
         $('.modal').modal('hide');
       } else {
         $('.modal').modal('hide');
         console.error(r.message);
         alertify.error('NO HAY NINGUN CAMBIO');
       }
     });
   }
 })

}//fin de botones
