// 
// google.charts.load('current', {'packages':['timeline']});
// google.charts.setOnLoadCallback(dibujarGrafica);
//
// function dibujarGrafica(){
//   $.ajax({
//     method: 'POST',
//     url: '/fitcoControl/Resources/PHP/Programacion/fetchProgramacion.php',
//     data: {},
//     success: function(result){
//
//       response = JSON.parse(result)
//       console.log(response);
//       for (var i = 0; i < response.response.length; i++) {
//         response.response[i][1] = new Date(response.response[i][1] * 1000)
//         response.response[i][2] = new Date(response.response[i][2] * 1000)
//       }
//
//       console.log(response);
//       drawChart(response.response, response.colores);
//     },
//     error: function(exception){
//       console.error(exception);
//     }
//   });
// }
//
// function drawChart(data, options) {
//   var container = document.getElementById('visualizarProduccion');
//   var chart = new google.visualization.Timeline(container);
//   var dataTable = new google.visualization.DataTable();
//   console.log("Opciones: " + options);
//
//
//   dataTable.addColumn({ type: 'string', id: 'Cliente' });
//   dataTable.addColumn({ type: 'date', id: 'Start' });
//   dataTable.addColumn({ type: 'date', id: 'End' });
//
//
//   dataTable.addRows(data);
//
//
//
// var options = {
//    colors: options,
//    height: '300',
//    timeline: {
//      rowLabelStyle: {
//        fontName: 'Encode Sans Condensed, sans-serif',
//        fontSize: 20,
//        color: '#1d3a59'
//      },
//      barLabelStyle: {
//        fontName: 'Encode Sans Condensed, sans-serif',
//        fontSize: 14
//      },
//      colorByRowLabel: true },
//         backgroundColor: '#f2f8fc'
// };
//
//   chart.draw(dataTable, options);
// }
