$(document).ready(function(){

  $('body').css('display','none');
  $('body').fadeIn();

  $('a.transicion').click(function(event){
    event.preventDefault();
    linkDestino = this.href;
    $('body').fadeOut(redireccionarPag);
  });

  function redireccionarPag() {
    window.location = linkDestino;
  }
});
