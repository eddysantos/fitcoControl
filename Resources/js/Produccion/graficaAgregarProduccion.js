google.charts.load('current', {'packages':['timeline']});
//google.charts.setOnLoadCallback(drawChart);
function drawChart(data) {
  var container = document.getElementById('visualizarProduccion');
  var chart = new google.visualization.Timeline(container);
  var dataTable = new google.visualization.DataTable();

  dataTable.addColumn({ type: 'string', id: 'Cliente' });
  dataTable.addColumn({ type: 'date', id: 'Start' });
  dataTable.addColumn({ type: 'date', id: 'End' });
  dataTable.addRows(data);
  // dataTable.addRows([
  //   [ 'Washington', new Date(1789, 3, 30), new Date(1797, 2, 4) ],
  //   [ 'Adams',      new Date(1796, 2, 4),  new Date(1801, 2, 4) ],
  //   [ 'Jefferson',  new Date(1801, 2, 4),  new Date(1809, 2, 4) ]
  // ]);

  // Set chart options
var options = {
   colors: ['#603913', '#cbb69d', '#c69c6e']
};

  chart.draw(dataTable, options);
}
