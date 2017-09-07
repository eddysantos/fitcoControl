
google.charts.load('current', {'packages':['timeline']});
google.charts.setOnLoadCallback(dibujarGrafica);

function dibujarGrafica(){
  $.ajax({
    method: 'POST',
    url: '/fitcoControl/Resources/PHP/Programacion/fetchProgramacion.php',
    data: {},
    success: function(result){
    //  console.log(result);
      response = JSON.parse(result)
      console.log(response);
      for (var i = 0; i < response.response.length; i++) {
        response.response[i][1] = new Date(response.response[i][1] * 1000)
        response.response[i][2] = new Date(response.response[i][2] * 1000)
      }

      console.log(response);
      drawChart(response.response, response.colores);
    },
    error: function(exception){
      console.error(exception);
    }
  });
}

function drawChart(data, options) {
  var container = document.getElementById('visualizarProduccion');
  var chart = new google.visualization.Timeline(container);
  var dataTable = new google.visualization.DataTable();
  console.log("Opciones: " + options);


  dataTable.addColumn({ type: 'string', id: 'Cliente' });
  dataTable.addColumn({ type: 'date', id: 'Start' });
  dataTable.addColumn({ type: 'date', id: 'End' });

  //console.log(data);
  dataTable.addRows(data);

  // console.log(data);
  // console.log(new Date(2017, 02, 02));

  // dataTable.addRows([
  //   [ 'Washington', new Date(1789, 3, 30), new Date(1797, 2, 4) ],
  //   [ 'Adams',      new Date(1796, 2, 4),  new Date(1801, 2, 4) ],
  //   [ 'Jefferson',  new Date(1801, 2, 4),  new Date(1809, 2, 4) ]
  // ]);

  // Set chart options
var options = {
   colors: options,
   height: '300'
};

  chart.draw(dataTable, options);
}
