
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
	<title>Consulta De Carrera</title>
</head>
	<body>
		<center><br><h1>LISTADO DE CARERRAS</h1><br><br>

		<table class="table">
			<th>Id.</th>
			<th>No. Semestre</th>
			<th>Carrera</th>
			
			<th><a href="newcareer.php"><button type="button" name="nuevo" class="btn btn-info">Nuevo</Button></a></th>
			<th><a href="#"><button type="button" name="imprimir" class="btn btn-info">Imprimir Todo</Button></a></th>
		
			<?php
			include "../conexion.php";
			$busqueda = "SELECT * FROM carrera";
			$busqueda = $mysqli->query($busqueda) or die (mysql_error($mysqli));
			while($fila=$busqueda->fetch_assoc())
			{
				$idCarrera = mysqli_real_escape_string($mysqli,$fila['idCarrera']);
				$NombreCarrera = mysqli_real_escape_string($mysqli,$fila['NombreCarrera']);
				$Duracion = mysqli_real_escape_string($mysqli,$fila['Duracion']);

				echo "<tr>";
					echo "<td><center>"; echo $idCarrera; echo "</center></td>";
					echo "<td><center>"; echo $NombreCarrera; echo "</center></td>";
					echo "<td><center>"; echo $Duracion; echo "</center></td>";
					
					echo "<td><a href='deletecareer.php?numero=".$idCarrera."'><button type='button' name='eliminar' class='btn btn-danger'>Eliminar</Button></a></td>";
					echo "<td><a href='modifycareer.php?numero=".$idCarrera."'><button type='button' name='modificar' class='btn btn-success'>Modificar</Button></a></td>";
					echo "<td><a href='#?numero=".$idCarrera."'><button type='button' name='imprimir' class='btn btn-success'>Imprimir</Button></a></td>";
				echo "<tr>";
			}?>
			</table>

			<a href="index.php">Volver</a>
		</center>
	</body>
</html>