<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thalassus | Alojamiento</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <link rel="stylesheet" href="./assets/css/styles.css">

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
        <a class="navbar-brand" href="./index.php">THALASSUS</a>
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
                <a class="nav-link" aria-current="page" href="./index.php">INICIO</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./spa.php">SPA</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="./alojamiento.php">ALOJAMIENTO</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./cafeteria.php">CAFETERÍA</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./programas.php">PROGRAMAS</a>
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
  </header>
  <section id="cabana" class="container seccion">
      <div class="row px-5 gap-5 justify-content-center">
        <div style="z-index:-1; width:100%; height:23rem; position:absolute;margin-top: 4.8rem;" class="blue"></div>
        <div class="col-12 col-md-5">
          <div class="image-wrapper">
            <img class="card-image" src="./assets/img/costa-de-concon-top.jpg" alt="" height="300">
          </div>
        </div>
        <div class="col-12 col-md-5 d-flex flex-column">
          <h3 class="title px-4 px-md-0">CABAÑAS</h3>
          <p class="mt-auto px-4 px-md-0">
            La Thalasoterapia es una Terapia Natural Antiestrés, que consiste en una piscina individual de agua de mar caliente (37° a 40°) durante 45 minutos, no tiene contraindicaciones y se recomienda principalmente para  relajar la musculatura y la mente, acompañada de musicoterapia y con vista panorámica hacia el mar. El servicio proporciona agua mineral para beber durante la sesión y finaliza con una ensalada de fruta y una tetera de té verde o rojo.
          </p>
          <!-- <button id="btn-reserva-spa" class="btn btn-reservar">RESERVAR</button> -->
        </div>
      </div>
    </section>

    <footer>

    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="./assets/js/languages.js"></script>
    <script src="./assets/js/index.js"></script>
    <script src="./assets/js/calendar.js"></script>
    <script src="./assets/js/calendar-spa.js"></script>
</body>
</html>