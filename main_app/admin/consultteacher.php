
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
	<title>Consulta De Maestros</title>
</head>
	<body>
		<center><br><h1>LISTADO DE MAESTROS</h1><br><br>
		<table class="table">
			<th>Id.</th>
			<th>Nombre</th>
			<th>Direccion</th>
			<th>Telefono</th>
			<th>Password</th>
			<th>DPI</th>
			<th>Correo</th>
			<th>Tipo De Usuario</th>
			
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
					echo "<td><center>"; echo $idProfesor; echo "</center></td>";
					echo "<td><center>"; echo $nombre; echo "</center></td>";
					echo "<td><center>"; echo $direccion; echo "</center></td>";
					echo "<td><center>"; echo $telefono; echo "</center></td>";
					echo "<td><center>"; echo $password; echo "</center></td>";
					echo "<td><center>"; echo $dpi; echo "</center></td>";
					echo "<td><center>"; echo $correo; echo "</td>";
					echo "<td><center>"; echo $tipoUsuario; echo "</td>";
					
					echo "<td><a href='deleteteacher.php?numero=".$idProfesor."'><button type='button' name='eliminar' class='btn btn-danger'>Eliminar</Button></a></td>";
					echo "<td><a href='modifyteacher.php?numero=".$idProfesor."'><button type='button' name='modificar' class='btn btn-success'>Modificar</Button></a></td>";
					echo "<td><a href='#?numero=".$idProfesor."'><button type='button' name='imprimir' class='btn btn-success'>Imprimir</Button></a></td>";
				echo "<tr>";
			}


			?>
			</table>

<a href="index.php">Volver</a>

		</center>
	</body>
</html>