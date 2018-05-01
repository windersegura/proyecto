
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
	<title>Consulta De Semestre</title>
</head>
	<body>
		<center><br><h1>LISTADO DE SEMESTRE</h1><br><br>

		<table class="table">
			<th>Id.</th>
			<th>No. Semestre</th>
			<th>Carrera</th>
			
			<th><a href="newsemester.php"><button type="button" name="nuevo" class="btn btn-info">Nuevo</Button></a></th>
			<th><a href="#"><button type="button" name="imprimir" class="btn btn-info">Imprimir Todo</Button></a></th>
		
			<?php
			include "../conexion.php";
			$busqueda = "SELECT * FROM semestre";
			$busqueda = $mysqli->query($busqueda) or die (mysql_error($mysqli));
			while($fila=$busqueda->fetch_assoc())
			{
				$idSemestre = mysqli_real_escape_string($mysqli,$fila['idSemestre']);
				$semestre = mysqli_real_escape_string($mysqli,$fila['NoSemestre']);
				$carrera = mysqli_real_escape_string($mysqli,$fila['Carrera']);

				echo "<tr>";
					echo "<td><center>"; echo $idSemestre; echo "</center></td>";
					echo "<td><center>"; echo $semestre; echo "</center></td>";
					echo "<td><center>"; echo $carrera; echo "</center></td>";
					
					echo "<td><a href='deletesemester.php?numero=".$idSemestre."'><button type='button' name='eliminar' class='btn btn-danger'>Eliminar</Button></a></td>";
					echo "<td><a href='modifysemester.php?numero=".$idSemestre."'><button type='button' name='modificar' class='btn btn-success'>Modificar</Button></a></td>";
					echo "<td><a href='#?numero=".$idSemestre."'><button type='button' name='imprimir' class='btn btn-success'>Imprimir</Button></a></td>";
				echo "<tr>";
			}?>
			</table>

			<a href="index.php">Volver</a>
		</center>
	</body>
</html>