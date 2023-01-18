$(function(){
  //------ Colors ------
  const colorOrangeDark = "#cd7778",
  colorOrangeLight = "#fdb59f",
  colorWhite = "#d7d7d7",
  colorBlue = "#0d2136",
  colorBlack = "#333333";
  // ------ Date ------
  //--- Present date ---
  let presentDate = new Date(),
  year = presentDate.getFullYear(),
  month = presentDate.getMonth(),
  day = presentDate.getUTCDate();
  //--- FECHA Y HORA RESERVA ---
  let dateSpa;
  let hourSpa;
  let displayedMonth;
  let displayedYear;
  // Almacena array de meses en ingles o español
  let months;
  //--- Pasos del proceso de reserva---
  // ["serviceType","date/hour","continue"];
  // Paso en que se encuentra el usuario
  let step = 0; 
  let placeholder = "";
  // Valor del tipo de habitacion elegido
  let valor = 20000;
  let cantNoches = 0;
  
  //------ FUNCTIONS ------
  const getDaysInMonth = (month, year) => (new Date(year, month, 0).getDate());
  const selectLanguage = () =>{
    if($("html").attr("lang") == "es"){
      months = ["ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"];
      placeholder = "Selecciona una fecha";
    }
    else if($("html").attr("lang") == "en"){
      months = ["JANUARY", "FEBRUARY", "MARCH", "APRIL", "MAY", "JUNE", "JULY", "AUGUST", "SEPTEMBER", "OCTUBER", "NOVEMBER", "DECEMBER"];
      placeholder = "Select a date";
    }
    else{
      console.log("English or Spanish");
    }
  }

  const renderCalendar = () => {
    let diasMesAnterior;
    let diasMesActual;
    // -agregar los dias, agregar dias mes pasado como class inactive
    $("#month .days li").each(function(){
      
    })
  }
  const activarContinuar = () =>{
    // if( dateCheckIn && dateCheckOut && $("#roomType").val()!= 0){
    //   $("#btncontinuar").removeAttr("disabled").css({"border": "solid 2px" + colorBlue, "background-color": colorBlue, "color": colorWhite});
    // }
  }
  const markDays = () =>{
    // let tempDate;
    // $("#month .days li").each(function(){
    //   tempDate = new Date(displayedYear, displayedMonth, $(this).text());
    //   presentDate.setHours(0,0,0,0);
    //   $(this).removeClass();
      
    // })  
  }
  // Marcar paso en la selecion de reserva
  const markStep = () => {
    if(step == 0){
      $(".grupo-reserva.type-spa").css("border-color", colorBlue);
      $(".grupo-reserva.date-schedule").css("border-color", colorOrangeLight);
      $(".grupo-reserva.date-schedule input").attr("placeholder", "");
      if(!$("#btncontinuar").attr("disabled")){
        $("#btncontinuar").css({"border": "solid 2px" + colorBlue});
      }
      else{
        $("#btncontinuar").css("border", "solid 2px" + colorOrangeLight);
      }
    }
    if(step == 1){
      $(".grupo-reserva.type-spa").css("border-color", colorOrangeLight);
      $(".grupo-reserva.date-schedule").css("border-color", colorBlue);
      $(".grupo-reserva.date-schedule input").attr("placeholder", placeholder);
      if(!$("#btncontinuar").attr("disabled")){
        $("#btncontinuar").css("border", "solid 2px" + colorBlue);
      }
      else{
        $("#btncontinuar").css("border", "solid 2px" + colorOrangeLight);
      }
    }
    if(step == 2){
      $(".grupo-reserva.type-spa").css("border-color", colorOrangeLight);
      $(".grupo-reserva.date-schedule").css("border-color", colorOrangeLight);
      $("#btncontinuar").css("border", "solid 2px" + colorBlue);
    }
  }

  //------ CLICKS EVENTS ------
  //---Cambiar mes
  $("#week .chevron").click(function () { 
    if($(this).hasClass("next")){
      // displayedMonth++;
    }
    if($(this).hasClass("prev")){
      // displayedMonth--;
    }
    // if(displayedMonth == -1){
    //   displayedMonth = 11;
    //   displayedYear--;
    // }
    // if(displayedMonth == 12){
    //   displayedMonth = 0
    //   displayedYear++;
    // }
    renderCalendar();
    markDays();
  }) 
  
  //------ ROOMTYPE ------
  //---Seleccion de imagenes
  $("#spaType").click(function (){
    // $("#carousel-reserva").css("visibility", "visible")
    if($("#spaType").val() == 1){
      //Masaje
      // $(".img-1 img").attr("src","./assets/img/cabana_01.jpg");
      step = 1;
    }
    else if($("#spaType").val() == 2){
      // Sala thalasoterapia
      // $(".img-1 img").attr("src","./assets/img/suite_01.jpg");
      step = 1;
    }
    else{
      // Ninguna
      // $("#carousel-reserva").css("visibility", "hidden");
    }
    activarContinuar();
    markStep();
  })
  //---Usuario selecciona paso
  $(".grupo-reserva.type-spa label").click(function (){
    step = 0;
    markStep();
  })
  $("#spaDate").click(function (){
    step = 1;
    markStep();
  })
  //------ SELECT BOOKING DATE ------
  $(".block-week li").click(function(){
    let hour = $(this).text();
    let i = $(this).index();
    let dayDisplayed = $("#number-schedule li").eq(i%7).text(); 
    let monthDisplayed = $("#month-schedule li").eq(i%7).text();
    let yearDisplayed = $("#year-schedule li").eq(i%7).text();
    // let month = 
    // let month = (displayedMonth + 1).toString().padStart(2, "0");
    let auxDate;
//--- Check in validar
    // auxDate = new Date(year, month, numberDay);
    let monthNumber = months.indexOf(monthDisplayed) +1;
    $("#spaDate").val(`${dayDisplayed.toString().padStart(2,"0")}-${monthNumber.toString().padStart(2,"0")}-${yearDisplayed}`);
    $("#spaHour").val(`${hour}`);
    // if(step == 1){

    //   if(auxDate > presentDate){
    //     dateCheckIn = auxDate;
    //     $("#initialDate").val(`${day}-${month}-${displayedYear}`);
    //     step=2;
    //   }
    //   else{
    //     // console.log("Check-in debe ser posterior a fecha actual");
    //   }
    // }
//--- Check out validar
    // Paso previo a boton continuar
//     else if(step == 2){
//       auxDate = new Date(displayedYear, month-1, day);
//       if(auxDate > dateCheckIn){
//         dateCheckOut = auxDate;
//         $("#finishDate").val(`${day}-${month}-${displayedYear}`);
//         if($("#roomType").val() == 0){
//           step = 0;
//         }
//         else if(!dateCheckIn){
//           step = 1; 
//         }
//         else{
//           step = 3;
//         }
//       }
//       else{
//         // console.log("check-out despues check in");
//       }
//     }
// //--- Si no hay opcion seleccionada, se selecciona check-in
//     else{
//       step = 1;
//     }
    activarContinuar();
    markStep();
    markDays();
  })
  // Select language
  $("#language").click(function(){
    selectLanguage();
    renderCalendar();
    markDays();
  });
    //------ INITIAL ------
    // console.log(getDaysInMonth(1, 2023));
    // console.log("nombre del dia:" + dayName);
    selectLanguage();
    renderCalendar();
    markDays();
    markStep();
})