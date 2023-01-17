$(function(){
  
  $("#language").click(function (e) { 
    e.preventDefault();
    //------------ ENGLISH ------------
    if($("#language").text() === "EN"){
      $("html").attr("lang", "en");
      $("title").text("Thalassus - Spa | Massages | Coffee Shop");
      //--- NAVBAR ---
      $(".nav-link").eq(0).text("HOME");
      $(".nav-link").eq(1).text("SPA");
      $(".nav-link").eq(2).text("LODGING");
      $(".nav-link").eq(3).text("COFFEE SHOP");
      $(".nav-link").eq(4).text("PACKS");
      $(".nav-link").eq(5).text("OUR STORY");
      $(".nav-link").eq(6).text("ES");
      $(".nav-link").eq(6).addClass("english").removeClass("spanish");
      //--- HERO ---
      $(".text-hero div").html("VIVE UNA EXPERIENCIA RENOVADORA <br> ¡VEN A CONOCER THALASSUS!");
      $("#btn-reservar").text("BOOK A ROOM");
      //--- SECCION RESERVAR ---
      $("label").eq(1).text("ROOM TYPE");
      //$("input").eq(0).attr("placeholder", "Select a date");
      $("label").eq(2).text("CHECK IN");
      //$("input").eq(1).attr("placeholder", "Select a date");
      $("label").eq(3).text("CHECK OUT");
      $(".btn-continuar").text("CONTINUE");
      //--- MONTHLY CALENDAR ---
      $(".calendar .weeks").each(function(){
        $(this).children().eq(0).text("Mon");
        $(this).children().eq(1).text("Tue");
        $(this).children().eq(2).text("Wen");
        $(this).children().eq(3).text("Thu");
        $(this).children().eq(4).text("Fri");
        $(this).children().eq(5).text("Sat");
        $(this).children().eq(6).text("Sun");
      });
      //--- SECCION THALASOTERAPIA ---
      $("#thalasoterapia h3").text("THALASSOTHERAPY");
      $("#thalasoterapia p").text("ENGLISH La Thalasoterapia es una Terapia Natural Antiestrés, que consiste en una piscina individual de agua de mar caliente (37° a 40°) durante 45 minutos, no tiene contraindicaciones y se recomienda principalmente para  relajar la musculatura y la mente, acompañada de musicoterapia y con vista panorámica hacia el mar. El servicio proporciona agua mineral para beber durante la sesión y finaliza con una ensalada de fruta y una tetera de té verde o rojo.");
      $("#btn-reserva-spa").text("BOOK");
      //--- SECCION RESERVA-SPA ---
      //--- SECCION SERVICIOS ---
      $("#servicios .title-section").text("LIVE THE EXPERIENCE");
      $("#servicios h5 a").eq(0).text("SPA");
      $("#servicios p").eq(0).text("IGLES Spa Thalassus es la única terma en la costa donde además de ofrecer servicios de thalasoterapia, también contamos con servicios de masoterapia para complementar tu renovación.");

      $("#servicios h5 a").eq(1).text("LODGING");
      $("#servicios p").eq(1).text("ILGES Thalassus Alojamiento ofrece dos alternativas de alojamiento Suite y Cabañas, las cuales están completamente equipadas e incluye servicio de desayuno y servicio de mucama.");

      $("#servicios h5 a").eq(2).text("COFFEE SHOP");
      $("#servicios p").eq(2).text("IGLES Thalassus Cafetería es un lugar de encuentro con la mejor vista panorámica de la V región y donde podrás disfrutar de nuestra pastelería casera,  café, teteras de te y de una sabrosa alternativa de sándwich.");
      //--- SECCION GIFT-CARD ---
      $("#gift-card p").text("English Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet dolore accusantium sunt beatae distinctio, quod corrupti laboriosam maiores repellendus praesentium ad ipsa, quis iste quam tempora, eveniet eum impedit veniam.");
      $("#btn-comprar-gift").text("BUY");
      //--- FOOTER ---
    }
    //------------ ESPANOL ------------
    else if($("#language").text() === "ES"){
      $("html").attr("lang", "es");
      $("title").text("Thalassus - Spa | Masajes | Cafetería");
      //--- NAVBAR ---
      $(".nav-link").eq(0).text("INICIO");
      $(".nav-link").eq(1).text("SPA");
      $(".nav-link").eq(2).text("ALOJAMIENTO");
      $(".nav-link").eq(3).text("CAFETERÍA");
      $(".nav-link").eq(4).text("PROGRAMAS");
      $(".nav-link").eq(5).text("NUESTRA HISTORIA");
      $(".nav-link").eq(6).text("EN");
      $(".nav-link").eq(6).addClass("spanish").removeClass("english");
      //--- HERO ---
      $(".text-hero div").html("VIVE UNA EXPERIENCIA RENOVADORA <br> ¡VEN A CONOCER THALASSUS!");
      $("#btn-reservar").text("RESERVA UNA HABITACIÓN");
      //--- SECCION RESERVAR ---
      $("label").eq(1).text("TIPO");
      //$("input").eq(0).attr("placeholder", "Selecciona una fecha");
      $("label").eq(2).text("DESDE");
      $("label").eq(3).text("HASTA");
      $(".btn-continuar").text("CONTINUAR");
      //--- MONTHLY CALENDAR ---
      $(".calendar .weeks").each(function(){
        $(this).children().eq(0).text("Lun");
        $(this).children().eq(1).text("Mar");
        $(this).children().eq(2).text("Mie");
        $(this).children().eq(3).text("Jue");
        $(this).children().eq(4).text("Vie");
        $(this).children().eq(5).text("Sab");
        $(this).children().eq(6).text("Dom");
      });
      //--- SECCION THALASOTERAPIA ---
      $("#thalasoterapia h3").text("THALASOTERAPIA");
      $("#thalasoterapia p").text("La Thalasoterapia es una Terapia Natural Antiestrés, que consiste en una piscina individual de agua de mar caliente (37° a 40°) durante 45 minutos, no tiene contraindicaciones y se recomienda principalmente para  relajar la musculatura y la mente, acompañada de musicoterapia y con vista panorámica hacia el mar. El servicio proporciona agua mineral para beber durante la sesión y finaliza con una ensalada de fruta y una tetera de té verde o rojo.");
      $("#btn-reserva-spa").text("RESERVAR");
      //--- SECCION RESERVA-SPA ---
      //--- SECCION SERVICIOS ---
      $("#servicios .title-section").text("TODA LA EXPERIENCIA");

      $("#servicios h5 a").eq(0).text("SPA");
      $("#servicios p").eq(0).text("Spa Thalassus es la única terma en la costa donde además de ofrecer servicios de thalasoterapia, también contamos con servicios de masoterapia para complementar tu renovación.");

      $("#servicios h5 a").eq(1).text("ALOJAMIENTO");
      $("#servicios p").eq(1).text("Thalassus Alojamiento ofrece dos alternativas de alojamiento Suite y Cabañas, las cuales están completamente equipadas e incluye servicio de desayuno y servicio de mucama.");

      $("#servicios h5 a").eq(2).text("CAFETERÍA");
      $("#servicios p").eq(2).text("Thalassus Cafetería es un lugar de encuentro con la mejor vista panorámica de la V región y donde podrás disfrutar de nuestra pastelería casera,  café, teteras de te y de una sabrosa alternativa de sándwich.");
      //--- SECCION GIFT-CARD ---
      $("#gift-card p").text("Cuando regalas Thalassus, regalas afecto y bienestar.  Cada gift card es una invitación a disfrutar del amor de tus seres queridos.  Puedes regalar desde una Thalasoterapia  hasta circuitos completos. Te invitamos a obsequiar bienestar");
      $("#btn-comprar-gift").text("COMPRAR");
      //--- FOOTER ---

    }
    else{
      console.log("English or Spanish");
    }
  });    
});