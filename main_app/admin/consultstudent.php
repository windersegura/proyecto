
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
	<title>Consulta Del Alumno</title>
</head>
	<body>
		<center><br><h1>LISTADO DE ALUMNOS</h1><br><br>

		<table class="table">
			<th>Id.</th>
			<th>Nombre</th>
			<th>Edad</th>
			<th>Direccion</th>
			<th>Telefono</th>
			<th>Sexo</th>
			<th>DPI</th>
			<th>Password</th>
			<th>Tipo De Usuario</th>
			<th>Correo</th>
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

				echo "<tr>";
					echo "<td><center>"; echo $idAlumno; echo "</center></td>";
					echo "<td><center>"; echo $nombre; echo "</center></td>";
					echo "<td><center>"; echo $edad; echo "</center></td>";
					echo "<td><center>"; echo $direccion; echo "</center></td>";
					echo "<td><center>"; echo $telefono; echo "</center></td>";
					echo "<td><center>"; echo $sexo; echo "</center></td>";
					echo "<td><center>"; echo $dpi; echo "</center></td>";
					echo "<td><center>"; echo $password; echo "</center></td>";
					echo "<td><center>"; echo $tipoUsuario; echo "</td>";
					echo "<td><center>"; echo $correo; echo "</td>";
					echo "<td><a href='deletestudent.php?numero=".$idAlumno."'><button type='button' name='eliminar' class='btn btn-danger'>Eliminar</Button></a></td>";
					echo "<td><a href='modifystudent.php?numero=".$idAlumno."'><button type='button' name='modificar' class='btn btn-success'>Modificar</Button></a></td>";
					echo "<td><a href='#?numero=".$idAlumno."'><button type='button' name='imprimir' class='btn btn-success'>Imprimir</Button></a></td>";
				echo "<tr>";
			}


			?>
			</table>

			<a href="index.php">Volver</a>
		</center>
	</body>
</html>