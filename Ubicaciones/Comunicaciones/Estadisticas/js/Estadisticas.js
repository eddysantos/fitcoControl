$(document).ready(function(){
  graficaTes();
  graficaTesSem();
  graficaVentas();


  $('.consultar').click(function(){
    var accion = $(this).attr('accion');
    // var status = $(this).attr('status');

    $('#selectGrafica').find('a').css('color', "");
        $('#selectGrafica').find('a').css('font-size', "");
        $(this).attr('status', 'abierto');
        $(this).css('cssText', 'color: rgb(98, 98, 98) !important');


    switch (accion) {

      case "semanal":
        $('#graficasemanal').fadeIn();
        $('#graficamensual').hide();
        break;

      case "mensual":
        $('#graficamensual').fadeIn();
        $('#graficasemanal').hide();
        break;

        default:
          console.error("Something went terribly wrong...");
      }
    });
});



function graficaTes(){
  var chart = c3.generate({
    bindto: '#graficamensual',
    data: {
      x: 'x',

      columns: [
        Mes,
        facturado,
        pendientepago,
        pagado
      ],
    },

    size: {
      width: 1280,
      height: 480
    },
    axis: {
      x: {
       type: 'category'
     },
      y : {
        tick: {
          format: d3.format("$,")
        }
      }
    },

    legend: {
        position: 'right'
    },
    subchart: {
      show: true,
    }
  });
}

function graficaTesSem(){
  var graficaSem = c3.generate({
    bindto: '#graficasemanal',
    data: {
      x: 'x',

      columns: [
        Sem,
        facturadoTSem,
        pendienteTSem,
        pagadoTSem
      ],
    },

    size: {
      width: 1280,
      height: 480
    },
    axis: {
      x: {
       type: 'category'
     },
      y : {
        tick: {
          format: d3.format("$,")
        }
      }
    },

    legend: {
        position: 'right'
    },
    subchart: {
      show: true,
    }
  });
}


function graficaVentas(){
  // var MesVenta = $('#mensualVentas').val();
  // var totalVentas = $('#totalVentas').val();
  var chart = c3.generate({
    bindto: '#graficasVentas',
    data: {
      x: 'x',
      columns: [
        MesVenta,
        totalVentas
      ],
    },
    size: {
      width: 1280,
      height: 480
    },
    axis: {
      x: {
       type: 'category'
      }
    },
    legend: {
        position: 'right'

    },
    subchart: {
      show: true,
      size: {
      height: 30
    }
    }

  });
}
