<?php session_start(); ?>
<!DOCTYPE html>
<?php

include("conexion.php");
$items=0;

if (isset($_SESSION["rut"])){
$rut       = $_SESSION["rut"]      ;
$nombre    = $_SESSION["nombre"]   ;
$ciudad    = $_SESSION["ciudad"]   ;
$fecha     = $_SESSION["fecha"]    ;
$direccion = $_SESSION["direccion"];
$telefono  = $_SESSION["telefono"] ;
$correo    = $_SESSION["correo"]   ;

$consulta = "SELECT * FROM clientes WHERE codigo='" . $rut . "'";
foreach ($con->query($consulta) as $row) {
        $idcli=$row["id"];          
}
$items=0;
$consulta2 = "SELECT * FROM res_cabanas WHERE idcli=" . $idcli . " and estado=0";
foreach ($con->query($consulta2) as $row) {
        $items+=1;          
}
$consulta2 = "SELECT * FROM res_suites WHERE idcli=" . $idcli . " and estado=0";
foreach ($con->query($consulta2) as $row) {
        $items+=1;          
}

}

$precios1="";
$consulta2 = "SELECT * FROM masajes";
foreach ($con->query($consulta2) as $row) {
        $precios1.=$row["tipo"]." ".$row["valor"]."<BR>";          
}
$precios2="";
$consulta2 = "SELECT * FROM tinas";
foreach ($con->query($consulta2) as $row) {
        $precios2.=$row["descrip"]." ".$row["valor"]."<BR>";          
}
$carrito="display:none;";
if ($items>0){
   $carrito="display:block;";
}
?>

<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thalassus - Spa | Masajes | Cafetería</title>
  <link rel="icon" type="image/x-icon" href="./assets/img/favicon.png">
  <!-- CSS -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="./assets/css/styles.css">
  <link rel="stylesheet" href="./assets/css/calendar.css">
  <link rel="stylesheet" href="./assets/css/calendar-spa.css">

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/timecircles/1.5.3/TimeCircles.min.js" integrity="sha512-FofOhk0jW4BYQ6CFM9iJutqL2qLk6hjZ9YrS2/OnkqkD5V4HFnhTNIFSAhzP3x//AD5OzVMO8dayImv06fq0jA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">THALASSUS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">INICIO</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./spa.php">SPA</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="" data-toggle="modal" data-target="#alojamiento" onclick="return false;">ALOJAMIENTO</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">CAFETERÍA</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">PROGRAMAS</a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" href="#nuestra-historia">NUESTRA HISTORIA</a>
              </li>
              <li class="nav-item">
                <a id="language" class="nav-link spanish" href="#">EN</a>
              </li>
              <!--
              <li class="nav-item">
                <form name="ircarrito" action="carrito.php" method="post" onsubmit="target_popup(this,650,400);">
                <button type="submit" style="border: none;background-color: transparent;outline: none;">
                <img src="./assets/img/icon/cart.png" alt="Carrito de compras" height="25">
                <label id="carrito" style="color: #FFFFFF;"><?php echo $items; ?></label>
                </button>                      
                </form>
              </li>
              -->
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <?php 
    if (isset($_SESSION["horini"])){
    $horini=strtotime($_SESSION["horini"]);        
    $fecfin=date("Y-m-d H:i:s", strtotime('+300 second',$horini));  
    //echo "Horai=".date("Y-m-d H:i:s", $horini)."<BR>";
    //echo "Horaf=".$fecfin."<BR>"; 
    //echo "Hora-ac".date("Y-m-d H:i:s")."<BR>";
    if (date("Y-m-d H:i:s")>$fecfin){     
       echo "SI";  
       //header('Location: expira.php');    
       //echo "<script>window.location.href='expira.php'</script>";
    }else{
      //echo "NO";
    }      
    }      
    ?>
        
    <!-- <div id="DateCountdown" data-date="<?php echo $fecfin; ?>" style="width: 50%;display:block;"></div> -->
    <script>
      $(window).resize(function(){
      $("#DateCountdown").TimeCircles().rebuild();            
      });      

      $("#DateCountdown").TimeCircles(   
        {
        "animation": "smooth",
        "bg_width": 0,
        "fg_width": 0,
        "circle_bg_color": "#60686F",
          "time": {
            "Days": {
              "text": "Days",
              "color": "#FFCC66",
              "show": false
            },
                "Hours": {
              "text": "Hours",
              "color": "#99CCFF",
              "show": false
            },
            "Minutes": {
              "text": "Minutes",
              "color": "#BBFFBB",
              "show": true
            },
            "Seconds": {
              "text": "Seconds",
              "color": "#FF9999",
               "show": true
            }
          }          
      }
    );      
    </script>            
    <!-- Modal -->
    <div class="modal" id="remodelacion" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <div class="text-center">
              <!-- TUERCA -->
            </div>
            <button type="button" class="close ms-auto" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <h5 class="modal-title text-center">NOS ESTAMOS PREPARANDO PARA TI</h5>
          <div class="modal-body text-center">
            Disculpa las molestias, estamos preparando un mejor paraiso. Queremos darte lo mejor. 
          </div>
          <div class="modal-footer">
            <button type="button" class="btn" data-bs-dismiss="modal">CERRAR</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal" id="alojamiento" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <div class="text-center">
              <!-- TUERCA -->
            </div>
            <button type="button" class="close ms-auto" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <h5 class="modal-title text-center">ALOJAMIENTO</h5>
          <div class="modal-body text-center">
            <h6>CABAÑA</h6>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste vero veritatis dignissimos non autem quasi molestias illo, eaque aperiam vitae exercitationem! Asperiores aliquid vel, error quam ipsam quod ad minima.</p>
            <h6>SUITE PACIFICO</h6>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste vero veritatis dignissimos non autem quasi molestias illo, eaque aperiam vitae exercitationem! Asperiores aliquid vel, error quam ipsam quod ad minima.</p>
            <h6>SUITE TERRAZA</h6>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste vero veritatis dignissimos non autem quasi molestias illo, eaque aperiam vitae exercitationem! Asperiores aliquid vel, error quam ipsam quod ad minima.</p>

          </div>
          <div class="modal-footer">
            <!-- <button type="button" class="btn" data-bs-dismiss="modal">CERRAR</button> -->
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid hero p-0">
      <video autoplay muted loop>
        <source src="./assets/img/bg-header.mp4" type="video/mp4">
      </video>
      <div class="text-hero d-flex flex-column">
        <div>
          VIVE UNA EXPERIENCIA RENOVADORA <br>
          ¡VEN A CONOCER THALASSUS!
        </div> 
        <button id="btn-reservar" class="btn btn-reservar">RESERVA UNA HABITACIÓN</button>
      </div>
    </div>
  </header>
  <main>
    <section id="reserva">
        <form action="grabareserva.php" method="post" onsubmit="target_popup(this,700,200);">
        <div class="d-flex flex-row flex-wrap justify-content-center text-center">
          <div class="grupo-reserva type d-flex flex-column">            
              <label for="roomType">TIPO</label>
              <div class="d-flex">
                <img class="my-auto ms-2" src="./assets/img/icon/bed.png" alt="" height="auto" width="25">
                <select name="tipo" class="form-select" id="roomType">
                  <option value="0">--Seleccione</option>
                  <option value="1">CABAÑA</option>
                  <option value="2">SUITE PACÍFICO</option>
                  <option value="3">SUITE TERRAZA</option>
                </select>
              </div>
          </div>
          
          <div class="grupo-reserva check-in d-flex flex-column">
            <label for="initialDate">DESDE</label>
            <div class="d-flex">
              <img class="my-auto ms-2" src="./assets/img/icon/calendar.png" width="25" height="auto">
              <input type="text" name="initialDate" id="initialDate" readonly="readonly" placeholder="" class="text-center">
            </div>
          </div>
          <div class="grupo-reserva check-out d-flex flex-column">
            <label for="finishDate">HASTA</label>
            <div class="d-flex">
              <img class="my-auto ms-2" src="./assets/img/icon/calendar.png" width="25" height="auto">
              <input type="text" name="finishDate" id="finishDate" readonly="readonly" placeholder="" class="text-center">
            </div>
          </div>
          <button id="btncontinuar" class="btn btn-continuar" data-toggle="modal" data-target="#myModal2" onclick="return false;" disabled>CONTINUAR</button> 
        </div>
        <!-- Inicio Reserva -->
                
        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
        <div class="modal-dialog">
        <div class="modal-content">
      
        <!-- Modal Header -->        
        <div class="modal-header">
          <h4 class="modal-title text-center">Registro</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->

        <div class="modal-body modal-sm" role="document">

        <div class="form-group">          
          <div>
            <label class="col-sm-4 control-label">Rut</label>
            <input type="text" name="rut" class="form-control" placeholder="Rut" value="<?php echo $rut; ?>" required>
          </div>
        </div>
        <div class="form-group">         
          <div>
             <label class="col-sm-8 control-label">Nombre Completo</label>
            <input type="text" name="nombres" class="form-control" placeholder="Nombre Completo" value="<?php echo $nombre; ?>" required>
          </div>
        </div>
        <div class="form-group">          
          <div>
            <label class="col-sm-8 control-label">Ciudad Origen</label>
            <input type="text" name="ciudad" class="form-control" placeholder="Ciudad Origen" value="<?php echo $ciudad; ?>" required>
          </div>
        </div>
        <div class="form-group">
          <div>
            <label class="col-sm-8 control-label">Fecha de nacimiento</label>          
            <input type="text" name="fecha_nacimiento" class="input-group date form-control" date="" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy"  value="<?php echo $fecha; ?>" required>
          </div>
        </div>
        <div class="form-group">          
          <div>
            <label class="col-sm-12 control-label">Dirección</label>
            <textarea name="direccion" class="form-control" placeholder="Dirección" value="<?php echo $direccion; ?>" ></textarea>
          </div>
        </div>
        <div class="form-group">          
          <div>
            <label class="col-sm-8 control-label">Teléfono</label>
            <input type="text" name="telefono" class="form-control" placeholder="Teléfono" value="<?php echo $telefono; ?>" required>
          </div>
        </div>
        <div class="form-group">          
          <div>
            <label class="col-sm-8 control-label">Correo</label>
            <input type="text" name="correo" class="form-control" placeholder="Correo" value="<?php echo $correo; ?>" required>
          </div>
        </div>
   

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" id="botonres" class="btn btn-primary"><img src="./assets/img/icon/cart.png" alt="Carrito de compras" height="25">Reservar</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
        
        </div>
        </div>
        </div>
      </form>

      <!-- Fin Reserva -->
      <div class="container">
        <div class="row justify-content-center gap-3 mt-1">
          <div class="col-6 align-items-center">
            <div id="carousel-reserva" class="carousel slide carousel-fade" data-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item img-1 active" data-bs-interval="10">
                  <img class="d-block h-100" src="" alt="Slide 1" height="350">
                </div>
              </div>
            </div>
          </div>
          <div id="month" class="col-6 wrapper">
            <header>
              <p class="displayed-date">Mes AÑO</p>
              <div class="icons">
                <span class="material-symbols-sharp prev chevron">chevron_left</span>
                <span class="material-symbols-sharp next chevron">chevron_right</span>
              </div>
            </header>
            <div class="calendar">
              <ul class="weeks" >
                <li>Lun</li>          
                <li>Mar</li>          
                <li>Mie</li>          
                <li>Jue</li>          
                <li>Vie</li>          
                <li>Sab</li>          
                <li>Dom</li>          
              </ul>
              <ul class="days" >      
                <li>1</li>          
                <li>2</li>          
                <li>3</li>          
                <li>4</li>          
                <li>5</li>          
                <li>6</li>          
                <li>7</li>          
                <li>8</li>          
                <li>9</li>          
                <li>10</li>          
                <li>11</li>          
                <li>12</li>          
                <li>13</li>          
                <li>14</li>          
                <li>15</li>          
                <li>16</li>          
                <li>17</li>          
                <li>18</li>          
                <li>19</li>          
                <li>20</li>          
                <li>21</li>          
                <li>22</li>          
                <li>23</li>          
                <li>24</li>          
                <li>25</li>          
                <li>26</li>          
                <li>27</li>          
                <li>28</li>          
                <li>29</li>          
                <li>30</li>          
                <li>31</li>                 
                <li>32</li>                 
                <li>33</li>                 
                <li>34</li>                 
                <li>35</li>                 
                <li>36</li>                 
                <li>37</li>                 
                <li>38</li>                 
                <li>39</li>                 
                <li>40</li>                 
                <li>41</li>                 
                <li>42</li>                 
              </ul>
            </div>
          </div>
        </div>
        <div class="row informacion-estadia justify-content-center gap-6 text-center mt-1 py-3">
          <div class="col col-2 my-auto regular">
            CHECK-IN:  <strong>14:00</strong><br>
            CHECK-OUT: <strong>12:00</strong> 
          </div>
          <div class="col col-3 my-auto">
            2 PERSONAS<br>
            CLP $<strong>20.000</strong> PERSONA EXTRA  <br>
            CLP $ <strong>20.000</strong> MASCOTA 
          </div>
          <div class="col col-5 my-auto">
            CLP $<span id="valor-por-noche">145.000</span> NOCHE<br>
            CLP $<span id="valor-total-reserva">0</span> TOTAL
          </div>
        </div>
      </div>
    </section>

    <section id="thalasoterapia" class="container seccion">
      <div class="row px-5 gap-5 justify-content-center">
        <div style="z-index:-1; width:100%; height:23rem; position:absolute;margin-top: 4.8rem;" class="blue"></div>
        <div class="col-12 col-md-5">
          <div class="image-wrapper">
            <img class="card-image" src="./assets/img/costa-de-concon-top.jpg" alt="" height="300">
          </div>
        </div>
        <div class="col-12 col-md-5 d-flex flex-column">
          <h3 class="title px-4 px-md-0">THALASOTERAPIA</h3>
          <p class="mt-auto px-4 px-md-0">
            La Thalasoterapia es una Terapia Natural Antiestrés, que consiste en una piscina individual de agua de mar caliente (37° a 40°) durante 45 minutos, no tiene contraindicaciones y se recomienda principalmente para  relajar la musculatura y la mente, acompañada de musicoterapia y con vista panorámica hacia el mar. El servicio proporciona agua mineral para beber durante la sesión y finaliza con una ensalada de fruta y una tetera de té verde o rojo.
          </p>
          <button id="btn-reserva-spa" class="btn btn-reservar">RESERVAR</button>
        </div>
      </div>
    </section>
    <script>
    </script>
    <section id="reserva-spa">
      <form action="" method="post" onsubmit="target_popup(this,300,100);">
        <div class="d-flex flex-row flex-wrap justify-content-center text-center">
          <div class="grupo-reserva type-spa d-flex flex-column">            
              <label for="spaType">TIPO</label>
              <div class="d-flex">
                <img class="my-auto ms-2" src="./assets/img/icon/bed.png" alt="" height="auto" width="25">
                <select id="spaType" name="spaType" class="form-select" id="spaType" onchange="
                if (document.getElementById('spaType').value==1){  
                   document.getElementById('valor-spa').value=45000;
                 }else{                   
                   document.getElementById('valor-spa').value=50000;
                 }">
                  <option value="0">--Seleccione</option>
                  <option value="1">MASAJE</option>
                  <option value="2">SALA THALASOTEAPIA</option>
                </select>
              </div>
          </div>
          
          <div class="grupo-reserva date-schedule d-flex flex-column">
            <label for="spaDate">DIA</label>
            <div class="d-flex">
              <img class="my-auto ms-2" src="./assets/img/icon/calendar.png" width="25" height="auto">
              <input type="text" name="spaDate" id="spaDate" readonly="readonly" placeholder="" class="text-center">
            </div>
          </div>
          <div class="grupo-reserva hour-schedule d-flex flex-column">
            <label for="spaHour">HORA</label>
            <input type="text" name="spaHour" id="spaHour" readonly="readonly" placeholder="" class="text-center">
          </div>
          <button id="btnContinuarSpa" class="btn btn-continuar" data-toggle="modal" data-target="#myModal2" onclick="return false;">CONTINUAR</button> 
        </div>
      </form>
      <div class="row justify-content-center mt-5">
        <div class="col-3">
          <p id="descripcion-selection-spa">Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe at, excepturi quasi velit facere in libero distinctio error voluptates incidunt consectetur sapiente quos cum consequatur! Illum fuga iste impedit qui.</p>
        </div>
        <div id="month-spa" class="col-6 wrapper-spa">
          <header>
            <p class="displayed-date-spa">Mes AÑO</p>
            <div class="icons">
              <span class="material-symbols-sharp prev chevron">chevron_left</span>
              <span class="material-symbols-sharp next chevron">chevron_right</span>
            </div>
          </header>
          <div class="calendar-spa">
            <ul class="weeks-spa">
              <li>Lun</li>          
              <li>Mar</li>          
              <li>Mie</li>          
              <li>Jue</li>          
              <li>Vie</li>          
              <li>Sab</li>          
              <li>Dom</li>          
            </ul>
            <ul class="days-spa">      
              <li>1</li>          
              <li>2</li>          
              <li>3</li>          
              <li>4</li>          
              <li>5</li>          
              <li>6</li>          
              <li>7</li>          
              <li>8</li>          
              <li>9</li>          
              <li>10</li>          
              <li>11</li>          
              <li>12</li>          
              <li>13</li>          
              <li>14</li>          
              <li>15</li>          
              <li>16</li>          
              <li>17</li>          
              <li>18</li>          
              <li>19</li>          
              <li>20</li>          
              <li>21</li>          
              <li>22</li>          
              <li>23</li>          
              <li>24</li>          
              <li>25</li>          
              <li>26</li>          
              <li>27</li>          
              <li>28</li>          
              <li>29</li>          
              <li>30</li>          
              <li>31</li>                 
              <li>32</li>                 
              <li>33</li>                 
              <li>34</li>                 
              <li>35</li>                 
              <li>36</li>                 
              <li>37</li>                 
              <li>38</li>                 
              <li>39</li>                 
              <li>40</li>                 
              <li>41</li>                 
              <li>42</li>                  
            </ul>
          </div>
        </div>
        <div class="col-2">
          <ul class="blocks-spa">
            <li>09:00</li>
            <li>10:15</li>
            <li>11:30</li>
            <li>12:45</li>
            <li>14:00</li>
            <li>15:15</li>
            <li>14:30</li>
            <li>15:45</li>
            <li>17:00</li>
            <li>18:15</li>
            <li>19:30</li>
          </ul>
        </div>
      </div>
      <div class="row informacion-spa justify-content-center gap-6 text-center">
        <div class="col col-5 py-3">
          INFORMACION SOBRE SPA
        </div>
        <div class="col col-5 py-3">
          VALOR: CLP $ <input id="valor-spa" type="text" value="">
        </div>
      </div>
    </section>
    <section id="servicios" class="container-fluid seccion">
      <div class="row">
        <div class="white" style="z-index: -1; width: 100%; height: 20rem; position: absolute; margin-top: 9rem;"></div>
        <div class="title-section"> TODA LA EXPERIENCIA</div>
      </div>
      <div class="row justify-content-center px-5 gap-5">
        <div class="carta col-12 col-sm-8 col-lg-3">
          <div class="img-wrapper-3">
            <img src="./assets/img/masaje.jpg" alt="">
          </div>
          <h5 class="title mt-3 text-center"><a href="#">SPA</h5></a>
          <p>Spa Thalassus es la única terma en la costa donde además de ofrecer servicios de thalasoterapia, también contamos con servicios de masoterapia para complementar tu renovación.</p>
        </div>
        <div class="carta col-12 col-sm-8 col-lg-3">
          <div class="img-wrapper-3">
            <img src="./assets/img/costa-de-concon-top.jpg " alt="">
          </div>
          <h5 class="title mt-3 text-center"><a href="#"> ALOJAMIENTO</h5></a>
          <p>Thalassus Alojamiento ofrece dos alternativas de alojamiento Suite y Cabañas, las cuales están completamente equipadas e incluye servicio de desayuno y servicio de mucama.  </p>
        </div>
        <div class="carta col-12 col-sm-8 col-lg-3">
          <div class="img-wrapper-3">
            <img src="./assets/img/dunas-de-concon-top.jpg" alt="">
          </div>
          <h5 class="title mt-3 text-center"><a href="#"> CAFETERÍA</h5></a>
          <p>Thalassus Cafetería es un lugar de encuentro con la mejor vista panorámica de la V región y donde podrás disfrutar de nuestra pastelería casera,  café, teteras de te y de una sabrosa alternativa de sándwich. </p>
        </div>
      </div>
    </section>
    <section id="gift-card" class="container seccion">
      <div class="row px-5 gap-5 justify-content-center">
        <div class="orange" style="z-index:-1; width:100%; height:23rem; position:absolute;margin-top: 4.8rem;"></div>
        <div class="col-12 col-md-5 d-flex flex-column">
          <h3 class="title px-4 px-md-0">GIFT CARD THALASSUS</h3>
          <p class="mt-auto px-4 px-md-0">
            Cuando regalas Thalassus, regalas afecto y bienestar.  Cada gift card es una invitación a disfrutar del amor de tus seres queridos.  Puedes regalar desde una sesión Thalasoterapia  hasta un circuito completo. Te invitamos a obsequiar bienestar.
          </p>
          <button id="btn-comprar-gift" class="btn btn-reservar">COMPRAR</button>
        </div>
        <div class="col-12 col-md-5">
          <div class="image-wrapper">
            <img class="card-image" src="./assets/img/masaje.jpg" alt="" height="300">
          </div>
        </div>
      </div>
    </section>
    <section id="nuestra-historia" class="container seccion">
      <div class="row px-5 gap-5 justify-content-center">
        <div class="blue" style="z-index:-1; width:80%; height:23rem; position:absolute;margin-top: 4.8rem;">
        </div>
        <div class="col-12 col-md-5">
          <div class="image-wrapper">
            <img class="card-image" src="./assets/img/costa-de-concon-top.jpg" alt="" height="300">
          </div>
        </div>
        <div class="col-12 col-md-5 d-flex flex-column">
          <h3 class="title px-4 px-md-0">NUESTRA HISTORIA</h3>
          <p class="mt-auto px-4 px-md-0">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestiae laborum fuga iure illo omnis ea dolor natus eius possimus excepturi, voluptatem eum voluptatum deserunt repudiandae aut, ratione molestias architecto enim?Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime voluptatem odit ipsa atque voluptatum architecto laborum aperiam, qui provident ut accusamus accusantium illo adipisci voluptates porro expedita fuga libero nulla.
          </p>          
        </div>
      </div>
    </section>
  </main>
  <footer class="container-fluid">
    <div class="row justify-content-center align-items-center mx-5" style="border-bottom: solid 1px #d7d7d7;">
      <div class="col-12 col-md-6 text-center text-md-start">
        <p class="name-footer">THALASSUS</p>
      </div>
      <div class="col-12 col-md-4">
        <div class="d-flex justify-content-center justify-content-md-start gap-5 my-3">
          <a href="https://instagram.com/thalassuschile?igshid=MDM4ZDc5MmU=" target="_blank">
            <img src="./assets/img/icon/instagram.png" alt="Instagram icon" width="40"></a>
          <a href="https://www.facebook.com/Thalassus?mibextid=LQQJ4d#" target="_blank">
            <img src="./assets/img/icon/facebook.png" alt="Facebook icon" width="40"></a>
          <a href="https://api.whatsapp.com/send/?phone=56942269099&text&type=phone_number&app_absent=0" target="_blank">
            <img src="./assets/img/icon/whatsapp.png" alt="Whatsapp icon" width="40"></a>
        </div>
      </div>
      <div id="map" class="row">
        <div class="col-12 mx-auto">
          <a href="https://goo.gl/maps/MwwrmMmakmaMumSr5" target="_blank">
            <img src="./assets/img/map.png" alt="" srcset="">
          </a>
        </div>
      </div>

    </div>
    <div class="row justify-content-center mt-3   ">
      <div class="col-10 col-md-6">
          <div class="my-4 text-center text-md-start d-flex flex-wrap flex-md-nowrap">
            <a href="https://goo.gl/maps/MwwrmMmakmaMumSr5" target="_blank" class="text-decoration-underline location-link mx-auto mx-md-0 my-auto">
              <img src="./assets/img/icon/gps2.png" alt="Ver en el mapa" class="justify-content-center" height="30">
            </a>
              <div id="direccion" class="d-flex flex-wrap justify-content-center justify-content-md-start my-3 my-md-auto mx-3">
                Los tamarindos 36, Costa Brava, Concón,&nbsp;  
                <div> Región de Valparaíso.</div>
              </div> 
          </div>
      </div>
      <div class="col-3 col-md-3 d-flex flex-wrap">
        <div class="my-auto mx-auto mx-md-0">
          <img src="./assets/img/icon/phone.png" alt="Numero telefonico" height="28">
        </div>
        <div class="my-2 my-md-auto mx-auto mx-md-3 text-nowrap">
          <a href="tel:+56931388622">
            +569 12345678
          </a>
        </div>        
      </div>

  <div class="whatsapp">
      <a href="https://api.whatsapp.com/send/?phone=56942269099&text&type=phone_number&app_absent=0" target="_blank">
      <img src="./assets/img/icon/whatsapp.png" alt="" width="50">
      </a>
      <form name="ircarrito" action="carrito.php" method="post" onsubmit="target_popup(this,900,800);">
      <div style="position: relative;
    display: inline-block;
    text-align: center;">
      <button type="submit" style="border: none;background-color: transparent;outline: none;cursor:pointer;<?php echo $carrito; ?>">     
      <label id="carrito" style="color: black;cursor:pointer;">       
      <img src="./assets/img/icon/cart.png" alt="Carrito de compras" height="40" width="40" style="background-color: rgba(255,165,0,0.7);
      border-radius: 5px;" border="0" title="Carrito de Compras">      
      <div style="position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);">
      <FONT SIZE=3><b><?php echo $items; ?></b></FONT>           
      </div>
      </label>
      </button>                      
      </div>
      </form>     
  </div>
  </footer>
  <!-- JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <script src="./assets/js/languages.js"></script>
  <script src="./assets/js/index.js"></script>
  <script src="./assets/js/calendar.js"></script>
  <script src="./assets/js/calendar-spa.js"></script>
  <script>
  function cerrar(div) {    
      var x = document.getElementById("myModal2");
      if (x.style.display === "none") {
          x.style.display = "block";
      } else {
          x.style.display = "none";
      }
  } 

  function target_popup(form,w,h) {
    //Ajustar horizontalmente
    var x=(screen.width/2)-(w/2);
    //Ajustar verticalmente
    var y=(screen.height/2)-(h/2); 
    window.open('', 'formpopup', 'width='+w+',height='+h+',top='+y+',left='+x+',resizable=no,toolbar=no,location=no,status=no,menubar=no');
    form.target = 'formpopup';
  }
  </script>
  <script>
  $('#DateCountdown').TimeCircles().addListener(function() {
      var time = $('#DateCountdown').TimeCircles().getTime();
      document.write(time.minutes+":"+time.seconds);
      /*
      var ms = time % 1000;
      var s = (time - ms) / 1000;
      var seconds = s % 60;
      var minutes = (s - seconds) / 60;
      */
      if (time.minutes==1&&time.seconds==0){
         alert("Falta 1  minuto");
      }
      
      if (minutes==0&&seconds==0){
         alert("Se acabó el tiempo");
         window.location.href="expira.php";
      }       
      
      });  
    </script>
</body>
</html>