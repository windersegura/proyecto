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
	<title>Consulta De Maestros</title>
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


		<center><br><h1>LISTADO DE MAESTROS</h1><br><br>
		<table class="table">

			<th><center>Nombre</center></th>
			<th><center>Direccion</center></th>
			<th><center>Telefono</center></th>
			<th><center>Password</center></th>
			<th><center>DPI</center></th>
			<th><center>Correo</center></th>


			<th><a href="newteacher.php"><button type="button" name="nuevo" class="btn btn-info">Nuevo</Button></a></th>
			<th><a href="#"><button type="button" name="imprimir" class="btn btn-info">Imprimir Todo</Button></a></th>

			<?php
			include "../conexion.php";
			$busqueda = "SELECT * FROM profesor";
			$busqueda = $mysqli->query($busqueda) or die (mysql_error($mysqli));
			while($fila=$busqueda->fetch_assoc())
			{
				$idProfesor=mysqli_real_escape_string($mysqli,$fila['idProfesor']);
				$nombre=mysqli_real_escape_string($mysqli,$fila['Nombre']);
				$direccion=mysqli_real_escape_string($mysqli,$fila['Direccion']);
				$telefono=mysqli_real_escape_string($mysqli,$fila['Telefono']);
				$password=mysqli_real_escape_string($mysqli,$fila['Password']);
				$dpi=mysqli_real_escape_string($mysqli,$fila['DPI']);
				$correo=mysqli_real_escape_string($mysqli,$fila['Correo']);
				$tipoUsuario=mysqli_real_escape_string($mysqli,$fila['TipoUsuario']);

				echo "<tr>";
					$idProfesor;
					echo "<td><center>"; echo $nombre; echo "</center></td>";
					echo "<td><center>"; echo $direccion; echo "</center></td>";
					echo "<td><center>"; echo $telefono; echo "</center></td>";
					echo "<td><center>"; echo $password; echo "</center></td>";
					echo "<td><center>"; echo $dpi; echo "</center></td>";
					echo "<td><center>"; echo $correo; echo "</td>";
					$tipoUsuario;
					echo "<td><a href='#?numero=".$idProfesor."'><button type='button' name='imprimir' class='btn btn-success'>Imprimir</Button></a></td>";
				echo "<tr>";
			}


			?>
			</table>

<a href="index.php">Volver</a>

		</center>
		<script src="../../js/bootstrap.js"></script>
	<script src="../../js/jquery-3.2.1.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	</body>
</html>
