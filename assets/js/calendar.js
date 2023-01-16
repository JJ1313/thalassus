$(function(){
  //------ Colors ------
  const colorOrangeDark = "#cd7778",
  colorOrangeLight = "#fdb59f",
  colorWhite = "#f4f6f6",
  colorBlue = "#0d2136",
  colorBlack = "#333333";
  // ------ Date ------
  let presentDate = new Date(),
  //--- Present date ---
  year = presentDate.getFullYear(),
  month = presentDate.getMonth(),
  day = presentDate.getUTCDate();
  // console.log(year);
  // console.log(month);
  // console.log(day);
  //--- Date displayed on the calendar---
  let displayedYear = year,
  displayedMonth = month;

  //--- Check in/out dates String ---
  // Fechas Check-in/out tipo Date
  let dateCheckIn;
  let dateCheckOut;
  // Almacena array de meses en ingles o español
  let months;
  //--- Pasos del proceso de reserva---
  // ["roomType","dateIn", "dateOut","continue"];
  // Paso en que se encuentra el usuario
  let step = 0; 
  let placeholder = "";
  let cantNoches = 0;
  
  //------ FUNCTIONS ------
  // Retorna la cantidad de dias de un mes y año dado, meses del 0-11
  const getDaysInMonth = (month, year) =>{
    let cantDias = new Date(year, month + 1, 0).getDate();
    return cantDias;
  };
  const getDaysBetweenDates = (date1, date2) =>((date2-date1)/(1000*60*60*24));
  const selectLanguage = () =>{
    if($("html").attr("lang") == "es"){
      months = ["ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"];
      placeholder = "Selecciona una fecha";
    }
    else if($("html").attr("lang") == "en"){
      months =["JANUARY", "FEBRUARY", "MARCH", "APRIL", "MAY", "JUNE", "JULY", "AUGUST", "SEPTEMBER", "OCTUBER", "NOVEMBER", "DECEMBER"];
      placeholder = "Select a date";
    }
    else{
      console.log("English or Spanish");
    }
  }

  const renderCalendar = () => {
    $("#month .displayed-date").text(`${months[displayedMonth]} ${displayedYear}`);
    let cantDiasMonth = getDaysInMonth(displayedMonth, displayedYear);
    //let cantDiasMonthBefore = getDaysInMonth(displayedMonth - 1, year);
    let nameFirstDayMonth = new Date(displayedYear, displayedMonth, 1).getDay() ;
    //let primerNumMonthBefore = cantDiasMonthBefore - 1;
    //console.log(primerNumMonthBefore);
    let limite = nameFirstDayMonth - 1;
    if (limite < 0){
      limite = 6
    }
    let write = false;
    let number = 1;
    $("#month .days li").each(function(index){
      if(index == limite){
        write = true;
      }
      if(write  && number <= cantDiasMonth){
        $(this).css({"opacity": "100", "pointer-events": "auto"});
        $(this).text(number);
        number++;
      }
      else{
        $(this).css({"opacity": "0", "pointer-events": "none"});
        
      }
    })
  }
  const getValorTotal = (dias) =>{
    let valor = new Intl.NumberFormat('es-ES').format($("#valor-por-noche").text() * dias * 1000);
    $("#valor-total-reserva").text(valor);
  }
  const activarContinuar = () =>{
    if( dateCheckIn && dateCheckOut && $("#roomType").val()!= 0){
      $("#btncontinuar").removeAttr("disabled").css({"border": "solid 2px" + colorOrangeLight, "background-color": colorOrangeLight, "color": colorBlue})
      cantNoches = getDaysBetweenDates(dateCheckIn, dateCheckOut);
      getValorTotal(cantNoches);
    }
    else{
      $("#btncontinuar").attr("disabled", "disabled");
    }

  }
  const markDays = () =>{
    let tempDate;
    $("#month .days li").each(function(){
      tempDate = new Date(displayedYear, displayedMonth, $(this).text());
      presentDate.setHours(0,0,0,0);
      $(this).removeClass();
      if(tempDate < presentDate){
        $(this).addClass("inactive");
      }
      if(tempDate > dateCheckIn && tempDate < dateCheckOut){
        $(this).addClass("between-dates");
      }
      if(dateCheckIn && tempDate.getTime() == dateCheckIn.getTime()){
        $(this).addClass("check-in-date");
      }
      if(dateCheckOut && tempDate.getTime() == dateCheckOut.getTime()){
        $(this).addClass("check-out-date");
      }
      // if(tempDate.getTime() == presentDate.getTime()){
      //   $(this).addClass("curr-day");
      // }
    })  
  }
  // Marcar paso en la selecion de reserva
  const markStep = () => {
    if(step == 0){
      $(".grupo-reserva.type").css("background-color", colorOrangeLight);
      $(".grupo-reserva.check-in").css("background-color", colorWhite);
      $(".grupo-reserva.check-out").css("background-color", colorWhite);
      
      $(".grupo-reserva.check-in input").attr("placeholder", "");
      $(".grupo-reserva.check-out input").attr("placeholder", "");
      // $(".grupo-reserva.type").css("border-color", colorOrangeDark);
      // $(".grupo-reserva.check-in").css("border-color", colorOrangeLight);
      // $(".grupo-reserva.check-out").css("border-color", colorOrangeLight);
      // if(!$("#btncontinuar").attr("disabled")){
      //   $("#btncontinuar").css({"border": "solid 2px" + colorBlue});
      // }
      // else{
      //   $("#btncontinuar").css("border", "solid 2px" + colorOrangeLight);
      // }
    }
    if(step == 1){
      $(".grupo-reserva.type").css("background-color", colorWhite);
      $(".grupo-reserva.check-in").css("background-color", colorOrangeLight);
      $(".grupo-reserva.check-out").css("background-color", colorWhite);
      
      $(".grupo-reserva.check-in input").attr("placeholder", placeholder);
      $(".grupo-reserva.check-out input").attr("placeholder", "");
      // $(".grupo-reserva.type").css("border-color", colorOrangeLight);
      // $(".grupo-reserva.check-in").css("border-color", colorOrangeDark);
      // $(".grupo-reserva.check-out").css("border-color", colorOrangeLight);
      // if(!$("#btncontinuar").attr("disabled")){
      //   $("#btncontinuar").css("border", "solid 2px" + colorBlue);
      // }
      // else{
      //   $("#btncontinuar").css("border", "solid 2px" + colorOrangeLight);
      // }
    }
    if(step == 2){
      $(".grupo-reserva.type").css("background-color", colorWhite);
      $(".grupo-reserva.check-in").css("background-color", colorWhite);
      $(".grupo-reserva.check-out").css("background-color", colorOrangeLight);

      // $(".grupo-reserva.type").css("border-color", colorOrangeLight);
      // $(".grupo-reserva.check-in").css("border-color", colorOrangeLight);
      $(".grupo-reserva.check-in input").attr("placeholder", "");
      // $(".grupo-reserva.check-out").css("border-color", colorOrangeDark);
      $(".grupo-reserva.check-out input").attr("placeholder", placeholder);

    }
    if(step == 3){
      $(".grupo-reserva.type").css("background-color", colorWhite);
      $(".grupo-reserva.check-in").css("background-color", colorWhite);
      $(".grupo-reserva.check-out").css("background-color", colorWhite);
    }
  }

  //------ CLICKS EVENTS ------
  //---Cambiar mes
  $("#month .chevron").click(function () { 
    if($(this).hasClass("next")){
      displayedMonth++;
    }
    if($(this).hasClass("prev")){
      displayedMonth--;
    }
    if(displayedMonth == -1){
      displayedMonth = 11;
      displayedYear--;
    }
    if(displayedMonth == 12){
      displayedMonth = 0
      displayedYear++;
    }
    renderCalendar();
    markDays();
  }) 
  
  //------ ROOMTYPE ------
  //---Seleccion de imagenes
  $("#roomType").click(function (){
    $("#carousel-reserva").css("visibility", "visible")
    if($("#roomType").val() == 1){
      // Cabaña
      $(".img-1 img").attr("src","./assets/img/cabana_01.jpeg");
      step = 1;
    }
    else if($("#roomType").val() == 2){
      // Suite 1 -Pacifico
      $(".img-1 img").attr("src","./assets/img/suite1_01.jpeg");
      step = 1;
    }
    else if($("#roomType").val() == 3){
      // Suite2 - Terraza
      $(".img-1 img").attr("src","./assets/img/suite2_01.jpeg");
      step = 1;
    }
    else{
      // Ninguna
      $("#carousel-reserva").css("visibility", "hidden");
    }
    activarContinuar();
    markStep();
  })
  //---Usuario selecciona paso
  $(".grupo-reserva.type label").click(function (){
    step = 0;
    markStep();
  })
  $("#initialDate").click(function (){
    step = 1;
    markStep();
  })
  $("#finishDate").click(function (){
    step = 2;
    markStep();
  })
  //------ SELECT BOOKING DATE ------
  $(".days li").click(function(){
    let day= $(this).text().padStart(2, "0");
    let month = (displayedMonth + 1).toString().padStart(2, "0");
    let auxDate;
    // Habilitar elegir check-in despues de check-out
//--- Check in validar
    if(step == 1){
      auxDate = new Date(displayedYear, month-1, day);
      if(auxDate > presentDate){
        dateCheckIn = auxDate;
        $("#initialDate").val(`${day}-${month}-${displayedYear}`);
        step=2;
      }
      else{
        console.log("Check-in debe ser posterior a fecha actual");
      }
    }
//--- Check out validar
    // Paso previo a boton continuar
    else if(step == 2){
      auxDate = new Date(displayedYear, month-1, day);
      if(auxDate > dateCheckIn){
        dateCheckOut = auxDate;
        $("#finishDate").val(`${day}-${month}-${displayedYear}`);
        if($("#roomType").val() == 0){
          step = 0;
        }
        else if(!dateCheckIn){
          step = 1; 
        }
        else{
          step = 3;
        }
      }
      else{
        console.log("check-out despues check in");
      }
    }
//--- Si no hay opcion seleccionada, se selecciona check-in
    else{
      step = 1;
    }
    activarContinuar();
    markStep();
    markDays();
  })
  // Select language
  $("#language").click(function(){
    selectLanguage();
    renderCalendar();
  });
    //------ INITIAL ------
    // console.log(getDaysInMonth(1, 2023));
    // console.log("nombre del dia:" + dayName);
    selectLanguage();
    renderCalendar();
    markDays();
    markStep();
})