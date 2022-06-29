<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Tienda Web</title>
  <link rel="stylesheet" href="css/estilos.css">
</head>
<body style="margin: 2%;">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">PIXIE</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Nosotros</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Productos</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">Todos</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                                <li><a class="dropdown-item" href="#!">Nuevos</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <button class="btn btn-outline-dark" type="submit">

                        <a href="LOGIN/login.html" style="text-decoration:none; color: black;">Administrador</a>
                        </button>
                    </form>
                </div>
            </div>
        </nav>

<header>
  <div>
    <img class="imgheader" src="img/imglogo1.jpeg" alt="" style="width: 100%;">
  </div>
</header>


<br><br>

<section style="display: flex; flex-wrap: wrap; box-sizing: border-box;">

  <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    Elegir Marca
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a href="nike.php" class="dropdown-item" href="#">Nike</a></li>
    <li><a href="adidas.php" class="dropdown-item" href="#">Adidas</a></li>
    <li><a href="supreme.php" class="dropdown-item" href="#">Supreme</a></li>
  </ul>
</div>



<div class="dropdown" style="margin-left: 1%;">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    Tipo de Prenda
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a href="buzos.php" class="dropdown-item" href="#">Buzos</a></li>
    <li><a href="remeras.php" class="dropdown-item" href="#">Remeras</a></li>
  </ul>
</div>


<div class="dropdown" style="margin-left: 1%;">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    Precio
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a href="menos500.php" style="text-decoration: none; color:black">Menos $500</a></li>
  </ul>
</div>
</section>

<section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

        <?php
        // 1) Conexion y seleccion de base de datos
        $conexion = mysqli_connect("127.0.0.1","root","");
        mysqli_select_db($conexion, "tiendaropa"); 

        // 2) Preparar la orden SQL

        $consulta='SELECT * FROM stockdisponible';

        // 3) Ejecutar la orden y obtenemos los registros
        $datos= mysqli_query($conexion, $consulta);

        //  recorro todos los registros y genero una CARD PARA CADA UNA
        while ($reg = mysqli_fetch_array($datos)) {?>
          <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="data:image/jpg;base64, <?php echo base64_encode($reg['imagen'])?>" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo ucwords($reg['marca']) ?></h5>
                                    <!-- Product price-->
                                  <h2>$<?php echo $reg['precio']; ?></h2>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">

                            <!--boton con link de pago que cargué en la base de datos-->
                                <div class="link"> <?php echo $reg['link']; ?></div>
                               <br>
                            </div>
                        </div>
                    </div>

                  <?php } ?>

                </div>
            </div>
        </section>
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>