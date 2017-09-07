$(document).ready(function(){
$('#previewProgram').click(function(){
  var np = new Array();

  var fi = new Date( $('#produccionFI').val());
  var ff = new Date( $('#produccionFF').val());
  var md = $('#produccionMD').val();

  var test = [
    [ 'Washington', new Date(1789, 3, 30), new Date(1797, 2, 4) ],
    [ 'Adams',      new Date(1796, 2, 4),  new Date(1801, 2, 4) ],
    [ 'Jefferson',  new Date(1801, 2, 4),  new Date(1809, 2, 4) ]
  ];

  np.push(["testClient", fi, ff]);

  drawChart(test);

  console.log(np);
})

$('#npClientName').keyup(function(){
  var txt = $(this).val();
  if (txt == "") {
    $('#npClientList').fadeOut();
    return false;
  }

  $.ajax({
    method: 'POST',
    url: '/fitcoControl/Resources/PHP/Clientes/fetchPopupClientList.php',
    data:{txt: txt},
    success: function(result){
      rsp = JSON.parse(result);
      console.log(result);

      if (rsp.code != "1") {
        $('#npClientList').html("<p>Hubo un error al cargar la lista de clientes...</p>");
        console.warn("Error en el query: " + rsp.data);
      } else {
        $('#npClientList').html(rsp.data);
      }
      $('#npClientList').fadeIn();
      clientSelector();
    },
    error: function(exception){
      console.error(exception);
    }
  });
});

$('.agregar-programacion').click(function(){
  var cId = $('#npClientName').val();
  var fi = $('#produccionFI').val();
  var ff = $('#produccionFF').val();
  var md = $('#produccionMD').val();

  $.ajax({
    method: 'POST',
    url: '/fitcoControl/Resources/PHP/Clientes/addProgramacion.php',
    data: {cId: cId, fi: fi, ff:ff, md:md},
    success: function(result){
      drawChart(test);
    },
    error: function(exception){
      console.error(exception);
    }
  })
});

});

function clientSelector(){
  $('.client-item').click(function(){
    var clientId = $(this).attr('client-id');
    var clientName = $(this).find('span').html();

    $('#npClientName').attr('client-id', clientId);
    $('#npClientName').html(clientName).val(clientName);
    $('#npClientList').fadeOut();
  });
}
