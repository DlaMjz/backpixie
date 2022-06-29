<!doctype html>
<html lang="en">
  <head>
  	<title>Pixie Administrador</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>


	<h1 >Tienda de ropa</h1>
    <button type="submit"><a href="../index.php">Inicio</a></button>
    <button type="submit"><a href="listaradmin.php">Listar ropa</a></button>
    <button type="submit"><a href="agregar.html">Agregar ropa</a></button>
    <h2>Lista de ropa</h2>
    <p>La siguiente lista muestra los datos de la ropa actualmente en stock.</p>


	<section class="ftco-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table">
						  <thead class="thead-primary">
						    <tr>
						    	<th>IMAGEN</th>
						    	<th>ID</th>
        						<th>TIPO DE PRENDA</th>
        						<th>MARCA</th>
        						<th>TALLE</th>
       							<th>PRECIO</th>
        						<th>EDITAR</th>
        						<th>BORRAR</th>
						      <th>&nbsp;</th>
						    </tr>
						  </thead>

					  <tbody>

					  <?php
    // 1) Conexion
    $conexion = mysqli_connect("127.0.0.1","root","");

        
    // 2) Preparar la orden SQL
    $consulta='SELECT * FROM stockdisponible';

    // 3) Ejecutar la orden y obtenemos los registros
    mysqli_select_db($conexion, "tiendaropa"); 
    $datos= mysqli_query($conexion, $consulta);

    // 4) Mostrar los datos del registro -
     while ($reg=mysqli_fetch_array($datos)) { 
		
		?>
				
				<tr class="alert" role="alert">
				<td><img src="data:image/png;base64, <?php echo base64_encode($reg['imagen'])?>" alt="" width="100px" height="100px"></td>
						      <td><?php echo $reg['id']; ?></td>
							  <td><?php echo $reg['tipodeprenda']; ?></td>
        					  <td><?php echo $reg['marca']; ?></td>
       							<td><?php echo $reg['talle']; ?></td>
        					<td><?php echo $reg['precio']; ?></td>
        					<td><a href="editar.php?id=<?php echo $reg['id'];?>">Editar</a></td>
        					<td><a href="borrar.php?id=<?php echo $reg['id'];?>">Borrar</a></td>
						    </tr>
							<?php } ?>

						  </tbody>
						  
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

