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
                  <li class="nav-item active">
										<a class="nav-link" href="index.php">Inicio<span class="sr-only">(current)</span></a>
									</li>
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

      <section class="container">
        <h1 class="text-center">Requisitos de Admisión</h1>
        <h3>Entregar en la oficina de Registro y Control Académico (Edificio &#8220;A&#8221; oficina 130 primer nivel o tu Centro Universitario):</h3>
        <ul>
          <li>Constancia de prueba de ubicación (solo para Campus Central).</li>
          <li>Original y Fotocopia de DPI o Pasaporte.</li>
          <li>Original Certificacion Básicos y Diversificado.</li>
          <li>Fotostática de Título de 5 x 7 pulgadas (con sellos de registro de la Contraloría de Cuentas).</li>
          <li>Título o Diploma de Nivel Medio original extendido por el Ministerio de Educación (para contrastar con la Fotostática de título. Este documento se devolverá de inmediato).</li>
          <li>Dos fotografías tamaño Cédula.</li>
          <li>Efectuar los pagos de inscripción correspondientes.</li>
        </ul>
        <h3>Para estudiantes que efectúen traslado de otras Universidades del país:</h3>
        <ul>
          <li>Certificación de matrícula.</li>
          <li>Certificación de estudios (ambas de Universidad de procedencia).</li>
        </ul>
        <hr class="solid" />
        <h2>Para Graduados en el extranjero:</h2>
        <p>Estudiantes que haya realizado sus estudios en el extranjero deben realizar los siguientes pasos de inscripción:</p>
        <ul>
          <li>En el país donde el interesado cursó y aprobó sus estudios, el Cónsul de Guatemala debe autenticar su Diploma o Título y el Certificado de Cursos aprobados.</li>
          <li>El Ministerio de Relaciones exteriores autentica la firma del Cónsul.</li>
          <li>Los documentos deben ser traducidos al castellano por un traductor jurado cuando el caso lo amerite.</li>
          <li>La Universidad estudia la documentación para establecer la equivalencia de cursos aprobados. Posteriormente se señalarán las clases y el ciclo que podrá cursar el interesado en la carrera de su selección.</li>
          <li>El alumno debe satisfacer todos los requisitos de matrícula de Inscripción, incluyendo la presentación de los siguientes documentos:
        <ul>
          <li>Boleta de aprobación de Evaluación de Ubicación.</li>
          <li>Fotocopia de DPI ó Pasaporte.</li>
          <li>Fotostática 5&#8243; X 7&#8243; del título o Diploma de Nivel Medio, con trámites legales.</li>
          <li>Certificación de cursos de Nivel Medio con trámites legales.</li>
          <li>Dos fotografías tamaño cédula.</li>
          <li>Si los documentos requeridos están redactados en un idioma distinto al castellano deberán entregar traducción jurada hecha en Guatemala.</li>
        </ul>
        </li>
          <li>El Departamento de Registro y Control Académico procede a la inscripción como estudiante de la Universidad de acuerdo con los reglamentos respectivos.</li>
        </ul>

      </section>





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
		    </footer>
		    <!-- Footer -->
	</body>
</html>
