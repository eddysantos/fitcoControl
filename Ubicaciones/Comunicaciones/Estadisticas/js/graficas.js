$(document).ready(function(){

  $(function(){
    data = {
      period: $('#cob_periodo').val(),
      date_from: $('#dates_cob_chart').find('.date-from').val(),
      date_to: $('#dates_cob_chart').find('.date-to').val(),
    };
    console.log('hola');
    var pull_chart = $.ajax({
      method: 'POST',
      data: data,
      url: 'actions/grafica-cobranza.php'
    });

    pull_chart.done(function(r){
      r = JSON.parse(r);
      console.log(r);
      if (r.code == '2') {
        r.to_chart = {};
      }
      cob_chart = c3.generate({
        bindto: '#g-cobranza',
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
    // alert("presiono cob_load");
    data = {
      period: $('#cob_periodo').val(),
      date_from: $('#dates_cob_chart').find('.date-from').val(),
      date_to: $('#dates_cob_chart').find('.date-to').val(),
    };

    var pull_chart = $.ajax({
      method: 'POST',
      data: data,
      url: 'actions/grafica-cobranza.php'
    });

    pull_chart.done(function(r){
      r = JSON.parse(r);
      console.log(r);
      if (r.code == '2') {
        r.to_chart = {};
        swal("NO HAY REGISTROS","verifica el rango de fecha seleccionado en Cobranza","error");
      }
      cob_chart.load({columns: r.to_chart});
    });
  });



  $(function(){
    data = {
      period: $('#cxp_periodo').val(),
      date_from: $('#dates_cxp_chart').find('.date-from').val(),
      date_to: $('#dates_cxp_chart').find('.date-to').val(),
    };
    console.log('hola');
    var pull_chart = $.ajax({
      method: 'POST',
      data: data,
      url: 'actions/grafica-cuentasxpagar.php'
    });

    pull_chart.done(function(r){
      r = JSON.parse(r);
      console.log(r);
      if (r.code == '2') {
        r.to_chart = {};
      }
      cxp_chart = c3.generate({
        bindto: '#g-cuentasxpagar',
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
  $('.reload-cxp').click(function(){
    data = {
      period: $('#cxp_periodo').val(),
      date_from: $('#dates_cxp_chart').find('.date-from').val(),
      date_to: $('#dates_cxp_chart').find('.date-to').val(),
    };

    var pull_chart = $.ajax({
      method: 'POST',
      data: data,
      url: 'actions/grafica-cuentasxpagar.php'
    });

    pull_chart.done(function(r){
      r = JSON.parse(r);
      console.log(r);
      if (r.code == '2') {
        r.to_chart = {};
        swal("NO HAY REGISTROS","verifica el rango de fecha seleccionado en Cuentas por Pagar","error");
      }
      cxp_chart.load({columns: r.to_chart});
    });
  });


// PRODUCCION PRODUCCION PRODUCCION
    $(function(){
      data = {
        period: $('#pro_periodo').val(),
        date_from: $('#dates_pro_chart').find('.date-from').val(),
        date_to: $('#dates_pro_chart').find('.date-to').val(),
      };

    console.log('hola');
      var pull_chart = $.ajax({
        method: 'POST',
        data: data,
        url: 'actions/grafica-produccion.php'
      });

      pull_chart.done(function(r){
        r = JSON.parse(r);
        console.log(r);
        if (r.code == '2') {
          r.to_chart = {};
        }
        pro_chart = c3.generate({
          bindto: '#g-produccion',
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
    $('.reload-pro').click(function(){
      data = {
        period: $('#pro_periodo').val(),
        date_from: $('#dates_pro_chart').find('.date-from').val(),
        date_to: $('#dates_pro_chart').find('.date-to').val(),
      };

      var pull_chart = $.ajax({
        method: 'POST',
        data: data,
        url: 'actions/grafica-produccion.php'
      });

      pull_chart.done(function(r){
        r = JSON.parse(r);
        console.log(r);
        pro_chart.load({columns: r.to_chart});
      });
    });


// VENTAS VENTAS VENTAS VENTAS VENTAS VENTAS
    $(function(){
      data = {
        period: $('#ven_periodo').val(),
        grafico: $('#ven_grafico').val(),
        date_from: $('#dates_ven_chart').find('.date-from').val(),
        date_to: $('#dates_ven_chart').find('.date-to').val(),
      };


      var pull_chart = $.ajax({
        method: 'POST',
        data: data,
        url: 'actions/grafica-ventas.php'
      });

      pull_chart.done(function(r){
        r = JSON.parse(r);
        console.log(r);
        if (r.code == '2') {
          r.to_chart = {};
        }
        ven_chart = c3.generate({
          bindto: '#g-ventas',
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
    $('.ven_vendedores').change(function(){
      var vendedor = $('#ven_vendedores').val();

      var data = {};
      if (vendedor != "" && vendedor != 'undefined') {
        var data = {vendedor: vendedor,
          period: $('#ven_periodo').val(),
          grafico: $('#ven_grafico').val(),
          date_from: $('#dates_ven_chart').find('.date-from').val(),
          date_to: $('#dates_ven_chart').find('.date-to').val()};
      }

      var pull_chart = $.ajax({
        method: 'POST',
        url: 'actions/grafica-ventas.php',
        data: data
      });

      pull_chart.done(function(r){
        r = JSON.parse(r);
        console.log(r);
        ven_chart.load({columns: r.to_chart});
      });
    });
    $('.reload-ven').click(function(){
      var vendedor = $('#ven_vendedores').val("Vendedores");
      data = {
        period: $('#ven_periodo').val(),
        grafico: $('#ven_grafico').val(),
        date_from: $('#dates_ven_chart').find('.date-from').val(),
        date_to: $('#dates_ven_chart').find('.date-to').val(),
      };

      var pull_chart = $.ajax({
        method: 'POST',
        data: data,
        url: 'actions/grafica-ventas.php'
      });

      pull_chart.done(function(r){
        r = JSON.parse(r);
        console.log(r);
        if (r.code == '2') {
          r.to_chart = {};
          swal("NO HAY REGISTROS","verifica el rango de fecha seleccionado en Cobranza","error");
        }
        ven_chart.load({columns: r.to_chart});
      });
    });



// GRAFICA CLIENTES NUEVOS

    $(function(){
      data = {
        period: $('#cltNuevo_periodo').val(),
        date_from: $('#dates_cltNuevo_chart').find('.date-from').val(),
        date_to: $('#dates_cltNuevo_chart').find('.date-to').val(),
      };
      console.log('hola');
      var pull_chart = $.ajax({
        method: 'POST',
        data: data,
        url: 'actions/grafica-ClientesNuevos.php'
      });

      pull_chart.done(function(r){
        r = JSON.parse(r);
        console.log(r);
        if (r.code == '2') {
          r.to_chart = {};
        }
        cltNuevo_chart = c3.generate({
          bindto: '#g-cltNuevo',
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


      $('.reload-cltNuevo').click(function(){
        data = {
          period: $('#cltNuevo_periodo').val(),
          date_from: $('#dates_cltNuevo_chart').find('.date-from').val(),
          date_to: $('#dates_cltNuevo_chart').find('.date-to').val(),
        };

        var pull_chart = $.ajax({
          method: 'POST',
          data: data,
          url: 'actions/grafica-ClientesNuevos.php'
        });

        pull_chart.done(function(r){
          r = JSON.parse(r);
          console.log(r);
          if (r.code == '2') {
            r.to_chart = {};
            swal("NO HAY REGISTROS","verifica el rango de fecha seleccionado en Cobranza","error");
          }
          cltNuevo_chart.load({columns: r.to_chart});
        });
      });







      $(function(){
        data = {
          period: $('#util_periodo').val(),
          date_from: $('#dates_util_chart').find('.date-from').val(),
          date_to: $('#dates_util_chart').find('.date-to').val(),
        };
        console.log('hola');
        var pull_chart = $.ajax({
          method: 'POST',
          data: data,
          url: 'actions/grafica-utilidades.php'
        });

        pull_chart.done(function(r){
          r = JSON.parse(r);
          console.log(r);
          if (r.code == '2') {
            r.to_chart = {};
          }
          util_chart = c3.generate({
            bindto: '#g-util',
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


        $('.reload-util').click(function(){
          data = {
            period: $('#util_periodo').val(),
            date_from: $('#dates_util_chart').find('.date-from').val(),
            date_to: $('#dates_util_chart').find('.date-to').val(),
          };

          var pull_chart = $.ajax({
            method: 'POST',
            data: data,
            url: 'actions/grafica-utilidades.php'
          });

          pull_chart.done(function(r){
            r = JSON.parse(r);
            console.log(r);
            if (r.code == '2') {
              r.to_chart = {};
              swal("NO HAY REGISTROS","verifica el rango de fecha seleccionado en Cobranza","error");
            }
            util_chart.load({columns: r.to_chart});
          });
        });

  });
