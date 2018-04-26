
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
				echo "<tr>";
					echo "<td><center>";	echo "$fila[idAlumno]"; echo "</center></td>";
					echo "<td><center>";	echo "$fila[Nombre]"; echo "</center></td>";
					echo "<td><center>";	echo "$fila[Edad]"; echo "</center></td>";
					echo "<td><center>";	echo "$fila[Direccion]"; echo "</center></td>";
					echo "<td><center>";	echo "$fila[Telefono]"; echo "</center></td>";
					echo "<td><center>";	echo "$fila[Sexo]"; echo "</center></td>";
					echo "<td><center>";	echo "$fila[DPI]"; echo "</center></td>";
					echo "<td><center>";	echo "$fila[Password]"; echo "</center></td>";
					echo "<td><center>";	echo "$fila[TipoUsuario]"; echo "</td>";
					echo "<td><center>";	echo "$fila[Correo]"; echo "</td>";
					echo "<td><a href='deletestudent.php?numero=$fila[idAlumno]'><button type='button' name='eliminar' class='btn btn-danger'>Eliminar</Button></a></td>";
					echo "<td><a href='#?numero=$fila[idAlumno]'><button type='button' name='modificar' class='btn btn-success'>Modificar</Button></a></td>";
					echo "<td><a href='#?numero=$fila[idAlumno]'><button type='button' name='imprimir' class='btn btn-success'>Imprimir</Button></a></td>";
				echo "<tr>";
			}


			?>
			</table>

			<a href="index.php">Volver</a>
		</center>
	</body>
</html>