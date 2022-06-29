<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Tienda Web</title>
</head>
<body style="margin: 2%;">
<a href="index.php" style="text-decoration: none; color:black; ";  > <h1>Tienda de ropa</h1> </a>
  <h2>Lista de ropa</h2>
  <p>La siguiente lista muestra los datos de la marca Nike actualmente en stock.</p>

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

<br>

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

  <section>
    <div class="container">
      <div class="row">

        <?php
        // 1) Conexion y seleccion de base de datos
        $conexion = mysqli_connect("127.0.0.1","root","");
        mysqli_select_db($conexion, "tiendaropa"); 

        // 2) Preparar la orden SQL

        $consulta="SELECT * FROM `stockdisponible` WHERE `marca` LIKE 'nike'";

        // 3) Ejecutar la orden y obtenemos los registros
        $datos= mysqli_query($conexion, $consulta);

        //  recorro todos los registros y genero una CARD PARA CADA UNA
        while ($reg = mysqli_fetch_array($datos)) {?>
          <div class="card col-sm-12 col-md-6 col-lg-3">
            <img class="card-img-top" src="data:image/jpg;base64, <?php echo base64_encode($reg['imagen'])?>"

              <h3 class="card-title" style="width: 100%; font-size:25px;"><?php echo ucwords($reg['marca']) ?></h3>
              <br>
              <?php echo "Talle", " ", $reg['talle']; ?>
              <span>$ <?php echo $reg['precio']; ?></span>
              


          </div>

        <?php } ?>

      </div>
    </div>
  </section>
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>