<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Animales Raros</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f0f8ff;
      font-family: sans-serif;
    }
    h1 {
      text-align: center;
      margin: 20px;
      color: #333;
    }
    .info {
      background: #fff;
      padding: 10px;
      margin-bottom: 15px;
      border-radius: 5px;
    }
    footer {
      background-color: #dff9fb;
      text-align: center;
      padding: 10px;
      margin-top: 20px;


    }

    
   .carousel-inner img {
      width: 200%;
      height: 500px;
      object-fit: cover;
  }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Animales</a>
    </div>
  </nav>

  <h1>Animales Raros</h1>



  <!-- Carrusel -->
  <div id="carruselAnimales" class="carousel slide container" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="ayeaye.jpg" class="d-block w-100" alt="Aye-Aye">
      </div>

      <div class="carousel-item">
        <img src="oka.jpeg" class="d-block w-100" alt="Okapi">
      </div>

      <div class="carousel-item">
        <img src="labios.jpeg" class="d-block w-100" alt="pez_murcielago">
      </div>



    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carruselAnimales" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carruselAnimales" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>
  


<!-- Button trigger modal -->
<div class = "col text-center">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <table class="table table-dark table-striped-columns">


<?php
include_once "Controlador/conexion.php";
$conexion = new Conexion();
$conexion = $conexion->conectar();
if ($conexion){
  $sql = "SELECT * FROM `registropersonas`";
  $consulta = $conexion-> prepare($sql);
  $consulta->execute();
  $i = 0;
  while($fila=$consulta -> fetch(PDO::FETCH_ASSOC )){
   $i +=1; 
  
?>  

  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Edad</th>
      <th scope="col">Correo</th>
      <th scope="col">Telefono</th>
      <th scope="col">Editar</th>
      <th scope="col">Eliminar</th>


    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?php $i?></th>
      <td><?php echo $fila["Nombre"];?></td>
      <td><?php echo $fila["Apellido"];?></td>
      <td><?php echo $fila["Edad"];?></td>
      <td><?php echo $fila["Correo"];?></td>
      <td><?php echo $fila["Telefono"];?></td>
      <td><?php echo $fila["Nombre"];?></td>
      <button type="button" class="btn btn-primary">Editar</button>
      <td></td>
    </tr>
    
  </tbody>
  <?php
  }}
  else {
    echo"Error al conectar a la base de datos.";
  }

  ?>
</table>
      
  </div>
 


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>




  <!-- Información principal -->
  <div class="container mt-4">
    <div class="row">
      <div class="col-md-8">
        <h2>Lobo de crin</h2>
        <img src="lobo.jpeg" alt="Lobo de crin" class="img-fluid">
        <p>Un cánido sudamericano con patas largas.</p>
      </div>
      <div class="col-md-4">
        <h2>Picozapato</h2>
        <img src="picoza.jpeg" alt="Picozapato" class="img-fluid">
        <p>Ave africana con un pico gigante.</p>
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-6 info">
        <h4>¿Qué es un animal raro?</h4>
        <p>Tienen características únicas o extrañas.</p>
      </div>
      <div class="col-md-6 info">
        <h4>¿Por qué conocerlos?</h4>
        <p>Muchos están en peligro y debemos protegerlos.</p>
      </div>
    </div>
  </div>

  <!-- Tabla -->
  <div class="container mt-3">
    <h4 class="text-center">Ejemplos</h4>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Hábitat</th>
          <th>Dato Curioso</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Axolotl</td>
          <td>México</td>
          <td>Puede regenerar su cuerpo</td>
        </tr>
        <tr>
          <td>Narval</td>
          <td>Ártico</td>
          <td>Tiene un colmillo largo como cuerno</td>
        </tr>
        <tr>
          <td>Pez gota</td>
          <td>Océanos profundos</td>
          <td>Cambia de forma fuera del agua</td>
        </tr>
      </tbody>
    </table>
  </div>
  <form action="Controlador/registro.php" method="POST" class="container d-flex justify-content-center align-items-center" style="height: 85vh;">
  <div class="col-4">
    <div class="mb-2">
      <input type="text" class="form-control" placeholder="Nombre" name="nombre">
    </div>
    <div class="mb-2">
      <input type="text" class="form-control" placeholder="Apellido" name="apellido">
    </div>
    <div class="mb-2">
      <input type="text" class="form-control" placeholder="Nro. Documento" name="id">
    </div>
    <div class="mb-2">
      <input type="text" class="form-control" placeholder="Correo electrónico" name="correo">
    </div>
    <div class="mb-2">
      <input type="text" class="form-control" placeholder="Edad" name="edad">
    </div>
    <div class="mb-2">
      <input type="text" class="form-control" placeholder="Telefono" name="tel">
    </div>
    <button type="submit" class="btn btn-warning">Enviar</button>
  </div>
</form>

  <!-- Footer -->
  <footer>
    <p>&copy; 2025 Animales Raros 🐾</p>
  </footer>
<!-- Modal genérico -->
<div class="modal fade" id="mensajeModal" tabindex="-1" aria-labelledby="mensajeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="mensajeModalLabel">Resultado</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body" id="mensajeTexto">
        <!-- Aquí va el mensaje dinámico -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/modal.js"></script>
</body>
</html>