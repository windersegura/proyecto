<?php
	session_start();

	//si la variable de session existe de lo contrario no se hace nada
	if(isset($_SESSION['usuario']))
	{

		if($_SESSION['usuario']['TipoUsuario'] == "Admin")
		{
			header("Location: ../admin/");
		}
		else if ($_SESSION['usuario']['TipoUsuario'] != "Secretario")
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
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<meta charset="UTF-8">
	<title>Consulta Del Alumno</title>
	<link rel="stylesheet" href="../../css/bootstrap.css">
	<meta name="viewport" content="width=device-width, user-scalable=no">
</head>
	<body>
		<div class="pos-f-t">
	  	<div class="collapse" id="navbarToggleExternalContent">
		    <div class="bg-primary p-4">
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
						          <a class="dropdown-item" href="consultstudent.php">Consultar Alumno</a>
						          <a class="dropdown-item" href="consultteacher.php">Consultar Maestro</a>
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
		  <nav class="navbar navbar-dark bg-primary">
		    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		  </nav>
		</div>
		<center><br><h1>LISTADO DE ALUMNOS</h1><br><br>

		<table class="table">

			<th>Nombre</th>
			<th>Edad</th>
			<th>Direccion</th>
			<th>Telefono</th>
			<th>Sexo</th>
			<th>DPI</th>
			<th>Password</th>

			<th>Correo</th>
			<th>Cantidad Cursos Asignados</th>
			<th><a href="newstudent.php"><button type="button" name="nuevo" class="btn btn-info">Nuevo</Button></a></th>
			<th><a href="#"><button type="button" name="imprimir" class="btn btn-info">Imprimir Todo</Button></a></th>

			<?php
			include "../conexion.php";
			$busqueda = "SELECT * FROM alumnos";
			$busqueda = $mysqli->query($busqueda) or die (mysql_error($mysqli));
			while($fila=$busqueda->fetch_assoc())
			{
				$idAlumno = mysqli_real_escape_string($mysqli,$fila['idAlumno']);
				$nombre = mysqli_real_escape_string($mysqli,$fila['Nombre']);
				$edad = mysqli_real_escape_string($mysqli,$fila['Edad']);
				$direccion = mysqli_real_escape_string($mysqli,$fila['Direccion']);
				$telefono = mysqli_real_escape_string($mysqli,$fila['Telefono']);
				$sexo = mysqli_real_escape_string($mysqli,$fila['Sexo']);
				$dpi = mysqli_real_escape_string($mysqli,$fila['DPI']);
				$password = mysqli_real_escape_string($mysqli,$fila['Password']);
				$tipoUsuario = mysqli_real_escape_string($mysqli,$fila['TipoUsuario']);
				$correo = mysqli_real_escape_string($mysqli,$fila['Correo']);
				$cantidadcursos = mysqli_real_escape_string($mysqli,$fila['CantidadCursos']);

				echo "<tr>";
					$idAlumno;
					echo "<td><center>"; echo $nombre; echo "</center></td>";
					echo "<td><center>"; echo $edad; echo "</center></td>";
					echo "<td><center>"; echo $direccion; echo "</center></td>";
					echo "<td><center>"; echo $telefono; echo "</center></td>";
					echo "<td><center>"; echo $sexo; echo "</center></td>";
					echo "<td><center>"; echo $dpi; echo "</center></td>";
					echo "<td><center>"; echo $password; echo "</center></td>";
					 $tipoUsuario;
					echo "<td><center>"; echo $correo; echo "</td>";
					echo "<td><center>"; echo $cantidadcursos; echo "</td>";
					echo "<td><a href='deletestudent.php?numero=".$idAlumno."'><button type='button' name='eliminar' class='btn btn-danger'>Eliminar</Button></a></td>";
					echo "<td><a href='modifystudent.php?numero=".$idAlumno."'><button type='button' name='modificar' class='btn btn-success'>Modificar</Button></a></td>";
					echo "<td><a href='#?numero=".$idAlumno."'><button type='button' name='imprimir' class='btn btn-success'>Imprimir</Button></a></td>";
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
