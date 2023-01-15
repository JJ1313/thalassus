$(function(){
  // ------ MENSAJE REMODELACION ------
  // $(window).on('load', function() {
  //   $('#remodelacion').modal('show');
  // });
  //   $(window).on('load', function() {
  //   $('#myModal2').modal('show');
  // });
  //------ NAVBAR CONTROL ------
  $(window).scroll(function(){
    if ($(window).scrollTop() > 0){
      $(".navbar").addClass("navbar-filled");
    }
    if ($(window).scrollTop() == 0){
      $(".navbar").removeClass("navbar-filled");
    }
  });
//------ DESPLEGA SECCION ------
// Calendario mensual alojamiento
  $("#btn-reservar").click(function(){
    $("#reserva").slideToggle("slow");
    $("#btn-reservar").toggleClass("unfolded");
    if( $("#btn-reservar").hasClass("unfolded") ){
      $("#btn-reservar").text("OCULTAR");
    }
    else{
      $("#btn-reservar").text("RESERVA UNA HABITACIÓN");
    }
  });
// Calendario semanal spa
  $("#btn-reserva-spa").click(function(){
    $("#reserva-spa").slideToggle("slow");
  });

// Mapa
  $("#direccion").click(function(){
    $("#map").slideToggle();
  });
});
