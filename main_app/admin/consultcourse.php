
<?php
	session_start();

	//si la variable de session existe se queda de lo contrario lo desloguea o lo envia para su usuario correcto
	if(isset($_SESSION['usuario']))
	{
		if ($_SESSION['usuario']['TipoUsuario'] == "Secretario")
		{
			header("Location: ../secretary/");
		}

		else   if ($_SESSION['usuario']['TipoUsuario'] != "Admin")
		{
			header("Location: ../salir.php");
		}

	}
	else
	{
		header('Location: ../../');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Consulta De Curso</title>
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<link rel="stylesheet" href="../../css/bootstrap.css">
</head>
	<body>
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
						          Opciones
						        </a>
						        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
						          <a class="dropdown-item" href="newstudent.php">Ingresar Alumno</a>
						          <a class="dropdown-item" href="newteacher.php">Ingresar Maestro</a>
						          <a class="dropdown-item" href="newcourse.php">Ingresar Cursos</a>
						          <a class="dropdown-item" href="newcareer.php">Ingresar Carrera</a>
						          <a class="dropdown-item" href="consultstudent.php">Consultar Alumno</a>
						          <a class="dropdown-item" href="consultteacher.php">Consultar Maestro</a>
						          <a class="dropdown-item" href="consultcourse.php">Consultar Cursos</a>
						          <a class="dropdown-item" href="consultsemester.php">Consultar Semestre</a>
						          <a class="dropdown-item" href="consultcareer.php">Consultar Carrera</a>
						          <a class="dropdown-item" href="#">Solvencias (PENDIENTE HASTA TENER PROTOCOLO)</a>
						          <a class="dropdown-item" href="#">Asignar Alumno a curso</a>
						          <a class="dropdown-item" href="#">Asignar Maestro a curso</a>



						        </div>
					      	</li>
					      	<li class="nav-item">
					        	<a class="nav-link " href="../salir.php">Salir</a>
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


		<center><br><h1>LISTADO DE CURSOS</h1><br><br>

		<table class="table">
			<th>Id.</th>
			<th>Nombre</th>
			<th>Creditos</th>
			<th>Semestre</th>
			<th>idCarrera</th>

			<th><a href="newcourse.php"><button type="button" name="nuevo" class="btn btn-info">Nuevo</Button></a></th>
			<th><a href="#"><button type="button" name="imprimir" class="btn btn-info">Imprimir Todo</Button></a></th>

			<?php
			include "../conexion.php";
			$busqueda = "SELECT * FROM curso";
			$busqueda = $mysqli->query($busqueda) or die (mysql_error($mysqli));
			while($fila=$busqueda->fetch_assoc())
			{
				$idCurso = mysqli_real_escape_string($mysqli,$fila['idCurso']);
				$nombre = mysqli_real_escape_string($mysqli,$fila['Nombre']);
				$creditos = mysqli_real_escape_string($mysqli,$fila['Creditos']);
				$semestre = mysqli_real_escape_string($mysqli,$fila['Semestre']);
				$carrera = mysqli_real_escape_string($mysqli,$fila['idCarrera']);


				echo "<tr>";
					echo "<td><center>"; echo $idCurso; echo "</center></td>";
					echo "<td><center>"; echo $nombre; echo "</center></td>";
					echo "<td><center>"; echo $creditos; echo "</center></td>";
					echo "<td><center>"; echo $semestre; echo "</center></td>";
					echo "<td><center>"; echo $carrera; echo "</center></td>";

					echo "<td><a href='deletecourse.php?numero=".$idCurso."'><button type='button' name='eliminar' class='btn btn-danger'>Eliminar</Button></a></td>";
					echo "<td><a href='modifycourse.php?numero=".$idCurso."'><button type='button' name='modificar' class='btn btn-success'>Modificar</Button></a></td>";
					echo "<td><a href='#?numero=".$idCurso."'><button type='button' name='imprimir' class='btn btn-success'>Imprimir</Button></a></td>";
				echo "<tr>";
			}


			?>
			</table>

			<?php
			 echo "<a href='index.php?><button type='button' name='eliminar' class='btn btn-danger'>Volver</Button></a>"

			?>
		</center>
		<script src="../../js/bootstrap.js"></script>
	<script src="../../js/jquery-3.2.1.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	</body>
</html>
