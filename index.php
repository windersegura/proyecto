<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inicio</title>
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC|Didact+Gothic|Roboto">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<link rel="stylesheet" href="css/bootstrap.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>


</head>
	<body>

		<div class="contenedor">
			<header role="banner">
					<div class="logo">

						<img src="img(1)/logotipo3.png"  alt="logo de la universidad" id="logoprincipal">

						<h2 id="titulo_principal">Universidad Gran Jaguar de Guatemala</h2></div>

						<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
						  <a class="navbar-brand text-light" href="index.php"><img src="../../img(1)/logotipo3.png" alt=""></a>

						  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						    <span class="navbar-toggler-icon"></span>
						  </button>

						  <div class="collapse navbar-collapse" id="navbarSupportedContent">
						    <ul class="navbar-nav mr-auto">

						      <li class="nav-item dropdown active">
						        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						          Ingresar
						        </a>
						        <div class="dropdown-menu" aria-labelledby="navbarDropdown"><a class="dropdown-item" href="newstudent.php"></a>
						          <a class="dropdown-item" href="admin.php">Administratico</a>
						          <a class="dropdown-item" href="teacher.php">Maestro</a>
						          <a class="dropdown-item" href="student.php">Estudiante</a>
						        </div>
						      </li>
									<li class="nav-item active">
										<a class="nav-link" href="admission.php">Admision<span class="sr-only">(current)</span></a>
									</li>
									<li class="nav-item dropdown active">
						        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						          Carreras
						        </a>
						        <div class="dropdown-menu" aria-labelledby="navbarDropdown"><a class="dropdown-item" href="newstudent.php"></a>
											<?php
												include 'main_app/conexion.php';
												$query = "SELECT NombreCarrera FROM carrera";
							              $resultado = $mysqli->query($query) or die (mysql_error($mysqli));
							              while($fila=$resultado->fetch_assoc())
							    					{
															echo "<a class='dropdown-item' href='#'>"; echo $fila['NombreCarrera']; echo"</a>";
														}
											?>

						        </div>
						      </li>
									<li class="nav-item active">
						        <a class="nav-link" href="about.php">Acerca De</a>
						      </li>
						    </ul>
						  </div>
						</nav>

			</header>

				<!---	CAROUSEL ----------------------->
			<!------------------------------------------------------->
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			  <ol class="carousel-indicators">
			    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
			  </ol>
			  <div class="carousel-inner">
			    <div class="carousel-item active">
			      <img class="d-block w-100" src="img(1)/carousel2.jpg" alt="First slide">
						<div class="carousel-caption d-none d-md-block">
					    <h1>Apredizaje</h1>
					    <p>Contamos Con La Mejor Aprendizaje De Todo Peten</p>
					  </div>
			    </div>
			    <div class="carousel-item">
			      <img class="d-block w-100" src="img(1)/carousel4.jpg" alt="Second slide">
						<div class="carousel-caption d-none d-md-block">
					    <h1>Maestros</h1>
					    <p>Los Mejores Mestros De Toda Guatemala</p>
					  </div>
			    </div>
			    <div class="carousel-item">
			      <img class="d-block w-100" src="img(1)/carousel5.jpg" alt="Third slide">
						<div class="carousel-caption d-none d-md-block">
					    <h1>Tecnologia</h1>
					    <p>Instalaciones Con La Mejor Tecnologia</p>
					  </div>
			    </div>
					<div class="carousel-item">
			      <img class="d-block w-100" src="img(1)/carousel1.jpg" alt="Fourth slide">
						<div class="carousel-caption d-none d-md-block">
					    <h1>Establecimiento</h1>
					    <p>Uno De Los Mejores Establecimientos De Toda Centroamerica</p>
					  </div>
			    </div>
			  </div>
			  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    <span class="sr-only">Anterior</span>
			  </a>
			  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			    <span class="carousel-control-next-icon" aria-hidden="true"></span>
			    <span class="sr-only">Siguiente</span>
			  </a>
			</div>
					<!-------------------------------------------------------->




				<!-- CARDS ----->
				<section class="container mt-5 pt-5">
					<div class="card-deck">
					  <div class="card">
					    <img class="card-img-top" src="img(1)/universitarios1.jpg" alt="Card image cap">
					    <div class="card-body">
					      <h5 class="card-title">Conoce Nuevas Personas</h5>
					      <p class="card-text">Hacer amistades en la Universidad puede ser un poco complicado al comienzo. Si es tu primera vez en el campus, seguramente conozcas a muy pocas personas.</p>
					    </div>
					  </div>
					  <div class="card">
					    <img class="card-img-top" src="img(1)/profecionales.jpg" alt="Card image cap">
					    <div class="card-body">
					      <h5 class="card-title">Conviertete en un Profesional</h5>
					      <p class="card-text">Conviértete en un profesional internacional de la Universidad Gran Jaguar y con la obtención de la certificación oficial.</p>
					    </div>
					  </div>
					  <div class="card">
					    <img class="card-img-top" src="img(1)/superacion.jpg" alt="Card image cap">
					    <div class="card-body">
					      <h5 class="card-title">Alcanza tus Sueños </h5>
					      <p class="card-text">Todos tenemos sueños, es preciso perseverar  con fe para alcanzarlos, lucha por tus sueños, visualiza tus sueños.</p>
					    </div>
					  </div>
					</div>
				</section>
				<br><br>
				<!------------------------------------------------------------>


				<!-- Footer -->
		    <footer class="page-footer font-small stylish-color-dark pt-4 mt-4 bg-dark">
		      <!-- Footer Links -->
		      <div class="container text-center text-md-left">
		        <!-- Grid row -->
		        <div class="row">
		          <!-- Grid column -->
		          <div class="col-md-4 mx-auto">
		            <!-- Content -->
		            <h5 class="font-weight-bold text-uppercase mt-3 mb-4 text-light">Universidad Gran Jaguar</h5>
		            <p class="text-secondary">Decidete estudiar en nuestra universidad. Encontraras carreras de las cuales estaras encantado/a de estudiar hasta el final </p>
		          </div>
		          <!-- Grid column -->
		          <hr class="clearfix w-100 d-md-none">
		          <!-- Grid column -->
		          <div class="col-md-2 mx-auto">
		            <!-- Links -->
		            <h5 class="font-weight-bold text-uppercase mt-3 mb-4 text-light">CARRERAS</h5>
		            <ul class="list-unstyled">
		              <li>
		                <a href="#!" class="text-secondary">Ingenieria En Electronica</a>
		              </li>
		              <li>
		                <a href="#!" class="text-secondary">Ingenieria En Sistemas</a>
		              </li>
		              <li>
		                <a href="#!" class="text-secondary">Ingenieria En Electricidad</a>
		              </li>
		              <li>
		                <a href="#!" class="text-secondary">Mecatronica</a>
		              </li>
		            </ul>
		          </div>
		          <!-- Grid column -->
		          <hr class="clearfix w-100 d-md-none">
		          <!-- Grid column -->
		          <div class="col-md-2 mx-auto">
		            <!-- Links -->
		            <h5 class="font-weight-bold text-uppercase mt-3 mb-4 text-light">MAESTRIAS</h5>
		            <ul class="list-unstyled">
		              <li>
		                <a href="#!" class="text-secondary">Seguridad y Banca Virtual</a>
		              </li>
		              <li>
		                <a href="#!" class="text-secondary">Maestría en Sistemas de Información Base de Datos</a>
		              </li>
		              <li>
		                <a href="#!" class="text-secondary">Postgrado en Seguridad Informática</a>
		              </li>
		              <li>
		                <a href="#!" class="text-secondary">Experto Universitario en Investigación y Proyectos</a>
		              </li>
		            </ul>
		          </div>
		          <!-- Grid column -->
		          <hr class="clearfix w-100 d-md-none">
		          <!-- Grid column -->
		          <div class="col-md-2 mx-auto">
		            <!-- Links -->
		            <h5 class="font-weight-bold text-uppercase mt-3 mb-4 text-light">DOCTORADOS</h5>
		            <ul class="list-unstyled text-secondary">
		              <li>
		                <a href="#!" class="text-secondary">Doctorado en Derecho Penal y Procesal Penal.</a>
		              </li>
		              <li>
		                <a href="#!" class="text-secondary">Doctorado en Ciencias Administrativas.</a>
		              </li>
		              <li>
		                <a href="#!" class="text-secondary">Ciencia y Tecnología Ambientales.</a>
		              </li>
		              <li>
		                <a href="#!" class="text-secondary">Matemáticas.</a>
		              </li>
		            </ul>
		          </div>
		          <!-- Grid column -->
		        </div>
		        <!-- Grid row -->
		      </div>
		    <!-- Footer Links -->
		      <hr>
		      <!-- Call to action -->
		      <ul class="list-unstyled list-inline text-center py-2">
		        <li class="list-inline-item">
		          <h5 class="mb-1 text-light">No Esperes Mas! Inscribete</h5>
		        </li>
		        <li class="list-inline-item">
		          <a href="admission.php" class="btn btn-danger btn-rounded">Admision</a>
		        </li>
		      </ul>
		      <!-- Call to action -->
		      <hr>
		      <!-- Copyright -->
		      <div class="footer-copyright text-center py-3 text-secondary">© 2018 Copyright:
		        <a href="index.php" class="text-light"> Universidad Gran Jaguar</a>
		      </div>
		      <!-- Copyright -->
					<!-- Button trigger modal -->
					<center>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
			  			DESARROLLADORES
						</button>
					</center>

					<!-- Modal -->
					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h4 class="modal-title" id="exampleModalLabel">Programacion III<br>Ing. Jorge Ramiro Ibarra Monroy</h4>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
									Winder Sleam Segura Melchor 1690-16-2311 <br>
									Fredy Henry Suarez Cerón 1690-16-8263<br>
					        Gerson Rodolfo Chamalé Mejía 1690-15-8029
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					        <a href="index.php" class="btn btn-primary">Aceptar</a>
					      </div>
					    </div>
					  </div>
					</div><br><br>
		    </footer>
		    <!-- Footer -->
	</body>
</html>
