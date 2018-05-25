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
		<body>
		<div class="contenedor">
			<header role="banner">
					<div class="logo">

						<img src="img(1)/logotipo3.png"  alt="logo de la universidad" id="logoprincipal">

						<h2 id="titulo_principal">Universidad Gran Jaguar de Guatemala</h2>

						<div class="pos-f-t">
					  	<div class="collapse" id="navbarToggleExternalContent">
						    <div class="bg-dark p-4">
						      <nav class="navbar navbar-expand-lg navbar-light bg-light">
							  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
								    	<span class="navbar-toggler-icon"></span>
								  	</button>
								  	<div class="collapse navbar-collapse " id="navbarTogglerDemo01">

											<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
													<li class="nav-item dropdown">
														<a class="nav-link dropdown-toggle bold" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															Menú
														</a>
														<div class="dropdown-menu" aria-labelledby="navbarDropdown">

															<a href="admin.php">Administrativo</a><br>
															<a href="student.php">Estudiante</a>
															<br><a href="teacher.php">Maestro</a>
														</div>
													</li>

											</ul>

									</div>
								</nav>
								</div>
							</div>
							<nav class="navbar navbar-dark bg-dark">
								<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
									<span class="navbar-toggler-icon"></span>
								</button>
							</nav>
						</div>
						</ul>
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


		<footer role="contentinfo">
				<div class="descripcion-nosotros">
				</div>
				<div class="menu-nosotros">
					<nav role="navigation">
					</nav>
				</div>
		</footer>
	</body>
</html>
